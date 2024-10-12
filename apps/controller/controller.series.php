<?php

    require_once 'apps/view/view.series.php';
    require_once 'apps/model/model.series.php';


    class controller_series
        {
            private $view;
            private $model;


                public function __construct($res)
                {
                    $this->model = new model_series();
                    $this->view = new viewSerie($res->user);
                }
                public function ListarTodasLasSeries()
                {                 
                    $series = $this->model->getTodoLosItems();
                    $genero = $this->model->getCategorias();
                    $this->view->listadoTodasLasSeries($series, $genero);
                }
                

                    public function VerSerie($nombre)
                    {
                        $serie = $this->model->SerieDetalle($nombre);
                        if ($serie) {
                            $this->view->SerieDetalle($serie);
                        } else {
                            
                            echo "Serie no encontrada.";
                        }
                    }
                    
                    public function ListarTodosLosGeneros()
                    {
                        $genero = $this->model->getCategorias();
                      
                        $this->view->VerTodosLosGeneros($genero);
                    }


                   


                    public function SeriesPorGenero($id_genero)
                        {
                            // Obtener solo las series que pertenecen a un género específico
                            $series = $this->model->getSeriesPorGenero($id_genero);
                            $genero = $this->model->getCategorias(); // O si necesitas el nombre del género, puedes usar otro método que devuelva solo ese nombre.
                            
                            // Llamar a la vista para mostrar solo las series de ese género
                            $this->view-> VerSeriesPorGenero($genero,$series);
                        }





            
               



        }


?>