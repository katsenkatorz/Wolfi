<?php

namespace Administration\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subcategory
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Administration\AdminBundle\Entity\Repository\SubcategoryRepository")
 */
class Subcategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Administration\AdminBundle\Entity\Category", cascade={"persist"})
     */
    private $Category;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;


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
     * @return Subcategory
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
     * Set Category
     *
     * @param \Administration\AdminBundle\Entity\Category $categorie
     * @return Subcategory
     */
    public function setCategory(\Administration\AdminBundle\Entity\Category $Category)
    {
        $this->Category = $Category;

        return $this;
    }

    /**
     * Get Category
     *
     * @return \Administration\AdminBundle\Entity\Category
     */
    public function getCategory()
    {
        return $this->Category;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
