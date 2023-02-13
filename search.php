<?php get_header(); ?>

<main>
	<div class="wrapper">
        <article class="<?php post_class();?>">
            <div id="search-title">
                <h1>Resultados de tu búsqueda</h1>
                <p>Se han encontrado <?php echo $wp_query->found_posts; ?> <?php _e( 'artículos sobre', 'locale' ); ?> <span class="search-excerpt"><?php the_search_query(); ?></span>. Si lo prefieres, puedes refinar tu búsqueda utilizando el formulario:</p>
                <?php get_search_form(); ?>
            </div>

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article class="search-results">
                <?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-excerpt">\0</span>', $title); ?>
                
                    <h2>
                        <a href="<?php the_permalink(); ?>">
                            <?php echo $title; ?>
                        </a>
                    </h2>
                
                <?php the_excerpt(); ?>
            </article>
                <?php endwhile; else: ?>

                <p>No hay contenido a mostrar</p>
        
            <?php endif; ?>
        </article>
	</div>
</main>

<?php get_footer(); ?>