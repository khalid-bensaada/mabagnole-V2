<?php
require_once 'Database.php';

class Vehicule extends Database
{
    private $id_v;
    private $categorie_id;
    private $modele;
    private $prix;
    private $disponibilite;
    private $description_v;
    private $created_v;

    public function __construct($id_v = 0, $categorie_id = 0, $modele = "", $prix = 0, $disponibilite = 1, $description_v = "", $created_v = null)
    {
        parent::__construct(); 
        $this->id_v = $id_v;
        $this->categorie_id = $categorie_id;
        $this->modele = $modele;
        $this->prix = $prix;
        $this->disponibilite = $disponibilite;
        $this->description_v = $description_v;
        $this->created_v = $created_v ?? date('Y-m-d H:i:s');
    }

    // GETTERS
    public function getId()
    {
        return $this->id_v;
    }
    public function getCategorieId()
    {
        return $this->categorie_id;
    }
    public function getModele()
    {
        return $this->modele;
    }
    public function getPrix()
    {
        return $this->prix;
    }
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }
    public function getDescription()
    {
        return $this->description_v;
    }
    public function getCreated()
    {
        return $this->created_v;
    }

    // SETTERS
    public function setCategorieId($categorie_id)
    {
        $this->categorie_id = $categorie_id;
    }
    public function setModele($modele)
    {
        $this->modele = $modele;
    }
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }
    public function setDisponibilite($disponibilite)
    {
        $this->disponibilite = $disponibilite;
    }
    public function setDescription($description_v)
    {
        $this->description_v = $description_v;
    }
    public function setCreated($created_v)
    {
        $this->created_v = $created_v;
    }

    // CREATE
    public function create()
    {
        $sql = "INSERT INTO vehicule (catecorie_id, modele, prix, disponibilite, description_v) 
                VALUES (:categorie_id, :modele, :prix, :disponibilite, :description_v)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':categorie_id' => $this->categorie_id,
            ':modele' => $this->modele,
            ':prix' => $this->prix,
            ':disponibilite' => $this->disponibilite,
            ':description_v' => $this->description_v
        ]);
    }

    // READ all vehicles 
    public function selectAll($onlyAvailable = true)
    {
        $sql = "SELECT v.*, c.name_c AS categorie 
                FROM vehicule v 
                JOIN categorie c ON v.catecorie_id = c.id_c";
        if ($onlyAvailable) {
            $sql .= " WHERE v.disponibilite = TRUE";
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // READ one vehicle by ID
    public function selectById($id)
    {
        $sql = "SELECT v.*, c.name_c AS categorie 
                FROM vehicule v 
                JOIN categorie c ON v.catecorie_id = c.id_c 
                WHERE v.id_v = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // UPDATE
    public function update($id)
    {
        $sql = "UPDATE vehicule 
                SET catecorie_id = :categorie_id, modele = :modele, prix = :prix, 
                    disponibilite = :disponibilite, description_v = :description_v
                WHERE id_v = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':categorie_id' => $this->categorie_id,
            ':modele' => $this->modele,
            ':prix' => $this->prix,
            ':disponibilite' => $this->disponibilite,
            ':description_v' => $this->description_v,
            ':id' => $id
        ]);
    }

    // DELETE
    public function delete($id)
    {
        $sql = "DELETE FROM vehicule WHERE id_v = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }

    // SEARCH by modele
    public function searchByModele($keyword)
    {
        $sql = "SELECT v.*, c.name_c AS categorie 
                FROM vehicule v 
                JOIN categorie c ON v.catecorie_id = c.id_c
                WHERE v.modele LIKE :keyword";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':keyword' => "%$keyword%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // FILTER by category
    public function filterByCategorie($categorie_id)
    {
        $sql = "SELECT v.*, c.name_c AS categorie 
                FROM vehicule v 
                JOIN categorie c ON v.catecorie_id = c.id_c
                WHERE v.catecorie_id = :cat_id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':cat_id' => $categorie_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
