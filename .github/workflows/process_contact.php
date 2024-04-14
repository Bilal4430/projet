<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Adresse email où vous souhaitez recevoir les messages de contact
    $to = "votreadresseemail@example.com";

    // Sujet du message
    $subject = "Nouveau message de contact";

    // Corps du message
    $body = "Nom: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    // En-têtes du message
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoyer l'email
    if (mail($to, $subject, $body, $headers)) {
        echo "Votre message a bien été envoyé. Nous vous contacterons bientôt.";
    } else {
        echo "Une erreur s'est produite lors de l'envoi du message. Veuillez réessayer plus tard.";
    }
} else {
    // Si la méthode de requête n'est pas POST, renvoyer une erreur 405 Method Not Allowed
    http_response_code(405);
    echo "La méthode de requête n'est pas autorisée.";
}
?>
