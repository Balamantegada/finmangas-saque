<?php
    //form1
    $descrisaoCompra = $_POST['descrisaoCompra'];
    $dateEmissaoCompra = date('Y-m-d', strtotime($_POST['dateEmissaoCompra']));
    $dateEntregaCompra = date('Y-m-d', strtotime($_POST['dateEntregaCompra']));

    //form2
    $quantidadeCompra = $_POST['quantidadeCompra'];
    $valorCompra = $_POST['valorCompra'];

    // cadastro no banco
    include_once('../config.php');
    $result1 = mysqli_query($conexao, "INSERT INTO compra(descrisao, dataEmissao, dataEntrega) VALUES('$descrisaoCompra', '$dateEmissaoCompra', '$dateEntregaCompra')");
    include_once('../config.php');
    $result2 = mysqli_query($conexao, "INSERT INTO itemcompra(quantidade, valor) VALUES('$quantidadeCompra', '$valorCompra')");
    header('Location: ../../cadastros/transacoes.php', true, 301);
?>