<?php
function afficherListe($liste){
    foreach ($liste as $film) {
        echo "<div>";
        echo "<h2>{$film['titre']}</h2>";
        echo "<p><strong>Resume:</strong> {$film['resume']}</p>";
        echo "<p><strong>Date:</strong> {$film['date']}</p>";
        echo "<p><strong>Realisateur:</strong> {$film['real']}</p>";
        echo "<p><strong>Acteurs:</strong> {$film['acteur']}</p>";
        echo "<p><strong>Genre:</strong> {$film['genre']}</p>";
        echo "<p><strong>Duree:</strong> {$film['duree']} min</p>";
        echo "<img src='{$film['image']}' alt='Affiche du film {$film['titre']}'>";
        echo "</div>";
    }
}
?>