<?php

namespace AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends Controller
{
    public function indexAction()
    {
        //убрать 
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Categories');
        $categories = $repository->findAll();
        return $this->render('AdminBundle::index.html.twig',array( 'categories' => $categories));
    }

    public function addCategoryAction()
    {
        
    }

    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUserName = $authenticationUtils->getLastUsername();

        //убрать 
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Categories');
        $categories = $repository->findAll();
        return $this->render('AdminBundle::login.html.twig', array(
            'last_username' => $lastUserName,
            'error' => $error,
            'categories' => $categories));

    }
}
