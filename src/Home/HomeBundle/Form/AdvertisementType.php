<?php

namespace Home\HomeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvertisementType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, ['label' => 'crud.Advertisement.label.Title'])
            ->add('price', null, ['label' => 'crud.Advertisement.label.Price'])
            ->add('description', null, ['label' => 'crud.Advertisement.label.Description'])
            ->add('dateAdd', null, ['format' => 'dd-MM-yyyy', 'widget' => 'single_text','label' => 'crud.Advertisement.label.Date add']);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Home\HomeBundle\Entity\Advertisement'
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'home_homebundle_advertisement';
    }
}
