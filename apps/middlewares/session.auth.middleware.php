<?php

    function sessionAuthMiddleware($res, $requireLogin=true)
    {

        session_start();

        if ($requireLogin)
        {
            if (isset($_SESSION['ID_USER']))
            {
                $res->user = new stdClass();
                $res->user->id = $_SESSION['ID_USER'];
                $res->user->user =(String) $_SESSION['USER_USER'];
                return ;
            }
           else
            header('Location: '.BASE_URL . 'login');
            die();
           }
        }
       

    

?>