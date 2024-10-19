<?php
class viewGenero
        {
            public $user = null;
            
            public function __construct($user)
            {
                $this->user=$user;
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


            public function ver_agregarGenero()
            {
                
                include 'apps/templades/header.phtml';
                include 'apps/templades/Agregar_genero.phtml';
                include 'apps/templades/footer.phtml';
            }


            public function eliminarGenero($res)
            {
                include 'apps/templades/header.phtml';
                include 'apps/templades/ListaGeneros.phtml';
                include 'apps/templades/footer.phtml';
            
            }
           
            
            public function ver_editarGenero($genero)
                {
                    include 'apps/templades/header.phtml';
                    include 'apps/templades/formulario_editarGenero.phtml';
                    include 'apps/templades/footer.phtml';
                }

        

        }
