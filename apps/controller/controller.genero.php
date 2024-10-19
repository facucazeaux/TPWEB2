<?php
require_once 'apps/view/view.genero.php';
require_once 'apps/model/model.series.php';

class controller_genero
    {

        private $model;
        private $view;
        protected $db;
            public function __construct($res)
            {
                $this->model = new model_genero();
                $this->view = new viewGenero($res->user);

            }

            public function ListarTodosLosGeneros()
                    {
                        $genero = $this->model->getCategorias();
                      
                        $this->view->VerTodosLosGeneros($genero);
                    }


                   


                    public function SeriesPorGenero($id_genero)
                        {
                            // obtenemos solo las series que pertenecen a un género específico
                            $series = $this->model->getSeriesPorGenero($id_genero);
                            $genero = $this->model->getGeneroPorId($id_genero);
                            
                            
                            
                            $this->view-> VerSeriesPorGenero($genero,$series);
                        }


                    
                public function agregarGenero()
                {   
                   
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        
                     
                        $genero = $_POST['genero'] ?? ''; 
                        $descripcion = $_POST['descripcion'] ?? '';
                        
                        
            
                        
            
                        if (empty($genero)  || empty($descripcion)) {
                            echo "Por favor, completa todos los campos requeridos.";
                            return;
                        }
            
                        $resultado = $this->model->Agregar_Genero( $genero, $descripcion);
                        
                        
                        if ($resultado) {
                            header('Location: ' . BASE_URL . 'generos/ListaGeneros');
                            exit();
                        } else {
                            echo "Error al agregar el género. Por favor, intenta nuevamente.";
                        }
                    } else {
                        
                        $this->view->ver_agregarGenero();
                    }
                }


                public function EditarGenero($id, $res)
                {
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // agarro los datos enviados por post para editar la serie
                        $id = $_POST['id_genero']?? $id;
                        $genero = $_POST['genero']?? ''; 
                        $descripcion = $_POST['descripcion']??'';
                      
                
                        
                        if (empty($id) || empty($genero) || empty($descripcion)) {
                            echo("Por favor, completa todos los campos requeridos.");
                            return;
                        }
                
                       
                        $resultado = $this->model->EditarGenero($id,$genero,$descripcion);
                
                        //var_dump($id, $genero, $descripcion);
                        if ($resultado) {
                            echo 'Genero actualizado correctamente'; 
                            header('Location: '.BASE_URL.'generos/ListaGeneros');
                            
                        } else {
                            echo 'Error al actualizar la serie. Por favor, inténtalo de nuevo.'; 
                         
                        }
                    } else {
                        
                        $genero = $this->model->getGeneroPorId($id);
                        if ($genero) {
                            $this->view->ver_editarGenero($genero);
                        } else {
                            echo "Género no encontrado.";
                        }
                    }
                }


                public function Eliminar_Genero($id,$res)
                    {   
                        
                        $model = new model_genero;
                        $id_genero_eliminar =  $id  ;
            
            
                        if ($id_genero_eliminar && $res) {
                            $resultado = $model->EliminarGenero($id);
            
                        if ($resultado) 
                            {
                                header('Location: ' . BASE_URL . 'generos/ListaGeneros'); 
                                echo 'Genero eliminado correctamente';
                            } else {
                            
                            echo 'No se pudo eliminar la serie o no existe.';
                        }
                    } else {
                        
                        echo 'ID de serie no proporcionado.';
                    }
            
            
                 
                    }




    }