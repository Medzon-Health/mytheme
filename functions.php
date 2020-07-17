<?php

// includes custom css and scripts
function mytheme_script_enqueue() {
    wp_enqueue_style( 'reset', get_template_directory_uri() . '/assets/css/reset.css', array(), '1.0.0', 'all' );
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0.0', 'all' );   
    wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), '1.0.0', true ); 
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0.0', true );
    wp_enqueue_script('jquery');
}
add_action( 'wp_enqueue_scripts', 'mytheme_script_enqueue' );

//add menus into theme support
function mytheme_theme_setup() {
    add_theme_support( 'menus' );    
    register_nav_menu( 'primary', 'This is the primary header navigation' );
    register_nav_menu( 'secondary', 'This is the footer navigation' );
}
add_action( 'init', 'mytheme_theme_setup' );

// add theme support functions
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array( 'aside', 'image', 'video' ) );

// add the side bar
function mytheme_widget_setup() {
    register_sidebar( 
        array(
            'name'  => 'Sidebar',
            'id'    => 'sidebar-1',
            'class' => 'custom',
            'description' => 'Standard sidebar',
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h1 class="widget-title">',
            'after_title'   => '</h1>', 
        ) 
    );
}
add_action( 'widgets_init','mytheme_widget_setup' );

// add class name to menu list
function add_menu_list_item_class($classes, $item, $args) {
    if (property_exists($args, 'list_item_class')) {
        $classes[] = $args->list_item_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);