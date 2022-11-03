<?php
    // Formulario de receber
    $idDaVenda = $_POST['idDaCompra'];
    $quantidadeDeParcelas = $_POST['quantidadeDeParcelas'];
    $dataDeVencimento = date('Y-m-d', strtotime($_POST['dataDeVencimento']));
    $dataDePagamento = date('Y-m-d', strtotime($_POST['dataDePagamento']));
    $numeroParcela = $_POST['numeroParcela'];
    $desconto = $_POST['desconto'];
    $juros = $_POST['juros'];
    $valorPago = $_POST['valorPago'];
    $valorConta = $_POST['valorConta'];

    // Formulario pagar (planejamento de contas)
    $descrisao = $_POST['periodoEntreAsParcelas'];
    $periodoEntreAsParcelas = $_POST['periodoEntreAsParcelas'];

    // cadastro no banco
    include_once('../config.php');
    $result1 = mysqli_query($conexao, "INSERT INTO contaspagar(quantidadeParcelas, dataVencimento, dataPagamento, numeroParcela, desconto, juros, valorPago, valorConta, id_da_conta) VALUES('$quantidadeDeParcelas', '$dataDeVencimento', '$dataDePagamento', '$numeroParcela', '$desconto', '$juros', '$valorPago', '$valorConta', '$idDaCompra')");
    include_once('../config.php');
    $result2 = mysqli_query($conexao, "INSERT INTO planopagamento(descrisao, periodoEntreParecelas, id_da_conta, compra_ou_pagamento) VALUES('$descrisao', '$periodoEntreAsParcelas', '$idDaCompra', 'pagamento')");
    header('Location: ../../cadastros/contas.php', true, 301);
?>