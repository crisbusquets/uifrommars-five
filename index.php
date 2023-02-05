<?php get_header(); ?>

<main>
	<div class="wrapper">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<article class="<?php post_class();?>">
					<h1><?php the_title(); ?></h1>
					<?php the_content(); ?>
				
					<?php endwhile; else: ?>

					<p>No hay contenido a mostrar</p>
				</article>

			<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>