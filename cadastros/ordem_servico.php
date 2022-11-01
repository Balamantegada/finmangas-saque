<?php
	//session_start inicia a sessão
	session_start();

	if (empty($_SESSION['usuario'])){
		header('Location: ../index.php');
		exit;
	}
        
    include_once('../conexãoDB/config.php');
    $sql1 = "SELECT * FROM ordemservicodb ORDER BY id_ordemservico DESC";
    $arrayOrdemServicos = $conexao->query($sql1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finmangas</title>
    <link rel="stylesheet" type="text/css" href="../styles/stylespaginacadastros.css">
    <link rel="shortcut icon" href="/imgs/logo.png">
</head>

<body>
    <header>
        <nav>
            <a href="../home.php">
                <h1>Finmangas</h1>
            </a>
            <a href="/home.php"><img src="/imgs/logo1.png" alt="logo"></a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">

                <li><a href="/home.php">Home</a></li>
                <li><a href="/paginas.php">Paginas</a></li>
                <li><a href="/perfil.php">Perfil</a></li>
                <?php
                    if(empty($_session['usuario'])){
                        echo'<li><a href="/sair.php" class="login">Sair</a></li>';
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
            <div class="container">

                <div class="formularioBody">
                    <form action="../conexãoDB/ordemservicosDTO.php" method="POST" style="float: left;">
                        <fieldset>
                            <legend><b>Fórmulário de Ordem e produtos</b></legend>
                            <br>
                            <div class="inputBox">
                                <input type="text" name="referencia" id="referencia" class="inputUser" required>
                                <label for="referencia" class="labelInput">Referência</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="text" name="defeito" id="defeito" class="inputUser" required>
                                <label for="defeito" class="labelInput">Defeito</label>
                            </div>
                            <br><br>

                            <div class="inputBox">
                                <input type="text" name="descrisao" id="descrisao" class="inputUser" required>
                                <label for="descrisao" class="labelInput">Descrisão</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="text" name="observacao" id="observacao" class="inputUser" required>
                                <label for="observacao" class="labelInput">Observação</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="text" name="numeroserie" id="numeroserie" class="inputUser" required>
                                <label for="numeroserie" class="labelInput">Numero serie</label>
                            </div>
                            <br>
                            <div class="inputBox">
                                <input type="text" name="equipamento" id="equipamento" class="inputUser" required>
                                <label for="equipamento" class="labelInput">Equipamento</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="descontoservico" id="descontoservico" class="inputUser"
                                    required>
                                <label for="descontoservico" class="labelInput">Desconto servico</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="acresimoservico" id="acresimoservico" class="inputUser"
                                    required>
                                <label for="acresimoservico" class="labelInput">Acresimo servico/label>
                            </div>
                            <!-- <br><br>
                            <div class="inputBox">
                                <input type="text" name="tipoFisico" id="tipoFisico" class="inputUser" required>
                                <label for="tipoFisico" class="labelInput">Tipo</label>
                            </div>
                            <br><br>
                            <p>Sexo:</p>
                            <input type="radio" id="feminino" name="generoFisico" value="feminino" required>
                            <label for="feminino">Feminino</label>
                            <br>
                            <input type="radio" id="masculino" name="generoFisico" value="masculino" required>
                            <label for="masculino">Masculino</label>
                            <br>
                            <input type="radio" id="outro" name="generoFisico" value="outro" required>
                            <label for="outro">Outro</label> -->
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="descontoproduto" id="descontoproduto" class="inputUser"
                                    required>
                                <label for="descontoproduto" class="labelInput">Desconto produto</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="number" name="acresimoproduto" id="acresimoproduto" class="inputUser"
                                    required>
                                <label for="acresimoproduto" class="labelInput">Acresimo produto</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="date" name="dataentradaservico" id="dataentradaservico" class="inputUser"
                                    required>
                                <label for="dataentradaservico" class="labelInput">Data entrada serviço</label>
                            </div>
                            <br><br>
                            <div class="inputBox">
                                <input type="text" name="horaentradaservico" id="horaentradaservico" class="inputUser"
                                    required>
                                <label for="horaentradaservico" class="labelInput">Hora entrada serviço</label>
                            </div>
                            <br><br>
                            <input type="submit" name="submit" id="submit">
                        </fieldset>
                    </form>
                </div>

            </div>
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