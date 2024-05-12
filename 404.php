<?php get_header(); ?>

<main id="page">
  <div class="wrapper">
    <article class="content-narrow">
      <h1>Error 404: no encontrado</h1>
      <br />
      <div style="width:100%;height:0;padding-bottom:79%;position:relative;">
        <iframe src="https://giphy.com/embed/IMdS79sQINRAY" width="100%" height="100%" style="position:absolute"
          frameBorder="0" class="giphy-embed" allowFullScreen></iframe>
      </div>
      <br />
      <p>Lo que estabas buscando ya no está aquí. Puede ser que la dirección esté mal o que yo haya borrado sin querer
        lo que había aquí (nadie es perfecto).</p>
      <p>En cualquier caso, puedes <a href="/" alt="Volver al inicio de uiFromMars">volver al inicio</a>, al <a
          href="/blog" alt="Blog de uiFromMars">blog</a> o buscar contenido utilizando este formulario 🤘</p>
      <br />
      <?php get_search_form(); ?>
      <br />
      <hr />
      <div class="newsletter-post">
        <h3>Únete a <mark><?php echo do_shortcode('[mailerlite-subscribers]'); ?></mark> diseñadores y mejora en tu
          carrera de diseño</h3>
        <p>Recibe un correo semanal con artículos, consejos, inspiración y herramientas para crecer día a día 🚀</p>
        <?php get_template_part('mailerlite', 'widget'); ?>
      </div>
    </article>
  </div>
</main>

<?php get_footer(); ?>