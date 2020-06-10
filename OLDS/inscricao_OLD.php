<!doctype html>
<html lang="pt">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!--RECAPTCHA-->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <title>Inscrição COFAB-2018</title>
  </head>
  <body>
  <div class="container">
    <form action="email/send_mail.php" method="POST" autocomplete="off">
    <div class="form-group">
      <label for="name">Nome Completo</label>
      <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="cpf">CPF</label>
      <input type="text" class="form-control" id="cpf" name="cpf" required>
    </div>
    <div class="form-group">
      <label for="rg">RG</label>
      <input type="text" class="form-control" id="rg" name="rg" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
      <small id="emailHelp" class="form-text text-muted">Este email receberá as informações do congresso.</small>
    </div>
    <div class="form-group">
      <label for="email_confirm">Confirme seu Email</label>
      <input type="email_confirm" class="form-control" id="confirm_email" name="confirm_email"  autocomplete="off" required>
    </div>
    <div class="form-group">
      <label for="telephone">Telefone de Contato</label>
      <input type="text" class="form-control" id="telephone" name="telephone" autocomplete="off" required>
    </div>
    <div class="form-group">
      <label for="city">Cidade</label>
      <input type="text" class="form-control" id="city" name="city" autocomplete="off" required>
    </div>
    <div class="form-group">
    <label for="state">Estado</label>
    <select class="form-control" name="state" id="state" required>
        <option value=""></option>
        <option value="AC">Acre</option>
        <option value="AL">Alagoas</option>
        <option value="AP">Amapá</option>
        <option value="AM">Amazonas</option>
        <option value="BA">Bahia</option>
        <option value="CE">Ceará</option>
        <option value="DF">Distrito Federal</option>
        <option value="ES">Espírito Santo</option>
        <option value="GO">Goiás</option>
        <option value="MA">Maranhão</option>
        <option value="MT">Mato Grosso</option>
        <option value="MS">Mato Grosso do Sul</option>
        <option value="MG">Minas Gerais</option>
        <option value="PA">Pará</option>
        <option value="PB">Paraíba</option>
        <option value="PR">Paraná</option>
        <option value="PE">Pernambuco</option>
        <option value="PI">Piauí</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="RN">Rio Grande do Norte</option>
        <option value="RS">Rio Grande do Sul</option>
        <option value="RO">Rondônia</option>
        <option value="RR">Roraima</option>
        <option value="SC">Santa Catarina</option>
        <option value="SP">São Paulo</option>
        <option value="SE">Sergipe</option>
        <option value="TO">Tocantins</option>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Categoria de Inscrição</label>
      <select class="form-control" id="category" name="category" onchange="ChangeDiv('submitwork'); ChangeDiv2('sbfa_div'); alertStudent();" required>
        <option></option>
        <option>COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia</option>
        <option>COFAB Profissional Fonoaudiólogo</option>
        <option>COFAB Profissional de outras áreas</option>
        <option>COFAB Estudantes Graduação e Pós Graduação de Outras Áreas</option>
        <option>Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação</option>
        <option>Simpósio de Saúde Coletiva - Profissionais</option>
      </select>
    </div>

    <!--alerta é apresentado aqui-->
    <small id="emailHelp" class="form-text text-muted"><p id="rtStudent"></p></small>

    <div class="form-group" id="submitwork" style="display: none;">
      <label for="submit_work">Submissão de Trabalho</label><br>
      <div class="btn-group btn-group-toggle" data-toggle="buttons" id="divsubwork">
        <label class="btn btn-danger">
          <input type="radio" name="submit_work" id="submit_work" value="0" > Não
        </label>
        <label class="btn btn-success">
          <input type="radio" name="submit_work" id="submit_work" value="1" > Sim
        </label>
      </div>
    </div>
    <div class="form-group" id="sbfa_div" style="display: none;">
      <label for="submit_work">Associado à Sociedade Brasileira de Fonoaudiologia - SBFA ou Academia Brasileira de Audiologia - ABA</label><br>
      <div class="btn-group btn-group-toggle" data-toggle="buttons" id="divsubwork">
        <label class="btn btn-danger">
          <input type="radio" name="sbfa" id="sbfa" value="0" > Não
        </label>
        <label class="btn btn-success">
          <input type="radio" name="sbfa" id="sbfa" value="1" > Sim
        </label>
      </div>
    </div>
    <div class="form-group">
      <label for="profession">Profissão</label>
      <input type="text" class="form-control" id="profession" name="profession" autocomplete="off">
    </div>
    <div class="form-group">
      <label for="performance">Curso/Área de Atuação</label>
      <input type="text" class="form-control" id="performance" name="performance" autocomplete="off" required>
    </div>

    <div class="g-recaptcha" data-sitekey="6LdGK1cUAAAAAC6REJxVYf17yDN5PzGNATtRPNGL"></div>
    <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
    </form>

      <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </div>
  </body>

<!-- script para mostrar/esconder div e ativar/desativar required submit_work -->
<script type="text/javascript">
function ChangeDiv(el) {
        
        var display = document.getElementById(el).style.display;
        var x = document.getElementById("category").value;

        if(x == "Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação"){
            document.getElementById(el).style.display = 'none';
            document.getElementById("submit_work").required = false; 
        }else if(x == "Simpósio de Saúde Coletiva - Profissionais"){
            document.getElementById(el).style.display = 'none';
            document.getElementById("submit_work").required = false; 
        }else{
            document.getElementById(el).style.display = 'block';
            document.getElementById("submit_work").required = true;
        }

        
    }

</script>

<!-- script para mostrar/esconder div e ativar/desativar required sfba -->
<script type="text/javascript">
function ChangeDiv2(el) {
        
        var display = document.getElementById(el).style.display;
        var x = document.getElementById("category").value;

        if(x == "COFAB Profissional de outras áreas"){
            document.getElementById(el).style.display = 'none';
            document.getElementById("sbfa").required = false; 
        }else if(x == "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas"){
            document.getElementById(el).style.display = 'none';
            document.getElementById("sbfa").required = false; 
        }else if(x == "Simpósio de Saúde Coletiva Estudantes Graduação e Pós Graduação"){
            document.getElementById(el).style.display = 'none';
            document.getElementById("sbfa").required = false; 
        }else if(x == "Simpósio de Saúde Coletiva - Profissionais"){
            document.getElementById(el).style.display = 'none';
            document.getElementById("sbfa").required = false; 
        }else{
            document.getElementById(el).style.display = 'block';
            document.getElementById("sbfa").required = true; 
        }

        
    }

</script>

<script type="text/javascript">
function alertStudent() {
        
        var x = document.getElementById("category").value;

        if(x == "COFAB Estudante Graduação e Pós Graduação da Fonoaudiologia" || x == "COFAB Estudantes Graduação e Pós Graduação de Outras Áreas"){
            document.getElementById("rtStudent").innerHTML = "Nesta modalidade é necessário a comprovação de estudante"; 
        }else{
            document.getElementById("rtStudent").innerHTML = "";
        }

        
    }

</script>












<!--validação de email-->
<script type="text/JavaScript">

  var email = document.getElementById("email")
  , confirm_email = document.getElementById("confirm_email");

function validateEmail(){
  if(email.value != confirm_email.value) {
    confirm_email.setCustomValidity("Email diferentes, verifique!");
    console.log(email.value);
    console.log(email_confirm.value);
  } else {
    confirm_email.setCustomValidity('');
  }
}

email.onchange = validateEmail;
confirm_email.onkeyup = validateEmail;
</script>

</html>