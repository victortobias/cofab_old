<?php
$verifica = true;
require'config.php';

if(isset($_POST["email"])){
$conn = new Admin($_POST["email"], $_POST["password"]);
$conn->insert();
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

    <title>COFAB 2018 - Cadastro</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/loginb.css" rel="stylesheet">

  </head>



  <body class="text-center">
    <form class="form-signin" action="#" method="POST" name="signin">
      <img class="mb-4" src="images/Cofab-25.jpeg" alt="USP-FOB" width="250" height="120">
      <h1 class="h3 mb-3 font-weight-normal">COFAB 2018 - Cadastro</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="Email" required >
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Senha" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit" onclick="VerificaCPF();">Enviar</button>
      <button class="btn btn-lg btn-danger btn-block" onclick="window.location.href='index.php'">Voltar</button>
      <p class="mt-5 mb-3 text-muted">Desenvolvido com <font color="red">♥</font> por <a href="https:www.solubytes.com.br"> Solubytes</a></p>
    </form>
  </body>

</html>
