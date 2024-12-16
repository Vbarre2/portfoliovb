<?php
/*
Template Name: Archive Projets Académiques
*/

get_header();
?>

<section class="projects-intro">
    <h2 class="projects-title"><span class="highlight">Voici mes</span> PROJETS ACADÉMIQUES</h2>
    <p class="projects-description">
        Découvrez mes projets académiques réalisés dans le cadre de mes études, où j'ai exploré diverses thématiques en Design, Développement Web, et Communication. Chaque projet est une illustration de mon apprentissage et de ma créativité.
    </p>
</section>

<?php
// Récupération des projets académiques
$args = array(
    'post_type' => 'projets-academique',
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC'
);
$query = new WP_Query($args);

if ($query->have_posts()) :
    echo '<section class="academic-projects">';

    // Boutons de filtre
    echo '<div class="academic-filters">';
    echo '<button class="academic-filter-btn active" data-filter="all">Tous</button>';
    echo '<button class="academic-filter-btn" data-filter="design">Design</button>';
    echo '<button class="academic-filter-btn" data-filter="dev">Développement Web</button>';
    echo '<button class="academic-filter-btn" data-filter="com">Communication</button>';
    echo '</div>';

    echo '<div class="academic-project-list">'; // Liste des projets
    while ($query->have_posts()) : $query->the_post();
        $image = get_field('image_projet');
        $nom = get_field('nom_projet');
        $description = get_field('description_projet');
        $categorie = get_field('categorie_projet'); // Récupération de la catégorie ACF
        $link = get_permalink();

        // Vérifiez que la catégorie est bien définie
        $categorie_class = $categorie ? esc_attr($categorie) : 'uncategorized';
        ?>

        <!-- Projet avec une classe correspondant à sa catégorie -->
        <a href="<?php echo esc_url($link); ?>" class="academic-project-card <?php echo $categorie_class; ?>">
            <?php if ($image) : ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            <?php endif; ?>
            <h3 class="academic-project-title"><?php echo esc_html($nom); ?></h3>
            <p class="academic-project-description"><?php echo esc_html($description); ?></p>
        </a>

    <?php endwhile;
    echo '</div>'; // Fin de academic-project-list
    echo '</section>';
    wp_reset_postdata();
else :
    echo '<p class="no-projects">Aucun projet académique trouvé.</p>';
endif;
?>

<script>
// Script pour le filtrage des projets
document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.academic-filter-btn');
    const projects = document.querySelectorAll('.academic-project-card');

    // Affiche tous les projets au chargement
    projects.forEach(project => {
        project.style.display = 'block';
    });

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');

            projects.forEach(project => {
                if (filter === 'all' || project.classList.contains(filter)) {
                    project.style.display = 'block'; // Affiche les projets correspondant
                } else {
                    project.style.display = 'none'; // Masque les autres projets
                }
            });

            // Gestion de la classe "active"
            filterButtons.forEach(btn => btn.classList.remove('active'));
            button.classList.add('active');
        });
    });
});
</script>

<?php
get_footer();
?>
