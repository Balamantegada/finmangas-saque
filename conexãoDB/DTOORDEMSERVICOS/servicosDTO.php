<?php

    //form1
    $descrisaoServico = $_POST['descrisaoServico'];
    $valorServico = $_POST['valorServico'];

    //form2
    $valorItemServico = $_POST['valorItemServico'];
    $atribute30 = $_POST['atribute30'];
    $atribute34 = $_POST['atribute34'];

    // cadastro no banco
    include_once('../config.php');
    $result1 = mysqli_query($conexao, "INSERT INTO servico(descrisao, valor) VALUES('$descrisaoServico', '$valorServico')");
    include_once('../config.php');
    $result2 = mysqli_query($conexao, "INSERT INTO itemservico(valor, atribute30, atribute34) VALUES('$valorItemServico', '$atribute30', '$atribute34')");
    header('Location: ../../cadastros/ordem_servico.php', true, 301);
?>