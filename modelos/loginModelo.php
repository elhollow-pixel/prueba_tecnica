<?php

    require_once "mainModel.php";

    class loginModelo extends mainModel{

        // Modelo iniciar sesion  
        protected static function iniciar_sesion_modelo($datos){
       
            $sql= mainModel::conectar()->prepare("SELECT * FROM usuario WHERE usuario_email=:Email");
            $sql->bindParam(":Email",$datos['Email']);
            //$sql->bindParam(":Clave",$datos['Clave']);
            $sql->execute();

            return $sql;
        }
    }