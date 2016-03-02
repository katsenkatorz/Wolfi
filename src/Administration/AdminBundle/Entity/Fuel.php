<?php

namespace Administration\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fuel
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Administration\AdminBundle\Entity\Repository\FuelRepository")
 */
class Fuel
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=45)
     */
    private $type;


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
     * Set type
     *
     * @param string $type
     *
     * @return Fuel
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

	/**
       * @return mixed
       */
    public function __toString()
    {
        return $this->getType();
    }
}

