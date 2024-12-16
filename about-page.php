<?php
/*
Template Name: About
*/

get_header();
?>

<div class="about-me-section">
<h1 class="section-header">À propos de moi</h1>
<div class="about-page">
    <!-- Section Informations personnelles -->
    <div class="personal-info-section">
        <div class="personal-info-container">
            <div class="personal-photo">
            <img src="<?php echo get_template_directory_uri(); ?>/Pdp.webp" alt="Photo">
            </div>
            <div class="personal-details">
                <h1 class="personal-name">Vincent Barré</h1>
                <p class="personal-age">Âge : 20ans</p>
                <p class="personal-description">Je m'appelle Vincent Barré, j'ai 20 ans et je suis passionné par l'astronomie, le graphisme, les voyages et les jeux vidéo. Observer les étoiles et explorer les mystères de l'univers nourrit ma curiosité pour l'infini, tandis que le graphisme me permet d'exprimer ma créativité et d'expérimenter de nouvelles techniques. Les voyages m'offrent une ouverture sur d'autres cultures et la création de souvenirs uniques, et les jeux vidéo sont pour moi une véritable bulle de plaisir et de convivialité. Actuellement, je suis en deuxième année de BUT Métiers du Multimédia et de l'Internet (MMI), où je combine mes passions pour apprendre et créer.</p>
            </div>
        </div>
    </div>

    <!-- Section Passions -->
        <h2 class="section-title">Mes passions</h2>
        <div class="passions-container">
            <?php
            // Requête pour récupérer les passions
            $passions = new WP_Query(array(
                'post_type' => 'passions',
                'posts_per_page' => -1,
                'post_status' => 'publish',
            ));

            if ($passions->have_posts()) :
                while ($passions->have_posts()) : $passions->the_post();
                    $titre_passion = get_field('titre_passion');
                    $data_category = sanitize_title($titre_passion); // Convertir en slug-safe
            ?>
                    <div class="passion-card" data-category="<?php echo esc_attr($data_category); ?>">
                        <?php if ($logo_passion = get_field('logo_passion')) : ?>
                            <div class="passion-logo">
                                <img src="<?php echo esc_url($logo_passion['url']); ?>" alt="<?php echo esc_attr($logo_passion['alt']); ?>">
                            </div>
                        <?php endif; ?>
                        <h3 class="passion-title"><?php echo esc_html($titre_passion); ?></h3>
                        <p class="passion-description"><?php echo esc_html(get_field('description_passion')); ?></p>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Aucune passion trouvée.</p>';
            endif;
            ?>
        </div>
    </div>

    <!-- Section Illustrations -->
    <div class="illustrations-section">
        <h1 class="illustrations-title">Mes passions en images</h1>
        <div class="illustrations-gallery">
            <?php
            // Requête pour récupérer les illustrations
            $illustrations = new WP_Query(array(
                'post_type' => 'illustrations',
                'posts_per_page' => -1,
                'post_status' => 'publish',
            ));

            if ($illustrations->have_posts()) :
                while ($illustrations->have_posts()) : $illustrations->the_post();
                    $image = get_field('illustration_passion'); // Récupérer l'image
                    $legend = get_field('legende_passion'); // Récupérer la légende
                    $related_passions = get_field('passion_liees'); // Récupérer les passions liées
                    $categories = [];

                    // Construire les catégories pour `data-category`
                    if ($related_passions) {
                        foreach ($related_passions as $passion) {
                            $categories[] = sanitize_title($passion->post_title); // Utilise le titre de la passion
                        }
                    }
                    $categories_string = implode(' ', $categories); // Convertir en chaîne séparée par des espaces
            ?>
                    <div class="illustration-item" data-category="<?php echo esc_attr($categories_string); ?>">
                        <?php if ($image) : ?>
                            <div class="illustration-image-wrapper">
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                <div class="illustration-hover">
                                    <span class="illustration-legend"><?php echo esc_html($legend); ?></span>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>Aucune illustration trouvée.</p>';
            endif;
            ?>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const cards = document.querySelectorAll('.passion-card'); // Cartes des passions
    const illustrations = document.querySelectorAll('.illustration-item'); // Illustrations

    // Fonction pour afficher ou masquer les illustrations
    function filterIllustrations(category) {
        illustrations.forEach(item => {
            const itemCategories = item.getAttribute('data-category').split(' ');
            if (itemCategories.includes(category) || category === 'all') {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Ajoutez un événement de clic à chaque carte de passion
    cards.forEach(card => {
        card.addEventListener('click', function () {
            const category = this.getAttribute('data-category');
            filterIllustrations(category);

            // Mettre à jour les états actifs
            cards.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
        });
    });

    // Affiche toutes les illustrations au chargement
    filterIllustrations('all');
});
</script>

<?php
get_footer();
?>
