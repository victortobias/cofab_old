<?php 
require_once'../config2.php';

$lista = Usuario::api();

$count = count($lista);

for ($i=0; $i <= $count ; $i++) { 
	if(isset($lista[$i]['id'])){
		$lista[$i]['idraw'] = $lista[$i]['id'];
		$lista[$i]['id'] = hash("md5", $lista[$i]['id']);
		$lista[$i]['id'] = hash("sha256", $lista[$i]['id']);
	}
}

echo json_encode($lista);


$id =  $lista[0]['id'];
$nid = hash("md5", $id);





?>