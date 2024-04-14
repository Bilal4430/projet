<?php
// Inclure la classe ExDataBase et les fonctions de template
require_once('ExDataBase.php');
require_once('template.func.php');

// Définir les paramètres de pagination
$films_par_page = 10;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $films_par_page;

// Récupérer le terme de recherche
$term = isset($_GET['search']) ? $_GET['search'] : '';

// Récupérer la liste des films pour la page actuelle en fonction du terme de recherche
if (!empty($term)) {
    $films = ExDataBase::searchFilms($term, $films_par_page, $offset);
    $total_films = ExDataBase::countSearchFilms($term);
} else {
    $films = ExDataBase::getListe($films_par_page, $offset);
    $total_films = ExDataBase::countFilms();
}

// Calculer le nombre total de pages
$total_pages = ceil($total_films / $films_par_page);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des films</title>
    <style>
        /* Ajoutez vos styles CSS ici */
        body {
            font-family: Arial, sans-serif;
            background-color: #111;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }
        .card {
            width: 300px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background-color: #222;
            color: #fff;
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.1);
        }

        nav {
            background-color: #000;
            padding: 20px;
            text-align: center;
        }

        nav a {
            color: #ffcc00;
            text-decoration: none;
            margin: 0 10px;
        }

        nav a:hover {
            color: #fff;
        }
        .movie-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .movie-info {
            padding: 20px;
        }
        .movie-info h2 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        .movie-info p {
            margin-bottom: 10px;
        }
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 5px;
            border: 1px solid #ffcc00;
            border-radius: 3px;
            text-decoration: none;
            color: #ffcc00;
        }
        .pagination a.active {
            background-color: #ffcc00;
            color: #000;
        }

        .search-form{
            text-align: center;
        }
    </style>
</head>
<body>

    <nav>
        <a href="template.php">Accueil</a>
        <a href="presentation.php">À propos</a>
        <a href="contacte.php">Nous contacter</a>
        <a href="Connection">Connexion</a>
        <a href="Inscription">Inscription</a>
    </nav>

    <!-- Formulaire de recherche -->
    <div class="search-form">
        <form action="" method="GET">
            <input type="text" name="search" class="search-input" placeholder="Rechercher...">
            <button type="submit" class="search-button">Rechercher</button>
        </form>
    </div>

    <div class="container">
    <?php 
        foreach ($films as $film) {
            echo '<div class="card">';
            if(isset($film['image']) && isset($film['titre']) && isset($film['resume']) && isset($film['real']) && isset($film['acteur']) && isset($film['genre'])) {
                echo '<img src="images/' . $film['image'] . '" alt="' . $film['titre'] . '" class="movie-img">';
                echo '<div class="movie-info">';
                echo '<h2>' . $film['titre'] . '</h2>';
                echo '<p>' . $film['resume'] . '</p>';
                echo '<p><strong>Réalisateur:</strong> ' . $film['real'] . '</p>';
                echo '<p><strong>Acteurs:</strong> ' . $film['acteur'] . '</p>';
                echo '<p><strong>Genres:</strong> ' . $film['genre'] . '</p>';
                echo '</div>';
            } else {
                echo '<p>Certaines informations sur ce film sont manquantes.</p>';
            }
            echo '</div>';
        }
    ?>
</div>

    <!-- Afficher les liens de pagination -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
            <a href="?page=<?php echo $i; ?>" <?php if ($i == $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>
