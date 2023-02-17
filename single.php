<?php get_header(); ?>
<div class="line" id="scroll-indicator"></div>

<main id="post">
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

        <article class="single-post">
            <h1><?php the_title(); ?></h1>

            <div class="category">
                <span class="pill"><?php the_category(' ') ?></span>
            </div>

            <div class="post-meta">
                <div class="author">
                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 20 ); ?><span class="meta">Escrito por
                        <?php the_author(); ?></span></div>
                <div class="reading-time">
                    <img class="icon"
                        src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/reading-time.svg" /><span
                        class="meta">Tiempo de lectura: <span class="minutes"></span></span>
                </div>
            </div>

            <?php the_post_thumbnail( 'post-thumbnails' ); ?>
            <?php the_content(); ?>
            <hr />
            <div class="newsletter-post">
                <h3>Subscríbete a uiFromMars</h3>
                <p>Un lugar construido exclusivamente para diseñador@s UI/UX y de producto que buscan crecer día tras
                    día :)</p>
                <p>¡Únete a <mark><?php echo do_shortcode( '[mailerlite-subscribers]' ); ?></mark> diseñador@s y
                    empieza ya!</p>
                <?php get_template_part( 'mailerlite', 'widget' ); ?>
            </div>
            <hr />
        </article>

        <?php endwhile; else: ?>

        <article>
            <p>No hay contenido a mostrar</p>
        </article>

        <?php endif; ?>
    </div>


    <aside>
        <div class="wrapper">
            <h2 class="related-posts">Artículos relacionados</h2>
            <div class="content-grid-recent">

                <?php
                    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 3, 'post__not_in' => array($post->ID) ) );
                        if( $related ) foreach( $related as $post ) {
                        setup_postdata($post);
                ?>
                <article class="grid-column">
                    <a href="<? the_permalink()?>" class="category-image">
                        <?php the_post_thumbnail( 'blog-thumbnails' ); ?>
                    </a>

                    <?php the_category(' ') ?>

                    <h3>
                        <a href="<? the_permalink()?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>
                </article>
                <?php }
                    wp_reset_postdata(); ?>

            </div>
        </div>
    </aside>
</main>

<?php get_footer(); ?>