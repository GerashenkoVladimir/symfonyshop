<?php

namespace AdminBundle\Form;

use AdminBundle\Service\GlobalHelper;
use ShopBundle\Entity\Category;
use ShopBundle\Entity\Producer;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Product extends AbstractType
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function __construct()
    {
        $this->container = GlobalHelper::getContainer();
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $em = $this->container->get('doctrine')->getRepository('ShopBundle:Category');
        $categories = $em->findAll();

        $em = $this->container->get('doctrine')->getRepository('ShopBundle:Producer');
        $producers = $em->findAll();

        $builder
            ->setAttribute('action', 'cation')
            ->add('name', TextType::class, array(
                'label' => 'Название товара:',
                'attr' => array(
                    'placeholder' => 'введите название товара'
                )))
            ->add('price', TextType::class, array(
                'label' => 'Цена:',
                'attr' => array(
                    'placeholder' => 'введите цену товара'
                )))
            ->add('description', TextareaType::class, array(
                'label' => 'Описание товара:',
                'required' => false,
                'attr' => array(
                    'placeholder' => 'введите описание товара (не обязательно)'
                )))
            ->add('category', ChoiceType::class, array(
                'label' => 'Категория товара:',
                'choices' => $categories,
                'choice_label' => function (Category $category) {
                    return $category->getName();
                }
            ))
            ->add('producer', ChoiceType::class,array(
                'label' => 'Производитель:',
                'choices' => $producers,
                'choice_label' => function (Producer $producer) {
                    return $producer->getName();
                }
            ))
            ->add('image', FileType::class, array(
                'label' => 'Изображение товара:',
                'mapped' => false,
                'required' => false,
            ))
            ->add('save', SubmitType::class, array('label' => 'Сохранить'));
    }

    public function configureOptions(OptionsResolver $resolver)
    {

    }

    public function getName()
    {
        return 'admin_bundle_product';
    }
}
