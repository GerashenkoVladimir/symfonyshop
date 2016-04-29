<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\Category;
use ShopBundle\Entity\Categories;
use ShopBundle\Entity\Producers;
use ShopBundle\Entity\Products;
use ShopBundle\Inheritance\ControllerHelper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



class AdminController extends Controller
{
    use ControllerHelper;
    
    public function indexAction()
    {


        //убрать 
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Categories');
        $categories = $repository->findAll();
        return $this->render('AdminBundle::index.html.twig',array( 'categories' => $categories));
    }

    public function addCategoryAction(Request $request)
    {
        $category = new Categories();
        $form = $this->createForm(Category::class, $category, array(
            'action' => $this->generateUrl('admin_add_category')
        ));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newName = date("Y_m_d_H_i_s", time());
            $em = $this->getDoctrine()->getManager();
            $category->setImageName($newName);
            $em->persist($category);
            $em->flush();
            $imagePath = $form->get('image')->getData()->getPathName();

            $this->normalizeImage($imagePath, $newName, 'category');

            return $this->redirectToRoute('admin_add_category');
        }

        //убрать
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Categories');
        $categories = $repository->findAll();
        return $this->render('AdminBundle:actions:addCategory.html.twig', array('form' => $form->createView(), 'categories' => $categories));
    }

    public function addProducerAction(Request $request)
    {

        if ($request->isMethod('post')){
            $producer = new Producers();
            $producer->setName($request->get('name'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($producer);
            $em->flush();
        }
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Categories');
        $categories = $repository->findAll();
        return $this->render('AdminBundle:actions:addProducer.html.twig', array('categories' => $categories));
    }

    public function addProductAction(Request $request)
    {
        if ($request->isMethod('post')) {
            $producer = $this->getDoctrine()->getRepository('ShopBundle:Producers')->find($request->get('producer'));
            $category = $this->getDoctrine()->getRepository('ShopBundle:Categories')->find($request->get('category'));
            $product = new Products();
            $product->setName($request->get('name'));
            $product->setPrice($request->get('price'));
            $product->setDescription($request->get('description'));
            $product->setCategories($category);
            $product->setProducer($producer);

            $newName = date("Y_m_d_H_i_s", time());
            $product->setImageName($newName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            $imagePath = $request->files->get('image')->getPathName();

            $this->normalizeImage($imagePath, $newName, 'product');
        }



        //убрать
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Categories');
        $categories = $repository->findAll();
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Producers');
        $producers  = $repository->findAll(); 
        return $this->render('AdminBundle:actions:addProduct.html.twig', array(
            'categories' => $categories,
            'producers' => $producers
        ));
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

    private function normalizeImage($imagePath, $name, $destinationDirectory)
    {
        $imageHandler = new \upload($imagePath);
        $imageHandler->file_new_name_body = $name;
        $imageHandler->image_convert = 'jpg';
        $imageHandler->process($this->getImagePath($destinationDirectory));
    }
}
