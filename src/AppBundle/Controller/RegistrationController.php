<?php

namespace AppBundle\Controller;


use AppBundle\Entity\User;
use AppBundle\PassControllerAction;
use AppBundle\Form\Type\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class RegistrationController extends PassControllerAction
{
    /**
     * @Route("/admin/register", name="register")
     */
    public function registerAction(Request $request)
    {
        // Create a new blank user and process the form
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encode the new users password
            $encoder = $this->get('security.password_encoder');
            $password = $encoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            // Set their role
            $user->setRole('ROLE_NOACTIVE');
            // Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('security_login');
        }
        return $this->render('auth/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}