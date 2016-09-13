<?php

namespace Advertisement\AdvertisementBundle\Entity;

use Advertisement\AdvertisementBundle\Entity\Advertisement;
use Doctrine\ORM\Mapping as ORM;


/**
 * ObjectToSell
 *
 * @ORM\Table(name="object_to_sell")
 * @ORM\Entity(repositoryClass="Advertisement\AdvertisementBundle\Repository\ObjectToSellRepository")
 * @ORM\InheritanceType(value="JOINED")
 * @ORM\DiscriminatorColumn(name="subcategory", type="integer")
 * @ORM\DiscriminatorMap({"1" = "Car"})
 */
abstract class ObjectToSell
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
	 * Get id
	 *
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

}
