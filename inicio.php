<?php get_header(); ?>

<main id="home">
  <div class="wrapper">
    <section class="inicio-header">
      <div class="newsletter">
        <h1>Únete a <mark id="subscriber-count"><?php echo do_shortcode('[mailerlite-subscribers]'); ?></mark>
          diseñadores
          y mejora en tu
          carrera de diseño</h1>
        <p>Recibe un correo semanal con artículos, consejos, inspiración y herramientas para crecer día a día 🚀</p>
        <?php get_template_part('mailerlite', 'widget'); ?>
      </div>
      <div class="inicio-svg">
        <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/uifrommars-hero-computer.svg" width="522"
          height="295" alt="Únete a uiFromMars" />
      </div>
    </section>

    <section id="home-categories" class="full-width">
      <div class="content-grid">
        <?php
        // get_categories function fetch the list of categories
        $categories = get_categories();
        // Tell WordPress to run through each category and do whatever is inside the braces
        foreach ($categories as $category) {
          // Define Query arguments
          $args = array(
            // Unique ID for the term (category)
            'cat' => $category->term_id,
            // Type of post. In this case, articles (posts)
            'post_type' => 'post',
            // How many articles per category will this show
            'posts_per_page' => '4',
          );
          // Identify category link
          $category_link = get_category_link($category->term_id);
          // Run the query using those arguments (custom loop)
          $query = new WP_Query($args);
          if ($query->have_posts()) { ?>
        <section class="<?php echo $category->name; ?>">
          <h2>
            <a href="<?php echo $category_link; ?>">
              <?php echo $category->name; ?>
            </a>
          </h2>
          <?php
              // To check later if that is the first post
              $first = true; ?>
          <?php while ($query->have_posts()) {
                $query->the_post(); ?>
          <article id="post-<?php the_ID(); ?>" class="category-item">
            <?php if ($first) : ?>
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('blog-thumbnails'); ?>
            </a>
            <?php $first = false; ?>
            <?php endif; ?>
            <h3 class="post-title-home">
              <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?>
              </a>
            </h3>
          </article>
          <hr>
          <?php } // end while 
              ?>
          <a href="<?php echo $category_link; ?>" class="category-link">
            Más <?php echo $category->name; ?> →
          </a>
        </section>
        <?php } // end if query have_posts
          // Use reset to restore original query.
          wp_reset_postdata();
        }
        ?>
    </section>

    <section id="youtube-grid" class="full-width">
      <div id="youtube-header">
        <h2>uiFromMars TV</h2>
        <div class="g-ytsubscribe" data-channelid="UC51T3HWDb3tdhgBOzvk_8qg" data-layout="default" data-count="default">
        </div>
      </div>
      <div class="content-grid">
        <div class="youtube-item">
          <a href="https://youtu.be/7h62jUgm3Cw" target="_blank"><img
              src="<?php echo get_bloginfo('template_url') ?>/assets/images/youtube/uifrommars-youtube-002.jpg"
              width="341" height="191" alt="Diseña Conmigo 2 - YouTube uiFromMars" class="youtube-thumbnail" /></a>
          <p class="post-title-home"><a href="https://youtu.be/7h62jUgm3Cw" target="_blank">Diseña conmigo 2: Una app de
              podcasts (wireframes,
              flujo de pago y caos)</a></p>

        </div>

        <div class="youtube-item">
          <a href="https://youtu.be/1Ri3yt4Pkgo" target="_blank"><img
              src="<?php echo get_bloginfo('template_url') ?>/assets/images/youtube/uifrommars-youtube-003.jpg"
              width="341" height="191" alt="Diseña Conmigo 3 - YouTube uiFromMars" class="youtube-thumbnail" /></a>
          <p class="post-title-home"><a href="https://youtu.be/1Ri3yt4Pkgo" target="_blank">Diseña conmigo 3: Una app de
              podcasts (la nueva UI
              de Figma, revisión, flujo de pago y moodboard)</a></p>
        </div>
        <div class="youtube-item">
          <a href="https://youtu.be/lrCeUgFHlTA" target="_blank">
            <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/youtube/uifrommars-youtube-004.jpg"
              width="341" height="191" alt="Diseña Conmigo 4 - YouTube uiFromMars" class="youtube-thumbnail" /></a>
          <p class="post-title-home"><a href="https://youtu.be/lrCeUgFHlTA" target="_blank">Diseña conmigo 4: Una app de
              podcasts (UI kit con
              variables locales de Figma)</a></p>
        </div>
      </div>
    </section>

    <div class="content-narrow newsletter-post">
      <hr />
      <h3>Únete a <mark id="subscriber-count"><?php echo do_shortcode('[mailerlite-subscribers]'); ?></mark>
        diseñadores y mejora en tu carrera de diseño</h3>
      <p>Recibe un correo semanal con artículos, consejos, inspiración y herramientas para crecer día a día 🚀</p>
      <?php get_template_part('mailerlite', 'widget'); ?>
    </div>

  </div>



  <!-- <section class="full-width">
    <h2>Últimos artículos</h2>
    <div class="content-grid">
      <?php
      global $post;
      $last_posts = get_posts(array('posts_per_page' => 18));
      foreach ($last_posts as $post) :
        setup_postdata($post); ?>
        <article class="home-item">
          <a href="<?php the_permalink(); ?>" aria-label="Lee más sobre <?php the_title(); ?>" class="category-image">
            <?php the_post_thumbnail('blog-thumbnails'); ?>
          </a>
          <span class="pill"><?php the_category(' ') ?>
          </span>
          <h3 class="post-title-home">
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h3>
        </article>
      <?php endforeach;
      wp_reset_postdata(); ?>
    </div>
    <div class="read-more">
      <a href="/blog" class="plausible-event-name=Read+More+Home">Leer más artículos</a>
    </div>
  </section> -->

  </div>
</main>

<?php get_footer(); ?>