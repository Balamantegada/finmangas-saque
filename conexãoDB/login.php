<html>

<body>
    <?php
	session_start();

	$nome = $_POST['nomeCliente'];
	$senha = $_POST['senha'];

	$user = "root";
	$password = "root";
	$database = "finmangas";
	$hostname = "localhost";

	$conexao = new mysqli($hostname, $user, $password, $database) or die('Não foi possível conectar');

	// Evita caracteres epeciais (SQL Inject)
	$usuario = $conexao->real_escape_string($_POST['usuario']);
	$senha = $conexao->real_escape_string($_POST['senha']);

	//verifica o usuário no banco de dados.
	$sql = "SELECT `usuario` FROM `cadastros1` WHERE `usuario` = '" . $usuario . "' AND `senha` = '" . $senha . "' AND `ativo` = '0';";
	$sql1 = "SELECT `nivelacesso` FROM `cadastros1` WHERE `nivelacesso` = 'admin' AND `usuario` = '"  .$usuario. "';";

	$res = $conexao->query($sql);
	
	$res1 = $conexao->query($sql1);

	if ($res->num_rows != 0) {
		$row = $res->fetch_array();
		$_SESSION['usuario'] = $row[0];
		$conexao->close();
		if ($res1->num_rows != 0) {
			header('Location: ../home.php', true, 301);
			$_SESSION['adm'] = $row[0];
		} else {
			header('Location: ../site_para_usuarios/home.php', true, 301);
		}
		
		exit();
	} else {
		$_SESSION['nao_autenticado'] = true;
		$conexao->close();
		header('Location: ../index.php', true, 301);
	}

	?>

</body>

</html>