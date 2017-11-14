<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Entity\Page;
use AppBundle\Form\Type\HeadType;
use AppBundle\PassControllerAction;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class HeadController extends PassControllerAction
{
    /**
     * @Route("/admin/configuration")
     */
    public function indexAction(Request $request)
    {
        $user = $this->getUser();
        $this->_updateActivity();

        $oHead = $this->getDoctrine()->getRepository('AppBundle:Head')->findAll();

        $form = Request::createFromGlobals();

        if ($form->request->has('submit')) {

            $data = $form->request->all();
            $oHead = $this->getDoctrine()->getRepository('AppBundle:Head')->findAll();
            $em = $this->getDoctrine()->getManager();
            $nowDateTime = new\DateTime('now');
            foreach($oHead as $element) {
                foreach($data as $key => $value) {
                    if ($element->getName() == $key) {

                        $oElement = $em->getRepository('AppBundle:Head')->find($element->getId());
                        $oElement->setBody($value);
                        $oElement->setDatetime($nowDateTime);

                        $em->persist($oElement);
                        $em->flush();
                    }
                }

            }
        }

        return $this->render('head/edit.html.twig', array(
            'head' => $oHead,
            'status' => $user
        ));
    }
}