<?php

namespace ShopBundle\Entity;

/**
 * ProductsOrders
 */
class ProductsOrders
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ShopBundle\Entity\Orders
     */
    private $order;

    /**
     * @var \ShopBundle\Entity\Products
     */
    private $product;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return ProductsOrders
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
     * Set order
     *
     * @param \ShopBundle\Entity\Orders $order
     *
     * @return ProductsOrders
     */
    public function setOrder(\ShopBundle\Entity\Orders $order = null)
    {
        $this->order = $order;

        return $this;
    }

    /**
     * Get order
     *
     * @return \ShopBundle\Entity\Orders
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Set product
     *
     * @param \ShopBundle\Entity\Products $product
     *
     * @return ProductsOrders
     */
    public function setProduct(\ShopBundle\Entity\Products $product = null)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * Get product
     *
     * @return \ShopBundle\Entity\Products
     */
    public function getProduct()
    {
        return $this->product;
    }
}
