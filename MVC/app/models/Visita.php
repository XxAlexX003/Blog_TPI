<?php
declare(strict_types=1);

final class Visita {
    private PDO $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function crear(string $nombre, string $correo, ?string $comentario = null): void {
        $sql = "INSERT INTO tbl_visitas (nombre, correo, comentario, fecha)
                VALUES (:nombre, :correo, :comentario, NOW())";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':nombre'     => $nombre,
            ':correo'     => $correo,
            ':comentario' => $comentario ?: null
        ]);
    }
}
