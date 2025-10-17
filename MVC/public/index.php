<?php
declare(strict_types=1);

$ROOT = dirname(__DIR__);
$PATHS = [
    $ROOT . '/app/controllers',
    $ROOT . '/app/models',
    $ROOT . '/lib',
];

spl_autoload_register(function ($class) use ($PATHS) {
    foreach ($PATHS as $dir) {
        $file = $dir . '/' . $class . '.php';
        if (is_file($file)) {
            require_once $file;
            return;
        }
    }
});

$requestUri = $_SERVER['REQUEST_URI'] ?? '/';
$scriptDir  = dirname($_SERVER['SCRIPT_NAME']);
$route = str_replace($scriptDir, '', $requestUri);
$route = explode('?', $route)[0];
$route = strtolower(trim($route, '/'));

if ($route === '' || $route === false) {
    $route = 'inicio';
}

try {
    switch ($route) {
        case 'inicio':
            (new HomeController())->index();
            break;
        case 'lunes':
            (new LunesController())->index();
            break;
        case 'martes':
            (new MartesController())->index();
            break;
        case 'miercoles':
            (new MiercolesController())->index();
            break;
        case 'jueves':
            (new JuevesController())->index();
            break;
        case 'viernes':
            (new ViernesController())->index();
            break;
        case 'miinfo':
            (new miInfoController())->index();
            break;
        case 'visita':
            $ctrl = new ViewversController();
            ($_SERVER['REQUEST_METHOD'] === 'POST')
                ? $ctrl->store()
                : $ctrl->create();
            break;
        default:
            header('Location: inicio');
            exit;
    }
} catch (Throwable $e) {
    http_response_code(500);
    echo "<h1>Error interno</h1><pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
}
