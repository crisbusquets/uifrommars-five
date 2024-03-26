<?php get_header(); ?>

<main id="blog">
  <div class="wrapper">
    <div class="page-title">
      <h1>Artículos</h1>
    </div>
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
                <h3>
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
    </div>
</main>

<?php get_footer(); ?>