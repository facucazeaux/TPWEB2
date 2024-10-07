<?php

    class model_series
        {

            private $db;

            public function __construct()
                
            {
                $this->db = new PDO('mysql:host=localhost;'.'dbname=serie;charset=utf8', 'root', '');
            }


            public function getTodoLosItems()
                {
                    $query = $this->db->prepare('SELECT * FROM serie');
                    $query->execute();
                    $movies = $query->fetchAll(PDO::FETCH_OBJ);
                    return $movies;
                }

                public function SerieDetalle($nombre)
                {
                    $query = $this->db->prepare('SELECT `nombre`, `temporadas`, `protagonistas`, `director`, `CalificacionPorEdad`, `resumen` FROM `serie` WHERE nombre = ?');
                    $query->execute([$nombre]);
                    $movie = $query->fetch(PDO::FETCH_OBJ);
                    return $movie;
                }
                

        }


?>