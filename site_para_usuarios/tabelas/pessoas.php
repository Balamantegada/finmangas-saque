<?php
	//session_start inicia a sessão
	session_start();

	if (empty($_SESSION['usuario'])){
		header('Location: ../index.php');
		exit;
	}
        
    include_once('../../conexãoDB/config.php');
    $sql1 = "SELECT * FROM pessoasfisicas ORDER BY id_pessoa DESC";
    $arrayPessoasFisicas = $conexao->query($sql1);

    include_once('../../conexãoDB/config.php');
    $sql2 = "SELECT * FROM pessoasjuridicas ORDER BY id_pessoa DESC";
    $arrayPessoasJuridicas = $conexao->query($sql2);

    include_once('../../conexãoDB/config.php');
    $sql2 = "SELECT * FROM cidadepessoas ORDER BY id_cidade DESC";
    $arrayCidade = $conexao->query($sql2);

    include_once('../../conexãoDB/config.php');
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
    <link rel="stylesheet" type="text/css" href="../../styles/stylespaginacadastros.css">
    <link rel="shortcut icon" href="../../imgs/logo.png">
</head>

<body>

    <header>
        <nav>
            <a href="/site_para_usuarios/home.php">
                <h1>Finmangas</h1>
            </a>
            <a href="/site_para_usuarios/paginas.php"><img src="/imgs/logo1.png" alt="logo"></a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">

                <li><a href="/site_para_usuarios/home.php">Home</a></li>
                <li><a href="/site_para_usuarios/paginas.php">Paginas</a></li>
                <li><a href="/site_para_usuarios/perfil.php">Perfil</a></li>
                <?php
                    if(empty($_session['usuario'])){
                        echo'<li><a href="../../conexãoDB/sair.php" class="login">Sair</a></li>';
                    } else{
                        echo'<li><a href="../../index.php" class="login">Login</a></li>';
                    }
                ?>


            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Pessoas</h1>
            <img src="/imgs/icons/pessoas_icon.png">
            <h1 style="font-size: 40px; text-align: center;">Pessoas fisicas</h1>
            <div class="table-wrapper">
                <table class="fl-table ">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Endereço</th>
                            <th>Situação</th>
                            <th>Bairro</th>
                            <th>Email</th>
                            <th>CEP</th>
                            <th>Observação</th>
                            <th>Tipo</th>
                            <th>Sexo</th>
                            <th>CPF</th>
                            <th>RG</th>
                            <th>Data de nascimento</th>
                            <th>Bairro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($user_data2 = mysqli_fetch_assoc($arrayPessoasFisicas)){
                                echo"<tr>";
                                echo"<td>".$user_data2['id_pessoa']."</td>";
                                echo"<td>".$user_data2['nome']."</td>";
                                echo"<td>".$user_data2['endereco']."</td>";
                                echo"<td>".$user_data2['telefone']."</td>";
                                echo"<td>".$user_data2['situacao']."</td>";
                                echo"<td>".$user_data2['bairro']."</td>";
                                echo"<td>".$user_data2['email']."</td>";
                                echo"<td>".$user_data2['cep']."</td>";
                                echo"<td>".$user_data2['observacao']."</td>";
                                echo"<td>".$user_data2['tipo']."</td>";
                                echo"<td>".$user_data2['cpf']."</td>";
                                echo"<td>".$user_data2['rg']."</td>";
                                echo"<td>".$user_data2['dataNascimento']."</td>";
                                echo"<td>".$user_data2['celular']."</td>";


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
                            <th>Situação</th>
                            <th>Bairro</th>
                            <th>Email</th>
                            <th>CEP</th>
                            <th>Observação</th>
                            <th>Tipo</th>
                            <th>Razão social</th>
                            <th>CNPJ</th>
                            <th>RG</th>
                            <th>Contato</th>
                            <th>Incrisão Social</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($user_data1 = mysqli_fetch_assoc($arrayPessoasJuridicas)){
                                echo"<tr>";
                                echo"<td>".$user_data1['id_pessoa']."</td>";
                                echo"<td>".$user_data1['nome']."</td>";
                                echo"<td>".$user_data1['endereco']."</td>";
                                echo"<td>".$user_data1['telefone']."</td>";
                                echo"<td>".$user_data1['situacao']."</td>";
                                echo"<td>".$user_data1['bairro']."</td>";
                                echo"<td>".$user_data1['email']."</td>";
                                echo"<td>".$user_data1['cep']."</td>";
                                echo"<td>".$user_data1['observacao']."</td>";
                                echo"<td>".$user_data1['tipo']."</td>";
                                echo"<td>".$user_data1['razaosocial']."</td>";
                                echo"<td>".$user_data1['cnpj']."</td>";
                                echo"<td>".$user_data1['contato']."</td>";
                                echo"<td>".$user_data1['incrisaosocial']."</td>";


                                echo"</tr>";
                            };
                        ?>
                    <tbody>
                </table>
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