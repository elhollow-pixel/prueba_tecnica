<?php

    if($peticionAjax){
        require_once "../modelos/loginModelo.php";
    }else{
        require_once "./modelos/loginModelo.php";
    }

    class loginControlador extends loginModelo{

        /* Controlador iniciar sesion  */
        public function iniciar_sesion_controlador(){

            $email = mainModel::limpiar_cadena($_POST['email_log']);
            $password = mainModel::limpiar_cadena($_POST['password_log']);

            /* Comprobar campos vacio */
            if($email=="" || $password==""){
                echo '
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "Ocurrio un error inesperado",
                            text:  "No has llenado todos los campos requeridos",
                            confirmButtonText: "Aceptar"
                        });
                    </script>
                ';
                exit();
            }

            //Verificar la idenidad de los datos 
            if(mainModel::verificar_datos("[a-zA-Z0-9$@.-]{7,10}",$password)){
                echo '
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "Ocurrio un error inesperado",
                            text:  "La contraseña no coincide con el formato solicitado",
                            confirmButtonText: "Aceptar"
                        });
                    </script>
                ';
                exit();
            }
            
      
            
            $datos_login=[
                "Email"=>$email,
                //"Clave"=> $passhash, 
            ];

            $datos_cuenta=loginModelo::iniciar_sesion_modelo($datos_login);
         
            
            if($datos_cuenta->rowCount()==1){  
                
                $row=$datos_cuenta->fetch();
                $passhash = $row['usuario_clave'];
         
                if(password_verify($password, $passhash)){
                    echo "entro";
                    session_start(['name'=>'PT']);
                
                    $_SESSION['id']=$row['usuario_id'];
                    $_SESSION['email']=$row['usuario_email'];
                    $_SESSION['privilegio']=$row['usuario_privilegio'];
    
                    echo $_SESSION['privilegio']=$row['usuario_privilegio'];
                    if($_SESSION['privilegio'] == 2 ){
                        return header("Location: ".SERVERURL."homeUser");
                    }else{
                        if($_SESSION['privilegio'] == 1 ){
                            return header("Location: ".SERVERURL."homeAdmin");
                        }
                    }
                }else{
                    echo '
                    <script>
                        Swal.fire({
                            icon: "error",
                            title: "Ocurrio un error inesperado",
                            text:  "EL EMAIL o CONTRASEÑA son incorrectos",
                            confirmButtonText: "Aceptar"
                        });
                    </script>
                    ';
                    exit();
                }
            }else{
                echo '
                <script>
                    Swal.fire({
                        icon: "error",
                        title: "Ocurrio un error inesperado",
                        text:  "EL EMAIL o CONTRASEÑA son incorrectos",
                        confirmButtonText: "Aceptar"
                    });
                </script>
                ';
                exit();
            }

        }
    }