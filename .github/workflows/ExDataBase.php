<?php
class ExDataBase {
    public static function connect(){
        $dbh = new PDO(
            "mysql:dbname=mediatheque;host=localhost;port=3306",
            "root",
            "",
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            )
        );
        return $dbh;
    }

    public static function getListe($films_par_page, $offset) {
        $dbh = self::connect();
        $sql = "SELECT films_titre as 'titre', films_resume as 'resume', films_annee as 'date', films_affiche as 'image', films_duree as 'duree', group_concat(distinct acteurs_nom) as 'acteur', real_nom as 'real', group_concat(distinct genres_nom) as 'genre', films_id as 'id'
                FROM films
                LEFT JOIN films_acteurs ON films_id=fa_films_id
                LEFT JOIN films_genres ON films_id=fg_films_id
                LEFT JOIN genres ON fg_genres_id=genres_id
                LEFT JOIN acteurs ON fa_acteurs_id=acteurs_id
                LEFT JOIN realisateurs ON films_real_id=real_id
                GROUP BY films_titre, films_affiche, films_duree
                LIMIT :offset, :limit";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $films_par_page, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $tab = $stmt->fetchAll();
        return $tab;
    }

    public static function countFilms(){
        $dbh = self::connect();
        $sql = "SELECT COUNT(*) as total_films FROM films";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(); 
        $count = $stmt->fetchColumn(); 
        return $count;
    }    
    
    public static function getFilmsPopulaires() {
        // Connexion à la base de données et récupération des films populaires
        $connexion = self::connect();
    
        // Sélection de trois films au hasard
        $query = $connexion->query('SELECT films_titre as titre, films_resume as resume FROM films ORDER BY RAND() LIMIT 3');
        $films_populaires = $query->fetchAll(PDO::FETCH_ASSOC);
    
        // Retourner les films populaires
        return $films_populaires;
    }

    public static function searchFilms($term, $limit, $offset) {
        $term = "%$term%"; // Ajoute les caractères de joker pour la recherche partielle
        try {
            $dbh = self::connect(); // Connexion à la base de données
    
            // Préparation de la requête SQL
            $query = "
                SELECT films_titre as 'titre',films_resume as 'resume',films_annee as 'date',films_affiche as 'image',films_duree as 'duree',
                    group_concat(distinct acteurs_nom) as 'acteur',real_nom as 'real',group_concat(distinct genres_nom) as 'genre', films_id as 'id'
                FROM films
                LEFT JOIN films_acteurs ON films_id=fa_films_id
                LEFT JOIN films_genres ON films_id=fg_films_id
                LEFT JOIN genres ON fg_genres_id=genres_id
                LEFT JOIN acteurs ON fa_acteurs_id=acteurs_id
                LEFT JOIN realisateurs ON films_real_id=real_id
                WHERE films_titre LIKE :term 
                OR real_nom LIKE :term 
                OR acteurs_nom LIKE :term 
                OR genres_nom LIKE :term 
                GROUP BY films_titre, films_affiche, films_duree
                LIMIT :limit OFFSET :offset
            ";
    
            // Préparation de la requête
            $stmt = $dbh->prepare($query);
    
            // Liaison des valeurs
            $stmt->bindValue(':term', $term, PDO::PARAM_STR);
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    
            // Exécution de la requête
            $stmt->execute();
    
            // Récupération des résultats
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            // Fermeture de la connexion
            $dbh = null;
    
            // Retourne les résultats
            return $results;
        } catch (PDOException $e) {
            // Gestion des erreurs de connexion
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
            die();
        }
    }

    public static function countSearchFilms($search_term) {
    $dbh = self::connect();
    $search_term = '%' . $search_term . '%'; // Ajouter des jokers pour correspondre à n'importe quelle partie du titre
    $sql = "SELECT COUNT(*) as total_films FROM films WHERE films_titre LIKE :search_term";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':search_term', $search_term, PDO::PARAM_STR);
    $stmt->execute(); 
    $count = $stmt->fetchColumn(); 
    return $count;
}
}
?>
