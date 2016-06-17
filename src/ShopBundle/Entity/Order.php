<?php

namespace ShopBundle\Entity;

/**
 * Order
 */
class Order
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $orderProduct;

    /**
     * @var \ShopBundle\Entity\Customer
     */
    private $customer;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orderProduct = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Order
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
     * Add orderProduct
     *
     * @param \ShopBundle\Entity\OrderProduct $orderProduct
     *
     * @return Order
     */
    public function addOrderProduct(\ShopBundle\Entity\OrderProduct $orderProduct)
    {
        $this->orderProduct[] = $orderProduct;

        return $this;
    }

    /**
     * Remove orderProduct
     *
     * @param \ShopBundle\Entity\OrderProduct $orderProduct
     */
    public function removeOrderProduct(\ShopBundle\Entity\OrderProduct $orderProduct)
    {
        $this->orderProduct->removeElement($orderProduct);
    }

    /**
     * Get orderProduct
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderProduct()
    {
        return $this->orderProduct;
    }

    /**
     * Set customer
     *
     * @param \ShopBundle\Entity\Customer $customer
     *
     * @return Order
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
}
