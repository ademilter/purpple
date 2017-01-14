<footer class="Footer" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-3">
        <p>© 2016 Adem ilter</p>
      </div>
      <div class="col-xs-12 col-md-offset-1 first-xs last-md col-md-8">
        <?php if (has_nav_menu('social-link')) :
          wp_nav_menu(array(
            'menu_class' => 'Social-link',
            'theme_location' => 'social-link',
            'container' => ''
          ));
        endif; ?>
      </div>
    </div>
  </div>
</footer>


<?php wp_footer(); ?>

<script>
  (function (m, e, r, h, a, b, aa) {
    m['GoogleAnalyticsObject'] = a;
    m[a] = m[a] || function () {
        (m[a].q = m[a].q || []).push(arguments)
      }, m[a].l = 1 * new Date();
    b = e.createElement(r),
      aa = e.getElementsByTagName(r)[0];
    b.async = 1;
    b.src = h;
    aa.parentNode.insertBefore(b, aa)
  })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
  ga('create', 'UA-17768654-1', 'auto');
  ga('send', 'pageview');
</script>

</body>
</html>