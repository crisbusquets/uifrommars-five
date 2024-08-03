<?php wp_footer(); ?>

<footer>
  <svg>
    <filter id="filter">
      <feComponentTransfer color-interpolation-filters="sRGB" result="duotone">
        <feFuncR type="table" tableValues="0.2 0.9333333333" />
        <feFuncG type="table" tableValues="0.1882352941 0.2431372549" />
        <feFuncB type="table" tableValues="0.1882352941 0.168627451" />
      </feComponentTransfer>
      <!-- <filter id="filter">
      <feFlood flood-color="#EE3E2B" flood-opacity=".5" result="FLOOD" />
      <feBlend in="SourceGraphic" in2="FLOOD" mode="color-burn" result="BLEND" />
    </filter> -->
  </svg>
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
        <span class="nav">Categorías</span>
        <ul class="meta category-list-footer">
          <?php wp_list_categories(array(
            'title_li' => '',
            'orderby' => 'name'
          )); ?>
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