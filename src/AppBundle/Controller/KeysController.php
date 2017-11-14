<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\Keys;
use AppBundle\PassControllerAction;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class KeysController extends PassControllerAction
{
    /**
     * @Route("/admin/keys")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function indexAction(Request $request) {
        $user = $this->getUser();

        $this->_updateActivity();

        $oRows = $this->getDoctrine()->getRepository('AppBundle:Keys')->findAll();

        return $this->render('keys/index.html.twig', array('keys' => $oRows, 'status' => $user));
    }

    /**
     * @Route("/admin/keys/add")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addAction (Request $request){

    }

    /**
     * @Route("/admin/keys/edit/{id}")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction($id, Request $request) {
        $this->debug($id, ' dsa');
    }

    /**
     * @Route("/admin/keys/delete/{id}")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction($id, Request $request) {
        $this->debug($id, ' dsa');
    }






}
