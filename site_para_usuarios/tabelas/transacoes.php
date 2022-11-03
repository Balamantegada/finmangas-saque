<?php
	//session_start inicia a sessão
	session_start();

	if (empty($_SESSION['usuario'])){
		header('Location: ../../index.php');
		exit;
	}
    // VENDAS
    include_once('../../conexãoDB/config.php');
    $sql1 = "SELECT * FROM vendas ORDER BY id_vendas DESC";
    $arrayListVendas = $conexao->query($sql1);
    include_once('../../conexãoDB/config.php');
    $sql2 = "SELECT * FROM itemvenda ORDER BY id_item_venda DESC";
    $arrayListVendasItem = $conexao->query($sql2);

    // COMPRAS
    $sql3 = "SELECT * FROM compra ORDER BY id_compra DESC";
    $arrayListCompras = $conexao->query($sql3);
    include_once('../../conexãoDB/config.php');
    $sql4 = "SELECT * FROM itemcompra ORDER BY id_item_compra DESC";
    $arrayListComprasItem = $conexao->query($sql4);
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
            <h1>Transações</h1>
            <img src="/imgs/icons/transações.png">
            <div style="display: grid; grid-template-columns: 1fr 1fr;">
                <div class="table-wrapper">
                    <h1 style="font-size: 40px; text-align: center; color: aliceblue;">Vendas</h1>
                    <table class="fl-table ">
                        <thead>
                            <tr>
                                <th>ID_vendas</th>
                                <th>Descrisão</th>
                                <th>Data entrega</th>
                                <th>Comprador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($arrayListVendasData = mysqli_fetch_assoc($arrayListVendas)){
                                echo"<tr>";
                                echo"<td>".$arrayListVendasData['id_vendas']."</td>";
                                echo"<td>".$arrayListVendasData['descriscao']."</td>";
                                echo"<td>".$arrayListVendasData['dataEntrega']."</td>";
                                echo"<td>".$arrayListVendasData['comprador']."</td>";
                                echo"</tr>";
                            };
                        ?>
                        <tbody>
                    </table>
                </div>

                <div class="table-wrapper">
                    <h1 style="font-size: 40px; text-align: center; color:aliceblue;">Item venda</h1>
                    <table class="fl-table ">
                        <thead>
                            <tr>
                                <th>ID item venda </th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($arrayListVendasItemData = mysqli_fetch_assoc($arrayListVendasItem)){
                                echo"<tr>";
                                echo"<td>".$arrayListVendasItemData['id_item_venda']."</td>";
                                echo"<td>".$arrayListVendasItemData['quantidade']."</td>";
                                echo"<td>R$ ".$arrayListVendasItemData['valor']."</td>";
                                echo"</tr>";
                            };
                        ?>
                        <tbody>
                    </table>
                </div>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr;">
                <div class="table-wrapper">
                    <h1 style="font-size: 40px; text-align: center; color: aliceblue;">Compras</h1>
                    <table class="fl-table ">
                        <thead>
                            <tr>
                                <th>ID Compras</th>
                                <th>Descrisão</th>
                                <th>Data emissão</th>
                                <th>Data entrega</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($arrayListComprasData = mysqli_fetch_assoc($arrayListCompras)){
                                echo"<tr>";
                                echo"<td>".$arrayListComprasData['id_compra']."</td>";
                                echo"<td>".$arrayListComprasData['descrisao']."</td>";
                                echo"<td>".$arrayListComprasData['dataEmissao']."</td>";
                                echo"<td>".$arrayListComprasData['dataEntrega']."</td>";
                                echo"</tr>";
                            };
                        ?>
                        <tbody>
                    </table>
                </div>

                <div class="table-wrapper">
                    <h1 style="font-size: 40px; text-align: center; color:aliceblue;">Item compra</h1>
                    <table class="fl-table ">
                        <thead>
                            <tr>
                                <th>ID item compra</th>
                                <th>Quantidade</th>
                                <th>Valor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($arrayListCompraItemData = mysqli_fetch_assoc($arrayListComprasItem)){
                                echo"<tr>";
                                echo"<td>".$arrayListCompraItemData['id_item_compra']."</td>";
                                echo"<td>".$arrayListCompraItemData['quantidade']."</td>";
                                echo"<td>".$arrayListCompraItemData['valor']."</td>";
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