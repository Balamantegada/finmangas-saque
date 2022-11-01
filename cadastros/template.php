<?php
	//session_start inicia a sessão
	session_start();

	if (empty($_SESSION['usuario'])){
		header('Location: ../index.php');
		exit;
	}
        
    include_once('../conexãoDB/config.php');
    $sql1 = "SELECT * FROM pessoasfisicas ORDER BY id_pessoa DESC";
    $arrayPessoasFisicas = $conexao->query($sql1);

    include_once('../conexãoDB/config.php');
    $sql2 = "SELECT * FROM pessoasjuridicas ORDER BY id_pessoa DESC";
    $arrayPessoasJuridicas = $conexao->query($sql2);

    include_once('../conexãoDB/config.php');
    $sql2 = "SELECT * FROM cidadepessoas ORDER BY id_cidade DESC";
    $arrayCidade = $conexao->query($sql2);

    include_once('../conexãoDB/config.php');
    $sql3 = "SELECT * FROM estadopessoas ORDER BY id_estado_db DESC";
    $arrayEstado = $conexao->query($sql3);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finmangas</title>
    <link rel="stylesheet" type="text/css" href="../styles/stylespaginacadastros.css">
    <link rel="shortcut icon" href="/imgs/logo.png">
</head>

<body>

    <header>
        <nav>
            <a href="/home.php">
                <h1>Finmangas ADM</h1>
            </a>
            <a href="/home.php"><img src="/imgs/logo1.png" alt="logo"></a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">

                <li><a href="/home.php">Home</a></li>
                <li><a href="/paginas.php">Paginas</a></li>
                <li><a href="/perfil.php">Perfil</a></li>
                <?php
                    if(empty($_session['usuario'])){
                        echo'<li><a href="/sair.php" class="login">Sair</a></li>';
                    } else{
                        echo'<li><a href="/index.php" class="login">Login</a></li>';
                    }
                ?>


            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Trnasações</h1>
            <img src="/imgs/icons/transações.png">
            <div class="container">
                <div class="formularioBody">
                    <form action="../conexãoDB/pessoafisica.php" method="POST" style="float: left;">
                        <fieldset>
                            <legend><b>Fórmulário de Clientes fisicos</b></legend>
                            <br>
                            <div class="inputBox">
                                <input type="text" name="nomeFisico" id="nomeFisico" class="inputUser" required>
                                <label for="nomeFisico" class="labelInput">Nome completo</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="text" name="enderecoFisico" id="enderecoFisico" class="inputUser" required>
                                <label for="enderecoFisico" class="labelInput">Endereço</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="tel" name="telefoneFisico" id="telefoneFisico" class="inputUser" required>
                                <label for="telefoneFisico" class="labelInput">Telefone</label>
                            </div>
                            <br><br>
                            <input type="submit" name="submit" id="submit">
                        </fieldset>
                    </form>
                    <form action="../conexãoDB/pessoajuridica.php" method="POST" style="float: left;">
                        <fieldset>
                            <legend><b>Fórmulário de Clientes fisicos</b></legend>
                            <br>
                            <div class="inputBox">
                                <input type="text" name="nomeJuridico" id="nome" class="inputUser" required>
                                <label for="nome" class="labelInput">Nome completo</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="text" name="enderecoJuridico" id="endereco" class="inputUser" required>
                                <label for="endereco" class="labelInput">Endereço</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="tel" name="telefoneJuridico" id="telefone" class="inputUser" required>
                                <label for="telefone" class="labelInput">Telefone</label>
                            </div>
                            <br><br>
                            <input type="submit" name="submit" id="submit">
                        </fieldset>
                    </form>
                    <div style="display: grid; grid-template-rows: 20vh;">
                        <form action="../conexãoDB/DTOPESSOAS/cidadeDTO.php" method="POST" style="float: right;">
                            <fieldset>
                                <legend><b>Fórmulário de cidades</b></legend>
                                <br>
                                <div class="inputBox">
                                    <input type="text" name="cidadeCadas" id="cidadeCadas" class="inputUser" required>
                                    <label for="cidadeCadas" class="labelInput">Cidade</label>
                                </div>
                                <br><br>
                                <input type="submit" name="submit" id="submit">
                            </fieldset>
                        </form>
                        <form action="../conexãoDB/DTOPESSOAS/estadoDTO.php" method="POST" style="float: right;">
                            <fieldset>
                                <legend><b>Fórmulário de Estados</b></legend>
                                <br>
                                <div class="inputBox">
                                    <input type="text" name="nomeEstado" id="nomeEstado" class="inputUser" required>
                                    <label for="nomeEstado" class="labelInput">Estado</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="text" name="siglaEstado" id="siglaEstado" class="inputUser" required>
                                    <label for="siglaEstado" class="labelInput">Sigla estado</label>
                                </div>
                                <br><br>
                                <input type="submit" name="submit" id="submit">
                            </fieldset>
                        </form>
                    </div>

                </div>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr;">
                <div class="table-wrapper">
                    <h1 style="font-size: 40px; text-align: center; color: aliceblue;">Cidades</h1>
                    <table class="fl-table ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cidade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($user_data1 = mysqli_fetch_assoc($arrayCidade)){
                                echo"<tr>";
                                echo"<td>".$user_data1['id_cidade']."</td>";
                                echo"<td>".$user_data1['cidade_nome']."</td>";
                                echo"</tr>";
                            };
                        ?>
                        <tbody>
                    </table>
                </div>

                <div class="table-wrapper">
                    <h1 style="font-size: 40px; text-align: center; color:aliceblue;">Estados</h1>
                    <table class="fl-table ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Estados</th>
                                <th>Siglas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($user_data1 = mysqli_fetch_assoc($arrayEstado)){
                                echo"<tr>";
                                echo"<td>".$user_data1['id_estado_db']."</td>";
                                echo"<td>".$user_data1['estados']."</td>";
                                echo"<td>".$user_data1['sigla']."</td>";
                                echo"</tr>";
                            };
                        ?>
                        <tbody>
                    </table>
                </div>
            </div>
            <h1 style="font-size: 40px; text-align: center;">Pessoas fisicas</h1>
            <div class="table-wrapper">
                <table class="fl-table ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($user_data2 = mysqli_fetch_assoc($arrayPessoasFisicas)){
                                echo"<tr>";
                                echo"<td>".$user_data2['id_pessoa']."</td>";
                                echo"<td>".$user_data2['nome']."</td>";
                                echo"</tr>";
                            };
                        ?>
                    <tbody>
                </table>
            </div>
            <h1 style="font-size: 40px; text-align: center;">Pessoas Juridicas</h1>
            <div class="table-wrapper">
                <table class="fl-table ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($user_data1 = mysqli_fetch_assoc($arrayPessoasJuridicas)){
                                echo"<tr>";
                                echo"<td>".$user_data1['id_pessoa']."</td>";
                                echo"<td>".$user_data1['nome']."</td>";
                                echo"</tr>";
                            };
                        ?>
                    <tbody>
                </table>
            </div>

        </section>
    </main>
    <footer>
        <div>
            <div>
                <a>Contato:</a>
                <br>
                <img width="20px" src="/imgs/WhatsApp.svg.png">
                <a>Whats: 5547-999315741</a>
                <p><img src="/imgs/twitter_logo.svg" width="20px">Twitter: @bala_mantegada</p>
            </div>
            <div>
                <img src="/imgs/sesi-senai.webp" width="300px">
                <p>Made by Arthur L. kroenke</p>
                <p>SESI SENAI, Itajaí</p>
            </div>
        </div>
    </footer>
    <script src="/mobile-navbar.JS"></script>
</body>