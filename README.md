# GoogleMapsBundle

Symfony bundle for use google maps in your form

# Installation
This bundle is compatible with Symfony >= 2.8
```
composer require cyberjaw/google-maps-bundle
```

# Getting Started

First register the bundle in your ``AppKernel.php``

```php
// app/AppKernel.php
  
$bundles = array(
    //...
    new CyberJaw\GoogleMapsBundle\GoogleMapsBundle()
    );
```

To enable template and set your Google Maps API key, enter this to your ``config.yml``.

```php
# app/config/config.yml
## Twig Configuration
 
twig:
    form_themes:
        - 'GoogleMapsBundle:Form:google_maps_layout.html.twig'
        
google_maps:
    api_key: 'YOUR_API_KEY'
```

If your assets is not installed after installation run
```
//Symfony 2.8
    php app/console assets:install
    
//Symfony 3.*
    php bin/console assets:install
```
# Usage
This bundle contains a new FormType called GoogleMapType which can be used in your forms like so:

**Build form:**
```php
use CyberJaw\GoogleMapsBundle\Form\Type\GoogleMapsType;
    
$builder->add('googleMaps', GoogleMapsType::class);
```

**Entity property**

```php
class GoogleMaps
{
    protected $latitude;
    
    protected $longitude;
    
    protected $city;
    
    protected $address;
    
    //Getters and Setters
}
```

# Options

```php
array(
    'type' => TextType::class,      //Form type
    'lat_type' => TextType::class,  //Latitude form type
    'lng_type' => TextType::class,  //Longitude form type
    'options' => [],                //Form options
    'lat_options' => [],            //Latitude field options
    'lng_options' => [],            //Longitude field options
    'city_options' => [],           //City field options
    'address_options' => [],        //Address field options
    'lat_name' => 'latitude',       //Latitude field name
    'lng_name' => 'longitude',      //Longitude field name
    'city_name' => 'city',          //City field name
    'address_name' => 'address',    //Address field name
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
)
```

# Features

* Getting only map
* Make custom map template
* Integrate another google maps api functions
* Added constraints

# Authors

* **Alexander Dimitrov** - *Initial work* - [cyberJaw](https://github.com/cyberJaw)