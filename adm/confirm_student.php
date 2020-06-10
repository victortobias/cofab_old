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
          <button class="btn btn-danger my-2 my-sm-0" type="button">Logout</button>
      		</a>
      </div>
    </nav>

    <main role="main" class="container">

      <div class="starter-template">
        <h1>Usuarios Inscritos x Trabalhos</h1>
        </div>
        <div class="row">
        <div class="form-group col-sm-4">
        	<form action="" method="POST">
		    <label for="categoryselect"><strong>Categoria</strong></label>
		    <select class="form-control" name="categoryselect" id="categoryselect" onchange="this.form.submit()">
		      	<option></option>
		      	<option>COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia</option>
		        <option>COFAB Profissional Fonoaudiólogo</option>
		        <option>COFAB Profissional de outras áreas</option>
		        <option>COFAB Estudantes Graduação e Pós Graduação de Outras Áreas</option>
		        <option>Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação</option>
		        <option>Simpósio de Saúde Coletiva - Profissionais</option>
		    </select>
			</form>
		</div>
		<div class="form-group col-sm-4">
			<form action="mail_work.php" method="POST">
		    <label for="exampleFormControlSelect1"><strong>Tipo de Email</strong></label>
		    <select class="form-control" id="exampleFormControlSelect1">
		      <option>Último prazo para envio</option>
		      <option>Link para Pagamento</option>
		    </select>
			</form>
		</div>
	  	</div>

    </main><center>
    	<h2>Selecionar:</h2>
		<form action="" method="POST">
	        <button type="submit" name="select" value="0" class="btn btn-success">Somente Confirmados</button>
	        <button type="submit" name="select" value="1" class="btn btn-danger">Somente NÃO Confirmados</button>
    	</form>

        Clique no inscrito para ver mais informações</center>
        <?php
require_once'../config2.php';
	
	if(isset($_POST['categoryselect'])){
	$selectedcategory = $_POST['categoryselect'];
	}


	date_default_timezone_set('America/Sao_Paulo');
	
	//listagem de cadastros
	$lista = Usuario::getList();
	

	echo '<table class="table"><thead class="thead-dark"><tr>
	<th scope="col"><center></center></th>
	<th scope="col"><center>id</center></th>
	<th scope="col"><center>Nome</center></th>
	<th scope="col"><center>CPF</center></th>
	<th scope="col"><center>Email</center></th>
	<th scope="col"><center>Telefone</center></th>
	<th scope="col"><center>Cidade</center></th>
	<th scope="col"><center>Estado</center></th>
	<th scope="col"><center>Categoria</center></th>
	<th scope="col"><center>Data de Cadadstro</center></th>
	<th scope="col"><center>Pagou?</center></th>
	</tr></thead><tbody>
	';

	$link = '<a href="user.php?id=';
	foreach ($lista as $key) {
		echo "<tr>";
		
		if($key['submitwork'] == 1){
			if(isset($_POST['categoryselect'])){
			if($key['category'] == $selectedcategory){

		foreach ($key as $indice => $value) {
				echo '<form action="mail_work.php" method="POST">';
			if($indice == "id"){
				echo '<td><input type="checkbox" name="sendmail" id="' . $value . '" onchange="" value=""></td>';
				echo '<th scope="row"><center>' . $link . $value . '">' . $value . '</a></center></th>';	
				$idlink = $value;
			}elseif($indice == "dtcadastro"){
				echo '<td><center>' . $link . $idlink . '">'   . date('d/m/Y', strtotime($value)) . '</center></th>';
			}elseif($indice == "rg"){
				
			}elseif($indice == "profession"){
				
			}elseif($indice == "performance"){
				
			}elseif($indice == "profession"){
				
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
				if($value == "1"){
					echo '<td><center><div class="alert alert-success" role="alert" style="padding-top: 5px; padding-bottom: 5px;">
						  Sim
						  </div></center></td>';
				}else{
					echo '<td><center><div class="alert alert-danger" role="alert" style="padding-top: 5px; padding-bottom: 5px;">
						  Não
						  </div></center></td>';
				}
			}elseif($indice == "submitwork"){
				if($value == "1"){
					echo '<td><center><div class="alert alert-success" role="alert" style="padding-top: 5px; padding-bottom: 5px;">
						  Sim
						  </div></center></td>';
				}else{
					echo '<td><center><div class="alert alert-danger" role="alert" style="padding-top: 5px; padding-bottom: 5px;">
						  Não
						  </div></center></td>';
				}
			}elseif($indice == "status"){
				
			}else{
				echo '<td><center>' . $link . $idlink . '">'  . $value . '</center></td></a>';
			}
		}
	}}else{

		foreach ($key as $indice => $value) {
				echo '<form action="mail_work.php" method="POST">';
			if($indice == "id"){
				echo '<td><input type="checkbox" name="sendmail" id="' . $value . '" onchange="" value=""></td>';
				echo '<th scope="row"><center>' . $link . $value . '">' . $value . '</a></center></th>';	
				$idlink = $value;
			}elseif($indice == "dtcadastro"){
				echo '<td><center>' . $link . $idlink . '">'   . date('d/m/Y', strtotime($value)) . '</center></th>';
			}elseif($indice == "rg"){
				
			}elseif($indice == "profession"){
				
			}elseif($indice == "performance"){
				
			}elseif($indice == "profession"){
				
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
				if($value == "1"){
					echo '<td><center><div class="alert alert-success" role="alert" style="padding-top: 5px; padding-bottom: 5px;">
						  Sim
						  </div></center></td>';
				}else{
					echo '<td><center><div class="alert alert-danger" role="alert" style="padding-top: 5px; padding-bottom: 5px;">
						  Não
						  </div></center></td>';
				}
			}elseif($indice == "submitwork"){
				if($value == "1"){
					echo '<td><center><div class="alert alert-success" role="alert" style="padding-top: 5px; padding-bottom: 5px;">
						  Sim
						  </div></center></td>';
				}else{
					echo '<td><center><div class="alert alert-danger" role="alert" style="padding-top: 5px; padding-bottom: 5px;">
						  Não
						  </div></center></td>';
				}
			}elseif($indice == "status"){
				
			}else{
				echo '<td><center>' . $link . $idlink . '">'  . $value . '</center></td></a>';
			}
		}
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
	<input type="hidden" name="sendmailw" id="sendmailw" value="olateste">
	<button type="submit" class="btn btn-lg btn-success" onclick="selectId()">Enviar Email</button>
	</form>

	<script type="text/javascript">

		function selectId(){
		   var ids = document.getElementsByName('sendmail');
		   collectIDs(ids);         
		}  
		        
		function collectIDs(dados){
		   var array_dados = dados; 
		   var newArray = [];
		   var arrayString = 0;
		   var idset = document.getElementsByName('sendmail');
		   for(var x = 0; x <= array_dados.length; x++){     
		        if(typeof array_dados[x] == 'object'){
		          if(array_dados[x].checked){
		             newArray.push(array_dados[x].id)          
		          }          
		        }
		   }
		  if(newArray.length <= 0){
		    alert("Selecione um pelo menos 1 item!");     
		  }else{
		    alert("Seu novo array de IDs tem os seguites ids [ "+newArray+" ]");
		    array2String = newArray.toString();
		    document.getElementById('sendmailw').value = array2String;
		  }  
		}

	</script>



  </body>
</html>