<?php get_header(); ?>

<main id="blog">
	<div class="wrapper">
		<div class="blog-intro">
			<h1>Blog</h1>
			<p>Quiero leer sobre cualquier tema en la fase de todas y con un nivel de complejidad cualquiera.</p>
		</div>

		<section class="blog-grid">

			<?php
				// get_categories function fetch a list of the categories
				$categories = get_categories();

				// Tell WordPress to run through each category and do whatever
				// is inside the braces
				foreach ( $categories as $category ) {

					// Define Query arguments
					$args = array(
						// Unique ID for the term (category)
						'cat' => $category->term_id,
						// Type of post. In this case, articles (posts)
						'post_type' => 'post',
						// How many articles per category will this show
						'posts_per_page' => '4',
						// Don't duplicate articles (below checks the post ID)
						'post__not_in' => $do_not_duplicate
					);

					// Identify category link
					$category_link = get_category_link($category->term_id);

					// Run the query using those arguments (custom loop)
					$query = new WP_Query( $args ); if ( $query->have_posts() ) { ?>

					<section class="<?php echo $category->name; ?> listing category-column">
						<h2><?php echo $category->name; ?></h2>

						<?php 
						// To check later if that is the first post
						$first = true; ?>

						<?php while ( $query->have_posts() ) {$query->the_post(); $do_not_duplicate[] = $post->ID;?>

							<article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?>>

							<?php if ( $first ): ?>
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'blog-thumbnails' ); ?>
								</a>
								<?php $first = false; ?>
							<?php endif; ?>

							<p class="entry-title">
								<a href="<?php the_permalink(); ?>">
									<?php the_title(); ?>
								</a>
								<hr>
							</p>

							</article>

						<?php } // end while ?>
						<a href="<?php echo $category_link; ?>" class="category-link pill">Más <?php echo $category->name; ?> →</a>
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