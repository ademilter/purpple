<?php

function starter_scripts()
{
//  wp_deregister_script('jquery');
//  wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js", false, "3.1.1", true);
//  wp_enqueue_script('jquery');
//  wp_enqueue_script('main', get_template_directory_uri() . '/script.js', array('jquery'), false, true);
  wp_enqueue_script('main', get_template_directory_uri() . '/script.js', false, false, true);
}

add_action('wp_enqueue_scripts', 'starter_scripts');


/**
 * Sets up theme defaults and registers support for various WordPress features.
 */

function twentysixteen_setup()
{
  load_theme_textdomain('purppple');
  add_theme_support('automatic-feed-links');
  add_theme_support('title-tag');
  register_nav_menus(array(
    'social-link' => 'Social Links Menu',
  ));
}

add_action('after_setup_theme', 'twentysixteen_setup');


// DISABLE WP-EMBOD //////////////////////////////////

function my_deregister_scripts()
{
  wp_deregister_script('wp-embed');
}

add_action('wp_footer', 'my_deregister_scripts');

// DISABLE WP-EMOJI //////////////////////////////////

//function disable_emojicons_tinymce($plugins)
//{
//  if (is_array($plugins)) {
//    return array_diff($plugins, array('wpemoji'));
//  } else {
//    return array();
//  }
//}

//function disable_wp_emojicons()
//{
//   all actions related to emojis
//  remove_action('admin_print_styles', 'print_emoji_styles');
//  remove_action('wp_head', 'print_emoji_detection_script', 7);
//  remove_action('admin_print_scripts', 'print_emoji_detection_script');
//  remove_action('wp_print_styles', 'print_emoji_styles');
//  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
//  remove_filter('the_content_feed', 'wp_staticize_emoji');
//  remove_filter('comment_text_rss', 'wp_staticize_emoji');

// filter to remove TinyMCE emojis
//  add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
//}
//
//add_action('init', 'disable_wp_emojicons');
//add_filter('emoji_svg_url', '__return_false');

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */

function twentysixteen_body_classes($classes)
{
  if (!is_singular()) {
    $classes[] = 'hfeed';
  }
  return $classes;
}

//add_filter('body_class', 'twentysixteen_body_classes');


/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 */
function twentysixteen_javascript_detection()
{
  echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action('wp_head', 'twentysixteen_javascript_detection', 0);