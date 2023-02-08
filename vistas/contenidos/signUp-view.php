<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="<?php echo SERVERURL;?>/vistas/css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
  </head>

  <body>

  <h1>Sign Up</h1>

    <form  class="FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST" data-form="save">
      <input name="usuario_email" type="email" placeholder="Enter your email">
      <span class="icon-eye"><i class="fa-solid fa-eye-slash"></i></span>
      <input class="pass" name="usuario_password" type="password" placeholder="Enter your Password">
      <input name="usuario_confirm_password" type="password" placeholder="Confirm Password">
      <input type="submit" value="submit">
    </form>
    <span>or <a href="<?php echo SERVERURL;?>login/">Login</a></span>

    <?php include "./vistas/inc/script.php" ?>
  </body>
</html>


