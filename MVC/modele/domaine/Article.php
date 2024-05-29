<?php
class Article {
    private $id;
    private $titre;
    private $contenu;
    private $categorie;
    public function __construct($id, $titre, $contenu, $categorie) {
        $this->id = $id;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->categorie = $categorie;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
    }
    
    public function getContenu() {
        return $this->contenu;
    }

    public function getCategorie() {
        return $this->categorie;
    }
}
?>