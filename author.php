<?php get_header(); ?>
<?php $author = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
<main id="page">
  <div class="wrapper">
    <article class="page">
      <div class="author-heading">
        <div class="author-photo">
          <?php echo get_avatar($author->user_email, '64'); ?>
        </div>
        <div class="author-name-position">
          <h1><?php echo $author->nickname; ?></h1>
          <span class="meta"><?php echo $author->position; ?></span>
        </div>
      </div>
      <h2>Sobre mí</h2>
      <?php echo $author->user_description; ?>
      <hr />
    </article>
  </div>
</main>
<aside>
  <div class="wrapper">
    <h2 class="author-related-posts">Últimos artículos escritos por <?php echo $author->nickname; ?></h2>
    <p class="author-related-posts">Estos son los últimos nueve artículos que he escrito en uiFromMars (de un total de <?php echo '' . count_user_posts($q->ID); ?>).</p>
    <div class="content-grid">
      <?php
      // Define our WP Query Parameters
      $the_query = new WP_Query('posts_per_page=9');
      ?>
      <?php
      // Start our WP Query
      while ($the_query->have_posts()) : $the_query->the_post();
        // Display the Post Title with Hyperlink
      ?>
        <article>
          <a href="<?php the_permalink(); ?>" class="category-image">
            <?php the_post_thumbnail('blog-thumbnails'); ?>
          </a>
          <?php the_category(' ') ?>
          <h3>
            <a href="<?php the_permalink(); ?>">
              <?php the_title(); ?>
            </a>
          </h3>
        </article>
      <?php
      // Repeat the process and reset once it hits the limit
      endwhile;
      wp_reset_postdata();
      ?>
    </div>
  </div>
</aside>
<?php get_footer(); ?>