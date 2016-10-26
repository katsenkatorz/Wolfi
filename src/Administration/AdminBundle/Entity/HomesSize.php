<?php

namespace Administration\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HomesSize
 *
 * @ORM\Table(name="homes_size")
 * @ORM\Entity(repositoryClass="Administration\AdminBundle\Entity\Repository\HomesSizeRepository")
 */
class HomesSize
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
     * @ORM\Column(name="Type", type="string", length=255)
     */
    private $type;


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
     * Set type
     *
     * @param string $type
     *
     * @return HomesSize
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

