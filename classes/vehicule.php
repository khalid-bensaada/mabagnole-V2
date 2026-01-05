<?php
require_once 'Database.php';

class vehicule extends Database
{

    private $id;
    private $categorie;
    private $modele;
    private $prix;
    private $disponible;
    private $description;
    private $created;

    public function __construct($id, $categorie, $modele, $prix, $disponible, $description, $created)
    {
        $this->id = $id;
        $this->categorie = $categorie;
        $this->modele = $modele;
        $this->prix = $prix;
        $this->disponible = $disponible;
        $this->description = $description;
        $this->created = $created;
    }

    public function getIdd()
    {
        return $this->id;
    }
    public function getCatigori()
    {
        return $this->categorie;
    }
    public function getModele()
    {
        return $this->modele;
    }
    public function getPrix()
    {
        return $this->prix;
    }
    public function getDisponible()
    {
        return $this->disponible;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getCreated()
    {
        return $this->created;
    }

    //SETTERS

    public function setCatigori($catigorie)
    {
        $this->catigorie = $catigorie;
    }
    public function setModele($modele)
    {
        $this->modele = $modele;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
    public function setDisponible($disponible)
    {
        $this->disponible = $disponible;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setCreated($created)
    {
        $this->created = $created;
    }

    // SELECT vehicules 
    public function SelectV()
    {
        $sql = "
    SELECT v.id, v.modele, v.prix, v.disponible, v.description_v,
           c.name_c AS categorie
    FROM vehicules v
    JOIN categorie c ON v.categorie_id = c.id
    WHERE v.disponible = TRUE
";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $vehicules = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function recherchM($keyword)
    {
        $sql = "SELECT * FROM vehicule WHERE modele LIKE : keyword OR caracteristiques LIKE :keyword";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['keyword' => "%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Filter with categorie
    public function filterC($categorie_id)
    {
        $sql = "SELECT * FROM vehicule WHERE categorie_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['catigo' => $categorie_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>