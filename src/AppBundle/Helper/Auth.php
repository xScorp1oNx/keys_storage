<?php


namespace AppBundle\Helper;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class Auth extends Controller
{

    public static function check(Controller $controller)
    {
        return $controller->getUser();
    }
}