<?php get_header(); ?>
<div class="line" id="scroll-indicator"></div>

<main>
	<div class="wrapper">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article class="<?php post_class();?>">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</article>
            <aside>
    <div class="wrapper">[widget]</div>
</aside>
		<?php endwhile; else: ?>

			<article>
				<p>No hay contenido a mostrar</p>
			</article>

		<?php endif; ?>
	</div>
</main>

<?php get_footer(); ?>