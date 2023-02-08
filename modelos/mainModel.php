<?php

    if($peticionAjax){
        require_once "../config/Server.php";
    }else{
        require_once "./config/Server.php";
    }
    
    
    class mainModel{
        /*   Funcion para conecta a la BD  */
        protected static function conectar(){
            $conexion = new PDO(SGBD, USER, PASS);
            $conexion->exec("SET CHARACTER SET utf8");
            return $conexion;
        }

        /*   Funcion para ejecutar consulta   */
        protected static function ejecutar_consulta($consulta){
            //referencia a un funcion o metodo
            $sql=self::conectar()->prepare($consulta);
            $sql->execute();
            return $sql;
        }

	    //Encriptar cadenas- no funcional     
		public function encryption($string){
			$passEnript=password_hash($string,PASSWORD_DEFAULT);
			return $passEnript;
		}  


        /* Funcion limpiar cadenas */
        protected static function limpiar_cadena($cadena){
            $cadena = trim($cadena);
            $cadena = stripcslashes($cadena);
            $cadena = str_ireplace("<script>", "",$cadena);
            $cadena = str_ireplace("</script>", "",$cadena);
            $cadena = str_ireplace("<script src", "",$cadena);
            $cadena = str_ireplace("<script type=", "",$cadena);
            $cadena = str_ireplace("SELECT * FROM", "",$cadena);
            $cadena = str_ireplace("DELETE FROM", "",$cadena);
            $cadena = str_ireplace("INSERT INTO", "",$cadena);
            $cadena = str_ireplace("DROP TABLE", "",$cadena);
            $cadena = str_ireplace("DROP DATABASE", "",$cadena);
            $cadena = str_ireplace("TRUNCATE TABLE", "",$cadena);
            $cadena = str_ireplace("SHOW TABLES", "",$cadena);
            $cadena = str_ireplace("SHOW DATABASE", "",$cadena);
            $cadena = str_ireplace("<?php", "",$cadena);
            $cadena = str_ireplace("<?", "",$cadena);
            $cadena = str_ireplace("--", "",$cadena);
            $cadena = str_ireplace(">", "",$cadena);
            $cadena = str_ireplace("<", "",$cadena);
            $cadena = str_ireplace("[", "",$cadena);
            $cadena = str_ireplace("]", "",$cadena);
            $cadena = str_ireplace("^", "",$cadena);
            $cadena = str_ireplace("==", "",$cadena);
            $cadena = str_ireplace(";", "",$cadena);
            $cadena = str_ireplace("::", "",$cadena);
            $cadena = stripcslashes($cadena);
            $cadena = trim($cadena);

            return $cadena;
        }

        
        /* Funcion verificar datos*/
        protected static function verificar_datos($filtro,$cadena){
            //verificar una expresion regular
            if(preg_match("/^".$filtro."$/",$cadena)){
                return false;
            }else{
                return true;
            }
        }

    }