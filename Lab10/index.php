<?php
require_once __DIR__ . '/vendor/autoload.php';

use App\Controller\UserController;

$controller = new UserController();

$action = $_GET['action'] ?? 'index';
$userId = $_GET['id'] ?? null;

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'show':
        $controller->show($userId);
        break;
    case 'create':
        $controller->create();
        break;
    case 'update':
        $controller->update($userId);
        break;
    case 'delete':
        $controller->delete($userId);
        break;
    default:
        echo '404 Not Found';
}
