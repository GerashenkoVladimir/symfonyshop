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
     * Set categories
     *
     * @param \ShopBundle\Entity\Products $categories
     *
     * @return Products
     */
    public function setCategories(\ShopBundle\Entity\Products $categories = null)
    {
        $this->categories = $categories;

        return $this;
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
    public function setProducers(\ShopBundle\Entity\Producers $producers)
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
}

