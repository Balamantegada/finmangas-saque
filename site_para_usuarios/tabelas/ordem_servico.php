<?php
	//session_start inicia a sessão
	session_start();

	if (empty($_SESSION['usuario'])){
		header('Location: ../../index.php');
		exit;
	}
        
    include_once('../../conexãoDB/config.php');
    $sql1 = "SELECT * FROM ordemservicodb ORDER BY id_ordemservico DESC";
    $arrayOrdemServicos = $conexao->query($sql1);

    // Serviços
    include_once('../../conexãoDB/config.php');
    $sql2 = "SELECT * FROM servico ORDER BY id_servico DESC";
    $arrayListServicos = $conexao->query($sql2);
    include_once('../../conexãoDB/config.php');
    $sql3 = "SELECT * FROM itemservico ORDER BY id_item_servico DESC";
    $arrayListServicoItem = $conexao->query($sql3);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finmangas</title>
    <link rel="stylesheet" type="text/css" href="../../styles/stylespaginacadastros.css">
    <link rel="shortcut icon" href="../../imgs/logo.png">
</head>

<body>
    <header>
        <nav>
            <a href="/site_para_usuarios/home.php">
                <h1>Finmangas</h1>
            </a>
            <a href="/site_para_usuarios/home.php"><img src="/imgs/logo1.png" alt="logo"></a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">

                <li><a href="/site_para_usuarios/home.php">Home</a></li>
                <li><a href="/site_para_usuarios/paginas.php">Paginas</a></li>
                <li><a href="/site_para_usuarios/perfil.php">Perfil</a></li>
                <?php
                    if(empty($_session['usuario'])){
                        echo'<li><a href="../../conexãoDB/sair.php" class="login">Sair</a></li>';
                    } else{
                        echo'<li><a href="/index.php" class="login">Login</a></li>';
                    }
                ?>


            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h1>Ordens e serviços</h1>
            <img src="/imgs/icons/servico_icon.png">

            <h1 style="font-size: 40px; text-align: center;">Ordem e Serviços</h1>
            <div class="table-wrapper">
                <table class="fl-table ">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Referência</th>
                            <th>Defeito</th>
                            <th>Descrisão</th>
                            <th>observação</th>
                            <th>Numero serie</th>
                            <th>Equipamento</th>
                            <th>Desconto serviço</th>
                            <th>Acresimo serviço</th>
                            <th>Desconto produto</th>
                            <th>Acresimo produto</th>
                            <th>Data entrada serviço</th>
                            <th>Hora entrada serviço</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($user_data1 = mysqli_fetch_assoc($arrayOrdemServicos)){
                                echo"<tr>";
                                echo"<td>".$user_data1['id_ordemservico']."</td>";
                                echo"<td>".$user_data1['referencia']."</td>";
                                echo"<td>".$user_data1['defeito']."</td>";
                                echo"<td>".$user_data1['descrisao']."</td>";
                                echo"<td>".$user_data1['observacao']."</td>";
                                echo"<td>".$user_data1['numeroserie']."</td>";
                                echo"<td>".$user_data1['equipamento']."</td>";
                                echo"<td>".$user_data1['descontoservico']."</td>";
                                echo"<td>".$user_data1['acresimoservico']."</td>";
                                echo"<td>".$user_data1['descontoproduto']."</td>";
                                echo"<td>".$user_data1['acresimoproduto']."</td>";
                                echo"<td>".$user_data1['dataentradaservico']."</td>";
                                echo"<td>".$user_data1['horaentradaservico']."</td>";
                                echo"</tr>";
                            };
                        ?>
                    <tbody>
                </table>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr;">
                <div class="table-wrapper">
                    <h1 style="font-size: 40px; text-align: center; color: aliceblue;">Serviços</h1>
                    <table class="fl-table ">
                        <thead>
                            <tr>
                                <th>ID serviços</th>
                                <th>Descrisão</th>
                                <th>Valor/th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($arrayListServicosData = mysqli_fetch_assoc($arrayListServicos)){
                                echo"<tr>";
                                echo"<td>".$arrayListServicosData['id_servico']."</td>";
                                echo"<td>".$arrayListServicosData['descrisao']."</td>";
                                echo"<td>".$arrayListServicosData['valor']."</td>";
                                echo"</tr>";
                            };
                        ?>
                        <tbody>
                    </table>
                </div>

                <div class="table-wrapper">
                    <h1 style="font-size: 40px; text-align: center; color:aliceblue;">Item serviços</h1>
                    <table class="fl-table ">
                        <thead>
                            <tr>
                                <th>ID item serviço</th>
                                <th>Valor</th>
                                <th>Atribute30</th>
                                <th>Atribute34</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while($arrayListServicoItemData = mysqli_fetch_assoc($arrayListServicoItem)){
                                echo"<tr>";
                                echo"<td>".$arrayListServicoItemData['id_item_servico']."</td>";
                                echo"<td>".$arrayListServicoItemData['valor']."</td>";
                                echo"<td>".$arrayListServicoItemData['atribute30']."</td>";
                                echo"<td>".$arrayListServicoItemData['atribute34']."</td>";
                                echo"</tr>";
                            };
                        ?>
                        <tbody>
                    </table>
                </div>
            </div>

        </section>
    </main>
    <footer>
        <div>
            <div>
                <a>Contato:</a>
                <br>
                <img width="20px" src="/imgs/WhatsApp.svg.png">
                <a>Whats: 5547-999315741</a>
                <p><img src="/imgs/twitter_logo.svg" width="20px">Twitter: @bala_mantegada</p>
            </div>
            <div>
                <img src="/imgs/sesi-senai.webp" width="300px">
                <p>Made by Arthur L. kroenke</p>
                <p>SESI SENAI, Itajaí</p>
            </div>
        </div>
    </footer>
    <script src="../mobile-navbar.JS"></script>
</body>