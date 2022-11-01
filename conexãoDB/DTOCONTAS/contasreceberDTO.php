<?php
    // Formulario de receber
    $idDaVenda = $_POST['idDaVenda'];
    $quantidadeDeParcelasReceber = $_POST['quantidadeDeParcelasReceber'];
    $dataDeVencimentoReceber = date('Y-m-d', strtotime($_POST['dataDeVencimentoReceber']));
    $dataDePagamentoReceber = date('Y-m-d', strtotime($_POST['dataDePagamentoReceber']));
    $numeroParcelaReceber = $_POST['numeroParcelaReceber'];
    $descontoReceber = $_POST['descontoReceber'];
    $jurosReceber = $_POST['jurosReceber'];
    $valorPagoReceber = $_POST['valorPagoReceber'];
    $valorContaReceber = $_POST['valorContaReceber'];

    // Formulario receber (planejamento de contas)
    $descrisaoReceber = $_POST['periodoEntreAsParcelasReceber'];
    $periodoEntreAsParcelasReceber = $_POST['periodoEntreAsParcelasReceber'];

    // cadastro no banco
    include_once('../config.php');
    $result1 = mysqli_query($conexao, "INSERT INTO contasreceber(quantidadeParecelas, dataVencimento, dataPagamento, numeroParcela, desconto, juros, valorPago, valorConta, id_da_conta) VALUES('$quantidadeDeParcelasReceber', '$dataDeVencimentoReceber', '$dataDePagamentoReceber', '$numeroParcelaReceber', '$descontoReceber', '$jurosReceber', '$valorPagoReceber', '$valorContaReceber', '$idDaVenda')");
    include_once('../config.php');
    $result2 = mysqli_query($conexao, "INSERT INTO planopagamento(descrisao, periodoEntreParecelas, id_da_conta) VALUES('$descrisaoReceber', '$periodoEntreAsParcelasReceber', '$idDaVenda')");
    header('Location: ../../cadastros/contas.php', true, 301);
?>