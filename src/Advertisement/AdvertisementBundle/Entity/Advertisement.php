<?php

namespace Advertisement\AdvertisementBundle\Entity;

use Administration\AdminBundle\Entity\Subcategory;
use Doctrine\ORM\Mapping as ORM;


/**
 * Advertisement
 *
 * @ORM\Table("Advertisement")
 * @ORM\Entity(repositoryClass="Advertisement\AdvertisementBundle\Repository\AdvertisementRepository")
 */
class Advertisement
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
	 * @var integer
	 *
	 * @ORM\ManyToOne(targetEntity="Advertisement\AdvertisementBundle\Entity\ObjectToSell", cascade={"persist"})
	 */
	private $ObjectToSell;

	/**
	 * @ORM\OneToOne(targetEntity="Advertisement\AdvertisementBundle\Entity\File", cascade={"persist","remove"})
	 * @ORM\JoinColumn(nullable=false)
	 */
	private $mediaFirst;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="title", type="string", length=75)
	 */
	private $title;

	/**
	 * @var string
	 *
	 * @ORM\Column(name="description", type="text")
	 */
	private $description;

	/**
	 * @var float
	 *
	 * @ORM\Column(name="price", type="float")
	 */
	private $price;

	/**
	 * @var \DateTime
	 *
	 * @ORM\Column(name="date_add", type="date")
	 */
	private $dateAdd;

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
	 * Set title
	 *
	 * @param string $title
	 *
	 * @return Advertisement
	 */
	public function setTitle($title)
	{
		$this->title = $title;

		return $this;
	}

	/**
	 * Get title
	 *
	 * @return string
	 */
	public function getTitle()
	{
		return $this->title;
	}

	/**
	 * Set description
	 *
	 * @param string $description
	 *
	 * @return Advertisement
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
	 * @param float $price
	 *
	 * @return Advertisement
	 */
	public function setPrice($price)
	{
		$this->price = $price;

		return $this;
	}

	/**
	 * Get price
	 *
	 * @return float
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * Set dateAdd
	 *
	 * @param \DateTime $dateAdd
	 *
	 * @return Advertisement
	 */
	public function setDateAdd($dateAdd)
	{
		$this->dateAdd = $dateAdd;

		return $this;
	}

	/**
	 * Get dateAdd
	 *
	 * @return \DateTime
	 */
	public function getDateAdd()
	{
		return $this->dateAdd;
	}

	/**
	 * Set objectToSell
	 *
	 * @param ObjectToSell $objectToSell
	 *
	 * @return Advertisement
	 */
	public function setObjectToSell($objectToSell = null)
	{
		$this->ObjectToSell = $objectToSell;

		return $this;
	}

	/**
	 * Get objectToSell
	 *
	 * @return ObjectToSell
	 */
	public function getObjectToSell()
	{
		return $this->ObjectToSell;
	}



    /**
     * Set mediaFirst
     *
     * @param \Advertisement\AdvertisementBundle\Entity\File $mediaFirst
     *
     * @return Advertisement
     */
    public function setMediaFirst(\Advertisement\AdvertisementBundle\Entity\File $mediaFirst)
    {
        $this->mediaFirst = $mediaFirst;

        return $this;
    }

    /**
     * Get mediaFirst
     *
     * @return \Advertisement\AdvertisementBundle\Entity\File
     */
    public function getMediaFirst()
    {
        return $this->mediaFirst;
    }
}
