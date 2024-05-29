<?php
require_once 'ConnexionManager.php';
require_once 'modele/domaine/Categorie.php';

class CategorieDao {
    private $conn;

    public function __construct() {
        $this->conn = ConnexionManager::getConnexion();
    }

    // Récupère la liste complète des catégories
    public function getList() {
        $sql = "SELECT id, libelle FROM Categorie";
        $stmt = $this->conn->query($sql);
        $categories = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categories[] = new Categorie($row['id'], $row['libelle']);
        }
        return $categories;
    }

    // Récupère une catégorie spécifique par son identifiant
    public function getById($id) {
        $sql = "SELECT id, libelle FROM Categorie WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return new Categorie($row['id'], $row['libelle']);
        }
        return null;
    }
    
    // Récupère l'ID de la catégorie par son libellé
    public function getCategoryIdByLibelle($libelle) {
        $sql = "SELECT id FROM Categorie WHERE libelle = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$libelle]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row['id'] ?? null;
    }
}
?>
