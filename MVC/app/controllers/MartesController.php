<?php
declare(strict_types=1);

final class MartesController {
    public function index(): void {
        require __DIR__ . '/../views/martes.php';
    }
}
