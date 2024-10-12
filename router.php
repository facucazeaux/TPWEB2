<?php

require_once 'apps/controller/controller.series.php';
require_once 'libs/response.php';
require_once 'apps/controller/controller.auth.php';
require_once 'apps/middlewares/session.auth.middleware.php';




$AuthController = new AuthController();
    
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = !empty($_GET["action"]) ? $_GET["action"] : '';

$res = new Response();

$params = explode("/", $action);

$controller = new controller_series($res); // Inicializa aquí

switch ($params[0]) {
    case 'series':
        sessionAuthMiddleware($res);
        if (isset($params[1]) && $params[1] === 'TodasLasSeries') {
            $controller->ListarTodasLasSeries();
        } elseif ($params[1] === 'ver' && isset($params[2])) {
            $controller->VerSerie($params[2]);
        }
        break;

    case 'generos':
        sessionAuthMiddleware($res);
        if (isset($params[1]) && $params[1] === 'ListaGeneros') {
            if (isset($params[2])) {
                $id_genero = $params[2];
                $controller->SeriesPorGenero($id_genero);
            } else {
                $controller->ListarTodosLosGeneros();
            }
        }
        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $AuthController->Login();
        } else {
            $AuthController->ShowLogin();
        }
        break;

    case 'logout':
        $AuthController->logout();
        break;

    default:
        $controller->ListarTodosLosGeneros(); // Aquí no habrá error
        break;
}

?>
