<?php
	//session_start inicia a sessão
	session_start();

	if (empty($_SESSION['usuario'])){
		header('Location: ../index.php');
		exit;
	}
    // VENDAS
    include_once('../conexãoDB/config.php');
    $formVendaCMD = "SELECT * FROM pessoasfisicas ORDER BY id_pessoa DESC";
    $formVendaArrayComprador = $conexao->query($formVendaCMD);
    include_once('../conexãoDB/config.php');
    $sql1 = "SELECT * FROM vendas ORDER BY id_vendas DESC";
    $arrayListVendas = $conexao->query($sql1);
    include_once('../conexãoDB/config.php');
    $sql2 = "SELECT * FROM itemvenda ORDER BY id_item_venda DESC";
    $arrayListVendasItem = $conexao->query($sql2);

    // COMPRAS
    $sql3 = "SELECT * FROM compra ORDER BY id_compra DESC";
    $arrayListCompras = $conexao->query($sql3);
    include_once('../conexãoDB/config.php');
    $sql4 = "SELECT * FROM itemcompra ORDER BY id_item_compra DESC";
    $arrayListComprasItem = $conexao->query($sql4);









/*
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
*/
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
                                    while($data = mysqli_fetch_assoc($formVendaArrayComprador)){
                                        echo"<input type=\"radio\" id=".$data['nome']." name=\"comprador\" value=".$data['nome']." required>";
                                        echo"<label for=".$data['nome'].">".$data['nome']."</label>";
                                        echo"<br>";
                                    };
                                    ?>
                                <br><br>
                            </fieldset>
                            <fieldset>
                                <legend><b>Fórmulário de item venda</b></legend>
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