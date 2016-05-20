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
              ->add('year', null, ['label' => 'crud.car.label.Year', 'required' => true])
              ->add('model', null, ['label' => 'crud.car.label.Model', 'required' => true])
              ->add('engineSize', null, ['label' => 'crud.car.label.Engine size', 'required' => true])
              ->add('colour', null, ['label' => 'crud.car.label.Colour', 'required' => true])
              ->add('mileage', null, ['label' => 'crud.car.label.Mileage', 'required' => true])
              ->add('Fuel', null, ['label' => 'crud.car.label.Fuel', 'required' => true])
              ->add('Transmission', null, ['label' => 'crud.car.label.Transmission', 'required' => true])
              ->add('Body', null, ['label' => 'crud.car.label.Body', 'required' => true])
              ->add('Make', null, ['label' => 'crud.car.label.Make', 'required' => true])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     * @throws \Symfony\Component\OptionsResolver\Exception\AccessException
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Advertisement\AdvertisementBundle\Entity\Car'
        ));
    }
}
