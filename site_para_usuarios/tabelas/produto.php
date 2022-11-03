<?php
	//session_start inicia a sessão
	session_start();

	if (empty($_SESSION['usuario'])){
		header('Location: ../index.php');
		exit;
	}
        
    include_once('../../conexãoDB/config.php');
    $sql1 = "SELECT * FROM produtosdb ORDER BY id_produto DESC";
    $arrayProdutos = $conexao->query($sql1);

    include_once('../../conexãoDB/config.php');
    $sql2 = "SELECT * FROM marcaprodutos ORDER BY id_marcaprodutos DESC";
    $arrayMarcas = $conexao->query($sql2);

    include_once('../../conexãoDB/config.php');
    $sql3 = "SELECT * FROM marcaprodutos ORDER BY id_marcaprodutos DESC";
    $arrayMarcas2 = $conexao->query($sql3);

    include_once('../../conexãoDB/config.php');
    $sql4 = "SELECT * FROM grupoprodutos ORDER BY id_Grupo_produtos DESC";
    $arrayGrupos1 = $conexao->query($sql4);

    include_once('../../conexãoDB/config.php');
    $sql5= "SELECT * FROM grupoprodutos ORDER BY id_Grupo_produtos DESC";
    $arrayGrupos2 = $conexao->query($sql5);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finmangas</title>
    <link rel="stylesheet" type="text/css" href="../../styles/stylespaginacadastros.css">
    <link rel="shortcut icon" href="/imgs/logo.png">
</head>

<body>
    <header>
        <nav>
            <a href="/site_para_usuarios/home.php">
                <h1>Finmangas</h1>
            </a>
            <a href="/site_para_usuarios/home.php"><img src="/imgs/logo1.png" alt="logo"></a>
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
            <h1>Produtos</h1>
            <img src="/imgs/icons/produto_icon.png">
            <h1 style="font-size: 40px; text-align: center;">Produtos</h1>
            <div class="table-wrapper" style="display: grid; grid-template-colums: 1fr 1fr;">
                <table class="fl-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Código de barra</th>
                            <th>Referência</th>
                            <th>Descrisão</th>
                            <th>Estoque Minimo</th>
                            <th>Estoque Máximo</th>
                            <th>Preço Custo</th>
                            <th>Preço Venda</th>
                            <th>Preço venda atacado</th>
                            <th>Marca</th>
                            <th>Grupo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($user_data1 = mysqli_fetch_assoc($arrayProdutos)){
                                echo"<tr>";
                                echo"<td>".$user_data1['id_produto']."</td>";
                                echo"<td>".$user_data1['nome']."</td>";
                                echo"<td>".$user_data1['codigobarra']."</td>";
                                echo"<td>".$user_data1['referencia']."</td>";
                                echo"<td>".$user_data1['descrisao']."</td>";
                                echo"<td>".$user_data1['estoqueminimo']."</td>";
                                echo"<td>".$user_data1['estoquemaximo']."</td>";
                                echo"<td>".$user_data1['precocusto']."</td>";
                                echo"<td>".$user_data1['precovenda']."</td>";
                                echo"<td>".$user_data1['precovendaatacado']."</td>";
                                echo"<td>".$user_data1['Marca_estrangeiro']."</td>";
                                echo"<td>".$user_data1['Grupo_estrangeiro']."</td>";
                                echo"</tr>";
                            };
                        ?>
                    <tbody>
                </table>
                <table class="fl-table ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Marcas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($marca_data2 = mysqli_fetch_assoc($arrayMarcas2)){
                                echo"<tr>";
                                echo"<td>".$marca_data2['id_marcaprodutos']."</td>";
                                echo"<td>".$marca_data2['nome_marca']."</td>";
                                echo"</tr>";
                            };
                        ?>
                    <tbody>
                </table>
                <table class="fl-table ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Grupos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($grupo_data2 = mysqli_fetch_assoc($arrayGrupos2)){
                                echo"<tr>";
                                echo"<td>".$grupo_data2['id_Grupo_produtos']."</td>";
                                echo"<td>".$grupo_data2['nome']."</td>";
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