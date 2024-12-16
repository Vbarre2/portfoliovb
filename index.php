<?php
get_header();
?>

<div class="text-container">
    <h2 class="subtitle">Bienvenue sur le portfolio de</h2>
    <h1 class="title-vincent-barre">Vincent Barré</h1>
    <p class="description">
        Passionné par la création visuelle sous toutes ses formes, je me consacre à l'exploration de projets inspirés par mes centres d'intérêt : le sport, la musique, et les jeux vidéo. Mon univers créatif reflète ma volonté d'innover et de produire des réalisations graphiques de qualité. Actuellement en deuxième année des Métiers du Multimédia et de l'Internet (MMI), j'affine mes compétences dans le graphisme et le multimédia.
    </p>
</div>

<div class="scroll-indicator">
    <span>Scroll</span>
    <div class="mouse">
        <div class="wheel"></div>
    </div>
</div>


<section class="themes-section">
    <h2 class="section-title">THÈMES</h2>
    <div class="themes-container">
        <!-- Carte Thème: Projets -->
        <div class="theme-card">
            <a href="<?php echo home_url('/mes-projets'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/Reprise2024-25.webp" alt="Projets">
                <div class="theme-overlay">
                    <span>PROJETS</span>
                </div>
            </a>
        </div>
        <!-- Carte Thème: Académie -->
        <div class="theme-card">
            <a href="<?php echo home_url('/mes-projets-academique'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/Scolaire.webp" alt="Académie">
                <div class="theme-overlay">
                    <span>ACADÉMIE</span>
                </div>
            </a>
        </div>
        <!-- Carte Thème: Compétences & Logiciels -->
        <div class="theme-card">
            <a href="<?php echo home_url('/competences-logiciels'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/Logiciels.webp" alt="Compétences & Logiciels">
                <div class="theme-overlay">
                    <span>COMPÉTENCES & LOGICIELS</span>
                </div>
            </a>
        </div>
        <!-- Carte Thème: À Propos -->
        <div class="theme-card">
            <a href="<?php echo home_url('/a-propos'); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/Pdp.webp" alt="À Propos">
                <div class="theme-overlay">
                    <span>À PROPOS</span>
                </div>
            </a>
        </div>
    </div>
</section>


<section class="skills-section">
    <h2 class="skills-title">COMPÉTENCES <span class="skills-highlight">ET LOGICIELS</span></h2>
    <div class="skills-container">
        <div class="skill-card">
            <div class="skill-icon">✔</div>
            <div>
                <h3>Rigoureux</h3>
                <p>Il faut être attentif aux détails pour que le rendu final soit propre et sans erreurs. Cela permet de livrer un travail de qualité.</p>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon">✔</div>
            <div>
                <h3>Créatif</h3>
                <p>La créativité est essentielle pour imaginer des designs originaux et marquants. C'est ce qui fait que ton travail se démarque et attire l'attention.</p>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon">✔</div>
            <div>
                <h3>Organisé</h3>
                <p>En étant bien organisé, je peux gérer plusieurs projets en même temps tout en respectant les délais.</p>
            </div>
        </div>
        <div class="skill-card">
            <div class="skill-icon">✔</div>
            <div>
                <h3>Polyvalence</h3>
                <p>Savoir utiliser plusieurs logiciels et être capable de travailler sur différents types de projets (comme des logos, des affiches, des sites web).</p>
            </div>
        </div>
    </div>
</section>

<section class="software-section">
    <div class="software-container">
        <!-- Carte Logiciel: Photoshop -->
        <div class="software-card">
            <img src="<?php echo get_template_directory_uri(); ?>/Ps.png" alt="Photoshop">
            <div class="app-name">Photoshop</div>
        </div>
        <!-- Carte Logiciel: Illustrator -->
        <div class="software-card">
            <img src="<?php echo get_template_directory_uri(); ?>/Illu.png" alt="Illustrator">
            <div class="app-name">Illustrator</div>
        </div>
        <!-- Carte Logiciel: Figma -->
        <div class="software-card">
            <img src="<?php echo get_template_directory_uri(); ?>/figma.png" alt="Figma">
            <div class="app-name">Figma</div>
        </div>
        <!-- Carte Logiciel: DaVinci Resolve -->
        <div class="software-card">
            <img src="<?php echo get_template_directory_uri(); ?>/Davinci.png" alt="DaVinci Resolve">
            <div class="app-name">DaVinci Resolve</div>
        </div>
    </div>
    <a href="competences" class="see-more-button">Voir la suite →</a>

    <section class="about-section">
    <h2 class="about-title">À PROPOS</h2>
    <p class="about-description">
        Bienvenue sur mon portfolio ! Passionné par le graphisme, je réalise des visuels principalement inspirés par le sport, notamment le football. Vous y trouverez aussi des créations sur des thèmes comme la musique, les voitures, et l'esport, ainsi que mes projets académiques. En deuxième année de MMI, j'affine mes compétences tout en développant mon univers créatif.
    </p>
    <a href="a-propos" class="about-button">En savoir plus →</a>
</section>

<section class="contact-area">
    <h2 class="contact-header">CONTACT</h2>
    <div class="contact-icons">
        <a href="https://www.instagram.com/vinz.graphics/" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.linkedin.com/in/vincent-barré-745a23299/" target="_blank"><i class="fab fa-linkedin"></i></a>
        <a href="https://fr.pinterest.com/Vinzgraphics/" target="_blank"><i class="fab fa-pinterest"></i></a>
        <a href="https://www.behance.net/vincentbarr1#" target="_blank"><i class="fab fa-behance"></i></a>
        <a href="https://www.tiktok.com/@vinz.graphics" target="_blank"><i class="fab fa-tiktok"></i></a>
    </div>
    <a href="contact" class="contact-message-button">Envoyer un message →</a>
</section>


</section>


<?php
get_footer();
?>
