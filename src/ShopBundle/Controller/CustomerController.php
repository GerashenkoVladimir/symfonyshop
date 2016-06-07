<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\ShoppingBasket;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomerController extends Controller
{
    public function profileAction()
    {
        if (!$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('shop_homepage');
        }
        $doctrine = $this->getDoctrine();
        $customer = $this->getUser();
        $shoppingBasket = $doctrine->getRepository('ShopBundle:ShoppingBasket')->findBy(array('customer' => $customer));
        $categories = $doctrine->getRepository('ShopBundle:Category')->findAll();
        
        return $this->render("@Shop/customer/profile.twig", array(
            'categories' => $categories,
            'basket' => $shoppingBasket
        ));
        
    }
    public function addToBasketAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return $this->redirect($this->generateUrl('shop_homepage'));
        }
        $productId = $request->get("productId");
        if ($this->isCsrfTokenValid($tokenID = $productId + $this->getUser()->getId(), $request->get('_token'))) {
            $doctrine = $this->getDoctrine();
            $query = $doctrine->getRepository("ShopBundle:ShoppingBasket")->createQueryBuilder('b')
                ->where("b.product = :product")
                ->andWhere("b.customer = :customer")
                ->setParameter("product", $productId)
                ->setParameter("customer", $this->getUser()->getId())
                ->getQuery();
            $shopBaskets = $query->getResult();
            $em = $doctrine->getManager();
            if (count($shopBaskets) > 0 ) {
                $shopBaskets[0]->setQuantity($shopBaskets[0]->getQuantity() + $request->get("productQuantity"));
            } else {
                $shopBasket = new ShoppingBasket();
                $shopBasket->setProduct($doctrine->getRepository('ShopBundle:Product')->find($productId));
                $shopBasket->setCustomer($this->getUser());
                $shopBasket->setQuantity($request->get("productQuantity"));
                $em->persist($shopBasket);
            }
            
            $em->flush();

            return new JsonResponse("{\"productId\": {$productId}}");
        }

        return new Response(false."");
    }

    public function removeFromBasketAction(Request $request)
    {
        
        if (!$request->isXmlHttpRequest() && !$this->get('security.authorization_checker')->isGranted('ROLE_USER')) {
            return $this->redirect($this->generateUrl('shop_homepage'));
        }
        $productId = $request->get('productId');
        if ($this->isCsrfTokenValid($tokenID = $productId + $this->getUser()->getId(), $request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository("ShopBundle:ShoppingBasket")->find($productId);
            $em->remove($product);
            $em->flush();

            return new Response(json_encode(array('productId' => $productId)));
        }

        return new Response(false."");

    }
}
