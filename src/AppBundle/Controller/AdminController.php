<?php
namespace AppBundle\Controller;

use AppBundle\PassControllerAction;
use AppBundle\Helper\Auth;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class AdminController extends PassControllerAction
{
    /**
     * @Route("/admin", name="admin")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function statusPage(Request $request)
    {
        $user = $this->getUser();
        $getRole = $user->getRole();
       // $this->debug($getRole, 'die');
        if($getRole == 'ROLE_ADMIN' )
            return $this->render('auth/admin.html.twig', ['status' => $this->getUser()]);

    }


}