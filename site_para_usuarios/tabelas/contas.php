<?php
	//session_start inicia a sessão
	session_start();

	if (empty($_SESSION['usuario'])){
		header('Location: ../index.php');
		exit;
	}
    // Receber
    // Array para table
    include_once('../../conexãoDB/config.php');
    $sql1 = "SELECT * FROM vendas ORDER BY id_vendas DESC";
    $vendaArrayForm = $conexao->query($sql1);

    // Contas a receber
    include_once('../../conexãoDB/config.php');
    $sql2 = "SELECT * FROM contasreceber ORDER BY id_contas_receber  DESC";
    $arrayTableContasReceber = $conexao->query($sql2);

    // Pagar
    include_once('../../conexãoDB/config.php');
    $sql4 = "SELECT * FROM compra ORDER BY id_compra DESC";
    $compraArrayForm = $conexao->query($sql4);

    include_once('../../conexãoDB/config.php');
    $sql5 = "SELECT * FROM contaspagar ORDER BY id_contas_pagar  DESC";
    $arrayTableContasPagar = $conexao->query($sql5);
    
    // Plano de pagamento
    include_once('../../conexãoDB/config.php');
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
    <link rel="stylesheet" type="text/css" href="../../styles/stylespaginacadastros.css">
    <link rel="shortcut icon" href="../../imgs/logo.png">
</head>

<body>

    <header>
        <nav>
            <a href="/site_para_usuarios/home.php">
                <h1>Finmangas</h1>
            </a>
            <a href="/site_para_usuarios/home.php"><img src="../../imgs/logo1.png" alt="logo"></a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">

                <li><a href="/site_para_usuarios/home.php">Home</a></li>
                <li><a href="../paginas.php">Paginas</a></li>
                <li><a href="../perfil.php">Perfil</a></li>
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
            <h1>Contas</h1>
            <img src="../../imgs/icons/contas_icon.png">
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