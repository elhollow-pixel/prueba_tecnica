<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo NAME ?></title>
</head>
<body>
   <?php
        $peticionAjax=false;    
        require_once "./controladores/vistasControlador.php";
        $IV = new vistasControlador();
        $vistas=$IV->obtener_vistas_controlador();

        if($vistas=='login' || $vistas=='404'){
            require_once "./vistas/contenidos/".$vistas."-view.php";
        }else{
            include $vistas;
            session_start(['name'=>'PT']);
        }
   ?>
</body>
</html>

