<footer>
  <div class="footer-top-border"></div> <!-- Contour rose en haut du footer -->
  <div class="footer-container">
    <nav>
      <?php
      wp_nav_menu(array(
        'theme_location' => 'footer-menu',
        'menu_class' => 'footer-menu',
        'container' => false
      ));
      ?>
    </nav>
    <div class="footer-social">
      <!-- Liens vers les réseaux sociaux avec Font Awesome -->
      <a href="https://www.instagram.com/vinz.graphics/"><i class="fab fa-instagram"></i></a>
      <a href="https://www.linkedin.com/in/vincent-barré-745a23299/"><i class="fab fa-linkedin"></i></a>
      <a href="https://fr.pinterest.com/Vinzgraphics/"><i class="fab fa-pinterest"></i></a>
      <a href="https://www.behance.net/vincentbarr1#"><i class="fab fa-behance"></i></a>
      <a href="https://www.tiktok.com/@vinz.graphics"><i class="fab fa-tiktok"></i></a>
    </div>
    <div class="footer-logo">
      <a href="<?php echo home_url(); ?>">
        <img src="<?php echo get_template_directory_uri(); ?>/VB.png" alt="VB Logo">
      </a>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
