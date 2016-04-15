<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductsController extends Controller
{
    public function indexAction()
    {
        return $this->render('ShopBundle::index.html.twig');
    }
}
