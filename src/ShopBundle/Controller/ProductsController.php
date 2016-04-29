<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductsController extends Controller
{
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Categories');
        $categories = $repository->findAll();
        return $this->render('@Shop/products/index.html.twig',array('categories' => $categories));
    }

    public function showAction($id)
    {
        $category = $this->getDoctrine()->getRepository('ShopBundle:Categories')->find($id);
        $products = $category->getProducts();
        
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Categories');
        $categories = $repository->findAll();
        return $this->render('@Shop/products/show.html.twig', array(
            'categories' => $categories,
            'category' => $category,
            'products' => $products, 
        ));
    }
}
