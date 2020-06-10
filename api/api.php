<?php
    require 'config3.php';

    //recebimento dos dados para encriptar ID
    $lista = Usuario::api();

    $count = count($lista);

    for ($i=0; $i <= $count ; $i++) { 
        if(isset($lista[$i]['id'])){
            $lista[$i]['idraw'] = $lista[$i]['id'];
            $lista[$i]['id'] = hash("md5", $lista[$i]['id']);
            $lista[$i]['id'] = hash("sha256", $lista[$i]['id']);
        }
    }

    
    //http://stackoverflow.com/questions/18382740/cors-not-working-php
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }


    //http://stackoverflow.com/questions/15485354/angular-http-post-to-php-and-undefined
    $postdata = file_get_contents("php://input");
    //types = "s": Search / "c": Confirm
    if (isset($postdata)) {
        $request = json_decode($postdata);
        $username = $request->username;
        $type = $request->type;
        $token = $request->token;
        $idraw = $request->idraw;
        

        if($token == "d7e9a076ff593b22e98d987ce43f31df"){
        if (($username != "") and ($type="s")) {
            $selected=[];
    
        foreach ($lista as $idx){
            if(($idx['id'] == $username) and ($idx['payment'] == 1)){
                foreach ($idx as $key => $value){
                    $selected[$key] = $value;
                }
            }
        }
            
            echo json_encode($selected);

        }elseif(($idraw != "") and ($type='c')){
            
            $changed = $request->changed;
            $user = new Usuario();
            $user->loadById($idraw);
            $verifica = $user->getEntry();
            if($verifica == 1){
                echo "A entrada já foi validada anteriormente";
            }else{
            $user->updateEntry($changed);
            echo "Entrada Validada";
            }
        }
        else {
            echo "O campo está vazio!";
        }
    }else{
        echo "Usuário não permitido!";
        $ip = $_SERVER["REMOTE_ADDR"];
        echo "<br>Seu IP(".$ip.") foi registrado ao LOG" . $changed;
    }
    }
    else {
        echo "Not called properly with username parameter!";
    }
    
?>