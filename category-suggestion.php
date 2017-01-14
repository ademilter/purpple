<?php
/**
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 */

get_header(); ?>

<main class="Main" role="main">

  <section class="Suggestion">

    <div class="container">
      <div class="row">
        <div class="col-md-offset-4 col-md-8">
          <h2 class="Section-title">Suggestion</h2>
        </div>
      </div>
    </div>

    <div class="container-xl">
      <ul class="Links">
        <?php
        if (have_posts()) :?>
          <?php while (have_posts()) : the_post(); ?>
            <?php
            $tags = get_the_tags();
            $tag = '';
            if (!empty($tags)) {
              $tag = $tags[0]->name;
            } ?>
            <li class="Link <?php echo $tag ?>">
              <div class="container">
                <div class="row">
                  <div class="Link-meta col-xs-12 col-md-3">
                    <h5 class="Link-meta-domain"><?php echo $tag ?></h5>
                    <time class="Link-meta-date"><?php the_time('F j, Y'); ?></time>
                  </div>
                  <div class="Link-content col-xs-12 first-xs last-md col-md-offset-1 col-md-8">
                    <h3 class="Link-content-title" rel="nofollow">
                      <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                    </h3>
                    <div class="Link-content-detail">
                      <?php the_content() ?>
                    </div>
                  </div>
                </div>
              </div>
            </li>
          <?php endwhile;
          next_posts_link('Older Entries');
          previous_posts_link('Newer Entries');
          ?>
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

</main>
<!-- /.Main -->