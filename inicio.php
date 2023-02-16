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
                <p>

                <div id="uifrommars-form-main">
                    <div id="mlb2-5200883" class="ml-form-embedContainer ml-subscribe-form ml-subscribe-form-5200883">
                        <div class="ml-form-align-left">
                            <div class="ml-form-embedWrapper embedForm">
                                <div class="ml-form-embedBody ml-form-embedBodyHorizontal row-form">
                                    <div class="ml-form-embedContent" style="margin-bottom:0"></div>
                                    <form class="ml-block-form"
                                        action="https://static.mailerlite.com/webforms/submit/l7p1o7" data-code="l7p1o7"
                                        method="post" target="_blank">
                                        <div class="ml-form-formContent horozintalForm">
                                            <div class="ml-form-horizontalRow">
                                                <div class="ml-input-horizontal">
                                                    <div style="width:100%" class="horizontal-fields">
                                                        <div
                                                            class="ml-field-group ml-field-email ml-validate-email ml-validate-required">
                                                            <input type="email" class="form-control" data-inputmask=""
                                                                name="fields[email]" placeholder="Escribe tu e-mail"
                                                                autocomplete="email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="ml-button-horizontal primary">
                                                    <button type="submit" class="primary">¡Empecemos! 🚀</button>
                                                    <button disabled="disabled" style="display:none" type="button"
                                                        class="loading">
                                                        <div class="ml-form-embedSubmitLoad"></div> <span
                                                            class="sr-only">Loading...</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ml-form-checkboxRow ml-validate-required">
                                            <label class="checkbox"> <input type="checkbox">
                                                <div class="label-description">
                                                    <p>He leído y acepto la <a
                                                            href="https://www.uifrommars.com/politica-de-privacidad/"
                                                            target="_blank">política de privacidad</a>.</p>
                                                </div>
                                            </label>
                                        </div>
                                        <input type="hidden" name="fields[origin]" value="homepage">
                                        <input type="hidden" name="ml-submit" value="1">
                                        <div class="ml-mobileButton-horizontal">
                                            <button type="submit" class="primary">¡Empecemos! 🚀</button>
                                            <button disabled="disabled" style="display:none" type="button"
                                                class="loading">
                                                <div class="ml-form-embedSubmitLoad"></div> <span
                                                    class="sr-only">Loading...</span>
                                            </button>
                                        </div>
                                        <input type="hidden" name="anticsrf" value="true">
                                    </form>
                                </div>
                                <div class="ml-form-successBody row-success" style="display:none">
                                    <div class="ml-form-successContent">
                                        <h4>Thank you!</h4>
                                        <p>You have successfully joined our subscriber list.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                    function ml_webform_success_5200883() {
                        try {
                            window.top.location.href = "https://www.uifrommars.com/gracias/"
                        } catch (o) {
                            window.location.href = "https://www.uifrommars.com/gracias/"
                        }
                    }
                    </script>
                    <img src="https://track.mailerlite.com/webforms/o/5200883/l7p1o7?v1640514421" width="1" height="1"
                        style="max-width:1px;max-height:1px;visibility:hidden;padding:0;margin:0;display:block" alt="."
                        border="0">
                    <script src="https://static.mailerlite.com/js/w/webforms.min.js?v0c75f831c56857441820dcec3163967c"
                        type="text/javascript"></script>
                </div>

                </p>
            </div>

            <div class="lottie">
                <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>


                <lottie-player src="https://lottie.host/d893ab41-b17d-4c7c-a9a7-f8c85b0c14b9/EB0hN5i2E3.json"
                    background="transparent" speed="1" style="width: 550px; height: auto;" loop autoplay>
                </lottie-player>
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

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-column' ); ?>>

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
                <h2>Lo más leído en uiFromMars</h2>
                <?php
                        global $post;

                        $post_id = array(1754, 1241, 1299, 2368, 1382, 592, 3442, 4008, 121, 3667);

                        foreach ( $post_id as $post ) :
                        setup_postdata( $post );?>
                <article class="most-read-list">

                    <div class="cat-column">
                        <?php the_category(' ') ?>
                    </div>

                    <div class="title-column">
                        <h3>
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                    </div>

                    <div class="icon-column">
                        <a href="<?php the_permalink(); ?>">
                            <img class="icon"
                                src="<?php echo get_bloginfo('template_url') ?>/assets/images/icon/diagonal-chevron.svg" />
                        </a>
                    </div>

                </article>

                <?php endforeach; wp_reset_postdata(); ?>
            </div>

            <div class="categories">
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