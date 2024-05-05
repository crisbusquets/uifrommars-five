<?php get_header(); ?>

<main id="category">
  <div class="wrapper">
    <?php if (have_posts()) : ?>
    <div class="page-title">
      <h1>
        <?php
          $category = get_the_category();
          echo $category[0]->cat_name;
          ?>
      </h1>
      <?php echo category_description(); ?>
    </div>
    <section class="content-grid">
      <?php while (have_posts()) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" class="category-item">
        <a href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('blog-thumbnails'); ?>
        </a>
        <h3 class="post-title-home">
          <a href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
          </a>
        </h3>
      </article>
      <?php endwhile; ?>
    </section>
    <nav class="pagination">
      <?php echo paginate_links(array(
          'base'          => str_replace(9999999999, '%#%', esc_url(get_pagenum_link(9999999999))),
          'current'       => max(1, get_query_var('paged')),
          'total'         => $wp_query->max_num_pages,
          'end_size'      => 0,
          'mid_size'      => 3,
          'prev_next'     => True,
          'prev_text'     => __('&laquo;'),
          'next_text'     => __('&raquo;'),
        )); ?>
    </nav>
    <?php else : ?>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>