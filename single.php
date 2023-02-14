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

				<div class="category">
					<span class="pill"><?php the_category(' ') ?></span>
				</div>

				<div class="post-meta">
					<div class="author">
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 20 ); ?><span class="meta">Escrito por <?php the_author(); ?></span></div>
					<div class="reading-time">
						<img class="icon" src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/reading-time.svg"/><span class="meta">Tiempo de lectura: <span class="minutes"></span></span>	
					</div>
				</div>

				<?php the_post_thumbnail( 'post-thumbnails' ); ?>
				<?php the_content(); ?>
			</article>

		<?php endwhile; else: ?>

			<article>
				<p>No hay contenido a mostrar</p>
			</article>

		<?php endif; ?>
	</div>
</main>

<aside>
	<div class="wrapper">
		<div class="related-posts">
			<h2>Artículos relacionados</h2>
			<div class="related-posts-grid">
				
			<?php
				$orig_post = $post;
				global $post;
				$tags = wp_get_post_tags($post->ID);
				
				if ($tags) {
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				$args=array(
				'tag__in' => $tag_ids,
				'post__not_in' => array($post->ID),
				'posts_per_page'=>3, // Number of related posts to display.
				'caller_get_posts'=>1
				);
				
				$my_query = new wp_query( $args );
				
				while( $my_query->have_posts() ) {
				$my_query->the_post();
				?>
				
				<article class="related-post-column">
					<a href="<? the_permalink()?>">
						<?php the_post_thumbnail( 'blog-thumbnails' ); ?>
					</a>

					<p class="entry-title">
						<a href="<? the_permalink()?>">
							<?php the_title(); ?>
						</a>
					</p>
				</article>
				
				<? }
				}
				$post = $orig_post;
				wp_reset_query();
				?>

			</div>
		</div>	
	</div>
</aside>

<?php get_footer(); ?>