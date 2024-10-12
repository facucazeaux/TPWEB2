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
                


                public function VerTodosLosGeneros($genero)
                {
                    include'apps/templades/header.phtml';
                    include'apps/templades/ListaGeneros.phtml';
                    include 'apps/templades/footer.phtml';
                }


                public function VerSeriesPorGenero($genero,$series)
                {
                    include'apps/templades/header.phtml';
                    include'apps/templades/seriesPorGenero.phtml';
                    include 'apps/templades/footer.phtml';
                }
                


            
            
                

        }



?>