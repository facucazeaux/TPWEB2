<?php

    class controller_series
        {
            private $view;
            private $model;


                public function __construct()
                {
                    $this->model = new model_series();
                    $this->view = new viewSerie();
                }

                public function ListarTodasLasSeries()
                    {
                        $series = $this->model->getTodoLosItems();
                        $this->view->listadoTodasLasSeries($series);
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
                    


               



        }


?>