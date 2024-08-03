<?php /* Template Name: Subscríbete */ ?>
<?php get_header(); ?>

<main id="page">
  <div class="wrapper">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="content-narrow">
      <h1><?php the_title(); ?></h1>
      <?php the_content(); ?>
      <div class="newsletter-post">
        <h3>Únete a <mark id="subscriber-count"><?php echo do_shortcode('[mailerlite-subscribers]'); ?></mark>
          diseñadores y mejora en tu
          carrera de diseño</h3>
        <p>Recibe un correo semanal con artículos, consejos, inspiración y herramientas para crecer día a día 🚀</p>
        <?php get_template_part('mailerlite', 'widget'); ?>
      </div>
    </article>
    <?php endwhile;
    else : ?>
    <article>
      <p>No hay contenido a mostrar</p>
    </article>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>