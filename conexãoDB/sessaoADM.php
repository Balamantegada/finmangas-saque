<?php 
	//session_start inicia a sessão
	session_start();

	if (empty($_SESSION['adm'])){
		header('Location: /htdocs/index.php');
		exit;
	}
?>