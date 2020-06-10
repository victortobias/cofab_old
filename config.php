<?php 
session_start();

spl_autoload_register(function($class_name){

	$filename = "class".DIRECTORY_SEPARATOR.$class_name.".php";

	if(file_exists($filename)) {
		require_once($filename);
	}

});


if(isset($_SESSION['id'])){
	$logado = new Admin();
	$logado->loadById($_SESSION['id']);
	$verifica = true;
}elseif($verifica == true){
	$verifica = true;
}else{
	echo '<script>window.location.href = "index.php";</script>';
	$verifica = false;
}



 ?>