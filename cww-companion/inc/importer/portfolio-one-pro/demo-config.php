<?php 
/**
* 
* Configuration file for Portfolio One Pro theme
*
*
*/

$url        = 'https://codeworkweb.com/demo-importer/portfolio-one-pro-demos/';



    $data = array(

    'demo-one' => array(
        'categories'        => array( 'Portfolio' ),
        'preview_url'       => 'https://demo.codeworkweb.com/portfolio-one/demo-one/',
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
                array(
                    'slug'    => 'sticky-floating-forms-lite',
                    'init'    => 'sticky-floating-forms-lite/sticky-floating-forms-lite.php',
                    'name'    => 'Sticky Floating Forms Lite',
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

    'demo-two' => array(
        'categories'        => array( 'Portfolio' ),
        'preview_url'       => 'https://demo.codeworkweb.com/portfolio-one/demo-two/',
        'image_path'        => $url.'demo-two/screenshot.png',
        'xml_file'          => $url.'demo-two/content.xml',
        'theme_settings'    => $url.'demo-two/customizer.dat',
        'widgets_file'      => $url.'demo-two/widgets.wie',
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

            'premium' => array(
                
                array(
                    'slug'    => 'bizz-elements',
                    'init'    => 'bizz-elements/bizz-elements.php',
                    'name'    => 'Bizz Elements - Elementor Addons',
                ),
            ),


        ),
    ),

    'demo-three' => array(
        'categories'        => array( 'Portfolio' ),
        'preview_url'       => 'https://demo.codeworkweb.com/portfolio-one/demo-three/',
        'image_path'        => $url.'demo-three/screenshot.png',
        'xml_file'          => $url.'demo-three/content.xml',
        'theme_settings'    => $url.'demo-three/customizer.dat',
        'widgets_file'      => $url.'demo-three/widgets.wie',
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