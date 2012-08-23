<?php
// src/Sdz/BlogBundle/Form/ArticleType.php

namespace ALK\Bundle\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use ALK\Bundle\SiteBundle\Form\TagType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('date',    'date')
            ->add('titre',   'text')
            ->add('contenu', 'textarea')
            ->add('image', 'text')
            ->add('tags',    'collection', array('type'      => new TagType,
                                                 'prototype' => true,
                                                 'allow_add' => true))
            ;
    }

    public function getName()
    {
        return 'alk_sitebundle_articletype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'ALK\Bundle\SiteBundle\Entity\Article',
        );
    }
}