<?php

date_default_timezone_set('America/Sao_Paulo');
$dthoje = date('Y-m-d');
$dtset = "2018-05-31";
$trocadt = false;

if(strtotime($dthoje) > strtotime($dtset)){
    $trocadt = true;
}



?>