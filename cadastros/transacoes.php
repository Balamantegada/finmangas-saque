<?php
    // VENDAS
    include_once('../conexãoDB/config.php');
    $formVendaCMDfisica = "SELECT * FROM pessoasfisicas ORDER BY id_pessoa DESC";
    $formVendaArrayCompradorFisico = $conexao->query($formVendaCMDfisica);
    include_once('../conexãoDB/config.php');
    $formVendaCMDjuridica = "SELECT * FROM pessoasjuridicas ORDER BY id_pessoa DESC";
    $formVendaArrayCompradorJuridico = $conexao->query($formVendaCMDjuridica);
    include_once('../conexãoDB/config.php');
    $sql1 = "SELECT * FROM vendas ORDER BY id_vendas DESC";
    $arrayListVendas = $conexao->query($sql1);
    include_once('../conexãoDB/config.php');
    $sql2 = "SELECT * FROM itemvenda ORDER BY id_item_venda DESC";
    $arrayListVendasItem = $conexao->query($sql2);

    // COMPRAS
    include_once('../conexãoDB/config.php');
    $sql3 = "SELECT * FROM compra ORDER BY id_compra DESC";
    $arrayListCompras = $conexao->query($sql3);
    include_once('../conexãoDB/config.php');
    $sql5 = "SELECT * FROM itemcompra ORDER BY id_item_compra DESC";
    $obtemValorArray = $conexao->query($sql5);
    include_once('../conexãoDB/config.php');
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
    <link rel="stylesheet" type="text/css" href="../styles/stylespaginacadastros.css">
    <link rel="shortcut icon" href="/imgs/logo.png">
</head>

