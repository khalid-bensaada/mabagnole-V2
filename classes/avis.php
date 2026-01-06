<?php
require_once 'Database.php';

class Avis extends Database
{
    private ?int $id;
    private ?int $client_id;
    private ?int $vehicule_id;
    private ?int $note;
    private ?string $commentaire;
    private ?string $deleted_at;
    private ?string $created_at;


    public function __construct(
        $client_id = null,
        $vehicule_id = null,
        $note = null,
        $commentaire = null,
        $id = null
    ) {
        parent::__construct();
        $this->id = $id;
        $this->client_id = $client_id;
        $this->vehicule_id = $vehicule_id;
        $this->note = $note;
        $this->commentaire = $commentaire;
        $this->deleted_at = null;
        $this->created_at = null;
    }



    public function getId()
    {
        return $this->id;
    }
    public function getClientId()
    {
        return $this->client_id;
    }
    public function getVehiculeId()
    {
        return $this->vehicule_id;
    }
    public function getNote()
    {
        return $this->note;
    }
    public function getCommentaire()
    {
        return $this->commentaire;
    }



    public function setNote($note)
    {
        if ($note < 1 || $note > 5) {
            throw new Exception("La note doit être entre 1 et 5");
        }
        $this->note = $note;
    }

    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }


    public function create()
    {
        $sql = "INSERT INTO avis (client_id, vehicule_id, note, commentaire)
                VALUES (:client_id, :vehicule_id, :note, :commentaire)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'client_id' => $this->client_id,
            'vehicule_id' => $this->vehicule_id,
            'note' => $this->note,
            'commentaire' => $this->commentaire
        ]);
    }


    public function update()
    {
        $sql = "UPDATE avis 
                SET note = :note, commentaire = :commentaire
                WHERE id = :id AND deleted_at IS NULL";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'note' => $this->note,
            'commentaire' => $this->commentaire,
            'id' => $this->id
        ]);
    }


    public function softDelete()
    {
        $sql = "UPDATE avis SET deleted_at = NOW() WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$this->id]);
    }


    public function getByVehicule($vehicule_id)
    {
        $sql = "SELECT a.*, c.nom 
                FROM avis a
                JOIN client c ON a.client_id = c.id
                WHERE a.vehicule_id = ?
                AND a.deleted_at IS NULL
                ORDER BY a.created_at DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$vehicule_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getByClient($client_id)
    {
        $sql = "SELECT * FROM avis 
                WHERE client_id = ?
                AND deleted_at IS NULL";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$client_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getAllAdmin()
    {
        $sql = "SELECT * FROM avis ORDER BY created_at DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function averageRating($vehicule_id)
    {
        $sql = "SELECT AVG(note) as moyenne 
                FROM avis
                WHERE vehicule_id = ?
                AND deleted_at IS NULL";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$vehicule_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return round($result['moyenne'], 1);
    }
}
?>