<?php

namespace Administration\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HomesType
 *
 * @ORM\Table(name="homes_type")
 * @ORM\Entity(repositoryClass="Administration\AdminBundle\Entity\Repository\HomesKindRepository")
 */
class HomesKind
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
     * @ORM\Column(name="Kind", type="string", length=255)
     */
    private $kind;


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
     * @param string $kind
     *
     * @return HomesKind
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getKind()
    {
        return $this->kind;
    }

	/**
	 * @return mixed
	 */
	public function __toString()
	{
		return $this->getKind();
	}
}

