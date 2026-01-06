<?php
class Database
{
    protected $pdo;

    public function __construct()
    {
        $host = "localhost";
        $db = "mabagnol";
        $user = "root";
        $pass = "";
        $charset = "utf8mb4";

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        try {
            $this->pdo = new PDO($dsn, $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    
}
?>