<?php
namespace AppBundle;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class PassControllerAction extends Controller
{
    public function debug ($array, $text) {
        echo '<pre>';
        print_r($array); die($text);
    }

    public function displayPaginationBelow($page, $per_page, $total, $page_url){

        $adjacents = "2";

        $page = ($page == 0 ? 1 : $page);
        $start = ($page - 1) * $per_page;

        $prev = $page - 1;
        $next = $page + 1;
        $setLastpage = ceil($total/$per_page);
        $lpm1 = $setLastpage - 1;

        $setPaginate = "";
        if($setLastpage > 1)
        {
            $setPaginate .= "<ul class='setPaginate'>";
            $setPaginate .= "<p class='setPage'>Strona $page z $setLastpage</p>";
            if ($setLastpage < 7 + ($adjacents * 2))
            {
                for ($counter = 1; $counter <= $setLastpage; $counter++)
                {
                    if ($counter == $page)
                        $setPaginate.= "<li class='current_page'><a>$counter</a></li>";
                    else
                        $setPaginate.= "<li><a href='{$page_url}$counter'>$counter</a></li>";
                }
            }
            elseif($setLastpage > 5 + ($adjacents * 2))
            {
                if($page < 1 + ($adjacents * 2))
                {
                    for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                    {
                        if ($counter == $page)
                            $setPaginate.= "<li class='current_page'><a>$counter</a></li>";
                        else
                            $setPaginate.= "<li><a href='{$page_url}$counter'>$counter</a></li>";
                    }
                    $setPaginate.= "<li class='dot'>...</li>";
                    $setPaginate.= "<li><a href='{$page_url}$lpm1'>$lpm1</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}$setLastpage'>$setLastpage</a></li>";
                }
                elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                {
                    $setPaginate.= "<li><a href='{$page_url}1'>1</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}2'>2</a></li>";
                    $setPaginate.= "<li class='dot'>...</li>";
                    for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                    {
                        if ($counter == $page)
                            $setPaginate.= "<li class='current_page'><a>$counter</a></li>";
                        else
                            $setPaginate.= "<li><a href='{$page_url}$counter'>$counter</a></li>";
                    }
                    $setPaginate.= "<li class='dot'>..</li>";
                    $setPaginate.= "<li><a href='{$page_url}$lpm1'>$lpm1</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}$setLastpage'>$setLastpage</a></li>";
                }
                else
                {
                    $setPaginate.= "<li><a href='{$page_url}1'>1</a></li>";
                    $setPaginate.= "<li><a href='{$page_url}2'>2</a></li>";
                    $setPaginate.= "<li class='dot'>..</li>";
                    for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
                    {
                        if ($counter == $page)
                            $setPaginate.= "<li class='current_page'><a>$counter</a></li>";
                        else
                            $setPaginate.= "<li><a href='{$page_url}$counter'>$counter</a></li>";
                    }
                }
            }

            if ($page < $counter - 1){
                $setPaginate.= "<li class='next_page'><a href='{$page_url}$next'>›</a></li>";
                $setPaginate.= "<li class='last_page'><a href='{$page_url}$setLastpage'>»</a></li>";
            }else{
                $setPaginate.= "<li class='next_page empty_page'><a>›</a></li>";
                $setPaginate.= "<li class='last_page empty_page'><a>»</a></li>";
            }

            $setPaginate.= "</ul>\n";
        }

        return $setPaginate;
    }


    public function _updateActivity() {
        $session = $this->get('session');

        $oLogons = $this->getDoctrine()->getRepository('AppBundle:Logon');
        $oResults = $oLogons->findBy(
            array('session_id' => $session->getId())
        );
        if ($oResults)  {
            $oLogon = $this->getDoctrine()->getRepository('AppBundle:Logon')->find($oResults[0]->getId());
            $oLogon->setUserId($oLogon->getUserId());
            $oLogon->setLoginDate($oLogon->getLoginDate());
            $oLogon->setRecentActivity(new\DateTime('now'));
            $oLogon->setIpAddress($oLogon->getIpAddress());
            $oLogon->setSessionId($oLogon->getSessionId());

            $em = $this->getDoctrine()->getManager();
            $em->persist($oLogon);
            $em->flush();
        }

        return;
    }

    public function _countRows($sSql){
        $em = $this->getDoctrine()->getManager();
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT l.*, u.name, u.email FROM log_on l LEFT JOIN user u ON u.id=l.user_id " . $sSql);

        $statement->execute();
        $results = $statement->fetchAll();

        return count($results);
    }


}