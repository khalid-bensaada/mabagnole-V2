<?php
require_once '../class/Database.php';
class theme extends Database{
    private string $titre ;
    private string $description ;
    private bool $actif ;
    

    public function __construct(string $titre , string $description , bool $actif , $pdo){
        parent::__construct() ;
        $this->titre = $titre ;
        $this->description = $description ;
        $this->actif = $actif ;
        $this->pdo = $pdo;

    }

    public function gitTitre(){
        return $this->titre ;
    }
    public function gitDescription(){
        return $this->description ;
    }
    public function gitActif(){
        return $this->actif ;
    }
    public function setTitre(string $titre){
        $this->titre = $titre ;
    }
    public function setDescription(string $description){
        $this->description = $description ;
    }
    public function setActif(bool $actif){
        $this->actif = $actif ;
    }

    public function listerTousActifs(){
        $sql = "SELECT * FROM themes WHERE actif = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>