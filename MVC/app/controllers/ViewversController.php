<?php
declare(strict_types=1);

final class ViewversController {
    public function create(): void {
        $success = $_GET['success'] ?? null;
        $error   = $_GET['error']   ?? null;

        // Ajuste de ruta: desde app/controllers a app/views
        require __DIR__ . '/../views/Visita.php';
    }

    public function store(): void {
        $nombre     = trim($_POST['nombre'] ?? '');
        $correo     = trim($_POST['correo'] ?? '');
        $comentario = trim($_POST['comentario'] ?? '');

        if ($nombre === '' || $correo === '') {
            header('Location: ?r=visita&error=Faltan+campos+obligatorios');
            exit;
        }

        try {
            require_once __DIR__ . '/../../lib/database.php';
            $db = new Database();
            $pdo = $db->getConnection();

            require_once __DIR__ . '/../models/Visita.php';
            $visita = new Visita($pdo);

            $visita->crear($nombre, $correo, $comentario);

            header('Location: ?r=visita&success=Registro+guardado');
            exit;
        } catch (Throwable $e) {
            $msg = urlencode('Error al guardar: ' . $e->getMessage());
            header("Location: ?r=visita&error={$msg}");
            exit;
        }
    }
}
