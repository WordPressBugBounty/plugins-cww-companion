<?php 
/**
* 
* Configuration file for Portfolio One theme
*
*
*/

$url        = 'https://codeworkweb.com/demo-importer/portfolio-one-demos/';



    $data = array(

    'demo-one' => array(
        'categories'        => array( 'Portfolio' ),
        'preview_url'       => 'https://demo.codeworkweb.com/portfolio-one/lite/',
        'image_path'        => $url.'lite/screenshot.png',
        'xml_file'          => $url.'lite/content.xml',
        'theme_settings'    => $url.'lite/customizer.dat',
        'widgets_file'      => $url.'lite/widgets.wie',
        'home_title'        => 'Home',
        'blog_title'        => 'Blogs',
        'posts_to_show'     => '10',
        'is_shop'           => false,
        'menus'             => array(
            'menu-1'   => 'Primary Menu'
        ),
        'required_plugins'  => array(
            'free'          => array(
               
                array(
                    'slug'    => 'elementor',
                    'init'    => 'elementor/elementor.php',
                    'name'    => 'Elementor',
                ),
                array(
                    'slug'    => 'contact-form-7',
                    'init'    => 'contact-form-7/wp-contact-form-7.php',
                    'name'    => 'Contact Form 7',
                ), 
                array(
                    'slug'    => 'sticky-floating-forms-lite',
                    'init'    => 'sticky-floating-forms-lite/sticky-floating-forms-lite.php',
                    'name'    => 'Sticky Floating Forms Lite',
                ), 
               
            ),


        ),
    ),
   

    

    

  );