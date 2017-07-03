<?php
/**
 * Created by PhpStorm.
 * User: omfg
 * Date: 6/30/2017
 * Time: 10:48 PM
 */

namespace CyberJaw\GoogleMapsBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GoogleMapsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        //Default fields
        $builder->add('lat', $options['lat_type'], array_merge($options['lat_options'], $options['options'], [
            'attr' => ['data-name' => 'lat']
        ]));
        $builder->add('lng', $options['lng_type'], array_merge($options['lng_options'], $options['options'], [
            'attr' => ['data-name' => 'lng']
        ]));

        //Optional city field
        if (!empty($options['city'])) {
            $builder->add('city', $options['type'], array_merge($options['city_options'], $options['options'], [
                'attr' => ['data-name' => 'city']
            ]));
        }

        //Optional address field
        if (!empty($options['address'])) {
            $builder->add('address', $options['type'], array_merge($options['address_options'], $options['options'], [
                'attr' => ['data-name' => 'address']
            ]));
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'type' => TextType::class,      //Form type
            'lat_type' => TextType::class,  //Latitude form type
            'lng_type' => TextType::class,  //Longitude form type
            'options' => [],                //Form options
            'lat_options' => [],            //Latitude field options
            'lng_options' => [],            //Longitude field options
            'city_options' => [],           //City field options
            'address_options' => [],        //Address field options
            'map_width' => '100%',          //Map box width
            'map_height' => '400px',        //Map box height
            'default_lat' => '42.69',       //Default latitude start
            'default_lng' => '23.32',       //Default longitude start
            'city' => true,                 //City field status
            'address' => true,              //Address field status
            'jquery' => true,               //Enable/Disable jQuery
            'map_template' => 'styled',      //Enter template name (Options: false = default, 'night' = Night template, 'styled' = Styled map template)
            'map_type' => 'terrain',        //Set map type (Options: 'roadmap' and 'terrain')
            'input_placeholder' => 'Enter location', //Set placeholder to search location input
        ]);
    }

    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        parent::finishView($view, $form, $options);

        $view->vars['map_width'] = $options['map_width'];
        $view->vars['map_height'] = $options['map_height'];
        $view->vars['default_lat'] = $options['default_lat'];
        $view->vars['default_lng'] = $options['default_lng'];
        $view->vars['jquery'] = $options['jquery'];
        $view->vars['map_template'] = $options['map_template'];
        $view->vars['map_type'] = $options['map_type'];
        $view->vars['input_placeholder'] = $options['input_placeholder'];
        $view->vars['city'] = $options['city'];
        $view->vars['address'] = $options['address'];
    }

    public function getParent()
    {
        return FormType::class;
    }

    public function getBlockPrefix()
    {
        return 'google_maps';
    }

    public function getName()
    {
        return $this->getBlockPrefix();
    }

}