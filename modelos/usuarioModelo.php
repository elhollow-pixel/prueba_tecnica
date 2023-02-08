<?php

    require_once "mainModel.php";

    class usuarioModelo extends mainModel{
            
        /*   Modelo para agregar usuario  */
        protected static function agregar_usuario_modelo($datos){
            $sql = mainModel::conectar()->prepare("INSERT INTO usuario(usuario_email,usuario_clave,usuario_estado,usuario_privilegio)VALUES(:Email,:Clave,:Estado,:Privilegio)");
			                                                                        
            /*  Sustituir los marcadores */
            $sql->bindParam(":Email",$datos['Email']);
            $sql->bindParam(":Clave",$datos['Clave']);
            $sql->bindParam(":Estado",$datos['Estado']);
            $sql->bindParam(":Privilegio",$datos['Privilegio']);
            $sql->execute();

            return $sql;
        }
    }
