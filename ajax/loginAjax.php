<?php
    $peticionAjax = true;
    require_once "../config/App.php";

    if(){
        
        
    }else{
        session_start(['name'=>'PT']);
        session_unset();
        session_destroy();
        header("Location: ".SERVERURL."login/");
        exit();
    }
    