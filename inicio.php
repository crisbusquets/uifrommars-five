<?php
/*
Template Name: Inicio
*/
?>

<?php get_header(); ?>

<main id="home">
    <div class="wrapper">
        <section class="two-columns">
            <div class="newsletter">
                <h1>El newsletter para los diseñadores que quieren mejorar día a día.</h1>
                <p>Un lugar construido exclusivamente para diseñador@s UI/UX y de producto que buscan crecer día tras
                    día :)</p>
                <p>¡Únete a <mark><?php echo do_shortcode( '[mailerlite-subscribers]' ); ?></mark> diseñador@s y
                    empieza ya!</p>
                <?php get_template_part( 'mailerlite', 'widget' ); ?>
            </div>

            <div class="lottie">
                <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/uifrommars-hero.svg" width="454"
                    height="329" alt="Únete a uiFromMars" />
            </div>
        </section>

        <section class="one-column">
            <h2>Últimos artículos</h2>

            <div class="content-grid-recent">
                <?php
                    global $post;
                    $last_posts = get_posts(array('posts_per_page' => 6));

                    foreach ( $last_posts as $post ) :
                    setup_postdata( $post );?>

                <article class="grid-column">

                    <a href="<?php the_permalink(); ?>" class="category-image">
                        <?php the_post_thumbnail( 'blog-thumbnails' ); ?>
                    </a>
                    <?php the_category(' ') ?>

                    <h3>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                </article>

                <?php endforeach; wp_reset_postdata(); ?>
            </div>

        </section>

        <section class="two-columns">

            <div class="most-read">
                <hr />
                <h2>Lo más leído en uiFromMars</h2>

                <?php $counter = 1; ?>
                <?php
                    $post_id = array(1754, 1241, 1299, 2368, 1382, 592, 3442, 4008, 121, 3667);
                    foreach ( $post_id as $post ) :?>
                <article class="most-read-grid">
                    <div class="most-category">
                        <?php the_category(' ') ?>
                    </div>

                    <div class="most-title">
                        <h3>
                            <a href="<?php the_permalink(); ?>"
                                class="<?php echo( 'gtm_web_most-read-' . $counter ); $counter++; ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                    </div>
                </article>

                <?php endforeach; wp_reset_postdata(); ?>
            </div>

            <div class=" categories">
                <hr />
                <h2>Categorías</h2>
                <div class="category-cloud">
                    <?php
                        $categories = get_categories();
                        foreach($categories as $category) {
                        echo '<div class="item">
                                    <span class="pill">
                                        <a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>
                                    </span>
                                </div>';
                        }

                    ?>
                </div>
            </div>
        </section>

    </div>
</main>

<?php get_footer(); ?>