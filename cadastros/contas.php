<?php
    // Receber
    // Array para table
    include_once('../conexãoDB/config.php');
    $sql1 = "SELECT * FROM vendas ORDER BY id_vendas DESC";
    $vendaArrayForm = $conexao->query($sql1);

    // Contas a receber
    include_once('../conexãoDB/config.php');
    $sql2 = "SELECT * FROM contasreceber ORDER BY id_contas_receber  DESC";
    $arrayTableContasReceber = $conexao->query($sql2);

    // Pagar
    include_once('../conexãoDB/config.php');
    $sql4 = "SELECT * FROM compra ORDER BY id_compra DESC";
    $compraArrayForm = $conexao->query($sql4);

    include_once('../conexãoDB/config.php');
    $sql5 = "SELECT * FROM contaspagar ORDER BY id_contas_pagar  DESC";
    $arrayTableContasPagar = $conexao->query($sql5);
    
    // Plano de pagamento
    include_once('../conexãoDB/config.php');
    $sql3 = "SELECT * FROM planopagamento ORDER BY id_plano_pagamento  DESC";
    $arrayTablePlanoDePagamentoReceber = $conexao->query($sql3);
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
            <h1>Contas</h1>
            <img src="/imgs/icons/contas_icon.png">
            <div class="container" style="display: grid;  grid-template-columns: 1fr 1fr;">
                <div class="formularioBody">
                    <form action="../conexãoDB/DTOCONTAS/contasreceberDTO.php" method="POST" style="float: left;">
                        <fieldset>
                            <legend><b>Fórmulário de contas a receber:</b></legend>
                            <br>
                            <p>Vendas: (olhar tabelas nas transações)</p>
                            <?php 
                                    while($dataVenda = mysqli_fetch_assoc($vendaArrayForm)){
                                        echo"<input type=\"radio\" id=".$dataVenda['id_vendas']." name=\"idDaVenda\" value=".$dataVenda['id_vendas']." required>";
                                        echo"<label for=".$dataVenda['id_vendas'].">".$dataVenda['id_vendas']."º ".$dataVenda['descriscao']."</label>";
                                        echo"<br>";
                                    };
                                    ?>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="quantidadeDeParcelasReceber" id="quantidadeDeParcelasReceber"
                                    class="inputUser" required>
                                <label for="quantidadeDeParcelasReceber" class="labelInput">Quantidade de
                                    parcelas</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="date" name="dataDeVencimentoReceber" id="dataDeVencimentoReceber"
                                    class="inputUser" required>
                                <label for="dataDeVencimentoReceber" class="labelInput">Data de vencimento</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="date" name="dataDePagamentoReceber" id="dataDePagamentoReceber"
                                    class="inputUser" required>
                                <label for="dataDePagamentoReceber" class="labelInput">Data de pagamento</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="numeroParcelaReceber" id="numeroParcelaReceber"
                                    class="inputUser" required>
                                <label for="numeroParcelaReceber" class="labelInput">Numero parcela</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="descontoReceber" id="descontoReceber" class="inputUser"
                                    required>
                                <label for="descontoReceber" class="labelInput">Desconto</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="jurosReceber" id="jurosReceber" class="inputUser" required>
                                <label for="jurosReceber" class="labelInput">Juros</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="valorPagoReceber" id="valorPagoReceber" class="inputUser"
                                    required>
                                <label for="valorPagoReceber" class="labelInput">Valor pago</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="valorContaReceber" id="valorContaReceber" class="inputUser"
                                    required>
                                <label for="valorContaReceber" class="labelInput">Valor Conta</label>
                            </div>
                            <br><br>

                        </fieldset>
                        <fieldset>
                            <legend><b>Formulário pagamento</b></legend>
                            <br>
                            <div class="inputBox">
                                <input type="text" name="descrisaoReceber" id="descrisaoReceber" class="inputUser"
                                    required>
                                <label for="descrisaoReceber" class="labelInput">Descrisão</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="periodoEntreAsParcelasReceber"
                                    id="periodoEntreAsParcelasReceber" class="inputUser" required>
                                <label for="periodoEntreAsParcelasReceber" class="labelInput">Periodo entre as
                                    parcelas</label>
                            </div>
                            <br><br>
                            <input type="submit" name="submit" id="submit">
                        </fieldset>
                    </form>

                </div>
                <div class="formularioBody">
                    <form action="../conexãoDB/DTOCONTAS/contaspagarDTO.php" method="POST" style="float: left;">
                        <fieldset>
                            <legend><b>Fórmulário de contas a pagar:</b></legend>
                            <br>
                            <p>Compras: (olhar tabelas nas transações)</p>
                            <?php 
                                    while($dataCompra = mysqli_fetch_assoc($compraArrayForm)){
                                        echo"<input type=\"radio\" id=".$dataCompra['id_compra']." name=\"idDaCompra\" value=".$dataCompra['id_compra']." required>";
                                        echo"<label for=".$dataCompra['id_compra'].">".$dataCompra['id_compra']."º ".$dataCompra['descrisao']."</label>";
                                        echo"<br>";
                                    };
                                    ?>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="quantidadeDeParcelas" id="quantidadeDeParcelas"
                                    class="inputUser" required>
                                <label for="quantidadeDeParcelas" class="labelInput">Quantidade de
                                    parcelas</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="date" name="dataDeVencimento" id="dataDeVencimento" class="inputUser"
                                    required>
                                <label for="dataDeVencimento" class="labelInput">Data de vencimento</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="date" name="dataDePagamento" id="dataDePagamento" class="inputUser"
                                    required>
                                <label for="dataDePagamento" class="labelInput">Data de pagamento</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="numeroParcela" id="numeroParcela" class="inputUser" required>
                                <label for="numeroParcela" class="labelInput">Numero parcela</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="desconto" id="desconto" class="inputUser" required>
                                <label for="desconto" class="labelInput">Desconto</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="juros" id="juros" class="inputUser" required>
                                <label for="juros" class="labelInput">Juros</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="valorPago" id="valorPago" class="inputUser" required>
                                <label for="valorPago" class="labelInput">Valor pago</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="valorConta" id="valorConta" class="inputUser" required>
                                <label for="valorConta" class="labelInput">Valor Conta</label>
                            </div>
                            <br><br>

                        </fieldset>
                        <fieldset>
                            <legend><b>Formulário pagamento</b></legend>
                            <br>
                            <div class="inputBox">
                                <input type="text" name="descrisao" id="descrisao" class="inputUser" required>
                                <label for="descrisao" class="labelInput">Descrisão</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="periodoEntreAsParcelas" id="periodoEntreAsParcelas"
                                    class="inputUser" required>
                                <label for="periodoEntreAsParcelas" class="labelInput">Periodo entre as
                                    parcelas</label>
                            </div>
                            <br><br>
                            <input type="submit" name="submit" id="submit">
                        </fieldset>
                    </form>

                </div>

            </div>
            <div class="table-wrapper">
                <h1 style="font-size: 40px; text-align: center; color: aliceblue;">Contas à receber</h1>
                <table class="fl-table ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Quantidade de parcelas</th>
                            <th>Data de vencimento</th>
                            <th>Data de pagamento</th>
                            <th>Numero de parcelas</th>
                            <th>Desconto</th>
                            <th>Juros</th>
                            <th>Valor pago</th>
                            <th>Valor da conta</th>
                            <th>ID da conta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($arrayTableContasReceberData = mysqli_fetch_assoc($arrayTableContasReceber)){
                                echo"<tr>";
                                echo"<td>".$arrayTableContasReceberData['id_contas_receber']."</td>";
                                echo"<td>".$arrayTableContasReceberData['quantidadeParecelas']."</td>";
                                echo"<td>".$arrayTableContasReceberData['dataVencimento']."</td>";
                                echo"<td>".$arrayTableContasReceberData['dataPagamento']."</td>";
                                echo"<td>".$arrayTableContasReceberData['numeroParcela']."</td>";
                                echo"<td>".$arrayTableContasReceberData['desconto']."%</td>";
                                echo"<td>".$arrayTableContasReceberData['juros']."%</td>";
                                echo"<td>R$ ".$arrayTableContasReceberData['valorPago']."</td>";
                                echo"<td>R$ ".$arrayTableContasReceberData['valorConta']."</td>";
                                echo"<td>".$arrayTableContasReceberData['id_da_conta']."</td>";
                                echo"</tr>";
                            };
                        ?>
                    <tbody>
                </table>
            </div>
            <div class="table-wrapper">
                <h1 style="font-size: 40px; text-align: center; color: aliceblue;">Contas à pagar</h1>
                <table class="fl-table ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Quantidade de parcelas</th>
                            <th>Data de vencimento</th>
                            <th>Data de pagamento</th>
                            <th>Numero de parcelas</th>
                            <th>Desconto</th>
                            <th>Juros</th>
                            <th>Valor pago</th>
                            <th>Valor da conta</th>
                            <th>ID da conta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($arrayTableContasPagarData = mysqli_fetch_assoc($arrayTableContasPagar)){
                                echo"<tr>";
                                echo"<td>".$arrayTableContasPagarData['id_contas_pagar']."</td>";
                                echo"<td>".$arrayTableContasPagarData['quantidadeParcelas']."</td>";
                                echo"<td>".$arrayTableContasPagarData['dataVencimento']."</td>";
                                echo"<td>".$arrayTableContasPagarData['dataPagamento']."</td>";
                                echo"<td>".$arrayTableContasPagarData['numeroParcela']."</td>";
                                echo"<td>".$arrayTableContasPagarData['desconto']."%</td>";
                                echo"<td>".$arrayTableContasPagarData['juros']."%</td>";
                                echo"<td>R$ ".$arrayTableContasPagarData['valorPago']."</td>";
                                echo"<td>R$ ".$arrayTableContasPagarData['valorConta']."</td>";
                                echo"<td>".$arrayTableContasPagarData['id_da_conta']."</td>";
                                echo"</tr>";
                            };
                        ?>
                    <tbody>
                </table>

            </div>
            <div class="table-wrapper">
                <h1 style="font-size: 40px; text-align: center; color:aliceblue;">Plano de pagamento</h1>
                <table class="fl-table ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descrisão</th>
                            <th>Periodo entre parcelas</th>
                            <th>Id da conta</th>
                            <th>Pagamento ou compra?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($arrayTablePlanoDePagamentoData = mysqli_fetch_assoc($arrayTablePlanoDePagamentoReceber)){
                                echo"<tr>";
                                echo"<td>".$arrayTablePlanoDePagamentoData['id_plano_pagamento']."</td>";
                                echo"<td>".$arrayTablePlanoDePagamentoData['descrisao']."</td>";
                                echo"<td>".$arrayTablePlanoDePagamentoData['periodoEntreParecelas']." dias</td>";
                                echo"<td>".$arrayTablePlanoDePagamentoData['id_da_conta']."</td>";
                                echo"<td>".$arrayTablePlanoDePagamentoData['compra_ou_pagamento']."</td>";
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