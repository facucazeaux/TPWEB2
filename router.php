<?php

require_once 'apps/controller/controller.series.php';
require_once 'libs/response.php';
require_once 'apps/controller/controller.auth.php';
require_once 'apps/middlewares/session.auth.middleware.php';
require_once 'apps/controller/controller.genero.php';






define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = !empty($_GET["action"]) ? $_GET["action"] : '';

$res = new Response();

$params = explode("/", $action);
$AuthController = new AuthController();
$controllerGenero = new controller_genero($res);
$controllerSerie = new controller_series($res); 

switch ($params[0]) {
    case 'series':

            if (isset($params[1]) && $params[1] === 'ListaDeSeries') {
                sessionAuthMiddleware($res,false);
                $controllerSerie->ListarTodasLasSeries();


            } else
            
                if (isset($params[1]) && $params[1] === 'ver' && isset($params[2])) {
                    sessionAuthMiddleware($res,false);
                    $controllerSerie->VerSerie($params[2]);

            } else
            
                if (isset($params[1]) && $params[1] === 'AgregarSerie') {
                    sessionAuthMiddleware($res,true);
                    $controllerSerie->agregarSerie();

            } else
                if (isset($params[1]) && $params[1] === 'EliminarSerie' && isset($params[2])) {
                    sessionAuthMiddleware($res,true);
                    $controllerSerie->Eliminar_Serie($params[2], $res);

            } else
                if (isset($params[1]) && $params[1] === 'EditarSerie' && isset($params[2])) {
                    sessionAuthMiddleware($res,true);
                    $controllerSerie->editar_serie($params[2], $res);
            }
            break;

    case 'generos':

            if (isset($params[1]) && $params[1] === 'ListaGeneros') {
                    if (isset($params[2])) {
                        $id_genero = $params[2];
                        $controllerGenero->SeriesPorGenero($id_genero);

                    } 
                    else 
                    {
                        $controllerGenero->ListarTodosLosGeneros();
                    }
            }

            if (isset($params[1]) && $params[1] === 'AgregarGenero') {
                    sessionAuthMiddleware($res,true);
                    $controllerGenero->agregarGenero($res);
            }
                else
            if(isset($params[1]) && $params[1] === 'EditarGenero' && isset($params[2]))
                {
                    sessionAuthMiddleware($res,true);
                    $controllerGenero->EditarGenero($params[2],$res);
                } 

            if(isset($params[1]) && $params[1] === 'EliminarGenero' && isset($params[2]))
                {
                    sessionAuthMiddleware($res,true);
                    $controllerGenero->Eliminar_Genero($params[2],$res);
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
            $controllerGenero->ListarTodosLosGeneros();
            break;
}
