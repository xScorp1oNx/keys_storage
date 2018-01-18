<?php

namespace AppBundle\Controller;

use AppBundle\Helper\Auth;
use AppBundle\PassControllerAction;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Logon;
use AppBundle\Entity\User;
use Doctrine\ORM\Tools\Pagination\Paginator;

class LogonController extends PassControllerAction
{
    /**
     * @Route("/admin/history/{page}")
     */
    public function listPage($page, Request $request)
    {
        $user = $this->getUser();
        $this->_updateActivity();
        $breadcrumbs = array(
            '0' => array(
                'name' => 'Historia logowań',
                'link' => '/admin/history/1'
            ),
        );
        if ($page == '' || $page == 0) {
            return $this->redirect('/admin/history/1');
        }
        $form = Request::createFromGlobals();

        $sSql = '';

        if ($form->request->has('submit')) {

            $data = $form->request->all();

            $key = explode(' ', trim($data['query']));


            $columns = array(
                '0' => 'u.name',
                '1' => 'u.email',
            );
            $where = '';

            foreach ($key as $word) {
                foreach($columns as $column) {
                    if (empty($where)) {
                        $sSql .= " WHERE " . $column . " LIKE '%" . $word . "%'";
                        $where = 1;
                    } else {
                        $sSql .= " OR " . $column . " LIKE '%" . $word . "%'";
                    }
                }
            }
        }

        $oLogon = $this->getDoctrine()->getRepository('AppBundle:Logon')->findAll();
        $points_count = $this->_countRows($sSql);

        $em = $this->getDoctrine()->getManager();

        // po 10 wierszy na stronie
        $page_limit = 10;
        $count = ceil($points_count/$page_limit);

        $page_url = '/admin/history/';

        $pagination = $this->displayPaginationBelow($page, $page_limit, $points_count, $page_url);

        $step = ($page - 1) * $page_limit;


        $connection = $em->getConnection();
        //$statement = $connection->prepare("SELECT m.name, a.name FROM modules m LEFT JOIN group_aliases ga ON m.alias_id=ga.modules_id LEFT JOIN alias a ON a.id = ga.alias_id");
        $statement = $connection->prepare("SELECT l.*, u.name, u.email FROM log_on l LEFT JOIN user u ON u.id=l.user_id " . $sSql . " ORDER BY l.login_date DESC LIMIT " . $step . ", " . $page_limit );
        $statement->execute();
        $results = $statement->fetchAll();
        $aData = array(
            'pagination' => $pagination,
            'results' => $results,
            'status' => $user,
            'breadcrumbs' => $breadcrumbs,
        );
        if(!empty($data['query'])) {
            $aData['search_word'] = $data['query'];
        }

        return $this->render('logon/list.html.twig', $aData );
    }
}
