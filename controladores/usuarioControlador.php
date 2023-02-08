<?php

    if($peticionAjax){
        require_once "../modelos/usuarioModelo.php";
    }else{
        require_once "./modelos/usuarioModelo.php";
    }
    //class="FormularioAjax"
    class usuarioControlador extends usuarioModelo{


        /*  Controldor  para agregar usuario  */
        public function agregar_usuario_controlador(){
            

            $email = mainModel::limpiar_cadena($_POST['usuario_email']);
            $password = mainModel::limpiar_cadena($_POST['usuario_password']);
            $confiPassword = mainModel::limpiar_cadena($_POST['usuario_confirm_password']);
   

            /*   verificar_correos_repetidos   */
           
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
                        
                $check_email=mainModel::ejecutar_consulta("SELECT usuario_email FROM usuario WHERE usuario_email='$email'");
                        
                if($check_email->rowCount()>0){
                    $alerta=[
                        "Alerta"=>"simple",
                        "Icono"=>"error",
                        "Titulo"=>"Ocurrio un error inesperado",
                        "Texto"=>"El correo ya se encuentra registrado en el sistema"
                    ];
                    echo json_encode($alerta);
                    exit();
                }
    
            }
            
            /*  verificar  input vacioas  */
            if($email=="" || $password=="" || $confiPassword==""){
                $alerta=[
                    "Alerta"=>"simple",
                    "Icono"=>"error",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"No has llenado todos los campos que son obligatorios"
                ];
                
                echo json_encode($alerta);
                exit();
                
            }

            /*  verificar  contraseña  */
            if(mainModel::verificar_datos("[a-zA-Z0-9$@.-]{7,10}",$password) || mainModel::verificar_datos("[a-zA-Z0-9$@.-]{7,10}",$confiPassword)){
                $alerta=[
                    "Alerta"=>"simple",
                    "Icono"=>"error",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"Las CLAVES no coinciden con el formato solicitado minimo 7 caracteres maximo 10"
				];
				echo json_encode($alerta);
                exit();
			}
            
            if($password != $confiPassword){
                $alerta=[
                    "Alerta"=>"simple",
                    "Icono"=>"error",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"Las claves que intento ingresar no conciden"
                ];
                echo json_encode($alerta);
                exit();
            }else{
                $pass= mainModel::encryption($password);
            }

   

            /* datos usuario */
            $datos_usuarios=[
                "Email"=>$email,
                "Clave"=>$pass,
                "Estado"=>"Activa",
                "Privilegio"=>2
            ];

            $agregar_usuario = usuarioModelo::agregar_usuario_modelo($datos_usuarios);
            if($agregar_usuario->rowCount()==1){
                
                $alerta=[
                    "Alerta"=>"limpiar",
                    "Icono"=>"success",
                    "Titulo"=>"Usuario registrado",
                    "Texto"=>"Los datos del usuario han sido registrado con exito"
                ];
                echo json_encode($alerta);
                exit();
            }else{
                $alerta=[
                    "Alerta"=>"simple",
                    "Icono"=>"error",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"No se ha podido registrar al usuario"
                ];
                echo json_encode($alerta);
                exit();
            }
    
        }

        

  


    }



