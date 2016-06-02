<?php

namespace AdminBundle\Controller;

use AdminBundle\Form\Category as CategoryForm;
use ShopBundle\Entity\Category as CategoryEntity;
use AdminBundle\Form\Product as ProductForm;
use ShopBundle\Entity\Product as ProductEntity;
use ShopBundle\Entity\Producer;
use ShopBundle\Inheritance\ControllerHelper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class AdminController extends Controller
{
    use ControllerHelper;

    public function indexAction()
    {

        //убрать 
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Category');
        $categories = $repository->findAll();
        return $this->render('AdminBundle::index.html.twig', array('categories' => $categories));
    }

    public function addCategoryAction(Request $request)
    {
        $category = new CategoryEntity();
        $form = $this->createForm(CategoryForm::class, $category, array(
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
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Category');
        $categories = $repository->findAll();
        return $this->render('AdminBundle:actions:addCategory.html.twig',
            array('form' => $form->createView(), 'categories' => $categories));
    }

    public function addProducerAction(Request $request)
    {
        if ($request->isMethod('post')) {
            $producer = new Producer();
            $producer->setName($request->get('name'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($producer);
            $em->flush();
        }
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Category');
        $categories = $repository->findAll();
        return $this->render('AdminBundle:actions:addProducer.html.twig', array('categories' => $categories));
    }

    public function addProductAction(Request $request)
    {

        $product = new ProductEntity();
        $form = $this->createForm(ProductForm::class, $product, array(
            'action' => $this->generateUrl('admin_add_product'),
        ));
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $newName = date("Y_m_d_H_i_s", time());
            $product->setImageName($newName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();
            $imagePath = $form->get('image')->getData()->getPathName();
            $this->normalizeImage($imagePath, $newName, 'product');
            return $this->redirect($request->headers->get('referer'));
        }
        //убрать
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Category');
        $categories = $repository->findAll();
        return $this->render('AdminBundle:actions:addProduct.html.twig', array(
            'categories' => $categories,
            'form'       => $form->createView(),
        ));
    }

    public function removeProductAction(Request $request)
    {

        $id = $request->get("productId");
        if ($this->isCsrfTokenValid($this->getUser()->getUsername(), $request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository('ShopBundle:Product')->find($id);
            if (!$product) {
                throw $this->createNotFoundException(
                    "Продукта с идентификационным номером $id не существует!"
                );
            }

            $em->remove($product);
            $em->flush();

            return new Response(true.'');
        }
        
        return new Response(false.'');
    }

    public function editProductAction($id, Request $request)
    {

        $token = $this->get('security.csrf.token_manager')->getToken($tokenID = $id + $this->getUser()->getId());
        if ($this->isCsrfTokenValid($tokenID, $request->get('_token'))) {

            $em = $this->getDoctrine()->getManager();
            $product = $em->getRepository('ShopBundle:Product')->find($id);
            $oldImageName = $product->getImageName();

            $form = $this->createForm(ProductForm::class, $product, array(
                'action' => $this->generateUrl('admin_edit_product', array('id' => $id)) . "?_token=$token"
            ));
            $form->handleRequest($request);

            if ($request->isMethod('post')) {

                if (!is_null($form->get('image')->getData())) {
                    $newImagePath = $form->get('image')->getData()->getPathName();
                    $newName = date("Y_m_d_H_i_s", time());

                    $this->changeImage($newImagePath, $oldImageName, $newName, 'product');

                    $product->setImageName($newName);
                } else {
                    $product->setImageName($oldImageName);
                }
                $em->flush();
            }
            $repository = $this->getDoctrine()->getRepository('ShopBundle:Category');
            $categories = $repository->findAll();
            return $this->render('@Admin/actions/addProduct.html.twig', array(
                'categories' => $categories,
                'form'       => $form->createView(),
            ));
        }

        return $this->redirect($request->headers->get('referer'));
    }

    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUserName = $authenticationUtils->getLastUsername();

        //убрать 
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Category');
        $categories = $repository->findAll();
        return $this->render('AdminBundle::login.html.twig', array(
            'last_username' => $lastUserName,
            'error'         => $error,
            'categories'    => $categories
        ));

    }

    private function normalizeImage($imagePath, $name, $destinationDirectory)
    {
        $imageHandler = new \upload($imagePath);
        $imageHandler->file_new_name_body = $name;
        $imageHandler->image_convert = 'jpg';
        $imageHandler->process($this->getImagePath($destinationDirectory));
    }

    private function changeImage($newImagePath, $oldName, $newName, $destinationDirectory)
    {
        if (unlink($this->getImagePath($destinationDirectory) . $oldName . '.jpg')) {
            $this->normalizeImage($newImagePath, $newName, $destinationDirectory);
        }
    }
}
