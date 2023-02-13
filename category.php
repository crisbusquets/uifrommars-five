<?php get_header(); ?>

<main id="category">
	<div class="wrapper">
		<?php if ( have_posts() ) : ?>

			<div class="category-intro">
				<h1><?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></h1>
				<?php echo category_description(); ?>

				<strong>Refina tu búsqueda</strong>
				<form id="search-category" method="get" action="<?php bloginfo('url'); ?>">
					<input type="text" name="s" id="s" /><?php wp_dropdown_categories('show_option_none=Selecciona una categoría'); ?>
					<input type="submit" value="Buscar" />
				</form>
			</div>

		<section class="category-grid">
		
			<?php while ( have_posts() ) : the_post(); ?>
			<section class="<?php echo $category->name; ?> listing category-column">
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'category-listing' ); ?>>

						<a href="<?php the_permalink(); ?>" class="category-image">
							<?php the_post_thumbnail( 'blog-thumbnails' ); ?>
						</a>
						
					<p class="entry-title">
						<a href="<?php the_permalink(); ?>">
							<?php the_title(); ?>
						</a>
					</p>

				</article>
			</section>
			<?php endwhile; else: ?>
			<?php endif; ?>
			
		</section>
	</div>
</main>

<?php get_footer(); ?>