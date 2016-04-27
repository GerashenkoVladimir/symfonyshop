<?php

namespace AdminBundle\Controller;

use ShopBundle\Entity\Categories;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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

    public function addCategoryAction(Request $request)
    {
        $category = new Categories();
        $form = $this->createFormBuilder($category, array(
            'action' => $this->generateUrl('admin_add_category')
        ))
            ->add('name', TextType::class, array(
                'label' => 'Название категории: '
                ))
            ->add('image', FileType::class, array(
                'label' => 'Картинка: ',
            ))
            ->add('save',SubmitType::class, array('label' => 'Сохранить'))
            ->getForm();
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $name = rand(1,99999).$category->getName();


            $form['image']->getData()->move(
                'C:\xampp\htdocs\symfonyshop\src\ShopBundle\Resources\public\images\uploads\categories',
                $name
            );

            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('admin_add_category');
        }

        //убрать
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Categories');
        $categories = $repository->findAll();
        return $this->render('AdminBundle:actions:addCategory.html.twig', array('form' => $form->createView(), 'categories' => $categories));
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
