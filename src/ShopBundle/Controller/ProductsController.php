<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductsController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Category');
        $categories = $repository->findAll();
        return $this->render('@Shop/product/index.html.twig',array('categories' => $categories));
    }

    public function showAction($id)
    {
        $category = $this->getDoctrine()->getRepository('ShopBundle:Category')->find($id);
        $products = $category->getProduct();
        /*foreach ($products as $product) {
            dump($product);
        }
        exit;*/
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Category');
        $categories = $repository->findAll();
        return $this->render('@Shop/product/show.html.twig', array(
            'categories' => $categories,
            'category' => $category,
            'products' => $products, 
        ));
    }
}
