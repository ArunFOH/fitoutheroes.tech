<?php
/*
Theme Name: Fit Out Heroes
Description: Custom WordPress theme for Fit Out Heroes (FOH.TECH) - Professional fitness and wellness website.
Version: 1.0.0
Author: Fit Out Heroes Team
Text Domain: fitoutheroes
*/

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Theme setup
function fitoutheroes_setup() {
    // Add theme support for various features
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'fitoutheroes'),
        'footer' => __('Footer Menu', 'fitoutheroes'),
    ));
}
add_action('after_setup_theme', 'fitoutheroes_setup');

// Enqueue styles and scripts
function fitoutheroes_scripts() {
    wp_enqueue_style('fitoutheroes-style', get_stylesheet_uri(), array(), '1.0.0');
    wp_enqueue_script('fitoutheroes-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'fitoutheroes_scripts');

// Register widget areas
function fitoutheroes_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'fitoutheroes'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'fitoutheroes'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => __('Footer', 'fitoutheroes'),
        'id'            => 'footer-1',
        'description'   => __('Add footer widgets here.', 'fitoutheroes'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'fitoutheroes_widgets_init');