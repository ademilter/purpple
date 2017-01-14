<section class="Highlight">

  <div class="container">
    <div class="row">
      <div class="col-md-offset-4 col-md-8">
        <h2 class="Section-title">Highlight</h2>
      </div>
    </div>
  </div>

  <div class="container-xl">
    <ul class="Events">
      <?php
      $args = array(
        'category_name' => 'event',
        'posts_per_page' => '5'
      );
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :?>
        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
          <?php
          $tags = get_the_tags();
          $tag = '';
          if (!empty($tags)) {
            $tag = $tags[0]->name;
          } ?>
          <li class="Event <?php echo $tag ?>">
            <div class="container">
              <div class="row">
                <div class="Event-meta col-xs-12 col-md-3">
                  <h5 class="Event-meta-category"><?php echo $tag ?></h5>
                  <time class="Event-meta-date"><?php the_time('F j, Y'); ?></time>
                </div>
                <div class="Event-content col-xs-12 first-xs last-md col-md-offset-1 col-md-8">
                  <h3 class="Event-content-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                  </h3>
                  <div class="Event-content-detail">
                    <?php the_content() ?>
                  </div>
                </div>
              </div>
            </div>
          </li>
        <?php endwhile; ?>
      <?php else: ?>
        Oops, there are no posts.
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
  </div>

  <!--<div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-offset-4 col-md-8">
        <a class="Section-more btn" href="/highlight">More...</a>
      </div>
    </div>
  </div>-->

</section>
<!-- /.Highlight -->