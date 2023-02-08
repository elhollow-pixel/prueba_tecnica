<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo SERVERURL;?>/vistas/css/styles.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  </head>

  <body>

    <h1>Login</h1>
    
    <form action="" method="POST">
      <input class="form_input" name="email_log" type="email" placeholder="Email">
      <span class="pass icon-eye"><i class="fa-solid fa-eye-slash"></i></span>
      <input class="form_input" name="password_log" type="password" placeholder="Password">
      <input type="submit" value="Login in">
    </form>
    <span>or <a href="<?php echo SERVERURL;?>signUp/">SignUp</a></span>
    
    <?php include "./vistas/inc/script.php"?>
  </body>
</html>


<?php
  if(isset($_POST['email_log']) && isset($_POST['password_log'])){
    require_once "./controladores/loginControlador.php";

    $ins_login = new loginControlador();
    echo $ins_login->iniciar_sesion_controlador();
  }
?>



