<?php

namespace Advertisement\AdvertisementBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvertisementCarType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',null, ['label' => 'crud.Advertisement.label.Title'])
            ->add('description',null, ['label' => 'crud.Advertisement.label.Description'])
            ->add('price',null, ['label' => 'crud.Advertisement.label.Price'])
            ->add('ObjectToSell', CarType::class)
            ->add('mediaFirst', FileType::class)
            ->add('mediaSecond', FileType::class)
            ->add('mediaThird', FileType::class)

        ;
    }


    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array('data_class' => 'Advertisement\AdvertisementBundle\Entity\Advertisement',));
    }
}
