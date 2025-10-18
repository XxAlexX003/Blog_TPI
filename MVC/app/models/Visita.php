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

    public function recientes(int $limit = 6): array {
    $sql = "SELECT nombre, comentario, fecha
            FROM tbl_visitas
            WHERE comentario IS NOT NULL AND comentario <> ''
            ORDER BY fecha DESC
            LIMIT :lim";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(':lim', $limit, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
}

}

