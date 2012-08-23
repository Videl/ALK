<?php
// src/Sdz/BlogBundle/Form/TagType.php

namespace ALK\Bundle\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class TagType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('name', 'text');  // Notez ici que l'on n'a pas précisé le type de champ : c'est parce que
        // le composant Form sait le reconnaître… depuis nos annotations Doctrine !
    }

    public function getName()
    {
        return 'alk_sitebundle_tagtype';  // N'oubliez pas de changer le nom du formulaire.
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => ' ALK\Bundle\SiteBundle\Entity\Tag', // Ni de modifier la classe ici.
        );
    }
}