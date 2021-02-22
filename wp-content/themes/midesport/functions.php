<?php



function theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
};

function theme_register_assets()
{
    wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', [], false, true);
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], false, true);
    wp_deregister_script('jquery');
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
}

function theme_title($title)
{
    return 'MID-ESPORT';
}

function theme_title_separator()
{
    return '|';
}

function mid_esport_init()
{
    register_post_type('evenement', [
        'label' => 'Evenement',
        'public' => true,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-tickets-alt',
        'support' => ['title', 'editor', 'thumbnail', 'author', 'excerpt'],
        'has_archive' => true,

    ]);
}

function mid_esport_menu_class ($classes) {
    $classes[] = 'nav-item';
    return $classes;
}

function mid_esport_menu_link_class ($attrs) {
    $attrs[] = 'nav-link';
    return $attrs;
}


add_action('init', 'mid_esport_init');
add_action('after_setup_theme', 'theme_support');
add_action('wp_enqueue_scripts', 'theme_register_assets');
add_filter('wp_title', 'theme_title');
add_filter('document_title_separator', 'theme_title_separator');
add_filter('nav_menu_css_class', 'mid_esport_menu_class');
add_filter('nav_menu_link_attributes', 'mid_esport_menu_link_class');
