<?php
//logado = true para não ficar em loopback / outras paginas estao desabilitadas
$verifica = true;
require'config.php';

if(isset($_SESSION['id'])){
  echo '<script>window.location.href = "list_users.php";</script>';
}

if(isset($_POST["email"])){
$conn = new Admin();
$conn->login($_POST["email"], $_POST["password"]);
}




?>
<!doctype html>
<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="ico/fobico.ico">

    <title>GASP - Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/loginb.css" rel="stylesheet">
  </head>



  <body class="text-center">
    <form class="form-signin" action="#" method="POST">
      <img class="mb-4" src="images/Cofab-25.jpeg" alt="USP-FOB" width="250" height="120">
      <h1 class="h3 mb-3 font-weight-normal">COFAB 2018 - Login</h1>
      <label for="user" class="sr-only">Usuario</label>
      <input type="text" name="email" id="email" class="form-control" placeholder="Usuario" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
      <button class="btn btn-lg btn-success btn-block" onclick="window.location.href='cadastrar.php'">Cadastrar</button>
      <p class="mt-5 mb-3 text-muted">Desenvolvido com <font color="red">♥</font> por <a href="https:www.solubytes.com.br"> Solubytes</a></p>
    </form>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>

</html>
