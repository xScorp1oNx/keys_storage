<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\PassControllerAction;
use AppBundle\Form\Type\UserProfileType;
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
                'name' => 'Users',
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
            $newUser->setPasswordHash(sha1($form['password']->getData()));
            // 4) save the User
            $em = $this->getDoctrine()->getManager();
            $em->persist($newUser);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('Information', 'User added');
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
                'message' => 'User => id: "' .$id . '" not found.',
                'status' => $user,
                'link_action' => '/admin/modules',
                'link_name' => 'Go to the users list',
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
            $this->addFlash('Information', 'User edited');
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

        $this->addFlash('notice', 'User deleted.');
        return $this->redirect('/admin/user');
    }

    /**
     * @Route("/admin/user/profile", name="user-profile")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function profileAction(Request $request)
    {
        $User = $this->getUser();
        $this->_updateActivity();
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($User->getId());

        $pass = $user->getPassword();
        $pass_hash = $user->getPasswordHash();

        $form = $this->createForm(UserProfileType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // 3) Encode the password (you could also do this via Doctrine listener)
            if ($form['password']->getData() != ''){
                $password = $this->get('security.password_encoder')
                    ->encodePassword($user, $user->getPassword());
                $user->setPassword($password);
            } else{
                // $user->setPassword($user->getPassword());
                $user->setPassword($pass);
            }
            if ($form['password_hash']->getData() != ''){

                if ($form->get('old_password_key')->getData() == '') {
                    $form = $this->createForm(UserProfileType::class, $form->getData());
                    $form->handleRequest($request);
                    return $this->render('user/profile.html.twig', array(
                        'form' => $form->createView(),
                        'status' => $User,
                        'error_info' => 'The old key field cannot be empty!'));
                } else {
                   // $this->debug(sha1($form->get('old_password_key')->getData()) . '    ' . $pass_hash, '  dsa');
                    if (sha1($form->get('old_password_key')->getData()) != $pass_hash) {
                        $form = $this->createForm(UserProfileType::class, $form->getData());
                        $form->handleRequest($request);
                        return $this->render('user/profile.html.twig', array(
                            'form' => $form->createView(),
                            'status' => $User,
                            'error_info' => 'Invalid key!'));
                    }
                }
                $flag = true;

                $hash = sha1($form['password_hash']->getData());

                $user->setPasswordHash($hash);


            } else {
                $user->setPasswordHash($pass);
            }


            $em = $this->getDoctrine()->getManager();
            if ($flag == true) {

                $oRows = $this->getDoctrine()->getRepository('AppBundle:Keys')->findBy(array('user_id' => $user->getId()),array('name' => 'ASC'));
                if (count($oRows) > 0) {

                    foreach ($oRows as $key) {

                        $hash_decode = $this->decode($key->getPassword(),$form->get('old_password_key')->getData());

                        $new_hash_encode = $this->encode($hash_decode, $form['password_hash']->getData());

                        $key->setPassword($new_hash_encode);


                        $em->persist($key);
                        $em->flush();
                    }
                }

            }
            // 4) save the User

            $em->persist($user);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('Information', 'User has been changed');
            return $this->redirect('/admin/user/profile');
        }

        return $this->render('user/profile.html.twig', array('form' => $form->createView(), 'status' => $User));
        //$this->debug($user, 'dasdsad');
    }





}
