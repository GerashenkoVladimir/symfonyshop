<?php

namespace ShopBundle\Entity;

/**
 * Orders
 */
class Orders
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $orderNumber;

    /**
     * @var \ShopBundle\Entity\Customers
     */
    private $customers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $products;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->products = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set orderNumber
     *
     * @param string $orderNumber
     *
     * @return Orders
     */
    public function setOrderNumber($orderNumber)
    {
        $this->orderNumber = $orderNumber;

        return $this;
    }

    /**
     * Get orderNumber
     *
     * @return string
     */
    public function getOrderNumber()
    {
        return $this->orderNumber;
    }

    /**
     * Set customers
     *
     * @param \ShopBundle\Entity\Customers $customers
     *
     * @return Orders
     */
    public function setCustomers(\ShopBundle\Entity\Customers $customers)
    {
        $this->customers = $customers;

        return $this;
    }

    /**
     * Get customers
     *
     * @return \ShopBundle\Entity\Customers
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * Add product
     *
     * @param \ShopBundle\Entity\Products $product
     *
     * @return Orders
     */
    public function addProduct(\ShopBundle\Entity\Products $product)
    {
        $this->products[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \ShopBundle\Entity\Products $product
     */
    public function removeProduct(\ShopBundle\Entity\Products $product)
    {
        $this->products->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }
}

