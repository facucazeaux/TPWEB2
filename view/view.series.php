<?php

    class viewSerie
        {

            public function listadoTodasLasSeries($series,$genero)
                {
                    include 'templades/header.phtml';
                    include 'templades/TodasLasSeries.phtml';
                    include 'templades/footer.phtml';
                }

            public function SerieDetalle($serie)
                {
                    include 'templades/header.phtml';
                    include 'templades/serieDetalle.phtml';
                    include 'templades/footer.phtml';
                }


          
                public function VerTodosLosGeneros($genero)
                {   
                    include'templades/header.phtml';
                    include'templades/ListaGeneros.phtml';
                    include 'templades/footer.phtml';
                }


                public function VerSeriesPorGenero($genero,$series)
                {
                    include'templades/header.phtml';
                    include'templades/seriesPorGenero.phtml';
                    include 'templades/footer.phtml';
                }
                


            
            
                

        }



?>