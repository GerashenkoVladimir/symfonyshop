<?php

namespace ShopBundle\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Customers
 */
class Customer implements UserInterface, \Serializable
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $plainPassword;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $secondName;

    /**
     * @var integer
     */
    private $age;

    /**
     * @var string
     */
    private $country;

    /**
     * @var string
     */
    private $region;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $street;

    /**
     * @var integer
     */
    private $numberOfHouse;

    /**
     * @var integer
     */
    private $numberOfFlat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $product;

    /**
     * @var string
     */
    private $role;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->product = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set email
     *
     * @param string $email
     *
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return Customer
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     *
     * @return Customer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set secondName
     *
     * @param string $secondName
     *
     * @return Customer
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;

        return $this;
    }

    /**
     * Get secondName
     *
     * @return string
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Customer
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Customer
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set region
     *
     * @param string $region
     *
     * @return Customer
     */
    public function setRegion($region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return string
     */
    public function getRegion()
    {
        return $this->region;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Customer
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return Customer
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set numberOfHouse
     *
     * @param integer $numberOfHouse
     *
     * @return Customer
     */
    public function setNumberOfHouse($numberOfHouse)
    {
        $this->numberOfHouse = $numberOfHouse;

        return $this;
    }

    /**
     * Get numberOfHouse
     *
     * @return integer
     */
    public function getNumberOfHouse()
    {
        return $this->numberOfHouse;
    }

    /**
     * Set numberOfFlat
     *
     * @param integer $numberOfFlat
     *
     * @return Customer
     */
    public function setNumberOfFlat($numberOfFlat)
    {
        $this->numberOfFlat = $numberOfFlat;

        return $this;
    }

    /**
     * Get numberOfFlat
     *
     * @return integer
     */
    public function getNumberOfFlat()
    {
        return $this->numberOfFlat;
    }

    /**
     * Add product
     *
     * @param \ShopBundle\Entity\Product $product
     *
     * @return Customer
     */
    public function addProduct(\ShopBundle\Entity\Product $product)
    {
        $this->product[] = $product;

        return $this;
    }

    /**
     * Remove product
     *
     * @param \ShopBundle\Entity\Product $product
     */
    public function removeProduct(\ShopBundle\Entity\Product $product)
    {
        $this->product->removeElement($product);
    }

    /**
     * Get products
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduct()
    {
        return $this->product();
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return (Role|string)[] The user roles
     */
    public function getRoles()
    {
        return array($this->role);
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * Returns the username used to authenticate the user.
     *
     * @return string The username
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
    }

    /**
     * @return string
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }
    /**
     * @param string $plainPassword
     */
    public function setPlainPassword($plainPassword)
    {
        $this->plainPassword = $plainPassword;
    }


    /**
     * Set role
     *
     * @param string $role
     *
     * @return Customer
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * String representation of object
     * @link  http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     * @since 5.1.0
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password,
            $this->plainPassword,
            $this->role,
        ));
    }

    /**
     * Constructs the object
     * @link  http://php.net/manual/en/serializable.unserialize.php
     *
     * @param string $serialized <p>
     *                           The string representation of the object.
     *                           </p>
     *
     * @return void
     * @since 5.1.0
     */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->password,
            $this->plainPassword,
            $this->email,
            $this->role,
            ) = unserialize($serialized);
    }
    /**
     * @var string
     */
    private $username;


    /**
     * Set username
     *
     * @param string $username
     *
     * @return Customer
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $shoppingBasket;


    /**
     * Add shoppingBasket
     *
     * @param \ShopBundle\Entity\ShoppingBasket $shoppingBasket
     *
     * @return Customer
     */
    public function addShoppingBasket(\ShopBundle\Entity\ShoppingBasket $shoppingBasket)
    {
        $this->shoppingBasket[] = $shoppingBasket;

        return $this;
    }

    /**
     * Remove shoppingBasket
     *
     * @param \ShopBundle\Entity\ShoppingBasket $shoppingBasket
     */
    public function removeShoppingBasket(\ShopBundle\Entity\ShoppingBasket $shoppingBasket)
    {
        $this->shoppingBasket->removeElement($shoppingBasket);
    }

    /**
     * Get shoppingBasket
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getShoppingBasket()
    {
        return $this->shoppingBasket;
    }
}
