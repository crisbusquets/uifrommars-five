<?php
/**
 * The template for displaying an Author Profile
 *
 */
get_header(); ?>

<?php
// Set the Current Author Variable $curauth
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
?>

<main id="page">
    <div class="wrapper">

        <article class="page">
            <div class="author-heading">
                <div class="author-photo">
                    <?php echo get_avatar( $curauth->user_email , '64'); ?>
                </div>
                <div class="author-name-position">
                    <h1><?php echo $curauth->nickname; ?></h1>
                    <span class="meta"><?php echo $curauth->position; ?></span>
                </div>
            </div>
            <h2>Sobre mí</h2>
            <?php echo $curauth->user_description; ?>
            </p>

            <hr />
        </article>
    </div>
</main>

<aside>
    <div class="wrapper">
        <h2 class="author-related-posts">Últimos artículos escritos por
            <?php echo $curauth->nickname; ?></h2>
        <p class="author-related-posts">Estos son los últimos nueve artículos que he escrito en uiFromMars (de un total
            de
            <?php echo '' . count_user_posts( $q->ID ); ?>).</p>
        <div class="content-grid-recent">

            <?php
                    $related = get_posts( array( 'category__in' => wp_get_post_categories($post->ID), 'numberposts' => 9, 'post__not_in' => array($post->ID) ) );
                        if( $related ) foreach( $related as $post ) {
                        setup_postdata($post);
                ?>
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
            <?php }
                    wp_reset_postdata(); ?>

        </div>
    </div>
</aside>


<?php get_footer(); ?>