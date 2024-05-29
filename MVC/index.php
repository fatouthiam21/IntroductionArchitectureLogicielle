<?php
// Inclut le fichier 'Controleur.php' qui contient la définition de la classe Controleur
require_once 'controleur/Controleur.php';

// Crée une instance du contrôleur
$controleur = new Controleur();

//Vérifie si une catégorie est spécifiée dans l'URL (paramètre GET 'categorie'), si oui, assigne la valeur à la variable $categorie, sinon assigne null
$categorie = isset($_GET['categorie']) ? $_GET['categorie'] : null;

//Appelle la méthode afficherArticles du contrôleur pour obtenir les articles, en fonction de la catégorie spécifiée (ou tous les articles si aucune catégorie n'est spécifiée)
$articles = $controleur->afficherArticles($categorie);

// Inclut le fichier de vue 'accueil.php' pour afficher tous les articles de toutes les categories si on ne specifie pas la categorie
if ($categorie === null) {
    require 'Vue/accueil.php';
} else {
    require 'Vue/articleByCategory.php'; //Inclure la vue pour afficher les articles par catégorie
}
?>
