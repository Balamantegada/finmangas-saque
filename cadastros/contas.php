<?php
	//session_start inicia a sessão
	session_start();

	if (empty($_SESSION['usuario'])){
		header('Location: ../index.php');
		exit;
	}
    // Array para table
    include_once('../conexãoDB/config.php');
    $sql1 = "SELECT * FROM vendas ORDER BY id_vendas DESC";
    $vendaArrayForm = $conexao->query($sql1);

    // Contas a receber
    include_once('../conexãoDB/config.php');
    $sql2 = "SELECT * FROM contasreceber ORDER BY id_contas_receber  DESC";
    $arrayTableContasReceber = $conexao->query($sql2);

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
            <h1>Contas</h1>
            <img src="/imgs/icons/contas_icon.png">
            <div class="container">
                <div class="formularioBody">
                    <form action="../conexãoDB/DTOCONTAS/contasreceberDTO.php" method="POST" style="float: left;">
                        <fieldset>
                            <legend><b>Fórmulário de contas a receber:</b></legend>
                            <br>
                            <p>Vendas: (olhar tabelas nas transações)</p>
                            <?php 
                                    while($dataVenda = mysqli_fetch_assoc($vendaArrayForm)){
                                        echo"<input type=\"radio\" id=".$dataVenda['id_vendas']." name=\"idDaVenda\" value=".$dataVenda['id_vendas']." required>";
                                        echo"<label for=".$dataVenda['id_vendas'].">".$dataVenda['id_vendas']."</label>";
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
                    <h1 style="font-size: 40px; text-align: center; color: aliceblue;">Contas receber</h1>
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
                    <h1 style="font-size: 40px; text-align: center; color:aliceblue;">Plano de pagamento</h1>
                    <table class="fl-table ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Descrisão</th>
                                <th>Periodo entre parcelas</th>
                                <th>Id da conta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($arrayTablePlanoDePagamentoReceberData = mysqli_fetch_assoc($arrayTablePlanoDePagamentoReceber)){
                                echo"<tr>";
                                echo"<td>".$arrayTablePlanoDePagamentoReceberData['id_plano_pagamento']."</td>";
                                echo"<td>".$arrayTablePlanoDePagamentoReceberData['descrisao']."</td>";
                                echo"<td>".$arrayTablePlanoDePagamentoReceberData['periodoEntreParecelas']." dias</td>";
                                echo"<td>".$arrayTablePlanoDePagamentoReceberData['id_da_conta']."</td>";
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