<?php
/*
Template Name: Compétences
*/

get_header();
?>

<div class="soft-skills-section">
    <h2 class="soft-skills-title">SOFT SKILLS</h2>
    <div class="skill-card-container">
        <!-- Card 1 -->
        <div class="skill-card">
            <div class="skill-card-header rigoureux">
                <h3>Rigoureux</h3>
                <div class="skill-icon"></div>
            </div>
            <div class="skill-card-body">
                <p>
                    Il faut être attentif aux détails pour que le rendu final soit propre et sans erreurs. Cela permet de livrer un travail de qualité.
                </p>
            </div>
        </div>
        <!-- Card 2 -->
        <div class="skill-card">
            <div class="skill-card-header creatif">
                <h3>Créatif</h3>
                <div class="skill-icon"></div>
            </div>
            <div class="skill-card-body">
                <p>
                    La créativité est essentielle pour imaginer des designs originaux et marquants. C'est ce qui fait que ton travail se démarque et attire l'attention.
                </p>
            </div>
        </div>
        <!-- Card 3 -->
        <div class="skill-card">
            <div class="skill-card-header organise">
                <h3>Organisé</h3>
                <div class="skill-icon"></div>
            </div>
            <div class="skill-card-body">
                <p>
                    En étant bien organisé, je peux gérer plusieurs projets en même temps tout en respectant les délais.
                </p>
            </div>
        </div>
        <!-- Card 4 -->
        <div class="skill-card">
            <div class="skill-card-header polyvalence">
                <h3>Polyvalence</h3>
                <div class="skill-icon"></div>
            </div>
            <div class="skill-card-body">
                <p>
                    Savoir utiliser plusieurs logiciels et être capable de travailler sur différents types de projets (comme des logos, des affiches, des sites web).
                </p>
            </div>
        </div>
    </div>
</div>

<div class="hard-skills-section">
    <h2 class="hard-skills-title">HARD SKILLS</h2>
    <div class="hard-skills-container">
        <?php
        // Requête pour récupérer les Hard Skills
        $hard_skills = new WP_Query(array(
            'post_type' => 'hard-skills',
            'posts_per_page' => -1, // Récupérer toutes les compétences
        ));

        if ($hard_skills->have_posts()) :
            while ($hard_skills->have_posts()) : $hard_skills->the_post();
                // Récupérer les champs personnalisés
                $nom_competence = get_field('nom_competence');
                $img_skill = get_field('img_skill'); // Récupération du logo
                if ($nom_competence) :
        ?>
                    <div class="hard-skill">
                        <?php if ($img_skill) : ?>
                            <div class="hard-skill-icon">
                                <img src="<?php echo esc_url($img_skill['url']); ?>" alt="<?php echo esc_attr($img_skill['alt']); ?>">
                            </div>
                        <?php endif; ?>
                        <p class="hard-skill-name"><?php echo esc_html($nom_competence); ?></p>
                    </div>
        <?php
                endif;
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Aucune compétence trouvée.</p>';
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
?>
