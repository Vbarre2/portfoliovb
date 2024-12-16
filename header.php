<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Jockey+One&family=Rubik+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="site-header">
    <div class="top-bar">
        <div class="social-icons">
            <a href="https://www.instagram.com/vinz.graphics/"><i class="fab fa-instagram"></i></a>
            <a href="https://www.linkedin.com/in/vincent-barré-745a23299/"><i class="fab fa-linkedin"></i></a>
            <a href="https://fr.pinterest.com/Vinzgraphics/"><i class="fab fa-pinterest"></i></a>
            <a href="https://www.behance.net/vincentbarr1#"><i class="fab fa-behance"></i></a>
            <a href="https://www.tiktok.com/@vinz.graphics"><i class="fab fa-tiktok"></i></a>
        </div>
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/VB.png" alt="VB Logo">
            </a>
        </div>
        <a href="<?php echo get_permalink(get_page_by_path('contact/')); ?>" class="contact-button">Contactez-moi</a>


    </div>

    <div class="separator-line"></div>

    <nav class="main-navigation">
        <button class="hamburger" aria-label="Menu">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <ul class="menu">
            <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container' => false, 'items_wrap' => '%3$s')); ?>
        </ul>
    </nav>
</header>

<?php wp_footer(); ?>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const hamburger = document.querySelector('.hamburger');
    const menu = document.querySelector('.menu');

    hamburger.addEventListener('click', function() {
        menu.classList.toggle('active');
        hamburger.classList.toggle('is-active');
    });
});
</script>

</body>
</html>
