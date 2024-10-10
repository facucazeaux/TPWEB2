<?php

require_once 'controller/controller.series.php';
require_once 'view/view.series.php';
require_once 'model/model.series.php';

$controller = new controller_series();

$action = !empty($_GET["action"]) ? $_GET["action"] : '';

$params = explode("/", $action);

switch ($params[0]) {
    case 'series':
        if (isset($params[1]) && $params[1] === 'TodasLasSeries') {
            $controller->ListarTodasLasSeries();
        } elseif ($params[1] === 'ver' && isset($params[2])) {
            $controller->VerSerie($params[2]);
        }
        break;

        case 'generos':
            // Listar todos los géneros
            if (isset($params[1]) && $params[1] === 'ListaGeneros') {
                if (isset($params[2])) {
                    // Si se recibe un id de género en la URL, mostrar las series de ese género
                    $id_genero = $params[2];
                    $controller->SeriesPorGenero($id_genero);
                } else {
                    // Si no se recibe un id de género, mostrar la lista de todos los géneros
                    $controller->ListarTodosLosGeneros();
                }
            }
            break;
        

    default:
        
        echo "Página no encontrada.";
        break;
}
?>
