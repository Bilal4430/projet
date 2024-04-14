<?php
session_start();

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connexion à la base de données
    require_once('ExDataBase.php');

    // Vérifier les informations d'identification de l'utilisateur
    $user = ExDataBase::getUserByUsername($username);

    if ($user && password_verify($password, $user['password'])) {
        // Authentification réussie, enregistrer l'utilisateur dans la session
        $_SESSION['user'] = $user;
        header('Location: dashboard.php'); // Rediriger vers la page du tableau de bord après connexion réussie
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>