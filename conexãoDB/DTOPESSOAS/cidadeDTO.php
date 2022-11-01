<?php
    include_once('../config.php');
    $cidade = $_POST['cidadeCadas'];
    
    $result1 = mysqli_query($conexao, "INSERT INTO cidadepessoas(cidade_nome) VALUES('$cidade')");
    header('Location: ../../cadastros/pessoas.php', true, 301);
?>