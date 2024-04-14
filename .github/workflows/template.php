<?php require_once('ExDataBase.php'); ?>
<?php require_once('template.func.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Streaming de Films</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000;
            color: #fff;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        header, footer {
            background-color: #000;
            color: #fff;
            padding: 10px 0;
        }

        header nav ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }

        header nav ul li {
            display: inline;
            margin-right: 20px;
        }

        header nav ul li a {
            color: #ffcc00;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
        }

        header nav ul li a.active {
            background-color: #ffcc00;
            color: #000;
        }

        .hero {
            background-color: #333;
            color: black;
            padding: 100px 0;
            text-align: center;
            position: relative;
            background-image: url(images/film1.jpg);
            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            color: #fff; / Couleur du texte */
            text-align: center;
        }
        
        .hero-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.6), rgba(0,0,0,0.9));
            z-index: -1;
        }

        .hero h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 18px;
            margin-bottom: 40px;
        }

        .btn {
            display: inline-block;
            background-color: #ffcc00;
            color: #000;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition background-color : 0.3s ease;
        }

        .btn:hover {
            background-color: #ffdd33;
        }

        .featured {
            background-color: #333;
            color: #fff;
            padding: 50px 0;
            text-align: center;
        }

        .genres {
            background-color: #333;
            color: #fff;
            padding: 50px 0;
            text-align: center;
        }

        .card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 20px;
}

.card {
    width: calc(33.33% - 20px);
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    position: relative;
    overflow: hidden;
    perspective: 1000px;
    transition: transform 0.5s ease-in-out;
}

.card img {
    width: 100%;
    height: auto;
    transition: transform 0.5s ease-in-out;
}

.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

.card-content {
    padding: 20px;
}

.card-content h3 {
    margin-top: 0;
    color: #333;
}

.card-content p {
    margin-bottom: 0;
    color: #666; / Couleur du texte */
}

.card:hover img {
    transform: scale(1.1);
}

.show-effect {
    opacity: 1;
    transform: translateY(0);
    transition: opacity 1s ease, transform 1s ease;
}

    </style>
</head>
<body>
<header>
    <div class="container">
        <h1>Streaming de Films</h1>
        <nav>
            <ul>
                <li><a href="#" class="active">Accueil</a></li>
                <li><a href="listeFilms">Liste de films</a></li>
                <li><a href="presentation.php">À propos</a></li>
                <li><a href="contacte.php">Contact</a></li>
            </ul>
        </nav>
</div>
</header>
<section class="hero">
    <div class="hero-overlay"></div>
    <div class="container">
        <h2>Découvrez les dernières nouveautés</h2>
        <p>Explorez notre vaste collection de films et séries disponibles en streaming.</p>
        <a href="listeFilms.php" class="btn">Commencer</a>
    </div>
</section>

<section class="featured">
    <div class="container">
        <h2>Films populaires</h2>
        <div class="card-container">
            <!-- Film 1 -->
            <div class="card">
                <img src="images/dark-k.jpg" alt="Film 1">
                <div class="card-content">
                    <h3>The Dark Knight</h3>
                    <p>Le Chevalier Noir','Dans ce nouveau volet, Batman augmente les mises dans sa guerre contre le crime. Avec l\'appui du lieutenant de police Jim Gordon et du procureur de Gotham, Harvey Dent, Batman vise à éradiquer le crime organisé qui pullule dans la ville. Leur association est très efficace mais elle sera bientôt bouleversée par le chaos déclenché par un criminel extraordinaire que les citoyens de Gotham connaissent sous le nom de Joker. ',
    2008</p>
                </div>
            </div>

            <!-- Film 2 -->
            <div class="card">
                <img src="images/interstellar.jpg" alt="Film 2">
                <div class="card-content">
                    <h3>Interstellar</h3>
                    <p>Le film raconte les aventures d'un groupe d'explorateurs qui utilisent une faille récemment découverte dans l'espace-temps afin de repousser les limites humaines et partir à la conquête des distances astronomiques dans un voyage interstellaire.',
    2014</p>
                </div>
            </div>

            <!-- Film 3 -->
            <div class="card">
                <img src="images/prestige.jpg" alt="Film 3">
                <div class="card-content">
                    <h3>Prestige</h3>
                    <p>Londres, au début du siècle dernier... Robert Angier et Alfred Borden sont deux magiciens surdoués, promis dès leur plus jeune âge à un glorieux avenir. Une compétition amicale les oppose d\'abord l\'un à l\'autre, mais l\'émulation tourne vite à la jalousie, puis à la haine. Devenus de farouches ennemis, les deux rivaux vont s\'efforcer de se détruire l\'un l\'autre en usant des plus noirs secrets de leur art. Cette obsession aura pour leur entourage des conséquences dramatiques...',
    2006</p>
                </div>
            </div>
        </div> <!-- .card-container -->
    </div> <!-- .container -->
</section>


<footer>
    <div class="container">
        <p>&copy; 2024 Streaming de Films. Tous droits réservés.</p>
    </div>
</footer>

</body>
</html>