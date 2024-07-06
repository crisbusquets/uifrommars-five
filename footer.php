<?php wp_footer(); ?>

<a href="https://ko-fi.com/uifrommars" class="plausible-event-name=Ko-fi+Widget" target="_blank" style="text-decoration: none; color: inherit;">
  <div id="kofi">
    <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/ko-fi_logo.png" style="width:40px; height: 40px;" alt="Ko-fi de uiFromMars">
    ¿Un café?
  </div>
</a>

<footer>
  <div class="wrapper">
    <div id="footer-container">
      <div class="credits">
        <img src="<?php echo get_bloginfo('template_url') ?>/assets/images/uifrommars-logo.svg" alt="uiFromMars" style="width:140px; height: 39px;" />
        <small>Copyright © 2018-<?php echo date("Y"); ?>.
          <br />
          Todos los derechos reservados.
        </small>
      </div>
      <div class="footer-nav">
        <span class="nav">Explora</span>
        <ul class="meta">
          <?php wp_nav_menu(array('theme_location' => 'explore-menu', 'container' => '', 'items_wrap' => '%3$s')); ?>
        </ul>
      </div>
      <div class="footer-nav">
        <span class="nav">Enlaces</span>
        <ul class="meta">
          <?php wp_nav_menu(array('theme_location' => 'links-menu', 'container' => '', 'items_wrap' => '%3$s')); ?>
        </ul>
      </div>
      <div class="footer-nav">
        <span class="nav">uiFromMars</span>
        <ul class="meta">
          <?php wp_nav_menu(array('theme_location' => 'uifrommars-menu', 'container' => '', 'items_wrap' => '%3$s')); ?>
        </ul>
      </div>
    </div>
  </div>
</footer>

</body>

</html>