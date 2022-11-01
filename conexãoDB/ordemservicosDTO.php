<?php
    include_once('../conexãoDB/config.php');
    $referencia = $_POST['referencia'];
    $defeito = $_POST['defeito'];
    $descrisao	 = $_POST['descrisao'];
    $observacao = $_POST['observacao'];
    $numeroserie = $_POST['numeroserie'];
    $equipamento = $_POST['equipamento'];
    $descontoservico = $_POST['descontoservico'];
    $acresimoservico = $_POST['acresimoservico'];
    $descontoproduto = $_POST['descontoproduto'];
    $acresimoproduto = $_POST['acresimoproduto'];
    $dataentradaservico = date('Y-m-d', strtotime($_POST['dataentradaservico']));
    $horaentradaservico = $_POST['horaentradaservico'];
    
    $result1 = mysqli_query($conexao, "INSERT INTO ordemservicodb(referencia, defeito, descrisao, observacao, numeroserie, equipamento, descontoservico, acresimoservico, descontoproduto, acresimoproduto, dataentradaservico, horaentradaservico) VALUES('$referencia', '$defeito', '$descrisao', '$observacao', '$numeroserie', '$equipamento', '$descontoservico', '$acresimoservico', '$descontoproduto', '$acresimoproduto', '$dataentradaservico', '$horaentradaservico')");
    header('Location: ../cadastros/ordem_servico.php', true, 301);
?>