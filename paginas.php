<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finmangas</title>
    <link rel="stylesheet" type="text/css" href="styles/stylepaginaslist.css">
    <link rel="shortcut icon" href="imgs/logo.png">
</head>

<body>
    <?php
			//session_start inicia a sessão
			session_start();

			if (empty($_SESSION['usuario'])){
				header('Location: index.php');
				exit;
		}
	?>
    <header>
        <nav>
            <a href="home.php">
                <h1>Finmangas</h1>
            </a>
            <a href="home.php"><img src="imgs/logo1.png" alt="logo"></a>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">

                <li><a href="home.php">Home</a></li>
                <li><a href="paginas.php">Paginas</a></li>
                <li><a href="perfil.php">Perfil</a></li>
                <?php
                    if(empty($_session['usuario'])){
                        echo'<li><a href="conexãoDB/sair.php" class="login">Sair</a></li>';
                    } else{
                        echo'<li><a href="index.php" class="login">Login</a></li>';
                    }
                ?>


            </ul>
        </nav>
    </header>

    <main>
        <section>
            <div class="listaimagens">
                <h1>Lista de paginas:</h1>
                <a href="cadastros/ordem_servico.php"><img src="imgs/icons/servico_icon.png"></a>
                <a href="cadastros/pessoas.php"><img src="imgs/icons/pessoas_icon.png"></a>
                <a href="cadastros/produto.php"><img src="imgs/icons/produto_icon.png"></a>
                <a href="cadastros/transacoes.php">
                    <img src="imgs/icons/transações.png">
                </a>
            </div>
        </section>
    </main>
    <footer>
        <div>
            <div>
                <a>Contato:</a>
                <br>
                <img width="20px" src="imgs/WhatsApp.svg.png">
                <a>Whats: 5547-999315741</a>
                <p><img src="imgs/twitter_logo.svg" width="20px">Twitter: @bala_mantegada</p>
            </div>
            <div>
                <img src="imgs/sesi-senai.webp" width="300px">
                <p>Made by Arthur L. kroenke</p>
                <p>SESI SENAI, Itajaí</p>
            </div>
        </div>
    </footer>
    <script src="mobile-navbar.JS"></script>
</body>