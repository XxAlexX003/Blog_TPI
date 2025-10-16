<?php
declare(strict_types=1);

final class HomeController {
    public function index(): void {
        require __DIR__ . '/../views/inicio.php';
    }
}
