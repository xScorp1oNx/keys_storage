<?php

namespace AppBundle\Controller;

use AppBundle\Helper\Auth;
use AppBundle\PassControllerAction;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SecurityController extends PassControllerAction
{
    /**
     * @Route("/admin/login", name="security_login")
     */
    public function loginAction()
    {


        if(Auth::check($this)){
            return $this->redirect('/admin/status');
        }

        $helper = $this->get('security.authentication_utils');
        return $this->render('auth/login.html.twig', [
            'last_username' => $helper->getLastUsername(),
            'error' => $helper->getLastAuthenticationError(),
        ]);
    }

    /**
     * @Route("/login_check", name="security_login_check")
     */
    public function loginCheckAction()
    {
        return new Response();
    }

}