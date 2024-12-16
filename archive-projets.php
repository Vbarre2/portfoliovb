<?php
/*
Template Name: Archive Projets
*/

get_header();
?>

<section class="projects-intro">
    <h2 class="projects-title"><span class="highlight">Voici mes</span> PROJETS</h2>
    <p class="projects-description">
        À travers mes projets, j'exprime ma passion pour le graphisme et la création numérique. Chacun de mes travaux est une exploration unique de thématiques qui m'inspirent profondément, telles que le sport, la musique, et les jeux vidéo. Mon objectif est de repousser les limites de la créativité tout en apportant une approche technique et innovante à chaque réalisation.
    </p>
</section>

<?php
// Récupération du Top 3 pour le carrousel
$top_args = array(
    'post_type' => 'projets',
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'ASC'
);
$top_query = new WP_Query($top_args);

// Tableau pour stocker les ID des projets du Top 3
$top_project_ids = array();

if ($top_query->have_posts()) :
    echo '<section class="top-projects">';
    echo '<h2>Top 3 Projets</h2>';
    echo '<div class="carousel-container">'; // Container du carrousel
    echo '<div class="carousel-track">'; // Piste du carrousel

    while ($top_query->have_posts()) : $top_query->the_post();
        $top_project_ids[] = get_the_ID(); // Ajoute l'ID du projet dans le tableau
        $image = get_field('image_projet');
        $nom = get_field('nom_projet');
        $description = get_field('description_projet');
        $date_creation = get_field('date_creation');
        $link = get_permalink();
        ?>

        <div class="carousel-item">
            <a href="<?php echo esc_url($link); ?>" class="project-card">
                <?php if ($image) : ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                <?php endif; ?>
                <h3><?php echo esc_html($nom); ?></h3>
                <?php if ($date_creation) : ?>
                    <p><strong>Date de réalisation :</strong> <?php echo esc_html($date_creation); ?></p>
                <?php else : ?>
                    <p><strong>Date de réalisation :</strong> Non spécifiée</p>
                <?php endif; ?>
                <p><?php echo esc_html($description); ?></p>
            </a>
        </div>

    <?php endwhile;

    echo '</div>'; // Fin de la piste du carrousel
    echo '<button class="carousel-btn prev-btn">&#10094;</button>'; // Bouton précédent
    echo '<button class="carousel-btn next-btn">&#10095;</button>'; // Bouton suivant
    echo '</div>'; // Fin du container du carrousel
    echo '</section>';
    wp_reset_postdata();
endif;

// Récupération de tous les projets (y compris ceux du Top 3)
$all_args = array(
    'post_type' => 'projets',
    'posts_per_page' => -1, // Récupère tous les projets
    'orderby' => 'date',
    'order' => 'DESC'
);
$all_query = new WP_Query($all_args);

if ($all_query->have_posts()) :
    echo '<section class="all-projects">';
    echo '<h2>Tous mes Projets</h2>';

    // Boutons de filtre
    echo '<div class="filter-buttons">';
    echo '<button class="filter-btn" data-filter="all">Tous</button>';
    echo '<button class="filter-btn" data-filter="sport">Sport</button>';
    echo '<button class="filter-btn" data-filter="musique">Musique</button>';
    echo '<button class="filter-btn" data-filter="culture">Culture</button>';
    echo '<button class="filter-btn" data-filter="automobile">Automobile</button>';
    echo '</div>';

    echo '<div class="projects-list">'; // Conteneur pour la liste des projets
    while ($all_query->have_posts()) : $all_query->the_post();
        $image = get_field('image_projet');
        $nom = get_field('nom_projet');
        $description = get_field('description_projet');
        $date_creation = get_field('date_creation');
        $link = get_permalink();
        $categorie = get_field('categorie'); // Récupère la catégorie via ACF
        ?>

        <a href="<?php echo esc_url($link); ?>" class="project-card <?php echo esc_attr($categorie); ?>">
            <?php if ($image) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            <?php endif; ?>
            <h3><?php echo esc_html($nom); ?></h3>
            <?php if ($date_creation) : ?>
                <p><strong>Date de réalisation :</strong> <?php echo esc_html($date_creation); ?></p>
            <?php else : ?>
                <p><strong>Date de réalisation :</strong> Non spécifiée</p>
            <?php endif; ?>
            <p><?php echo esc_html($description); ?></p>
        </a>

    <?php endwhile;
    echo '</div>'; // Fin de projects-list
    echo '</section>';
    wp_reset_postdata();
endif;
?>

<script>
// Script pour le carrousel
document.addEventListener('DOMContentLoaded', function () {
    const track = document.querySelector('.carousel-track');
    const prevButton = document.querySelector('.prev-btn');
    const nextButton = document.querySelector('.next-btn');
    const items = document.querySelectorAll('.carousel-item');
    let currentIndex = 0;

    function moveToSlide(index) {
        const itemWidth = items[0].offsetWidth;
        const containerWidth = document.querySelector('.carousel-container').offsetWidth;
        const offset = (containerWidth / 2) - (itemWidth / 2) - (index * itemWidth);
        track.style.transform = `translateX(${offset}px)`;
    }

    nextButton.addEventListener('click', () => {
        currentIndex = (currentIndex < items.length - 1) ? currentIndex + 1 : 0;
        moveToSlide(currentIndex);
    });

    prevButton.addEventListener('click', () => {
        currentIndex = (currentIndex > 0) ? currentIndex - 1 : items.length - 1;
        moveToSlide(currentIndex);
    });

    window.addEventListener('resize', () => moveToSlide(currentIndex));
    moveToSlide(currentIndex);
});

// Script pour le filtrage des projets restants
document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const projectsList = document.querySelector('.projects-list'); // Cible uniquement la liste des autres projets
    const projects = projectsList.querySelectorAll('.project-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');

            projects.forEach(project => {
                if (filter === 'all' || project.classList.contains(filter)) {
                    project.style.display = 'block';
                } else {
                    project.style.display = 'none';
                }
            });

            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        });
    });
});
</script>

<?php
get_footer();
?>
