<html>

<body>
    <?php
		$user = "root";
		$password = "root";
		$database = "finmangas";
		$hostname = "localhost";

		$conexao = new mysqli($hostname,$user,$password,$database);

		// Evita caracteres epeciais (SQL Inject)
		$usuario = $conexao -> real_escape_string($_POST['usuario']);
		$senha = $conexao -> real_escape_string($_POST['senha']);
		$email = $conexao -> real_escape_string($_POST['email']);		
        //insere os dados no banco de dados.
        $sql="INSERT INTO `cadastros1`
			(`usuario`, `senha`, `email`, `ativo`)
			VALUES
			('".$usuario."', '".$senha."', '".$email."', '1', 'user');";

		$res = $conexao->query($sql);

		$conexao -> close();
		header('Location: ../index.php');
		exit();
    ?>

</body>

</html>