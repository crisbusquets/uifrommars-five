<?php get_header(); ?>

<main id="page">
    <div class="wrapper">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <article class="page">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>


            <!-- les ID son de producció, les de local son 229, 182, 152, 405 -->
            <?php if( ! is_page(array(18, 182, 152, 4677, 4692, 4699, 4701, 4690, 405)) ) : ?>

            <hr />

            <div class="newsletter-post">
                <h3>Subscríbete a uiFromMars</h3>
                <p>Un lugar construido exclusivamente para diseñador@s UI/UX y de producto que buscan crecer día tras
                    día :)</p>
                <p>¡Únete a <mark><?php echo do_shortcode( '[mailerlite-subscribers]' ); ?></mark> diseñador@s y
                    empieza ya!</p>
                <?php get_template_part( 'mailerlite', 'widget' ); ?>

            </div>

            <?php else: ?>

            &nbsp;

            <?php endif;?>


        </article>
        <?php endwhile; else: ?>

        <article>
            <p>No hay contenido a mostrar</p>
        </article>

        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>