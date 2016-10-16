<section class="Journal">
  <div class="container">

    <div class="row">
      <div class="col-md-offset-4 col-md-8">
        <h2 class="Section-title">Photo Journal</h2>
      </div>
    </div>

    <div class="Bucket-row row">
      <?php
      $args = array(
        'category_name' => 'journal',
        'posts_per_page' => '3'
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) : ?>
        <?php while ($the_query->have_posts()) :
          $the_query->the_post();
          $permalink = get_post_meta(get_the_ID(), 'permalink', true);
          $img_name = get_post_meta(get_the_ID(), 'img_name', true);
          $focalpoint = get_post_meta(get_the_ID(), 'focalpoint', true);
          $prefix = "http://adem.imgix.net/";
          $suffix = "?fit=crop&crop=focalpoint&q=60&";
          $name = $prefix . $img_name . $suffix . $focalpoint;
          ?>
          <div class="col-xs-12 col-md-4">
            <article class="Bucket">
              <picture class="Bucket-cover">
                <source media="(min-width: 992px)" srcset="<?php echo $name; ?>&w=500&h=400">
                <source media="(min-width: 768px)" srcset="<?php echo $name; ?>&w=600&h=200">
                <img srcset="<?php echo $name; ?>&w=400&h=200" alt="<?php the_title() ?>">
              </picture>
              <div class="Bucket-info">
                <h3 class="Bucket-info-title"><?php the_title() ?></h3>
                <time class="Bucket-info-date"><?php the_time('F j, Y'); ?></time>
              </div>
              <a class="Bucket-link" href="<?php echo $permalink; ?>" target="_blank"></a>
            </article>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        Oops, there are no posts.
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>

    <!--<div class="row">
      <div class="col-xs-12 col-md-offset-4 col-md-8">
        <a class="Section-more btn" href="http://vsco.co/adem/journal/" target="_blank">More...</a>
      </div>
    </div>-->

  </div>
</section>
<!-- /.Journal -->