<?php
class ConnexionManager {
    private static $connexion;

    // Méthode pour obtenir la connexion à la base de données
    public static function getConnexion() {
        // Si la connexion n'est pas encore établie
        if (self::$connexion == null) {
            // Informations de connexion à la base de données
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "mglsi_news";

            try {
                // Créer une nouvelle connexion PDO
                self::$connexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                
                // Configurer PDO pour lancer des exceptions en cas d'erreurs
                self::$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
            } catch(PDOException $e) {
                // En cas d'erreur de connexion, afficher le message d'erreur et arrêter le script
                die("Connexion échouée: " . $e->getMessage());
            }
        }

        // Retourner la connexion PDO
        return self::$connexion;
    }
}
?>
