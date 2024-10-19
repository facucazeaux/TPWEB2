<?php

    require_once 'apps/view/view.series.php';
    require_once 'apps/model/model.series.php';
    require_once 'apps/model/model.genero.php';


    class controller_series
        {
            private $view;
            private $model;
            private $model_generos;
            


                public function __construct($res)
                {
                    $this->model = new model_series();
                    $this->model_generos = new model_genero();
                    $this->view = new viewSerie($res->user);

                   
                }






                public function ListarTodasLasSeries()
                {
                    $series = $this->model->getTodoLosItems();
                    $genero = $this->model_generos->getCategorias();
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
                
                    
                    


                public function agregarSerie()
                {   
                   
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                       
                        $nombre = $_POST['nombre'] ?? ''; 
                        $temporadas = $_POST['temporadas'] ?? 0;
                        $protagonistas = $_POST['protagonistas'] ?? '';
                        $director = $_POST['director'] ?? '';
                        $calificacionPorEdad = $_POST['calificacionPorEdad'] ?? '';
                        $resumen = $_POST['resumen'] ?? '';
                        $id_genero = $_POST['genero'] ?? 0; 
            
                        
            
                        if (empty($nombre) || empty($id_genero)) {
                            echo("Por favor, completa todos los campos requeridos.");
                            return;
                        }
            
                        
                        $this->model->Agregar_Serie($nombre, $temporadas, $protagonistas, $director, $calificacionPorEdad, $resumen, $id_genero);
            
                        
                        header('Location: '.BASE_URL.'generos/ListaGeneros');
                        exit();
                    } else {
                       
                        $generos = $this->model_generos->getCategorias();
            
                        
                        $this->view->ver_agregarSerie($generos);
                    }
                    }   
            
                  public function Eliminar_Serie($id,$res)
                    {   
                        
                        $model = new model_series;
                        $id_serie_eliminar =  $id  ;
            
            
                        if ($id_serie_eliminar && $res) {
                            $resultado = $model->EliminarSerie($id_serie_eliminar);
            
                        if ($resultado) 
                            {
                                header('Location: ' . BASE_URL . 'generos/ListaGeneros'); 
                                echo 'Serie eliminado correctamente';
                            } else {
                            
                            echo 'No se pudo eliminar la serie o no existe.';
                        }
                    } else {
                        
                        echo 'ID de serie no proporcionado.';
                    }
            
            
                 
                    }

                    public function editar_serie($id, $res)
                    {
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // agarro los datos enviados por POST para editar la serie
                            $nombre = $_POST['nombre'] ?? ''; 
                            $temporadas = $_POST['temporadas'] ?? 0;
                            $protagonistas = $_POST['protagonistas'] ?? '';
                            $director = $_POST['director'] ?? '';
                            $calificacionPorEdad = $_POST['calificacionPorEdad'] ?? '';
                            $resumen = $_POST['resumen'] ?? '';
                            $nombre_genero = $_POST['genero'] ?? '';
                    
                            
                            if (empty($nombre) ) {
                                echo("Por favor, completa todos los campos requeridos.");
                                return;
                            }
                    
                           
                            $resultado = $this->model->EditarSerie($id, $nombre, $temporadas, $protagonistas, $director, $calificacionPorEdad, $resumen, $nombre_genero);
                    
                            
                            if ($resultado) {
                                echo 'Serie actualizada correctamente'; 
                                header('Location: '.BASE_URL.'series/ListaDeSeries');
                                exit();
                            } else {
                                echo 'Error al actualizar la serie. Por favor, inténtalo de nuevo.'; 
                              
                            }
                        } else {
                            
                            $serie = $this->model->SerieDetalleById($id);
                            $genero = $this->model_generos->getCategorias();
                    
                           //muestro mi formulario
                            $this->view->ver_editarSerie($serie, $genero);
                        }
                    }
                    
                    
                    
                    
            
            
            

            
                



        }
    

?>
