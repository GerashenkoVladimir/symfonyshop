<?php

namespace ShopBundle\Entity;

/**
 * ShoppingBasket
 */
class ShoppingBasket
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $quantity;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set quantity
     *
     * @param integer $quantity
     *
     * @return ShoppingBasket
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }
    /**
     * @var \ShopBundle\Entity\Customer
     */
    private $customer;

    /**
     * @var \ShopBundle\Entity\Product
     */
    private $product;


    /**
     * Set customer
     *
     * @param \ShopBundle\Entity\Customer $customer
     *
     * @return ShoppingBasket
     */
    public function setCustomer(\ShopBundle\Entity\Customer $customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \ShopBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set product
     *
     * @param \ShopBundle\Entity\Product $product
     *
     * @return ShoppingBasket
     */
    public function setProduct(\ShopBundle\Entity\Product $product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \ShopBundle\Entity\Product
     */
    public function getProduct()
    {
        return $this->product;
    }
}
