<?php

    class viewSerie
        {
            public $user = null;
            
            public function __construct($user)
            {
                $this->user=$user;
            }

            public function listadoTodasLasSeries($series,$genero)
                {
                    include 'apps/templades/header.phtml';
                    include 'apps/templades/TodasLasSeries.phtml';
                    include 'apps/templades/footer.phtml';
                }

            public function SerieDetalle($serie)
                {
                    include 'apps/templades/header.phtml';
                    include 'apps/templades/serieDetalle.phtml';
                    include 'apps/templades/footer.phtml';
                }
                

                public function ver_agregarSerie($generos)
                {
                    
                    include 'apps/templades/header.phtml';
                    include 'apps/templades/Agregar_serie.phtml';
                    include 'apps/templades/footer.phtml';
                }


                public function eliminarserie($id_serie_eliminar,$res)
                {
                    include 'apps/templades/header.phtml';
                    include 'apps/templades/TodasLasSeries.phtml';
                    include 'apps/templades/footer.phtml';
                
                }
               
                
                public function ver_editarSerie($serie,$genero)
                    {
                        include 'apps/templades/header.phtml';
                        include 'apps/templades/formulario_editarSerie.phtml';
                        include 'apps/templades/footer.phtml';
                    }

            
            
                

        }



?>