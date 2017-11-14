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

class DefaultController extends PassControllerAction
{
    /**
     * @Route("/admin/status", name="status")
     */
    public function statusPage(Request $request)
    {
        if(Auth::check($this)){
            $session = $this->get('session');

            $oLogon = $this->getDoctrine()->getRepository('AppBundle:Logon');
            $oResults = $oLogon->findBy(
                array('session_id' => $session->getId())
            );
            if (!$oResults) {
                $this->_login($session->getId(), $request);
            } else {
                $this->_updateActivity();
            }
            return $this->render('auth/status.html.twig', ['status' => $this->getUser()]);
        } else {
            return $this->redirectToRoute('security_login');
        }
    }

    private function _login($iSession_Id, $request) {

        $user = $this->getUser();

        $oLogon = new Logon();

        $oLogon->setUserId($user->getId());
        $oLogon->setLoginDate(new\DateTime('now'));
        $oLogon->setRecentActivity(new\DateTime('now'));
        $oLogon->setIpAddress($request->getClientIp());
        $oLogon->setSessionId($iSession_Id);


        $em = $this->getDoctrine()->getManager();
        $em->persist($oLogon);
        $em->flush();

        return;
    }





}
