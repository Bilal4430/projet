<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nous Contacter</title>
    <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #111;
            color: #ffcc00;
            padding: 20px;
            text-align: center;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #ffcc00;
            text-decoration: none;
        }

        nav ul li a:hover {
            color: #fff;
        }

        main {
            padding: 20px;
        }

        section {
            margin-bottom: 40px;
        }

        h2 {
            color: #ffcc00;
        }

        .highlight {
            color: #ffcc00;
            font-weight: bold;
        }

        form {
            max-width: 400px;
            margin: auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #ffcc00;
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #222;
            color: #fff;
        }

        textarea {
            height: 100px;
        }
.btn {
            background-color: #ffcc00;
            color: #111;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #ffc400;
        }
    </style>
</head>
<body>
    <header>
        <h1>Nous Contacter</h1>
        <nav>
            <ul>
                <li><a href="template.php">Accueil</a></li>
                <li><a href="listeFilms.php">Films</a></li>
                <li><a href="presentation.php">Présentation</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="contact-info">
            <h2>Informations de contact</h2>
            <div class="contact-method">
                <h3>Par Téléphone</h3>
                <p>Numéro de téléphone : <span class="highlight">+32 123 456 789</span></p>
            </div>
            <div class="contact-method">
                <h3>Par Email</h3>
                <p>Email : <span class="highlight">contactMovie@gmail.com</span></p>
            </div>
        </section>
        <section id="contact-form">
            <h2>Contactez-nous</h2>
            <form action="process_contact.php" method="post">
                <div class="form-group">
                    <label for="name">Nom:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn">Envoyer</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Votre Entreprise. Tous droits réservés.</p>
    </footer>
</body>
</html>