<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connexion à la base de données
    require_once('ExDataBase.php');

    // Ajouter l'utilisateur à la base de données
    $user_added = ExDataBase::addUser($username, $email, $password);

    if ($user_added) {
        echo "Inscription réussie. Vous pouvez vous connecter maintenant.";
    } else {
        echo "Erreur lors de l'inscription. Veuillez réessayer.";
    }
}
?>