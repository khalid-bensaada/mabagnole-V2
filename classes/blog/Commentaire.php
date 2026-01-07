<?php
require_once 'Database.php';
class commentaire extends Database{
    private $id_c;
    private $id_client;
    private $id_article;
    private $titre_com;
    private $contenu_com;
    private $date_commentaire;
    private $soft;
    public function __construct($id_client,$id_article,$titre_com, $contenu_com,$soft = false)
    {
        parent::__construct();
        $this->id_client = $id_client;
        $this->id_article = $id_article;
        $this->titre_com = $titre_com;
        $this->contenu_com = $contenu_com;
        $this->soft = $soft;
    }

    public function gitIdClient(){
        return $this->id_client ;
    }
    public function gitIdArticl(){
        return $this->id_article ;
    }
    public function gitTcom(){
        return $this->titre_com ;
    }
    public function gitCcom(){
        return $this->contenu_com ;
    }
    public function gitSoft(){
        return $this->soft ;
    }

    public function setIdClient($id_client){
        $this->id_client = $id_client;
    }
    public function setIdArticl($id_article){
        $$this->id_article = $id_article;
    }
    public function setTcom($titre_com){
        $this->titre_com = $titre_com;
    }
    public function setIdCcom($contenu_com){
        $this->contenu_com = $contenu_com;
    }
    public function setSoft($soft){
        $this->soft = $soft;
    }

    public function listerParArticle($idArticle){
        $sql = "SELECT c* FROM commentaires c
        INNER JOIN articles ON  c.id_article = a.id
        WHERE c.id_article = idarticle 
        ORDER BY c.date_commentaire DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idarticle', $idArticle, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


}
?>