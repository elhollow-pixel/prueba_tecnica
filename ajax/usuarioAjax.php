<?php
    $peticionAjax = true;
    require_once "../config/App.php";

    if(isset($_POST['usuario_email'])) {
        
        /*   Instanciar al controlador   */
        require_once "../controladores/usuarioControlador.php";
        $ins_usuario = new usuarioControlador();

        /*   Agregar un usuario  */
        if(isset($_POST['usuario_email']) && isset($_POST['usuario_password'])){
            echo $ins_usuario->agregar_usuario_controlador();    
        }

    }else{
        session_start(['name'=>'PT']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit();
    }
    