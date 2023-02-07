<?php get_header(); ?>

<main>
	<div class="wrapper">
        <article class="<?php post_class();?>">
            <div id="search-title">
                <h1>Resultados</h1>
                <p><?php echo $wp_query->found_posts; ?> <?php _e( 'resultados por', 'locale' ); ?>: "<?php the_search_query(); ?>"</p>
                <p>Refina tu búsqueda:</p>
                <?php get_search_form(); ?>
                <hr/>
            </div>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                
                <?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-excerpt">\0</span>', $title); ?>
                <h2><?php echo $title; ?></h2>
                <?php the_excerpt(); ?>
                    
                <?php endwhile; else: ?>

                <p>No hay contenido a mostrar</p>
        
            <?php endif; ?>
        </article>
	</div>
</main>

<?php get_footer(); ?>