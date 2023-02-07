<?php get_header(); ?>
<div class="line" id="scroll-indicator"></div>

<main>
	<div class="wrapper">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<script type="application/ld+json">
			{
			"@context": "http://schema.org",
			"@type": "Article",
			"mainEntityOfPage": "<?php echo get_permalink();?>",
			"author": {
				"@type": "Person",
				"name": "<?php the_author();?>"
			},
			"datePublished": "<?php echo get_the_date('Y-m-d, H:i');?>",
			"dateModified": "<?php echo get_the_modified_date('Y-m-d, H:i');?> ",
			"headline": "<?php the_title();?>",
			"image": "<?php echo get_the_post_thumbnail_url();?>",
			"publisher": {
				"@type": "Organization",
				"name": "uiFromMars",
				"logo": {
					"@type": "ImageObject",
					"url": "https://www.uifrommars.com/wp-content/uploads/2017/09/uifrommars-logo.jpg"
				}
			}
			}
		</script>

			<article class="<?php post_class();?>">
				<h1><?php the_title(); ?></h1>
				meta
				<?php the_post_thumbnail( 'post-thumbnails' ); ?>
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