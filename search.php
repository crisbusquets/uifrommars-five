<?php get_header(); ?>

<main id="search">
	<div class="wrapper">

            <div class="search-intro">
                <h1>Resultados de tu búsqueda</h1>
                <p>Existen <strong><?php echo $wp_query->found_posts; ?></strong> <?php _e( 'artículos sobre', 'locale' ); ?> <span class="search-highlight"><?php the_search_query(); ?></span>.</p>
                <p>Si lo prefieres, puedes refinar tu búsqueda:</p>
                <?php get_search_form(); ?>
            </div>

            <section class="search-grid">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <section class="<?php echo $category->name; ?> search-column">
                    <article id="post-<?php the_ID(); ?>" <?php post_class( 'search-results' ); ?>>
                        <?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-highlight">\0</span>', $title); ?>
                        
						<a href="<?php the_permalink(); ?>" class="search-image">
							<?php the_post_thumbnail( 'blog-thumbnails' ); ?>
						</a>

                        <p class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                            <?php echo $title; ?>
                            </a>
					    </p>

                    </article>
                </section>
                    <?php endwhile; else: ?>

                    <p>No hay contenido a mostrar</p>
            
                <?php endif; ?>
            </section>
	</div>
</main>

<?php get_footer(); ?>