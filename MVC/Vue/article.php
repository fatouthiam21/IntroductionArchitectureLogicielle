<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mglsi_news</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container"> 
    <div id="categories">
        <h1>ACTUALITES POLYTECHNICIENNES</h1>
        <!-- Liens vers les différentes catégories -->
        <a href="?categorie=accueil">Accueil</a>
        <a href="?categorie=sport">Sport</a>
        <a href="?categorie=sante">Santé</a>
        <a href="?categorie=education">Éducation</a>
        <a href="?categorie=politique">Politique</a>
    </div>
    
    <div id="article-list">
        <h2>Les dernières actualités</h2>
        <?php if (!empty($articles)) : ?>
            
            <!-- parcourir la liste des articles et les afficher -->
            <?php foreach ($articles as $article) : ?>
                <div class="article">
                    <!-- Titre de l'article avec un lien vers sa page -->
                    <h3><a href="?action=view&id=<?=$article->getId()?>"><?=$article->getTitre()?></a></h3>
                    <!-- Catégorie de l'article -->
                    <p>Catégorie: <?=$article->getCategorie()?></p>
                    <!-- Contenu de l'article -->
                    <p><?=$article->getContenu()?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<script src="../script.js"></script>
</body>
</html>
