<?php

    function sessionAuthMiddleware($res) //response
    {

        session_start();
        if (isset($_SESSION['ID_USER']))
        {
            $res->user = new stdClass();
            $res->user->id = $_SESSION['ID_USER'];
            $res->user->user = $_SESSION['USER_USER'];
            return ;
        }
       else
        header('Location : '.BASE_URL . 'login');
        die();
       }

    

?>