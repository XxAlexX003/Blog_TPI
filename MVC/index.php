<?php
declare(strict_types=1);

spl_autoload_register(function ($class) {
    $paths = ['controllers', 'models', 'config'];
    foreach ($paths as $p) {
        $file = __DIR__ . "/$p/$class.php";
        if (is_file($file)) { require_once $file; return; }
    }
});

$route = $_GET['r'] ?? 'inicio';

try {
    switch ($route) {
        case '':
        case 'inicio':
            (new HomeController())->index();
            break;


        default:
            header('Location: ?r=inicio');
            exit;
    }
} catch (Throwable $e) {
    http_response_code(500);
    echo "<h1>Error" . htmlspecialchars($e->getMessage()) . "</pre>";
}
