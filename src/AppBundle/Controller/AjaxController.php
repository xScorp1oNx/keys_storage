<?php
namespace AppBundle\Controller;

use AppBundle\Helper\Auth;
use AppBundle\PassControllerAction;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends PassControllerAction
{
    /**
     * @Route("/ajax/getstatus/", name="getstatus")
     */
    public function getstatusAction(Request $request)
    {
        $this->_updateActivity();
        $data = $request->request->all();

        $count = count($data);

        if ($count > 0) {

            $oRow = $this->getDoctrine()->getRepository('AppBundle:Category')->find($data['id']);

            $repository = $this->getDoctrine()->getRepository('AppBundle:Category');

            $oCats = $repository->findBy(
                array('menu' => $oRow->getMenu())
            );

            $countList = count($oCats);

            if (!$oRow) {

                $response = new JsonResponse('Error', 200, array());
                return $response;

            } else {

                if ($data['status'] == 'up') {

                    $load_result = $this->upOrderLines($oRow);

                    $response = new Response(json_encode($load_result));
                    $response->headers->set('Content-Type', 'application/json');

                    return $response;

                } else {
                    $load_result = $this->downOrderLines($oRow, $countList);

                  //  $this->debug($load_result, ' das d');
                    $response = new Response(json_encode($load_result));
                    $response->headers->set('Content-Type', 'application/json');

                    return $response;
                }
            }

        } else {
            return 'Error!';
        }

        return $this->render('ajax/getstatus.html.twig');

    }


}
