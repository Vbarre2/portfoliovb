<?php
get_header();
?>

<main class="single-projets-aca">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="projet-detail">

            <!-- Titre du projet académique -->
            <h1><?php the_field('titre_academique'); ?></h1>

            <!-- Date du projet académique -->
            <?php if (get_field('date_academique')) : ?>
                <p class="projet-date">Date du projet : <?php the_field('date_academique'); ?></p>
            <?php endif; ?>

            <!-- Images du projet académique -->
            <div class="projet-images">
                <?php
                $image1 = get_field('image_academique');
                $image2 = get_field('image_academique2');
                $image3 = get_field('image_academique3');

                if ($image1) : ?>
                    <img src="<?php echo esc_url($image1['url']); ?>" alt="<?php echo esc_attr($image1['alt']); ?>" />
                <?php endif; ?>

                <?php if ($image2) : ?>
                    <img src="<?php echo esc_url($image2['url']); ?>" alt="<?php echo esc_attr($image2['alt']); ?>" />
                <?php endif; ?>

                <?php if ($image3) : ?>
                    <img src="<?php echo esc_url($image3['url']); ?>" alt="<?php echo esc_attr($image3['alt']); ?>" />
                <?php endif; ?>
            </div>

            <!-- Description du projet académique -->
            <?php if (get_field('description_academique')) : ?>
                <div class="projet-description">
                    <h3>Description :</h3>
                    <p><?php the_field('description_academique'); ?></p>
                </div>
            <?php endif; ?>

            <!-- Applications utilisées dans le projet académique -->
            <div class="projet-applications">
                <h3>Applications utilisées :</h3>
                <ul>
                    <?php
                    $app1 = get_field('application_academique');
                    $name1 = get_field('nom_application_academique'); // Nom associé à l'application 1
                    $app2 = get_field('application_academique2');
                    $name2 = get_field('nom_application_academique2'); // Nom associé à l'application 2
                    $app3 = get_field('application_academique3');
                    $name3 = get_field('nom_application_academique3'); // Nom associé à l'application 3

                    if ($app1) : ?>
                        <li>
                            <div class="app-logo" data-title="<?php echo esc_attr($name1); ?>">
                                <img src="<?php echo esc_url($app1['url']); ?>" alt="<?php echo esc_attr($app1['alt']); ?>" />
                            </div>
                        </li>
                    <?php endif; ?>

                    <?php if ($app2) : ?>
                        <li>
                            <div class="app-logo" data-title="<?php echo esc_attr($name2); ?>">
                                <img src="<?php echo esc_url($app2['url']); ?>" alt="<?php echo esc_attr($app2['alt']); ?>" />
                            </div>
                        </li>
                    <?php endif; ?>

                    <?php if ($app3) : ?>
                        <li>
                            <div class="app-logo" data-title="<?php echo esc_attr($name3); ?>">
                                <img src="<?php echo esc_url($app3['url']); ?>" alt="<?php echo esc_attr($app3['alt']); ?>" />
                            </div>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>

            <!-- Lien vers le projet académique -->
            <?php if (get_field('lien_academique')) : ?>
                <div class="projet-lien">
                    <a href="https://jobbike.vbarre.fr" target="_blank" class="btn-lien">Voir le projet</a>
                </div>
            <?php endif; ?>

            <!-- Contexte du projet académique -->
            <?php if (get_field('contexte_projet')) : ?>
                <div class="projet-contexte">
                    <h3>Contexte du projet :</h3>
                    <p><?php the_field('contexte_projet'); ?></p>
                </div>
            <?php endif; ?>

        </article>
    <?php endwhile; else : ?>
        <p>Aucun projet académique trouvé.</p>
    <?php endif; ?>
</main>

<?php
get_footer();
?>
