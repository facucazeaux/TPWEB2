<?php

    require_once 'controller/controller.series.php';
    require_once 'view/view.series.php';
    require_once 'model/model.series.php';
    



    $controller = new controller_series();

    $action = !empty($_GET["action"]) ? $_GET["action"] : '';

    $params = explode("/",$action);

    switch ($params[0]) {
        case 'series':
            if (isset( $params[1]) && $params[1]==='TodasLasSeries')
                {
                    $controller->ListarTodasLasSeries();

                
                } elseif ($params[1] === 'ver' && isset($params[2])) {
                    
                    $controller->VerSerie($params[2]);
                }
            
            break;

        
        
        default:
            
            break;
    }
    




?>