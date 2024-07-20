<?php get_header(); ?>

<main id="search-results">
  <div class="wrapper">
    <div class="page-title">
      <h1>Resultados de búsqueda</h1>
      <p>Existen <strong><?php echo $wp_query->found_posts; ?></strong> <?php _e('artículos sobre', 'locale'); ?> <span class="search-highlight"><?php the_search_query(); ?></span>.</p>
    </div>
    <section class="content-grid">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
          <article id="post-<?php the_ID(); ?>" class="home-item">
            <?php $title = get_the_title();
            $keys = explode(" ", $s);
            $title = preg_replace('/(' . implode('|', $keys) . ')/iu', '<span class="search-highlight">\0</span>', $title); ?>
            <a href="<?php the_permalink(); ?>" class="search-image">
              <?php the_post_thumbnail('blog-thumbnails'); ?>
            </a>
            <span class="pill"><?php the_category(' ') ?></span>
            <h3 class="post-title-home">
              <a href="<?php the_permalink(); ?>">
                <?php echo $title; ?>
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
    <p>No hay contenido a mostrar</p>
  <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>