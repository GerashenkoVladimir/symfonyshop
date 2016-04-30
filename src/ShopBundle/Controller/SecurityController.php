<?php

namespace ShopBundle\Controller;

use ShopBundle\Entity\Customers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
    public function registrationAction(Request $request)
    {
        if (!empty($password = $request->get('password')) && $password == $request->get('retypePassword')) {
            $customer = new Customers();
            $customer->setUsername($request->get('username'));
            $customer->setEmail($request->get('email'));
            $encoder = $this->get('security.password_encoder');
            $encodedPass = $encoder->encodePassword($customer, $request->get('password'));
            $customer->setPassword($encodedPass);
            $customer->setFirstName($request->get('firstName'));
            $customer->setSecondName($request->get('secondName'));
            $customer->setAge($request->get('age'));
            $customer->setCountry($request->get('country'));
            $customer->setRegion($request->get('region'));
            $customer->setCity($request->get('city'));
            $customer->setStreet($request->get('street'));
            $customer->setNumberOfHouse($request->get('house'));
            $customer->setNumberOfFlat($request->get('flat'));
            $customer->setRole('ROLE_USER');

            $em = $this->getDoctrine()->getManager();
            $em->persist($customer);
            $em->flush();
        }


        $em = $this->getDoctrine()->getRepository('ShopBundle:Categories');
        $categories = $em->findAll();
        return $this->render('@Shop/security/registration.html.twig', array(
            'categories' => $categories
        ));
    }

    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        
//        $error = $authenticationUtils->getLastAuthenticationError();

        //убрать 
        $repository = $this->getDoctrine()->getRepository('ShopBundle:Categories');
        $categories = $repository->findAll();
        return $this->render('ShopBundle::main_layout.html.twig', array(
            'categories' => $categories,
//            'error' => $error,
        ));
    }
}
