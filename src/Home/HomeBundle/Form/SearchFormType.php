<?php
/**
 * Created by PhpStorm.
 * User: leflo
 * Date: 13/09/2016
 * Time: 23:37
 */

namespace Home\HomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchFormType extends AbstractType
{

	/**
	 * @param FormBuilderInterface $builder
	 * @param array $options
	 */
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
		$builder->add('search','text', array('label' => false,
								    'attr' => array('class' => 'wi-search-input', 'placeholder' => 'Rechercher')));
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return 'HomeBundle_search';
	}
}