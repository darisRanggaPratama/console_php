<?php
class Database {
    private $host = "localhost";
    private $database = "hyvoycom_avengers";
    private $username = "hyvoycom_rangga";
    private $password = "20061988rangga";
    private $conn;

    public function getConnection() {
        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->database,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }
}
?>
