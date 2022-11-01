<?php
    include_once('../config.php');
    //form1
    $descrisaoVenda = $_POST['descrisaoVenda'];
    $dateEntregaVenda = date('Y-m-d', strtotime($_POST['dateEntregaVenda']));
    $comprador = $_POST['comprador'];

    //form2
    $quantidadeVenda = $_POST['quantidadeVenda'];
    $valorVenda = $_POST['valorVenda'];

    $result1 = mysqli_query($conexao, "INSERT INTO vendas(descriscao, dataEntrega, comprador) VALUES('$descrisaoVenda', '$dateEntregaVenda', '$comprador')");
    include_once('../config.php');
    $result2 = mysqli_query($conexao, "INSERT INTO itemvenda(quantidade, valor) VALUES('$quantidadeVenda', '$valorVenda')");
    header('Location: ../../cadastros/transacoes.php', true, 301);
?>