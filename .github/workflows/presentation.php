<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #000;
    color: #fff;
}

.hero {
    background-color: #000;
    padding: 100px 0;
    text-align: center;
}

.hero-content {
    max-width: 800px;
    margin: 0 auto;
}

.hero h1 {
    font-size: 3rem;
    margin-bottom: 20px;
    color: #ffcc00;
}

.hero p {
    font-size: 1.2rem;
    margin-bottom: 30px;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: #ffcc00;
    color: #000;
    text-decoration: none;
    font-size: 1rem;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.btn:hover {
    background-color: #fff;
    color: #000;
    transform: translateY(-2px);
    box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
}

.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 50px 20px;
    margin: 10px;
}

.container h2 {
    font-size: 2rem;
    margin-bottom: 20px;
    color: #ffcc00;
}

.container p {
    font-size: 1.1rem;
    margin-bottom: 20px;
}

.footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #000;
    color: #fff;
    padding: 15px 0;
    text-align: center;
    z-index: 1000; /* Assurez-vous que le footer est au-dessus du contenu */
}

.presentation-footer {
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #000;
    color: #fff;
    padding: 2px 0;
    text-align: center;
    z-index: 300;
}

.presentation-footer a {
    color: #ffcc00; / Couleur pour les liens dans le footer */
}

    </style>
</head>
<body>

    <!-- Header -->
    <header class="hero">
        <div class="hero-content">
            <h1>Bienvenue sur notre site de films</h1>
            <p>Découvrez notre vaste sélection de films et plongez dans l'univers du cinéma.</p>
            <a href="template.php" class="btn">Retour à l'accueil</a>
        </div>
    </header>

    <!-- Main content -->
    <main class="container">
        <section>
            <h2>À propos de nous</h2>
            <p>Nous sommes une équipe passionnée de cinéma, dédiée à vous fournir une expérience unique en matière de divertissement cinématographique.</p>
        </section>
        <section>
            <h2>Notre sélection de films</h2>
            <p>Nous proposons une large gamme de films de différents genres, des classiques intemporels aux dernières sorties en salle.</p>
        </section>
        <section>
            <h2>Notre mission</h2>
            <p>Notre mission est de vous offrir une plateforme conviviale pour explorer, découvrir et apprécier les merveilles du cinéma.</p>
        </section>
        <section>
            <h2>Contactez-nous</h2>
            <p>Pour toute question, suggestion ou demande d'assistance, n'hésitez pas à nous contacter à l'adresse e-mail suivante : contact@monsitecinema.com</p>
        </section>
    </main>

    <!-- Footer -->
    <footer class="presentation-footer">
    <div class="container">
        <p>&copy; 2024 - Tous droits réservés</p>
    </div>
    </footer>

</body>
</html>

