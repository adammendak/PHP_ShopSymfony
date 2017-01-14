<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, unique=true)
     */
    private $photo;

    /**
     * @ORM\ManyToMany(targetEntity="Purchase", inversedBy="products")
     * @ORM\JoinTable(name="product_groups")
     */
    private $purchase_id;

    public function __construct()
    {
        $this->purchase_id = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Product
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
     * Set description
     *
     * @param string $description
     * @return Product
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
     * Set price
     *
     * @param string $price
     * @return Product
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set photo
     *
     * @param string $photo
     * @return Product
     */
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get photo
     *
     * @return string 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Add purchase_id
     *
     * @param \AppBundle\Entity\Purchase $purchaseId
     * @return Product
     */
    public function addPurchaseId(\AppBundle\Entity\Purchase $purchaseId)
    {
        $this->purchase_id[] = $purchaseId;

        return $this;
    }

    /**
     * Remove purchase_id
     *
     * @param \AppBundle\Entity\Purchase $purchaseId
     */
    public function removePurchaseId(\AppBundle\Entity\Purchase $purchaseId)
    {
        $this->purchase_id->removeElement($purchaseId);
    }

    /**
     * Get purchase_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPurchaseId()
    {
        return $this->purchase_id;
    }
}
