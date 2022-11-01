<?php
    include_once('../config.php');
    $nomeGrupo = $_POST['nomeGrupo'];
    
    $result1 = mysqli_query($conexao, "INSERT INTO grupoprodutos(nome) VALUES('$nomeGrupo')");
    header('Location: ../../cadastros/produto.php', true, 301);
?>