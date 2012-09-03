<?php
// src/Sdz/BlogBundle/Form/ArticleType.php

namespace ALK\Bundle\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('date',    'date', array(
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy'
                ))
            ->add('titre',   'text')
            ->add('contenu', 'textarea')
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