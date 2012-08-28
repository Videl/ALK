<?php
// src/ALK/Bundle/SiteBundle/Form/Type/CkeditorType.php

/**
 * Type de champ de formulaire pour CKEditor.
 *
 * @author Leglopin
 */
namespace ALK\Bundle\SiteBundle\Form\Type;

use Symfony\Component\Form\AbstractType;

class CkeditorType extends AbstractType
{
    public function getParent(array $options)
    {
        return 'textarea';
    }

    public function getName()
    {
        return 'ckeditor';
    }

    public function getDefaultOptions(array $options)
    {
        $defaultOptions = parent::getDefaultOptions($options);
        $defaultOptions['attr']['class'] = 'ckeditor';

        return $defaultOptions;
    }
}