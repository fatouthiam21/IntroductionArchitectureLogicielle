<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mglsi_news</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<div id="categories">
        <h1>ACTUALITES POLYTECHNICIENNES</h1>
        
            <a href="?categorie=accueil">Accueil</a>
            <a href="?categorie=sport">Sport</a>
            <a href="?categorie=sante">Sante</a>
            <a href="?categorie=education">Education</a>
            <a href="?categorie=politique">Politique</a>
            </div>
            <div id="article-list">
            <h2>Les dernieres actialites</h2>
            
            <?php
            error_reporting(E_ALL);
            
            $servername = "localhost"; 
            $username = "root"; 
            $password = "";
            $dbname = "mglsi_news"; 

            
            $conn = new mysqli($servername, $username, $password, $dbname);

            
            if ($conn->connect_error) {
                die("Connexion échouée: " . $conn->connect_error);
            }

            //$conn->set_charset("utf8");

            $categorie = isset($_GET['categorie']) ? $_GET['categorie'] : 'accueil';
            $sql = "SELECT Article.titre, Article.contenu, Categorie.libelle 
                    FROM Article 
                    INNER JOIN Categorie ON Article.categorie = Categorie.id";
            if($categorie != 'accueil'){
                $sql .= " WHERE Categorie.libelle='$categorie'";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                
                while($row = $result->fetch_assoc()) {
                    echo "<div class='article'>";
                    echo "<h3>" . $row["titre"] . "</h3>";
                    echo "<p>Catégorie: " . $row["libelle"] . "</p>";
                    echo "<p>" . $row["contenu"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 résultats";
            }

            
            $conn->close();
            ?>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
