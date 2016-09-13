<?php

namespace Home\HomeBundle\Services;

use Doctrine\ORM\EntityManager;

/**
 * Class DataService
 *
 * @package Home\HomeBundle\Services
 */
class DataManagementService
{
	/**
	 * Datamanagement constructor.
	 *
	 * @param $entityManager
	 */
	public function __construct(EntityManager $entityManager)
	{
		$this->em = $entityManager;
	}


	/**
	 * Return all subcategories with categories
	 * @return array Subcategories with category inside
	 */
	public function getSubcategoriesAndCategories()
	{
		return $this->em->getRepository('AdminBundle:Subcategory')->getSubcategoriesWithCategories();
	}

	/**
	 * Return all categories
	 * @return \Administration\AdminBundle\Entity\Category[]|array
	 */
	public function getCategories()
	{
		return $this->em->getRepository('AdminBundle:Category')->findAll();
	}

	/**
	 * Return all adverts order to desc date
	 * @return \Administration\AdminBundle\Entity\Category[]|array
	 */
	public function getAdverts()
	{
		return $this->em->getRepository('AdvertisementBundle:Advertisement')->getAdvertsWithFile();
	}

	/**
	 * Return advert in terms of id
	 *
	 * @param $id
	 * @return array
	 */
	public function getAdvertById($id)
	{
		return $this->em->getRepository('AdvertisementBundle:Advertisement')->getAdvertWithFile($id);
	}

	/**
	 * @param $id
	 * @return \Administration\AdminBundle\Entity\Subcategory
	 */
	public function getSubcategoriesById($id)
	{
		return $this->em->getRepository('AdminBundle:Subcategory')->findOneBy(['id' => $id]);
	}

	/**
	 * Return Sub categories By IdCategory
	 *
	 * @param $id
	 * @return \Administration\AdminBundle\Entity\Category[]|array
	 */
	public function getSubcategoriesByIdCategory($id)
	{
		return $this->em->getRepository('AdminBundle:Subcategory')->findBy(['Category' => $id]);
	}


}
