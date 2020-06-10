<html>
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
            <a class="nav-link" href="home.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="list_users.php">Usuários</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="adm/confirmall.php">Usuários a Confirmar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Admins</a>
          </li>
        </ul>
    		<a href="logout.php">
          <button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button>
      		</a>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>Usuarios Inscritos</h1>
        
        </div></main>
        <center>Clique no inscrito para ver mais informações</center>
        <?php
require_once'config.php';
	
	echo $_SESSION['id'];

	date_default_timezone_set('America/Sao_Paulo');
	
	//listagem de cadastros
	$lista = Usuario::getList();
	

	echo '<table class="table"><thead class="thead-dark"><tr>
	<th scope="col"><center>id</center></th>
	<th scope="col"><center>Nome</center></th>
	<th scope="col"><center>RG</center></th>
	<th scope="col"><center>CPF</center></th>
	<th scope="col"><center>Email</center></th>
	<th scope="col"><center>Telefone</center></th>
	<th scope="col"><center>Cidade</center></th>
	<th scope="col"><center>Estado</center></th>
	<th scope="col"><center>Categoria</center></th>
	<th scope="col"><center>Profissao</center></th>
	<th scope="col"><center>Atuacao</center></th>
	<th scope="col"><center>Data de Cadadstro</center></th>
	<th scope="col"><center>Pagou?</center></th>
	</tr></thead><tbody>
	';
	
	$link = '<a href="user.php?id=';
	foreach ($lista as $key) {
		echo "<tr>";
		foreach ($key as $indice => $value) {

			if($indice == "id"){
				echo '<th scope="row"><center>' . $link . $value . '">' . $value . '</a></center></th>';	
				$idlink = $value;
			}elseif($indice == "dtcadastro"){
				echo '<td><center>' . $link . $idlink . '">'   . date('d/m/Y', strtotime($value)) . '</center></th>';
			}elseif($indice == "payment"){
				if($value == 1){
					echo '<td><center><div class="alert alert-success" role="alert" style="padding-top: 5px; padding-bottom: 5px;">
						  Sim
						  </div></center></td>';
				}else{
					echo '<td><center><div class="alert alert-danger" role="alert" style="padding-top: 5px; padding-bottom: 5px;">
						  Não
						  </div></center></td>';
				}
			}elseif($indice == "confirmwork"){
				
			}elseif($indice == "submitwork"){
				
			}elseif($indice == "status"){
				
			}elseif($indice == "confirmstudent"){
				
			}elseif($indice == "sbfa"){
				
			}elseif($indice == "confirmsbfa"){
				
			}elseif($indice == "sendlink"){
				
			}else{
				echo '<td><center>' . $link . $idlink . '">'  . $value . '</center></td></a>';
			}
		}
		echo "</tr>";
	}
	echo "</tbody></table></center>";



?>
</p><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>




  </body>
</html>