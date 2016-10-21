<?php

add_filter('emoji_url', function () {
  return get_template_directory_uri() . '/img/emoji/png/';
});

add_filter('emoji_svg_url', function () {
  return get_template_directory_uri() . '/img/emoji/svg-min/';
});


function starter_scripts()
{
  wp_enqueue_script('main', get_template_directory_uri() . '/script.js', false, false, true);
}

//add_action('wp_enqueue_scripts', 'starter_scripts');


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


function javascript_detection()
{
  echo '<script>siteUrl="' . get_template_directory_uri() . '";</script>';
  echo "\n";
  echo '<script>(function(html){html.className = html.className.replace(/\bno-js\b/,"js")})(document.documentElement);</script>';
  echo "\n";
  echo '<script>function loadJS(u) {var r = document.getElementsByTagName("script")[0], s = document.createElement("script");s.src = u;r.parentNode.insertBefore(s, r);}if (!window.HTMLPictureElement || !("sizes" in document.createElement("img"))) {document.createElement("picture");loadJS("' . get_template_directory_uri() . '/js/lib/respimage.min.js");}</script>';
  echo "\n";
  echo "\n";
  echo "\n";
  echo '<link rel="stylesheet" href="' . get_template_directory_uri() . '/fonts.css"  media="none" onload="if(media!=\'all\')media=\'all\'">';
  echo "\n";
  echo '<noscript><link rel="stylesheet" href="' . get_template_directory_uri() . '/fonts.css"></noscript>';
  echo "\n";
  echo '<style type="text/css">' . file_get_contents(get_template_directory_uri() . '/inline.css') . '</style>';
  echo "\n";
  echo "\n";
  echo "\n";
  echo '<script src="' . get_template_directory_uri() . '/js/lib/lazysizes.min.js" async></script>';
}

add_action('wp_head', 'javascript_detection', 0);


function my_deregister_scripts()
{
  wp_deregister_script('wp-embed');
}

add_action('wp_footer', 'my_deregister_scripts');


function body_classes($classes)
{
  if (!is_singular()) {
    $classes[] = 'hfeed';
  }
  return $classes;
}

//add_filter('body_class', 'body_classes');