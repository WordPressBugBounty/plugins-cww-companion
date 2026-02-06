<?php 
/**
* 
* Configuration file for Aurex theme
*
*
*/

$url        = 'https://codeworkweb.com/demo-importer/aurex-demos/';



    $data = array(

    'demo-one' => array(
        'categories'        => array( 'Portfolio' ),
        'preview_url'       => 'https://demo.codeworkweb.com/aurex/demo-one/',
        'image_path'        => $url.'demo-one/screenshot.png',
        'xml_file'          => $url.'demo-one/content.xml',
        'theme_settings'    => $url.'demo-one/customizer.dat',
        'widgets_file'      => $url.'demo-one/widgets.wie',
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
               
            ),

            'premium' => array(
                
                array(
                    'slug'    => 'bizz-elements',
                    'init'    => 'bizz-elements/bizz-elements.php',
                    'name'    => 'Bizz Elements - Elementor Addons',
                ),
            ),


        ),
    ),
   

    

    

  );