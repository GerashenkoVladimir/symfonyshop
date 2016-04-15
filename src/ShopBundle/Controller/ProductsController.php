<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductsController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Shop/products/index.html.twig');
    }

    public function showAction()
    {
        return $this->render('@Shop/products/show.html.twig');
    }
}
