<?php get_header(); ?>

<main id="search">
    <div class="wrapper">

        <div class="page-title">
            <h1>Resultados de búsqueda</h1>
            <p>Existen <strong><?php echo $wp_query->found_posts; ?></strong>
                <?php _e( 'artículos sobre', 'locale' ); ?> <span
                    class="search-highlight"><?php the_search_query(); ?></span>.</p>
        </div>

        <section class="content-grid">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'search-results' ); ?>>
                <?php $title = get_the_title(); $keys= explode(" ",$s); $title = preg_replace('/('.implode('|', $keys) .')/iu', '<span class="search-highlight">\0</span>', $title); ?>

                <a href="<?php the_permalink(); ?>" class="search-image">
                    <?php the_post_thumbnail( 'blog-thumbnails' ); ?>
                </a>

                <div class="category-link-list"><?php the_category(' ') ?></div>

                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php echo $title; ?>
                    </a>
                </h3>

            </article>
            <?php endwhile; else: ?>

            <p>No hay contenido a mostrar</p>

            <?php endif; ?>
        </section>
    </div>
</main>

<?php get_footer(); ?>