<?php
    include_once('../config.php');
    $nomeMarca = $_POST['nomeMarca'];
    
    $result1 = mysqli_query($conexao, "INSERT INTO marcaprodutos(nome_marca) VALUES('$nomeMarca')");
    header('Location: ../../cadastros/produto.php', true, 301);
?>