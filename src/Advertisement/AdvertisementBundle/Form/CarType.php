<?php

namespace Advertisement\AdvertisementBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
              ->add('Advertisement', AdvertisementType::class, ['label' => 'crud.Advertisement.table'])
              ->add('year', null, ['label' => 'crud.car.label.Year'])
              ->add('model', null, ['label' => 'crud.car.label.Model'])
              ->add('engineSize', null, ['label' => 'crud.car.label.Engine size'])
              ->add('colour', null, ['label' => 'crud.car.label.Colour'])
              ->add('mileage', null, ['label' => 'crud.car.label.Mileage'])
              ->add('Fuel', null, ['label' => 'crud.car.label.Fuel'])
              ->add('Transmission', null, ['label' => 'crud.car.label.Transmission'])
              ->add('Body', null, ['label' => 'crud.car.label.Body'])
              ->add('Make', null, ['label' => 'crud.car.label.Make'])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Advertisement\AdvertisementBundle\Entity\Car'
        ));
    }
}
