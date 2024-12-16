<?php
/*
Template Name: Single Projets
*/

get_header();
?>

<main class="single-project-page">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <div class="single-project-layout">
            <!-- Image principale -->
            <div class="single-project-image-container">
                <?php 
                $final_image = get_field('affiche_finale');
                if ($final_image) : ?>
                    <img class="single-project-image" src="<?php echo esc_url($final_image['url']); ?>" alt="<?php echo esc_attr($final_image['alt']); ?>">
                <?php endif; ?>
            </div>

            <!-- Contenu principal -->
            <div class="single-project-content">
                <h1 class="single-project-title"><?php the_title(); ?></h1>
                <p class="single-project-meta"><?php the_field('date_creation'); ?> | Temps : <?php the_field('temps'); ?></p>
                
                <div class="single-project-description">
                    <h2>Description</h2>
                    <?php 
                    $description = get_field('description'); 
                    if ($description) : 
                        $paragraphs = explode("\n", $description); 
                        foreach ($paragraphs as $paragraph) : 
                            if (trim($paragraph)) : 
                    ?>
                        <p><?php echo esc_html($paragraph); ?></p>
                    <?php 
                            endif; 
                        endforeach; 
                    endif; 
                    ?>
                </div>

                <!-- Section du lien -->
                <?php 
                $lien = get_field('lien');
                if ($lien) : ?>
                    <div class="single-project-link">
                        <a href="<?php echo esc_url($lien); ?>" target="_blank" rel="noopener noreferrer" class="project-link-button">
                            Voir le projet sur Instagram
                        </a>
                    </div>
                <?php endif; ?>

                <!-- Détails techniques -->
                <div class="single-project-details">
                    <h2>Application utilisée</h2>
                    <ul>
                        <?php 
                        $logiciel_logo = get_field('logiciel'); 
                        if ($logiciel_logo) : ?>
                            <li class="single-project-logiciel">
                                <div class="logiciel-logo-container">
                                    <img src="<?php echo esc_url($logiciel_logo['url']); ?>" alt="<?php echo esc_attr($logiciel_logo['alt']); ?>" class="logiciel-logo">
                                    <div class="logiciel-name">
                                        <?php echo esc_attr($logiciel_logo['title']); ?>
                                    </div>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Section Slider -->
        <?php 
        $version_0 = get_field('version0');
        $final_image = get_field('affiche_finale'); 
        if ($version_0 && $final_image) : ?>
            <div class="slider-section">
                <div class="slider-text">
                    <h2>Comparaison : Version 0 et Version Finale</h2>
                    <p>Découvrez l'évolution du projet en passant de la version initiale à la version finale grâce au slider interactif ci-dessous.</p>
                </div>
                <div class="custom-slider-container">
                    <div class="custom-slider-images">
                        <img class="custom-slider-image" src="<?php echo esc_url($version_0['url']); ?>" alt="Version 0">
                        <img class="custom-slider-image" src="<?php echo esc_url($final_image['url']); ?>" alt="Version Finale">
                    </div>
                    <button class="custom-slider-prev">←</button>
                    <button class="custom-slider-next">→</button>
                </div>
            </div>
        <?php endif; ?>
    <?php endwhile; endif; ?>
</main>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const sliderContainer = document.querySelector(".custom-slider-container");
    const sliderImages = document.querySelector(".custom-slider-images");
    const prevButton = document.querySelector(".custom-slider-prev");
    const nextButton = document.querySelector(".custom-slider-next");
    let currentSlide = 0;

    const updateSlider = () => {
        const slideWidth = sliderContainer.offsetWidth;
        sliderImages.style.transform = `translateX(-${currentSlide * slideWidth}px)`;
    };

    prevButton.addEventListener("click", () => {
        currentSlide = Math.max(currentSlide - 1, 0);
        updateSlider();
    });

    nextButton.addEventListener("click", () => {
        currentSlide = Math.min(currentSlide + 1, 1);
        updateSlider();
    });

    // Initial update
    updateSlider();

    // Update on window resize
    window.addEventListener("resize", updateSlider);
});
</script>

<?php get_footer(); ?>
