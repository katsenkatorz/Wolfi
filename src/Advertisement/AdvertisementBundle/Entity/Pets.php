<?php

namespace Advertisement\AdvertisementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pets
 *
 * @ORM\Table(name="pets")
 * @ORM\Entity(repositoryClass="Advertisement\AdvertisementBundle\Repository\PetsRepository")
 */
class Pets extends ObjectToSell
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
     * @ORM\Column(name="old", type="string")
     */
    private $old;


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
     * Set old
     *
     * @param string $old
     *
     * @return Pets
     */
    public function setOld($old)
    {
        $this->old = $old;

        return $this;
    }

    /**
     * Get old
     *
     * @return string
     */
    public function getOld()
    {
        return $this->old;
    }
}
