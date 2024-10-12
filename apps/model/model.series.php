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
                

            public function getCategorias()
                {
                    $query = $this->db->prepare('SELECT * FROM genero');
                    $query->execute();
                    $genero = $query->fetchAll(PDO::FETCH_OBJ);
                    return $genero;
                }

                public function getSeriesPorGenero($id_genero)
                {
                    // Consulta SQL para obtener solo las series que coincidan con el id_genero
                    $query = $this->db->prepare('SELECT * FROM serie WHERE id_genero = ?');
                    $query->execute([$id_genero]);
                    $series = $query->fetchAll(PDO::FETCH_OBJ);
                    return $series;
                }
                

           

        }


?>