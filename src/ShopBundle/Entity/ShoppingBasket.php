<?php

namespace ShopBundle\Entity;

/**
 * ShoppingBasket
 */
class ShoppingBasket
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ShopBundle\Entity\Customers
     */
    private $customers;

    /**
     * @var \ShopBundle\Entity\Products
     */
    private $products;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return ShoppingBasket
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set customers
     *
     * @param \ShopBundle\Entity\Customers $customers
     *
     * @return ShoppingBasket
     */
    public function setCustomers(\ShopBundle\Entity\Customers $customers = null)
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
     * Set products
     *
     * @param \ShopBundle\Entity\Products $products
     *
     * @return ShoppingBasket
     */
    public function setProducts(\ShopBundle\Entity\Products $products = null)
    {
        $this->products = $products;

        return $this;
    }

    /**
     * Get products
     *
     * @return \ShopBundle\Entity\Products
     */
    public function getProducts()
    {
        return $this->products;
    }
}
