<?php
declare(strict_types=1);

use PDO;
use PDOException;

class Database {
    private string $host = "db";
    private string $db_name = "db_visitas";
    private string $username = "root";
    private string $password = "rootpass";
    private ?PDO $conn = null;

    public function getConnection(): ?PDO {
        try {
            // Importante: charset en el DSN
            $dsn = "mysql:host={$this->host};dbname={$this->db_name};charset=utf8mb4";

            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->conn->exec("SET NAMES utf8mb4 COLLATE utf8mb4_spanish2_ci");
            $this->conn->exec("SET collation_connection = utf8mb4_spanish2_ci");

            return $this->conn;
        } catch (PDOException $e) {
            echo "Error de conexión: " . htmlspecialchars($e->getMessage());
            return null;
        }
    }
}
