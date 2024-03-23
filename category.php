<?php get_header(); ?>

<main id="category">
    <div class="wrapper">
        <?php if ( have_posts() ) : ?>

        <div class="page-title">
            <h1><?php $cat = get_the_category(); echo $cat[0]->cat_name; ?></h1>
            <?php echo category_description(); ?>
        </div>

        <div class="content-grid">

            <?php while ( have_posts() ) : the_post(); ?>
            <section class="<?php echo $category->name; ?>">
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-column' ); ?>>

                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail( 'blog-thumbnails' ); ?>
                    </a>
                    <?php the_category(' ') ?>
                    <h3>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>

                </article>
            </section>
            <?php endwhile; ?>
        </div>

        <nav class="pagination">
            <?php echo paginate_links( array(
                'base'          => str_replace( 9999999999, '%#%', esc_url( get_pagenum_link( 9999999999 ) ) ),
                'current'       => max( 1, get_query_var( 'paged' ) ),
                'total'         => $wp_query->max_num_pages,
                'end_size'      => 0,
                'mid_size'      => 3,
                'prev_next'     => True,
                'prev_text'     => __( '&laquo;' ),
                'next_text'     => __( '&raquo;' ),
            ) ); ?>
        </nav>

        <?php else : ?>

        <?php endif; ?>


    </div>
</main>

<?php get_footer(); ?>