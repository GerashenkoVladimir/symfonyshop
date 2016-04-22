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
    private $orderNumber = '';

    /**
     * @var \ShopBundle\Entity\Customers
     */
    private $customers;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Orders
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
}
