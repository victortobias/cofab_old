<html>
<?php
error_reporting(0);
require_once'config.php';
if(!isset($_GET['id'])) {
    echo '<script>alert("Nenhum cadastro selecionado, você será redirecionado para a lista de usuarios")</script>';
    //echo '<script>window.location.replace("list_users.php");</script>';
}


$id = $_GET['id'];
    
    $consult = new Usuario();
    $consult->loadById($id);

    
    //recepção dos dados
    $name = $consult->getName();
    $rg = $consult->getRg();
    $cpf = $consult->getCpf();
    $email = $consult->getEmail();
    $telephone = $consult->getTelephone();
    $city = $consult->getCity();
    $state = $consult->getState();;
    $category = $consult->getCategory();
    $profession = $consult->getProfession();
    $performance = $consult->getPerformance();
    $dtcadastro = $consult->getDtcadastro();
    $sbfa = $consult->getSbfa();
    $submitwork = $consult->getSubmitwork();
    $entry = $consult->getEntry();
     



    //execucao de funcoes
    if(isset($_POST['update_payment'])){
        $up_payment = $_POST['update_payment'];
        $consult->updatePayment($up_payment);
        if($consult->getPayment() == 1){
            echo "<script>alert('Pagamento Confirmado! Clique em Ok para enviar um email ao cliente')</script>";
            echo '<script>window.location.href = "email/confirm_payment.php?id=' . $id . '";</script>';
        }else{
            echo "<script>alert('Pagamento Cancelado!')</script>";
        }
        unset($_POST);
    }
    if(isset($_POST['entryValue'])){
        $up_entry = $_POST['entryValue'];
        $consult->updateEntry($up_entry);
        if($consult->getEntry() == 1){
            echo "<script>alert('Entrada confirmada!')</script>";
        }else{
            echo "<script>alert('Entrada não confirmada!')</script>";
        }
        unset($_POST);
    }

    //confirmação de ENVIAR LINK
    if(isset($_POST['update_sendlink'])){
        $up_sendlink = $_POST['update_payment'];
        $consult->updatePayment($up_payment);
        if($consult->getPayment() == 1){
            echo "<script>alert('Link Enviado!')</script>";
        }
        unset($_POST);
    }

    if($category == "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia" || $category == "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas" || $category == "Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação"){
        
        if(isset($_POST['update_confirmstudent'])){
            $up_student = $_POST['update_confirmstudent'];
            $consult->updateConfirmstudent($up_student);
            if($consult->getConfirmstudent() == 1){
                echo "<script>alert('Estudante Confirmado!')</script>";
            }else{
                echo "<script>alert('Estudante Cancelado!')</script>";
            }

            unset($_POST);

        }
        $confirmstudentv = $consult->getConfirmstudent();
}

    if($sbfa == 1){
        
        if(isset($_POST['update_confirmsbfa'])){
            $up_sbfa = $_POST['update_confirmsbfa'];
            $consult->updateConfirmsbfa($up_sbfa);
            if($consult->getConfirmsbfa() == 1){
                echo "<script>alert('SBFA/ABA Confirmado!')</script>";
            }else{
                echo "<script>alert('SBFA/ABA Cancelado!')</script>";
            }
            unset($_POST);

        }
        $confirmsbfav = $consult->getConfirmsbfa();

    }


    if($submitwork == 1){
        
        if(isset($_POST['update_confirmwork'])){
            $up_work = $_POST['update_confirmwork'];
            $consult->updateConfirmwork($up_work);
        
        if($consult->getConfirmwork() == 1){
            echo "<script>alert('Trabalho Recebido!')</script>";
        }else{
            echo "<script>alert('Trabalho Cancelado!')</script>";
             }
        unset($_POST);
        }
        $confirmworkv = $consult->getConfirmwork();
    }
    //variaveis isolada pois funcoes podem altera-la antes de renderizar
    $payment = $consult->getPayment();
    
    

    
    

    //tratamento dos dados
    if($payment == 1){
      $payment = "Confirmado";
      $colorpayment = "success";
    }else{
      $payment = "Não Confirmado";
      $colorpayment = "danger";
    }

    //tratamento dos dados
    if(isset($confirmworkv)){
        if($confirmworkv == 1){
          $confirmwork = "Confirmado";
          $colorwork = "success";
        }else{
          $confirmwork = "Não Confirmado";
          $colorwork = "danger";
        }
    }
    //tratamento dos dados
    
    if(isset($confirmstudentv)){
        if($confirmstudentv == 1){
          $confirmstudent = "Confirmado";
          $colorstudent = "success";
        }else{
          $confirmstudent = "Não Confirmado";
          $colorstudent = "danger";
        }
    }

    if($sbfa == 1){
        if($confirmsbfav == 1){
          $confirmsbfa = "Confirmado";
          $colorsbfa = "success";
        }else{
          $confirmsbfa = "Não Confirmado";
          $colorsbfa = "danger";
        }
    }

