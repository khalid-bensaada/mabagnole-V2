<?php
require_once 'Database.php';
class article extends Database {
    private $id_article;
    private $id_theme;
    private $id_client;
    private $titre_article;
    private $contenu;
    private $tags;
    private $date;
    private $status;

    public function __construct($id_theme,$id_client,$titre_article,$contenu,$tags,$date,$status){
        parent::__construct();
        $this->id_theme=$id_theme;
        $this->id_client=$id_client;
        $this->titre_article=$titre_article;
        $this->contenu=$contenu;
        $this->tags=$tags;
        $this->status=$status;
        $this->date = $date ;
    }

    public function gitTarticl(){
        return $this->titre_article ;
    }
    public function gitContenu(){
        return $this->contenu ;
    }
    public function gitTag(){
        return $this->tags ;
    }
    public function gitStatus(){
        return $this->status ;
    }
    public function gitDate(){
        return $this->date ;
    }
    public function setTarticl($titre_article){
        $this->titre_article=$titre_article;
    }
    public function setContenu($contenu){
        $this->contenu=$contenu;
    }
    public function setTag($tags){
        $this->tags=$tags;
    }
    public function setStatus($status){
        $this->status=$status;
    }
    public function setDate($date){
        $this->date = $date ;
    }

    public function listerParTheme($idTheme){
        $sql = "SELECT a.* FROM articles a
        INNER JOIN themes t ON a.id_theme = t.id
        WHERE a.id_theme = :idTheme
        ORDER BY a.date_publication DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':idTheme', $idTheme, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findById($id){
        $sql = "SELECT * FROM articles 
        WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}
?>