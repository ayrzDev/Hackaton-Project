<?php
require_once AUTOLOAD_PATH;

use App\Controllers\HomeController;
use App\Controllers\AdminController;
use App\Core\Router;
use App\Config\App;

$router = new Router();
$homeController = new HomeController();

if (App::globalMaintenanceMode) {
    $router->enableMaintenanceMode();
} else {
    $router->disableMaintenanceMode();
}

$router->addRoute(['/', "/anasayfa"], [$homeController, 'index'], null, false, false);
$router->addRoute(["/chat"], [$homeController, 'chat'], null, false, false);
$router->addRoute(["/code/analize"], [$homeController, 'code_analize'], null, false, false);
$router->addRoute(["/login"], [$homeController, "login"], "home/js/login");
$router->addRoute(["/register"], [$homeController, "register"]);
$router->addRoute(["/logout"], [$homeController, "logout"]);