?>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<html lang="pt">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>COFAB 2018 - Usuarios Cadastrados</title>

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="home.php">ADM - COFAB</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="list_users.php">Usuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adm/confirmall.php">Usuários a Confirmar</a>
          </li>
          <a href="adm/confirmados.php"><button class="btn btn-success">VALIDADOS</button></a>
        </ul>
            <a href="logout.php">
          <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
            </a>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>Perfil</h1>
        </div></main><?php
require_once'config.php';
  

  date_default_timezone_set('America/Sao_Paulo');
?> 



<div class="container">
    <div class="row m-y-2">
        <div class="col-lg-8 push-lg-4">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Perfil</a>
                </li>
                <!--<li class="nav-item">
                    <a href="" data-target="#work" data-toggle="tab" class="nav-link">Trabalho</a>
                </li>
                 <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Editar</a>
                </li> -->
            </ul>
            <div class="tab-content p-b-3">
                <div class="tab-pane active" id="profile">
                    <h4 class="m-y-2">Dados do Usuário</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Nome</h6>
                            <p>
                                <?php echo $name; ?>
                            </p>
                            <h6>CPF:</h6>
                            <p>
                                <?php echo $cpf; ?>
                            </p>
                            <h6>RG:</h6>
                            <p>
                                <?php echo $rg; ?>
                            </p>
                            <h6>Email:</h6>
                            <p>
                                <?php echo $email; ?>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h6>Telefone:</h6>
                            <p>
                                <?php echo $telephone; ?>
                            </p>
                            <h6>Cidade:</h6>
                            <p>
                                <?php echo $city; ?>
                            </p>
                            <h6>Estado:</h6>
                            <p>
                                <?php echo $state; ?>
                            </p>
                            <h6>Data de Cadastro:</h6>
                            <p>
                                <?php echo $dtcadastro; ?>
                            </p>
                        </div>
                         
                    </div>
                    <p><div class="alert alert-secondary" role="alert">
                          <strong>Modalidade de Inscrição:</strong> <?php echo $category; ?>
                        </div>
                        </p>
                        <p>
                        <?php echo '<div class="alert alert-' . $colorpayment .  '" role="alert">';?>
                          <strong>Pagamento:</strong> <?php echo $payment; ?>
                        </div>
                        
                        <?php 
                        if(isset($confirmwork)){
                        echo '<div class="alert alert-' . $colorwork .  '" role="alert">';
                        echo '<strong>Situação do Trabalho: </strong>' . $confirmwork . '</div>';    
                        }
                        ?>
                        
                        <!-- SE PRECISAR CONFIRMAR ESTUDANTE CAI NO IF -->
                        <?php 
                        if($category == "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia" || $category == "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas" || $category == "Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação"){
                            echo '<div class="alert alert-' . $colorstudent .  '" role="alert">';
                            echo '<strong>Confirmação de Estudante: </strong>' . $confirmstudent . '</div>';    
                        }
                        ?>

                        <!-- SE PRECISAR CONFIRMAR SBFA CAI NO IF -->
                        <?php 
                        if(isset($sbfa)){
                            if($sbfa == 1){
                                            echo '<div class="alert alert-' . $colorsbfa .  '" role="alert">';
                                            echo '<strong>Confirmação de SBFA/ABA: </strong>' . $confirmsbfa .'</div>';}
                        }
                        ?>                        
                          
                        
                        <a href="list_users.php">
                        <button type="button" class="btn btn-secondary btn-lg">Voltar a Todos</button>
                        </p></a>
                        <a href="adm/confirmall.php">
                        <button type="button" class="btn btn-secondary btn-lg">Voltar a Confirmar</button>
                        </p></a>
                    <!--/row-->
                </div>
                
            </div>
        </div>
        <div class="col-lg-4 pull-lg-8 text-xs-center">
            <h2 class="m-t-2">Ações</h2>
            <?php 

            if($consult->getEntry() == 0){
                echo '<form name="entryConfirm" action="" method="POST">
                <input type="hidden" name="entryValue" id="entryValue" value="' . $consult->getEntry() . '">
                <button class="btn btn-success" onclick="confirmarEntrada(); javascript:return false;">Confirmar Entrada Manualmente</button>
                </form>';
            }else{
                echo '<div class="alert alert-success col-sm-8" role="alert"><strong><center>Entrada já validada!</center></strong></div>';
            }

            //nesse caso o inscrito é estudante, não é sbfa e não enviará trabalho
            if(($category == "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia" || $category == "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas" || $category == "Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação") and ($confirmstudentv == 1) and ($sbfa == 0 or NULL) and ($submitwork == 0)){
                        echo '<form name="send_pay" action="email/link_pay.php" method="POST">
                                <br><h5>Enviar Link de Pagamento</h5>
                            <button name="send_mailpay" type="submit" class="btn btn-warning btn-lg" value="1">Enviar Email</button>
                            <input type="hidden" name="id" value="' . $id . '">
                            </form>';}

            //nesse caso o inscrito é estudante, não é sbfa e enviará trabalho
            if(($category == "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia" || $category == "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas") and ($confirmstudentv == 1) and ($sbfa == 0 or NULL) and ($submitwork == 1) and ($confirmworkv == 1)){
                        echo '<form name="send_pay" action="email/link_pay.php" method="POST">
                                <br><h5>Enviar Link de Pagamento</h5>
                            <button name="send_mailpay" type="submit" class="btn btn-warning btn-lg" value="1">Enviar Email</button>
                            <input type="hidden" name="id" value="' . $id . '">                
                            </form>';}

            //nesse caso o inscrito é estudante, é associado sbfa/aba e não enviará trabalho
            if(($category == "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia" || $category == "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas" || $category == "Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação") and ($confirmstudentv == 1) and ($sbfa == 1) and ($confirmsbfav == 1) and ($submitwork == 0)){
                        echo '<form name="send_pay" action="email/link_pay.php" method="POST">
                                <br><h5>Enviar Link de Pagamento</h5>
                            <button name="send_mailpay" type="submit" class="btn btn-warning btn-lg" value="1">Enviar Email</button>
                            <input type="hidden" name="id" value="' . $id . '">                
                            </form>';}

            //nesse caso o inscrito é estudante, associado sbfa/aba e irá enviar trabalho
            if(($category == "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia" || $category == "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas") and ($confirmstudentv == 1) and ($sbfa == 1) and ($confirmsbfav == 1) and ($submitwork == 1) and ($confirmworkv == 1)){
                        echo '<form name="send_pay" action="email/link_pay.php" method="POST">
                                <br><h5>Enviar Link de Pagamento</h5>
                            <button name="send_mailpay" type="submit" class="btn btn-warning btn-lg" value="1">Enviar Email</button>
                            <input type="hidden" name="id" value="' . $id . '">                
                            </form>';}

            //nesse caso o inscrito não é estudante, não envia trabalho, associado sbfa/aba
            if(($category !== "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia" and $category !== "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas" and $category !== "Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação") and ($sbfa == 1) and ($confirmsbfav == 1) and ($submitwork == 0)){
                        echo '<form name="send_pay" action="email/link_pay.php" method="POST">
                                <br><h5>Enviar Link de Pagamento</h5>
                            <button name="send_mailpay" type="submit" class="btn btn-warning btn-lg" value="1">Enviar Email</button>
                            <input type="hidden" name="id" value="' . $id . '">                
                            </form>';}

            //nesse caso o inscrito não é estudante, envia trabalho, associado sbfa/aba         
            if(($category !== "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia" and $category !== "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas" and $category !== "Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação") and ($sbfa == 1) and ($confirmsbfav == 1) and ($submitwork == 1) and ($confirmworkv == 1)){
                        echo '<form name="send_pay" action="email/link_pay.php" method="POST">
                                <br><h5>Enviar Link de Pagamento</h5>
                            <button name="send_mailpay" type="submit" class="btn btn-warning btn-lg" value="1">Enviar Email</button>
                            <input type="hidden" name="id" value="' . $id . '">                
                            </form>';}

                        //nesse caso o inscrito não é estudante, não envia trabalho, não é associado sbfa/aba
            if(($category !== "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia" and $category !== "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas" and $category !== "Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação") and ($sbfa == 0 or NULL) and ($submitwork == 0)){
                        echo '<form name="send_pay" action="email/link_pay.php" method="POST">
                                <br><h5>Enviar Link de Pagamento</h5>
                            <button name="send_mailpay" type="submit" class="btn btn-warning btn-lg" value="1">Enviar Email</button>
                            <input type="hidden" name="id" value="' . $id . '">                
                            </form>';}

            //nesse caso o inscrito não é estudante, envia trabalho, não é associado sbfa/aba         
            if(($category !== "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia" and $category !== "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas" and $category !== "Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação") and ($sbfa == 0 or NULL) and ($submitwork == 1) and ($confirmworkv == 1)){
                        echo '<form name="send_pay" action="email/link_pay.php" method="POST">
                                <br><h5>Enviar Link de Pagamento</h5>
                            <button name="send_mailpay" type="submit" class="btn btn-warning btn-lg" value="1">Enviar Email</button>
                            <input type="hidden" name="id" value="' . $id . '">                
                            </form>';}


            ?>
                <form name="Fupdate_payment" action="" method="POST">
                    <br><h5>Pagamentos</h5>
                <button name="update_payment" type="button" class="btn btn-success btn-lg" value="1" onclick="confirmar(this.value)">Confirmar Pagamento</button>
                <br><br>
                <button name="update_payment" type="submit" class="btn btn-danger btn-lg" value="0" onclick="cancelar(this.value)" style=" padding-left: 20px; padding-right: 20px;">Cancelar Pagamento</button>
                <br><br>
                <!-- Hidden para envio com JS -->
                <input type="hidden" name="update_payment">
                </form>
                
            <?php


            if($submitwork == 1){
                            echo '<form name="update_confirmwork" action="" method="POST">
                                <br><h5>Trabalho</h5>
                            <button name="update_confirmwork" type="submit" class="btn btn-success btn-lg" value="1">Receber Trabalho</button>
                            <br><br>
                            <button name="update_confirmwork" type="submit" class="btn btn-danger btn-lg" value="0" style=" padding-left: 20px; padding-right: 20px;">Cancelar Trabalho</button>
                            <br><br>
                            
                            </form>';}

            if(isset($confirmstudent)){
                        echo '<form name="update_confirmstudent" action="" method="POST">
                                <br><h5>Estudante</h5>
                            <button name="update_confirmstudent" type="submit" class="btn btn-success btn-lg" value="1">Confirmar Estudante</button>
                            <br><br>
                            <button name="update_confirmstudent" type="submit" class="btn btn-danger btn-lg" value="0" style=" padding-left: 20px; padding-right: 20px;">Cancelar Estudante</button>
                            <br><br>
                            
                            </form>'; }
            if($sbfa == 1){
                        echo '<form name="update_confirmsbfa" action="" method="POST">
                                <br><h5>SBFA/ABA</h5>
                            <button name="update_confirmsbfa" type="submit" class="btn btn-success btn-lg" value="1">Confirmar SBFA/ABA</button>
                            <br><br>
                            <button name="update_confirmsbfa" type="submit" class="btn btn-danger btn-lg" value="0" style=" padding-left: 20px; padding-right: 20px;">Cancelar SBFA/ABA</button>
                            <br><br>
                            
                            </form>';
                             }


            ?>
        </div>
    </div>
</div>
<hr>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
 <!-- Confirma/Cancela Operações de Pagamento -->
  <script type="text/javascript">
      function confirmar(valueinput){
        
        //console.log(update_payment.value);
    if(confirm('Deseja realmente confirmar o pagamento?\nSerá enviado um email automático para o cliente.') == true) {
        document.getElementsByName('update_payment')[2].setAttribute("value","1");
        document.Fupdate_payment.submit();
    } else {
        alert('Solicitação Cancelada!');
    }
}

      function cancelar(valueinput){
        
        //console.log(update_payment.value);
    if(confirm('Deseja realmente cancelar o pagamento?') == true) {
        document.getElementsByName('update_payment')[2].setAttribute("value","0");
        document.Fupdate_payment.submit();
    } else {
        alert('Solicitação Cancelada!');
    }
}

    function confirmarEntrada(valueinput){
        
        //console.log(update_payment.value);
    if(confirm('Deseja realmente confirmar a entrada? \n Esse processo é irreversível!') == true) {
        $("#entryValue").val('1');
        document.entryConfirm.submit();
    } else {
        alert('Solicitação Cancelada!');
    }
}

  </script>




  </body>
</html>