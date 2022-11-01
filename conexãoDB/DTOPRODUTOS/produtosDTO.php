<?php
    include_once('../config.php');
    $nome = $_POST['nome'];
    $codigodebarra = $_POST['codigodebarra'];
    $referencia = $_POST['referencia'];
    $descrisao = $_POST['descrisao'];
    $estoqueminimo = $_POST['estoqueminimo'];
    $estoquemaximo = $_POST['estoquemaximo'];
    $precocusto = $_POST['precocusto'];
    $precovenda = $_POST['precovenda'];
    $precovendaatacado = $_POST['precovendaatacado'];
    $marca = $_POST['marca'];
    $grupo = $_POST['grupo'];
    
    $result1 = mysqli_query($conexao, "INSERT INTO produtosdb(nome, codigobarra, referencia, descrisao, estoqueminimo, estoquemaximo, precocusto, precovenda, precovendaatacado, Marca_estrangeiro, Grupo_estrangeiro) VALUES('$nome', '$codigodebarra', '$referencia', '$descrisao', '$estoqueminimo', '$estoquemaximo', '$precocusto', '$precovenda', '$precovendaatacado', '$marca', '$grupo')");
    header('Location: ../../cadastros/produto.php', true, 301);
?>