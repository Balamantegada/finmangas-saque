<?php
    include_once('../config.php');
    $nomeEstado = $_POST['nomeEstado'];
    $siglaEstado = $_POST['siglaEstado'];
    
    $result1 = mysqli_query($conexao, "INSERT INTO estadopessoas(estados, sigla) VALUES('$nomeEstado', '$siglaEstado')");
    header('Location: ../../cadastros/pessoas.php', true, 301);
?>