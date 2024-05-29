<?php
require_once 'modele/dao/ArticleDao.php';
require_once 'modele/dao/CategorieDao.php';

class Controleur {
    private $articleDao;
    private $categorieDao;

    public function __construct() {
        $this->articleDao = new ArticleDao();
        $this->categorieDao = new CategorieDao();
    }

    public function afficherCategories() {
        return $this->categorieDao->getList();
    }

    public function afficherArticles($categorie = null) {
        if ($categorie === 'accueil' || $categorie === null) {
            // Si la catégorie est 'accueil' ou si aucune catégorie n'est spécifiée, afficher tous les articles
            return $this->articleDao->getList();
        } else {
            // Sinon, afficher les articles de la catégorie spécifiée
            $categoryId = $this->categorieDao->getCategoryIdByLibelle($categorie);
            if ($categoryId !== null) {
                return $this->articleDao->getArticlesByCategory($categoryId);
            } else {
                // Si la catégorie n'existe pas, retourner une liste vide
                return [];
                
                
                
            }
        }
    }
}
?>
