<?php
/*
Template Name: Inicio
*/
?>

<?php get_header(); ?>

<main id="home">
	<div class="wrapper">
        <section class="home-intro">
            <div class="home-newsletter">
                <h1>El newsletter para los diseñadores que quieren mejorar día a día.</h1>
                <p>Un lugar construido exclusivamente para diseñador@s UI/UX y de producto que buscan crecer día tras día :)</p>
                <p>¡Únete a 6359 diseñador@s y empieza ya!</p>
                <p>[form]</p>
            </div>

            <div class="home-lottie">
                <p>image</p>
            </div>
        </section>

        <section class="home-last">
            <h2>Últimos artículos</h2>

            <div class="home-last-listing">
                <?php
                    global $post;
                    $last_posts = get_posts(array('posts_per_page' => 6));

                    foreach ( $last_posts as $post ) :
                    setup_postdata( $post );?>

                    <article class="last-listing-column">
                        <a href="<?php the_permalink(); ?>" class="listing">
                            <?php the_post_thumbnail( 'blog-thumbnails' ); ?>
                        </a>
                        <span class="category pill"><?php the_category(' ') ?></span>
                        <h3 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                    </article>

                    <?php endforeach; wp_reset_postdata(); ?>
            </div>

        </section>

        <section class="home-top">
            <div class="most-read">
                <h2>Lo más leído en uiFromMars</h2>
                    <?php
                        global $post;

                        $post_id = array(1754, 1241, 1299, 2368, 1382, 592, 3442, 4008, 121, 896, 3667);

                        foreach ( $post_id as $post ) :
                        setup_postdata( $post );?>
                        <div class="most-read-item">
                            <div class="first-column">
                                <span class="category pill"><?php the_category(' ') ?></span>
                            </div>

                            <div class="second-column">
                                <h3 class="entry-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>
                                </h3>
                            </div>

                            <div class="third-column">
                            <a href="<?php the_permalink(); ?>">
                                <img class="icon" src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/diagonal-chevron.svg"/>
                            </a>
                            </div>
                        </div>

                    <?php endforeach; wp_reset_postdata(); ?>
            </div>
            
            <div class="category-list">
                <h2>Categorías</h2>
                <div class="category-cloud">
                    <?php
                        $categories = get_categories();
                        foreach($categories as $category) {
                        echo '<div class="item">
                                    <div class="pill">
                                        <a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a>
                                    </div>
                                </div>';
                        }

                    ?>
                </div>
            </div>
        </section>

	</div>
</main>

<?php get_footer(); ?>