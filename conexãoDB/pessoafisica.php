<?php
    include_once('../conexãoDB/config.php');
    $nomeFisico = $_POST['nomeFisico'];
    $enderecoFisico = $_POST['enderecoFisico'];
    $telefoneFisico = $_POST['telefoneFisico'];
    $situacaoFisico = $_POST['situacaoFisico'];
    $bairroFisico = $_POST['bairroFisico'];
    $emailFisico = $_POST['emailFisico'];
    $cepFisico = $_POST['cepFisico'];
    $observecaoFisico = $_POST['observecaoFisico'];
    $tipoFisico = $_POST['tipoFisico'];
    $generoFisico = $_POST['generoFisico'];
    $cpfFisico = $_POST['cpfFisico'];
    $rgFisico = $_POST['rgFisico'];
    $data_nascimentoFisico = $_POST['data_nascimentoFisico'];
    $celularFisico = $_POST['celularFisico'];
    
    $result1 = mysqli_query($conexao, "INSERT INTO pessoasfisicas(nome, endereco, telefone, situacao, bairro, email, cep, observacao, tipo, sexo, cpf, rg, dataNascimento, celular) VALUES('$nomeFisico', '$enderecoFisico', '$telefoneFisico', '$situacaoFisico', '$bairroFisico', '$emailFisico', '$cepFisico', '$observecaoFisico', '$tipoFisico', '$generoFisico', '$cpfFisico', '$rgFisico', '$data_nascimentoFisico', '$celularFisico')");
    header('Location: ../cadastros/pessoas.php', true, 301);
?>