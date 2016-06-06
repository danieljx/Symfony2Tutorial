<?php

namespace DJX\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $users = $em->getRepository('DJXUserBundle:User')->findAll();
        
        return $this->render('DJXUserBundle:User:index.html.twig', array('users' => $users));
    }
    
    public function viewAction($id)
    {
        $user = $this->getDoctrine()->getRepository('DJXUserBundle:User')->find($id);
        $res  = "Usuario: " . $user->getFirstName() . " " . $user->getLastName() . "<br/>\n";
        
        return new Response($res);
    }
}
