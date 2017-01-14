<?php

namespace AppBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @ORM\OneToOne(targetEntity="Purchase", inversedBy="user")
     */
    private $purchase;

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
     * Set address
     *
     * @param string $address
     *
     * @return User
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set purchase
     *
     * @param \AppBundle\Entity\Purchase $purchase
     *
     * @return User
     */
    public function setPurchase(\AppBundle\Entity\Purchase $purchase = null)
    {
        $this->purchase = $purchase;

        return $this;
    }

    /**
     * Get purchase
     *
     * @return \AppBundle\Entity\Purchase
     */
    public function getPurchase()
    {
        return $this->purchase;
    }
}
