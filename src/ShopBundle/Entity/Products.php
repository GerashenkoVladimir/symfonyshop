<?php

namespace ShopBundle\Entity;

/**
 * Products
 */
class Products
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
     * @var \ShopBundle\Entity\Products
     */
    private $categories;

    /**
     * @var \ShopBundle\Entity\Producers
     */
    private $producers;


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
     * @return Products
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
     * @return Products
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
     * @return Products
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
     * @return \ShopBundle\Entity\Products
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set producers
     *
     * @param \ShopBundle\Entity\Producers $producers
     *
     * @return Products
     */
    public function setProducer(\ShopBundle\Entity\Producers $producers)
    {
        $this->producers = $producers;

        return $this;
    }

    /**
     * Get producers
     *
     * @return \ShopBundle\Entity\Producers
     */
    public function getProducers()
    {
        return $this->producers;
    }

    /**
     * Set categories
     *
     * @param \ShopBundle\Entity\Categories $categories
     *
     * @return Products
     */
    public function setCategories(\ShopBundle\Entity\Categories $categories = null)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Set producers
     *
     * @param \ShopBundle\Entity\Producers $producers
     *
     * @return Products
     */
    public function setProducers(\ShopBundle\Entity\Producers $producers)
    {
        $this->producers = $producers;

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
     * @return Products
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
