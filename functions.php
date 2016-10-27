<?php


// EMOJI_URL ////////////////////////////

add_filter('emoji_url', function () {
  return get_template_directory_uri() . '/img/emoji/png/';
});

add_filter('emoji_svg_url', function () {
  return get_template_directory_uri() . '/img/emoji/svg-min/';
});


// WP_ENQUEUE_SCRIPTS ////////////////////////////

function starter_scripts()
{
  wp_enqueue_script('main', get_template_directory_uri() . '/script.js', false, false, true);
}

add_action('wp_enqueue_scripts', 'starter_scripts');


// PURPPLE_SETUP ////////////////////////////

function purpple_setup()
{
  load_theme_textdomain('purppple');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  register_nav_menus(array(
    'social-link' => 'Social Links Menu',
  ));
}

add_action('after_setup_theme', 'purpple_setup');


// MY_DEREGISTER_SCRIPTS ////////////////////////////

function my_deregister_scripts()
{
  wp_deregister_script('wp-embed');
}

add_action('wp_footer', 'my_deregister_scripts');