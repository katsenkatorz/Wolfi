<?php

namespace Home\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * car
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Home\HomeBundle\Entity\Repository\CarRepository")
 */
class Car
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
     * @ORM\OneToOne(targetEntity="Home\HomeBundle\Entity\Advertisement", cascade={"persist"})
     */
    private $Advertisement;

    /**
     *
     * @ORM\OneToOne(targetEntity="Administration\AdminBundle\Entity\Fuel", cascade={"persist"})
     */
    private $Fuel;

    /**
     *
     * @ORM\OneToOne(targetEntity="Administration\AdminBundle\Entity\Transmission", cascade={"persist"})
     */
   private $Transmission;

    /**
     *
     * @ORM\OneToOne(targetEntity="Administration\AdminBundle\Entity\Body", cascade={"persist"})
     */
   private $Body;

    /**
     *
     * @ORM\OneToOne(targetEntity="Administration\AdminBundle\Entity\Make", cascade={"persist"})
     */
   private $Make;

    /**
     * @var string
     *
     * @ORM\Column(name="year", type="string", length=4)
     */
    private $year;

    /**
     * @var string
     *
     * @ORM\Column(name="model", type="string", length=50)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="engine_size", type="string", length=50)
     */
    private $engineSize;

    /**
     * @var string
     *
     * @ORM\Column(name="colour", type="string", length=45)
     */
    private $colour;

    /**
     * @var integer
     *
     * @ORM\Column(name="mileage", type="integer")
     */
    private $mileage;


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
     * Set year
     *
     * @param string $year
     *
     * @return car
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return car
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set engineSize
     *
     * @param string $engineSize
     *
     * @return car
     */
    public function setEngineSize($engineSize)
    {
        $this->engineSize = $engineSize;

        return $this;
    }

    /**
     * Get engineSize
     *
     * @return string
     */
    public function getEngineSize()
    {
        return $this->engineSize;
    }

    /**
     * Set colour
     *
     * @param string $colour
     *
     * @return car
     */
    public function setColour($colour)
    {
        $this->colour = $colour;

        return $this;
    }

    /**
     * Get colour
     *
     * @return string
     */
    public function getColour()
    {
        return $this->colour;
    }

    /**
     * Set mileage
     *
     * @param integer $mileage
     *
     * @return car
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * Get mileage
     *
     * @return integer
     */
    public function getMileage()
    {
        return $this->mileage;
    }
}

