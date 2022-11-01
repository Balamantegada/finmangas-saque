<?php 
    include_once('../conexãoDB/config.php');

    $nomeJuridico = $_POST['nomeJuridico'];
    $enderecoJuridico = $_POST['enderecoJuridico'];
    $telefoneJuridico = $_POST['telefoneJuridico'];
    $situacaoJuridico = $_POST['situacaoJuridico'];
    $bairroJuridico = $_POST['bairroJuridico'];
    $emailJuridico = $_POST['emailJuridico'];
    $cepJuridico = $_POST['cepJuridico'];
    $observacaoJuridico = $_POST['observacaoJuridico'];
    $tipoJuridico = $_POST['tipoJuridico'];
    $razaoSocial = $_POST['razaoSocial'];
    $cnpj = $_POST['cnpj'];
    $contato = $_POST['contato'];
    $inscrisaoEstadual = $_POST['inscrisaoEstadual'];

    $result1 = mysqli_query($conexao, "INSERT INTO pessoasjuridicas(nome, endereco, telefone, situacao, bairro, email, cep, observacao, tipo, razaosocial, cnpj, contato, incrisaosocial) VALUES('$nomeJuridico', '$enderecoJuridico', '$telefoneJuridico', '$situacaoJuridico', '$bairroJuridico', '$emailJuridico', '$cepJuridico', '$observacaoJuridico', '$tipoJuridico', '$razaoSocial', '$cnpj', '$contato', '$inscrisaoEstadual')");
    header('Location: ../cadastros/pessoas.php', true, 301);
?>