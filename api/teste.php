<?php
require 'config3.php';

$user = new Usuario();
$user = $user->loadById(83);