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

switch ($params[0]) {
    case 'series':
         sessionAuthMiddleware($res);
        if (isset($params[1]) && $params[1] === 'TodasLasSeries') {
            $controller = new controller_series($res);
            $controller->ListarTodasLasSeries();
        } elseif ($params[1] === 'ver' && isset($params[2])) {
            $controller = new controller_series($res);
            $controller->VerSerie($params[2]);
        }
        break;

        case 'generos':
            // Listar todos los géneros
            sessionAuthMiddleware($res);
            $controller = new controller_series($res);
            if (isset($params[1]) && $params[1] === 'ListaGeneros') {
               
                if (isset($params[2])) {
                    // Si se recibe un id de género en la URL, mostrar las series de ese género
                    $id_genero = $params[2];
                    $controller->SeriesPorGenero($id_genero);
                } else {
                    $controller = new controller_series($res);
                    // Si no se recibe un id de género, mostrar la lista de todos los géneros
                    $controller->ListarTodosLosGeneros();
                }
            }
            break;

            case 'login':
                

                if (isset($params[0]) && $params[0] === 'login') {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Manejar el login (POST)
                        $AuthController->Login();
                    } else {
                        // Mostrar el formulario de login (GET)
                        $AuthController->ShowLogin();
                    }
                }
            break;
        

    default:
        
    $AuthController->ShowLogin();
        break;
}
?>
