<?php
require_once 'ConnexionManager.php';
require_once 'modele/domaine/Article.php';

class ArticleDao {
    private $conn;

    public function __construct() {
        $this->conn = ConnexionManager::getConnexion();
    }

    // Récupère la liste des articles
    public function getList() {
        $sql = "SELECT id, titre, contenu, categorie FROM Article";
        $stmt = $this->conn->query($sql);
        $articles = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($row['id'], $row['titre'], $row['contenu'], $row['categorie']);
        }
        return $articles;
    }

    // Récupère la liste des articles en fonction de la catégorie spécifiée
    public function getArticlesByCategory($categoryId) {
        $sql = "SELECT id, titre, contenu, categorie FROM Article WHERE categorie = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$categoryId]);
        $articles = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $articles[] = new Article($row['id'], $row['titre'], $row['contenu'], $row['categorie']);
        }
        return $articles;
    }

    // Récupère un article spécifique par son identifiant
    public function getArticleById($id) {
        $sql = "SELECT id, titre, contenu, categorie FROM Article WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Article($row['id'], $row['titre'], $row['contenu'], $row['categorie']);
        }
        return null;
    }
}
?>
