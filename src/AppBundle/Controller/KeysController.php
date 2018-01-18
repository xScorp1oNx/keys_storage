<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\Keys;
use AppBundle\PassControllerAction;
use AppBundle\Form\Type\KeysType;
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

        //$oRows = $this->getDoctrine()->getRepository('AppBundle:Keys')->findAll();
        $oRows = $this->getDoctrine()->getRepository('AppBundle:Keys')->findBy(array('user_id' => $user->getId()),array('name' => 'ASC'));

        $form = Request::createFromGlobals();
        $aData = array(
            'keys' => $oRows,
            'status' => $user
        );
        if ($form->request->has('submit')) {
            $data = $form->request->all();
            $pass = sha1($data['key']);
            if ($pass == $user->getPasswordHash()) {
                foreach ($oRows as $key) {
                    $hash_pass = $this->decode($key->getPassword(), $data['key']);
                    $key->setPassword($hash_pass);
                }
                $aData['keys'] = $oRows;
                $aData['open'] = 'true';
            } else {
                $aData['error_info'] = 'Invalid key!';
            }
        }

        return $this->render('keys/index.html.twig', $aData);
    }

    /**
     * @Route("/admin/keys/add")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function addAction (Request $request){
        $user = $this->getUser();
        $this->_updateActivity();

        $oKey = new Keys();

        $form = $this->createForm(KeysType::class, $oKey);

        // 2) handle the submit (will only happen on POST)
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $pass_hash = $user->getPasswordHash();
            if ($form->get('password_key')->getData() == '') {
                $form = $this->createForm(KeysType::class, $form->getData());
                $form->handleRequest($request);
                return $this->render('user/add.html.twig', array(
                    'form' => $form->createView(),
                    'status' => $user,
                    'error_info' => 'The old key field cannot be empty!'));
            } else {
                if (sha1($form->get('password_key')->getData()) != $pass_hash) {
                    $form = $this->createForm(KeysType::class, $form->getData());
                    $form->handleRequest($request);
                    return $this->render('user/add.html.twig', array(
                        'form' => $form->createView(),
                        'status' => $user,
                        'error_info' => 'Invalid key!'));
                } else {
                    $oKey->setPassword($this->encode($form['password']->getData(), $form->get('password_key')->getData()));
                }
            }
            $oKey->setUserId($user->getId());

            $em = $this->getDoctrine()->getManager();
            $em->persist($oKey);
            $em->flush();

            // ... do any other work - like sending them an email, etc
            // maybe set a "flash" success message for the user
            $this->addFlash('Informacja', 'Key added');
            return $this->redirect('/admin/keys');
        }

        return $this->render('keys/add.html.twig', array('form' => $form->createView(), 'status' => $user));
    }

    /**
     * @Route("/admin/keys/edit/{id}")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction($id, Request $request) {
        $User = $this->getUser();
        $this->_updateActivity();

        $oKey = $this->getDoctrine()->getRepository('AppBundle:Keys')->find($id);
        if(!$oKey) {
            return $this->render('error/error.html.twig', array(
                'message' => 'Key: "' .$id . '" not found.',
                'status' => $oKey,
                'link_action' => '/admin/keys',
                'link_name' => 'Go to the keys list',
            ));
        }

        $old_pass = $oKey->getPassword();

        $form = $this->createForm(KeysType::class, $oKey);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form['password']->getData() != ''){
                $pass_hash = $User->getPasswordHash();
                if ($form->get('password_key')->getData() == '') {
                    $form = $this->createForm(KeysType::class, $form->getData());
                    $form->handleRequest($request);
                    return $this->render('user/profile.html.twig', array(
                        'form' => $form->createView(),
                        'status' => $User,
                        'error_info' => 'The old key field cannot be empty!'));
                } else {
                    if (sha1($form->get('password_key')->getData()) != $pass_hash) {
                        $form = $this->createForm(KeysType::class, $form->getData());
                        $form->handleRequest($request);
                        return $this->render('user/profile.html.twig', array(
                            'form' => $form->createView(),
                            'status' => $User,
                            'error_info' => 'Invalid key!'));
                    } else {
                        $oKey->setPassword($this->encode($form['password']->getData(), $form->get('password_key')->getData()));
                    }
                }
            } else {
                $oKey->setPassword($old_pass);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($oKey);
            $em->flush();

            $this->addFlash('Information', 'The password is changed');
            return $this->redirect('/admin/keys');
        }

        return $this->render('keys/edit.html.twig', array('form' => $form->createView(), 'status' => $User));
    }

    /**
     * @Route("/admin/keys/delete/{id}")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction($id, Request $request) {
        $this->_updateActivity();
        $em = $this->getDoctrine()->getManager();
        $oKey = $em->getRepository('AppBundle:Keys')->find($id);
        if(!$oKey) {
            return $this->render('error/error.html.twig', array(
                'message' => 'Key: "' .$id . '" not found.',
                'status' => $oKey,
                'link_action' => '/admin/keys',
                'link_name' => 'Go to the keys list',
            ));
        }
        $em->remove($oKey);
        $em->flush();

        $this->addFlash('notice', 'The key is removed correctly.');
        return $this->redirect('/admin/keys');
    }






}