<body>
    <?php 
    //session_start inicia a sessão
	session_start();

	if (empty($_SESSION['adm'])){
		header('Location: ../index.php');
		exit;
	}
    ?>
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
                        echo'<li><a href="../conexãoDB/sair.php" class="login">Sair</a></li>';
                    } else{
                        echo'<li><a href="/index.php" class="login">Login</a></li>';
                    }
                ?>


            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Transações</h1>
            <img src="/imgs/icons/transações.png">
            <div class="container">
                <div class="formularioBody">
                    <div style="grid-template-columns: 1fr 1fr;">
                        <form action="../conexãoDB/DTOTRANSCOES/vendasDTO.php" method="POST" style="float: left;">
                            <fieldset>
                                <legend><b>Fórmulário de vendas</b></legend>
                                <br>
                                <div class="inputBox">
                                    <input type="text" name="descrisaoVenda" id="descrisaoVenda" class="inputUser"
                                        required>
                                    <label for="descrisaoVenda" class="labelInput">Descrisão</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="date" name="dateEntregaVenda" id="dateEntregaVenda" class="inputUser"
                                        required>
                                    <label for="dateEntregaVenda" class="labelInput">Data entrega</label>
                                </div>
                                <br><br>
                                <p>Comprador:</p>
                                <?php 
                                    while($dataCompradorFisica = mysqli_fetch_assoc($formVendaArrayCompradorFisico)){
                                        echo"<input type=\"radio\" id=".$dataCompradorFisica['nome']." name=\"comprador\" value=".$dataCompradorFisica['nome']." required>";
                                        echo"<label for=".$dataCompradorFisica['nome'].">Fisica: ".$dataCompradorFisica['nome']."</label>";
                                        echo"<br>";
                                    };
                                    while($dataCompradorjurica = mysqli_fetch_assoc($formVendaArrayCompradorJuridico)){
                                        echo"<input type=\"radio\" id=".$dataCompradorjurica['nome']." name=\"comprador\" value=".$dataCompradorjurica['nome']." required>";
                                        echo"<label for=".$dataCompradorjurica['nome'].">Juridica: ".$dataCompradorjurica['nome']."</label>";
                                        echo"<br>";
                                    };
                                    ?>
                                <br><br>
                            </fieldset>
                            <fieldset>
                                <legend><b>Formulário de item venda</b></legend>
                                <br>
                                <div class="inputBox">
                                    <input type="number" name="quantidadeVenda" id="quantidadeVenda" class="inputUser"
                                        required>
                                    <label for="quantidadeVenda" class="labelInput">Quantidade</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="number" name="valorVenda" id="valorVenda" class="inputUser" required>
                                    <label for="valorVenda" class="labelInput">Valor</label>
                                </div>
                                <br><br>
                                <input type="submit" name="submit" id="submit">
                            </fieldset>
                        </form>
                    </div>
                    <div style="grid-template-columns: 1fr 1fr;">
                        <form action="../conexãoDB/DTOTRANSCOES/comprasDTO.php" method="POST" style="float: left;">
                            <fieldset>
                                <legend><b>Fórmulário de compras</b></legend>
                                <br>
                                <div class="inputBox">
                                    <input type="text" name="descrisaoCompra" id="descrisaoCompra" class="inputUser"
                                        required>
                                    <label for="descrisaoCompra" class="labelInput">Descrisão</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="date" name="dateEmissaoCompra" id="dateEmissaoCompra" class="inputUser"
                                        required>
                                    <label for="dateEmissaoCompra" class="labelInput">Data Emissão</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="date" name="dateEntregaCompra" id="dateEntregaCompra" class="inputUser"
                                        required>
                                    <label for="dateEntregaCompra" class="labelInput">Data entrega</label>
                                </div>
                                <br><br>

                            </fieldset>
                            <fieldset>
                                <legend><b>Fórmulário de item compra</b></legend>
                                <br>
                                <div class="inputBox">
                                    <input type="number" name="quantidadeCompra" id="quantidadeCompra" class="inputUser"
                                        required>
                                    <label for="quantidadeCompra" class="labelInput">Quantidade</label>
                                </div>
                                <br><br>
                                <div class="inputBox">
                                    <input type="number" name="valorCompra" id="valorCompra" class="inputUser" required>
                                    <label for="valorCompra" class="labelInput">Valor</label>
                                </div>
                                <br><br>
                                <input type="submit" name="submit" id="submit">
                            </fieldset>
                        </form>
                    </div>



                </div>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr;">
                <div style="display: grid; grid-template-rows: 1fr 1fr;">
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
                                    <th>Valor total (operação de valor vezes quantidade)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            while($arrayListVendasItemData = mysqli_fetch_assoc($arrayListVendasItem)){
                                echo"<tr>";
                                echo"<td>".$arrayListVendasItemData['id_item_venda']."</td>";
                                echo"<td>".$arrayListVendasItemData['quantidade']."</td>";
                                echo"<td>R$ ".$arrayListVendasItemData['valor']."</td>";
                                $operation0 = $arrayListVendasItemData['valor'] * $arrayListVendasItemData['quantidade'];
                                echo"<td>R$ ".$operation0."</td>";
                                echo"</tr>";
                            };
                        ?>
                            <tbody>
                        </table>
                    </div>

                </div>
                <div style="display: grid; grid-template-rows: 1fr 1fr;">
                    <div class="table-wrapper">
                        <h1 style="font-size: 40px; text-align: center; color: aliceblue;">Compras</h1>
                        <table class="fl-table ">
                            <thead>
                                <tr>
                                    <th>ID Compras</th>
                                    <th>Descrisão</th>
                                    <th>Data emissão</th>
                                    <th>Data entrega</th>
                                    <th>Valor da compra</th>
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
                                
                            };
                            while($array = mysqli_fetch_assoc($obtemValorArray)) {
                                $obtemValor = $array['valor'] * $array['quantidade'];
                                echo"<td>R$ ".$obtemValor."</td>";
                                echo"</tr>";
                            }
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
                                    <th>Valor total (operação de valor vezes quantidade)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                            while($arrayListCompraItemData = mysqli_fetch_assoc($arrayListComprasItem)){
                                echo"<tr>";
                                echo"<td>".$arrayListCompraItemData['id_item_compra']."</td>";
                                echo"<td>".$arrayListCompraItemData['quantidade']."</td>";
                                echo"<td>".$arrayListCompraItemData['valor']."</td>";
                                $operation1 = $arrayListCompraItemData['valor'] * $arrayListCompraItemData['quantidade'];
                                echo"<td>R$ ".$operation1."</td>";
                                echo"</tr>";
                            };
                        ?>
                            <tbody>
                        </table>
                    </div>
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