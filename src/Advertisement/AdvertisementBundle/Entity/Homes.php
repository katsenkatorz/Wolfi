<?php

namespace Advertisement\AdvertisementBundle\Entity;

use Administration\AdminBundle\Entity\HomesKind;
use Administration\AdminBundle\Entity\HomesSize;
use Doctrine\ORM\Mapping as ORM;


/**
 * Homes
 *
 * @ORM\Table(name="homes")
 * @ORM\Entity(repositoryClass="Advertisement\AdvertisementBundle\Repository\HomesRepository")
 */
class Homes extends ObjectToSell
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
	 *
	 * @ORM\ManyToOne(targetEntity="Administration\AdminBundle\Entity\HomesSize", cascade={"persist"})
	 */
	private $size;

	/**
	 *
	 * @ORM\ManyToOne(targetEntity="Administration\AdminBundle\Entity\HomesKind", cascade={"persist"})
	 */
	private $kind;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="area", type="decimal", precision=10, scale=0)
	 */
	private $area;

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
	 * Set area
	 *
	 * @param string $area
	 *
	 * @return Homes
	 */
	public function setArea($area)
	{
		$this->area = $area;

		return $this;
	}

	/**
	 * Get area
	 *
	 * @return string
	 */
	public function getArea()
	{
		return $this->area;
	}

    /**
     * Set size
     *
     * @param HomesSize $size
     *
     * @return Homes
     */
    public function setSize(HomesSize $size = null)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return HomesSize
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set kind
     *
     * @param HomesKind $kind
     *
     * @return Homes
     */
    public function setKind(HomesKind $kind = null)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind
     *
     * @return HomesKind
     */
    public function getKind()
    {
        return $this->kind;
    }
}
