<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mglsi_news - Articles par Catégorie</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<div class="container">
    <!-- Section des catégories -->
    <div id="categories">
        <h1>ACTUALITES POLYTECHNICIENNES</h1>
        <!-- Liens vers les différentes catégories -->
        <a href="?categorie=accueil">Accueil</a>
        <a href="?categorie=sport">Sport</a>
        <a href="?categorie=sante">Santé</a>
        <a href="?categorie=education">Éducation</a>
        <a href="?categorie=politique">Politique</a>
    </div>
    <!-- Section des articles -->
    <div id="article-list">
        <h2>Articles dans la catégorie "<?php echo $categorie; ?>"</h2> <!-- Affichage du nom de la catégorie -->
        <?php if (empty($articles)) : ?> <!-- Vérification si la liste des articles est vide -->
            <p>0 résultat</p> <!-- Affichage du message "0 résultat" si aucun article n'est trouvé -->
        <?php else : ?> 
            <!-- Boucle pour afficher chaque article -->
            <?php foreach ($articles as $article) : ?>
                <div class="article">
                    <h3><a href="?action=view&id=<?php echo $article->getId(); ?>"><?php echo $article->getTitre(); ?></a></h3> <!-- Titre de l'article avec lien vers sa page -->
                    <p>Catégorie: <?php echo $article->getCategorie(); ?></p> <!-- Catégorie de l'article -->
                    <p><?php echo $article->getContenu(); ?></p> <!-- Contenu de l'article -->
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>
<script src="../script.js"></script> 
</body>
</html>
