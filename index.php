<?php
    require_once "./config/App.php";
    require_once "./controladores/vistasControlador.php";

    $plantilla = new vistasControlador();
    $plantilla->obtener_plantilla_controlador();
    