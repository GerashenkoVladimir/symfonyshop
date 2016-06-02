<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CustomerController extends Controller
{
    public function profileAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('shop_homepage');
        }
        
        $customer =$this->getUser();
        
        
    }
    public function addToBasketAction($id, Request $request)
    {
        if ($this->isCsrfTokenValid($tokenID = $id + $this->getUser()->getId(), $request->get('_token'))) {
            $doctrine = $this->getDoctrine();
            $product = $doctrine->getRepository('ShopBundle:Product')->find($id);
            $customer = $this->getUser();
            $customer->addProduct($product);
            $em = $doctrine->getManager();
            $em->persist($customer);
            $em->flush();
        }
        
        return $this->redirect($request->headers->get('referer'));
    }
}
