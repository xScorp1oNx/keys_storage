<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\PassControllerAction;
use AppBundle\Form\Type\UserType;
use AppBundle\Form\Type\UseraddType;
use AppBundle\Form\Type\UsereditType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class UserController extends PassControllerAction
{
    /**
     * @Route("/admin/user")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function indexAction(Request $request) {
        $user = $this->getUser();
        $this->_updateActivity();
        $breadcrumbs = array(
            '0' => array(
                'name' => 'Użytkowniki',
                'link' => '/admin/user'
            ),
        );

        $Users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();
       // $user1 = $user->getCompany();


      // echo $user1; die('--X--');
        return $this->render('user/index.html.twig', array('user' => $Users, 'status' => $user, 'breadcrumbs' => $breadcrumbs, ));
    }
    /**
     * @Route("/admin/user/add")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addAction (Request $request){
        $user = $this->getUser();
        $this->_updateActivity();

        $newUser = new User();

        $form = $this->createForm(UseraddType::class, $newUser);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            $password = $this->get('security.password_encoder')
                ->encodePassword($newUser, $newUser->getPassword());
            $newUser->setPassword($password);
            // 4) save the User
            $em = $this->getDoctrine()->getManager();
            $em->persist($newUser);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('Informacja', 'Urzytkownik dodany');
            return $this->redirect('/admin/user');
        }

        return $this->render('user/add.html.twig', array('form' => $form->createView(), 'status' => $user));

    }

    /**
     * @Route("/admin/user/edit/{id}")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction($id, Request $request) {
        $User = $this->getUser();
        $this->_updateActivity();

        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        if(!$user) {
            return $this->render('error/error.html.twig', array(
                'message' => 'Użytkownika z id: "' .$id . '" nie znaleziono.',
                'status' => $user,
                'link_action' => '/admin/modules',
                'link_name' => 'Przejdź do listy użytkowników',
            ));
        }
        $user->setName($user->getName());
        $user->setEmail($user->getEmail());
        $user->setRole($user->getRole());
        $pass = $user->getPassword();

        $form = $this->createForm(UsereditType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            if ($form['password']->getData() != ''){
                    $password = $this->get('security.password_encoder')
                        ->encodePassword($user, $user->getPassword());
                    $user->setPassword($password);
                }
            else{
               // $user->setPassword($user->getPassword());
                $user->setPassword($pass);
            }
            // 4) save the User
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('Informacja', 'Urzytkownik zmieniony');
            return $this->redirect('/admin/user');
        }

        return $this->render('user/edit.html.twig', array('form' => $form->createView(), 'status' => $User));
    }

    /**
     * @Route("/admin/user/{id}/delete", name="user-delete")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction($id)
    {
        $this->_updateActivity();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);
        if (!$user) {
            throw $this->createNotFoundException(
                'Nie znaleziono użytkownika o id ' . $id
            );
        }

        $em->remove($user);
        $em->flush();

        $this->addFlash('notice', 'Użytkownik poprawnie usunięty.');
        return $this->redirect('/admin/user');
    }






}
