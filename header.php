<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <link rel="dns-prefetch" href="//www.google-analytics.com">
  <link rel="dns-prefetch" href="//adem.imgix.net">

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui, shrink-to-fit=no">

  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php if (is_singular() && pings_open(get_queried_object())) : ?>
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <?php endif; ?>
  <?php wp_head(); ?>

  <meta http-equiv="cleartype" content="on">
  <meta name="google" value="notranslate">
  <meta name="format-detection" content="telephone=no">
  <meta name="theme-color" content="#2D184B">
  <meta name="msapplication-navbutton-color" content="#2D184B">

  <script>
    function loadJS(u) {
      var r = document.getElementsByTagName("script")[0], s = document.createElement("script");
      s.src = u;
      r.parentNode.insertBefore(s, r);
    }
    if (!window.HTMLPictureElement || !('sizes' in document.createElement('img'))) {
      document.createElement('picture');
      loadJS("<?php echo get_template_directory_uri(); ?>/js/lib/respimage.js");
    }
  </script>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css"/>
  <script src="<?php echo get_template_directory_uri(); ?>/js/lib/lazysizes.js" async></script>


  <meta property="og:type" content="website">
  <meta property="og:url" content="http://ademilter.com/">
  <meta property="og:title" content="Adem ilter">
  <meta property="og:description" content="Hi. I’m ADEM, Frontend Developer who lives in Istanbul.">
  <meta property="og:image"
        content="http://adem.imgix.net/site-cover-photo.jpg?w=1200&h=630&fit=crop&crop=focalpoint&fp-x=0.5&fp-y=0.3&auto=format&q=60">
  <meta name="twitter:site" content="@ademilter">
  <meta name="twitter:creator" content="@ademilter">
  <meta name="twitter:domain" content="http://ademilter.com/">
  <meta name="twitter:title" content="Adem ilter">
  <meta name="twitter:description" content="Hi. I’m ADEM, Frontend Developer who lives in Istanbul.">
  <meta name="twitter:image:src"
        content="http://adem.imgix.net/site-cover-photo.jpg?w=1000&h=700&fit=crop&crop=focalpoint&fp-x=0.5&fp-y=0.3&q=60">
  <link href="https://plus.google.com/+AdemIlter" rel="publisher">

</head>

<body <?php body_class(); ?>>

<header class="Header" role="banner">
  <div class="container">
    <a class="Logo" href="/">
      <svg xmlns="http://www.w3.org/2000/svg" width="142" height="35" viewBox="0 0 142 35">
        <g fill="#fff">
          <path class="logo-path"
                d="M17.0638746,1.76823687 C17.5808824,0.791666611 18.4034596,0.806919128 18.8900584,1.78011683 L34.1099416,32.2198832 C34.6015073,33.2030145 34.0996545,34 32.9925388,34 L2.00746124,34 C0.89877101,34 0.418441605,33.2096103 0.9361254,32.2317631 L17.0638746,1.76823687 Z"/>
          <circle class="logo-path" cx="51.5" cy="17.5" r="17.5"/>
          <rect class="logo-path" width="30" height="33" x="73" y="1" rx="2"/>
          <path class="logo-path"
                d="M122.370873,1.17659159 C123.270615,0.526777998 124.727915,0.525716424 125.629127,1.17659159 L140.370873,11.8234084 C141.270615,12.473222 141.716922,13.8492342 141.366451,14.900648 L135.633549,32.099352 C135.28365,33.1490509 134.110326,34 133.008845,34 L114.991155,34 C113.89147,34 112.716922,33.1507658 112.366451,32.099352 L106.633549,14.900648 C106.28365,13.8509491 106.727915,12.4742836 107.629127,11.8234084 L122.370873,1.17659159 Z"/>
        </g>
      </svg>
    </a>
  </div>
</header>
<!-- /.Header -->