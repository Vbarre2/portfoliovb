<?php
/* Template Name: Contact Page */
get_header(); 
?>

<main class="custom-contact">
    <div class="custom-contact-container">
        <?php
        // Requête pour récupérer les informations du CPT 'contact'
        $args = array(
            'post_type' => 'contact',
            'posts_per_page' => 1, // On suppose qu'une seule entrée existe
        );

        $contact_query = new WP_Query($args);

        if ($contact_query->have_posts()) :
            while ($contact_query->have_posts()) : $contact_query->the_post();
                // Récupération des champs ACF
                $telephone = get_field('telephone');
                $adresse_mail = get_field('adresse_mail');
                $adresse = get_field('adresse');
                $photo = get_field('photo');
        ?>
                <div class="custom-contact-details">
                    <h2 class="custom-contact-title">Informations de Contact</h2>
                    <?php if ($photo): ?>
                        <img src="<?php echo esc_url($photo['url']); ?>" alt="<?php echo esc_attr($photo['alt']); ?>" class="custom-contact-image">
                    <?php endif; ?>
                    <p><strong>Numéro de téléphone :</strong> <a href="tel:<?php echo esc_html($telephone); ?>"><?php echo esc_html($telephone); ?></a></p>
                    <p><strong>Adresse E-mail :</strong> <a href="mailto:<?php echo esc_html($adresse_mail); ?>"><?php echo esc_html($adresse_mail); ?></a></p>
                    <p><strong>Adresse Postale :</strong> <?php echo esc_html($adresse); ?></p>
                </div>

                <!-- Formulaire de contact -->
                <div class="custom-contact-form">
                    <h3 class="custom-form-title">Envoyez un message</h3>
                    <form action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
                        <label for="name">Votre nom :</label>
                        <input type="text" id="name" name="name" placeholder="Entrez votre nom" required>
                        
                        <label for="email">Votre email :</label>
                        <input type="email" id="email" name="email" placeholder="Entrez votre email" required>
                        
                        <label for="message">Votre message :</label>
                        <textarea id="message" name="message" placeholder="Entrez votre message" rows="5" required></textarea>
                        
                        <input type="hidden" name="action" value="send_contact_form">
                        <button type="submit">Envoyer</button>
                    </form>
                </div>

                <!-- Carte Google Maps -->
                <div class="custom-contact-map">
                    <h3 class="custom-map-title">Ma Localisation</h3>
                    <iframe
                        src="https://www.google.com/maps?q=47.49712191135238,6.853119781762566&z=15&output=embed"
                        width="100%"
                        height="400"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>

        <?php
            endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Aucune information de contact disponible.</p>';
        endif;
        ?>

        <!-- Icônes des réseaux sociaux -->
    <h2 class="contact-header">CONTACT</h2>
    <div class="contact-icons">
        <a href="https://www.instagram.com/vinz.graphics/" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://www.linkedin.com/in/vincent-barré-745a23299/" target="_blank"><i class="fab fa-linkedin"></i></a>
        <a href="https://fr.pinterest.com/Vinzgraphics/" target="_blank"><i class="fab fa-pinterest"></i></a>
        <a href="https://www.behance.net/vincentbarr1#" target="_blank"><i class="fab fa-behance"></i></a>
        <a href="https://www.tiktok.com/@vinz.graphics" target="_blank"><i class="fab fa-tiktok"></i></a>
    </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
