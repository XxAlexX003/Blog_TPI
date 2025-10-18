<?php
declare(strict_types=1);

final class HomeController {
    public function index(): void {
        require_once __DIR__ . '/../../lib/database.php';
        $db = new Database();
        $pdo = $db->getConnection();

        $visitas = [];
        if ($pdo) {
            require_once __DIR__ . '/../models/Visita.php';
            $modelo = new Visita($pdo);
            $visitas = $modelo->recientes(10);
        }

        require __DIR__ . '/../views/inicio.php';
    }
}
