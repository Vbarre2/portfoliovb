<?php 
function register_my_menu(){
    register_nav_menus( array(
        'header-menu' => __( 'Menu De Tete'),
        'footer-menu'  => __( 'Menu De Pied'),
    ) );
}
add_action( 'init', 'register_my_menu', 0 );

function handle_contact_form_submission() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = sanitize_text_field($_POST['name']);
        $email = sanitize_email($_POST['email']);
        $message = sanitize_textarea_field($_POST['message']);

        // Email de destination
        $to = get_option('admin_email'); // Change si tu veux un email spécifique
        $subject = "Nouveau message de $name via le formulaire de contact";
        $body = "Nom : $name\nEmail : $email\nMessage :\n$message";
        $headers = array('Content-Type: text/plain; charset=UTF-8');

        if (wp_mail($to, $subject, $body, $headers)) {
            wp_redirect(home_url('/contact/?success=1')); // Redirection après succès
            exit;
        } else {
            wp_redirect(home_url('/contact/?error=1')); // Redirection après échec
            exit;
        }
    }
}
add_action('admin_post_nopriv_send_contact_form', 'handle_contact_form_submission');
add_action('admin_post_send_contact_form', 'handle_contact_form_submission');
