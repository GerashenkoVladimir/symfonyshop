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
        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('shop_homepage');
        }
        
        $customer =$this->getUser();
        
        
    }
    public function addToBasketAction(Request $request)
    {
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
//                $em->persist($shopBaskets[0]);
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
}
