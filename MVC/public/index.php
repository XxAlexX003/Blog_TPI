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
        if (is_file($file)) { require_once $file; return; }
    }
});

$route = $_GET['r'] ?? 'inicio';
try {
    switch ($route) {
        case '':
        case 'inicio':        (
            new HomeController())->index(); break;
        case 'lunes':         
            (new LunesController())->index(); break;
        case 'martes':
            (new MartesController())->index() ; break;    
         case 'miercoles':
            (new MiercolesController())->index() ; break;
        case 'jueves':
            (new JuevesController())->index(); break;
        case 'miInfo':
            (new miInfoController())->index(); break;

        case 'visita':
            $c = new ViewversController();
            ($_SERVER['REQUEST_METHOD']==='POST') ? $c->store() : $c->create();
            break;
        default:
            header('Location: ?r=inicio'); exit;
    }
} catch (Throwable $e) {
    http_response_code(500);
    echo "<h1>Error interno</h1><pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
}
