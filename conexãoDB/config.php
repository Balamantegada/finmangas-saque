<?php 
    $user = "root";
	$password = "root";
	$database = "finmangas";
	$hostname = "localhost";

    $conexao = new mysqli($hostname, $user, $password, $database) or die('Não foi possível conectar');
?>