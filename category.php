<?php get_header(); ?>

<main id="category">
	<div class="wrapper">
		<?php if ( have_posts() ) : ?>

			<div class="page-title">
				<h1><?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></h1>
				<?php echo category_description(); ?>

				<strong>Refina tu búsqueda</strong>
				<?php get_search_form(); ?>
			</div>

		<section class="content-grid">
		
			<?php while ( have_posts() ) : the_post(); ?>
			<section class="<?php echo $category->name; ?> category-column">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-column' ); ?>>

						<a href="<?php the_permalink(); ?>" class="category-image">
							<?php the_post_thumbnail( 'blog-thumbnails' ); ?>
						</a>
						
					<h3>
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</h3>

				</article>
			</section>
			<?php endwhile; else: ?>
			<?php endif; ?>
			
		</section>
	</div>
</main>

<?php get_footer(); ?>