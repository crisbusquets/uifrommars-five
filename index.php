<?php get_header(); ?>

<main id="blog">
  <div class="wrapper">
    <section class="full-width">
      <h2>Últimos artículos</h2>
      <div class="content-grid">
        <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
          'posts_per_page' => 18,
          'paged'          => $paged,
        );

        $last_posts = new WP_Query($args);

        if ($last_posts->have_posts()) :
          while ($last_posts->have_posts()) : $last_posts->the_post(); ?>
        <article class="home-item">
          <a href="<?php the_permalink(); ?>" aria-label="Lee más sobre <?php the_title(); ?>" class="category-image">
            <?php the_post_thumbnail('blog-thumbnails'); ?>
          </a>
          <span class="pill"><?php the_category(' ') ?></span>
          <h3 class="post-title-home">
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h3>
        </article>
        <?php endwhile; ?>
      </div> <!-- Close content-grid div here -->

      <?php
          wp_reset_postdata();
        else :
          echo '<p>No posts found</p>';
        endif;
    ?>
    </section>
    <nav class="pagination">
      <?php
      echo paginate_links(array(
        'base'          => str_replace(9999999999, '%#%', esc_url(get_pagenum_link(9999999999))),
        'current'       => max(1, get_query_var('paged')),
        'total'         => $last_posts->max_num_pages, // Use $last_posts instead of $wp_query
        'end_size'      => 0,
        'mid_size'      => 3,
        'prev_next'     => true,
        'prev_text'     => __('&laquo;'),
        'next_text'     => __('&raquo;'),
      ));
      ?>
    </nav>
  </div>
</main>

<?php get_footer(); ?>