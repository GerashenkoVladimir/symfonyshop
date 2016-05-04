<?php

namespace ShopBundle\Entity;

/**
 * Products
 */
class Product
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $price;

    /**
     * @var string
     */
    private $description;

    /**
     * @var \ShopBundle\Entity\Product
     */
    private $category;

    /**
     * @var \ShopBundle\Entity\Producer
     */
    private $producer;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Product
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set price
     *
     * @param float $price
     *
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    
    

    /**
     * Get categories
     *
     * @return \ShopBundle\Entity\Product
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Get producers
     *
     * @return \ShopBundle\Entity\Producer
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * Set categories
     *
     * @param \ShopBundle\Entity\Category $categories
     *
     * @return Product
     */
    public function setCategory(\ShopBundle\Entity\Category $categories = null)
    {
        $this->category = $categories;

        return $this;
    }

    /**
     * Set producers
     *
     * @param \ShopBundle\Entity\Producer $producer
     *
     * @return Product
     */
    public function setProducer(\ShopBundle\Entity\Producer $producer)
    {
        $this->producer = $producer;

        return $this;
    }
    /**
     * @var string
     */
    private $imageName;


    /**
     * Set imageName
     *
     * @param string $imageName
     *
     * @return Product
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;

        return $this;
    }

    /**
     * Get imageName
     *
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }
}
