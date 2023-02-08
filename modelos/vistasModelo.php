<?php
    
    class vistasModelo{

        /*   Modelo para obetener vistas  */
        protected static function obtener_vistas_modelo($vistas){
            $listaBlanca=["homeAdmin","homeUser","signUp"];
            //comrprueba si en un texto esta en un array 
            if(in_array($vistas, $listaBlanca)){
                //comprueba si existe el archivo
                if (is_file("./vistas/contenidos/".$vistas."-view.php")) {
                    $contenido="./vistas/contenidos/".$vistas."-view.php";
                } else {
                    $contenido="404";
                }
                
            }elseif($vistas=="login" || $vistas=="index"){
                $contenido="login";
            }else{
                $contenido="404";
            }
            return $contenido;
        }
    }