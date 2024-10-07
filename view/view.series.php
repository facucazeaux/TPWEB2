<?php

    class viewSerie
        {

            public function listadoTodasLasSeries($series)
                {
                   
                    include 'templades/TodasLasSeries.phtml';
                }

            public function SerieDetalle($serie)
                {
                  include 'templades/serieDetalle.phtml';
                }


          

            
                

        }



?>