<?php

namespace Administration\AdminBundle\Entity;

use Administration\AdminBundle\Entity\Category;
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
     * @var string
     *
     * @ORM\Column(name="uniquename", type="string", length=50)
     */
    private $uniquename;

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
     * @param Category $Category
     * @return Subcategory
     * @internal param Category $categorie
     */
    public function setCategory(Category $Category)
    {
        $this->Category = $Category;

        return $this;
    }

    /**
     * Get Category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->Category;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Set uniquename
     *
     * @param string $uniquename
     *
     * @return Subcategory
     */
    public function setUniquename($uniquename)
    {
        $this->uniquename = $uniquename;

        return $this;
    }

    /**
     * Get uniquename
     *
     * @return string
     */
    public function getUniquename()
    {
        return $this->uniquename;
    }
}
