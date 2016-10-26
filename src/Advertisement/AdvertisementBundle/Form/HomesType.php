<?php

namespace Advertisement\AdvertisementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HomesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('area', null, ['label' => 'crud.home.label.area', 'required' => true])
            ->add('size', null, ['label' => 'crud.home.label.size', 'required' => true])
            ->add('kind', null, ['label' => 'crud.home.label.type', 'required' => true])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Advertisement\AdvertisementBundle\Entity\Homes'
        ));
    }
}
