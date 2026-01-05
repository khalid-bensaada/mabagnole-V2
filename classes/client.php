<?php
require_once 'Database.php';
class Client extends Database
{
    public $client;
    private $id;
    private $name;
    private $email;
    private $password;
    private $role;
    private $timeC;
    public function __construct( int $id, string $name = "", string $email = "", string $password = "", string $role = "", float $timeC)
    {
        parent::__construct();
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->timeC = $timeC;
        

    }
    public function getId(): int
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getPassword(): string
    {
        return $this->password;
    }
    public function getRole(): string
    {
        return $this->role;
    }
    public function getTime(): float
    {
        return $this->timeC;
    }
    // SETTERS

    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function setPassword(string $password)
    {
        $this->password = $password;
    }
    public function setRole(string $role)
    {
        $this->role = $role;
    }
    public function setTime(float $timeC)
    {
        $this->timeC = $timeC;
    }

    // PASSWORD HASHING
    public function hash()
    {
        $password_hash = password_hash($this->password);
        $this->password = $password_hash;
    }
    // CREATION A CLIENT
    public function create()
    {
        $sql = "INSERT INTO client (name ,email ,password_C ,role )
        VALUES (:name , :email, :password ,:role)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':name' => $this->name,
            ':email' => $this->email,
            ':password' => $this->password,
            ':role' => $this->role
        ]);

    }

    // SELECT CLIENT FROM HIS EMAIL
    public function foundEmail($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM client WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function verifyP($password)
    {
        return password_verify($password, $this->password);
    }
}
?>