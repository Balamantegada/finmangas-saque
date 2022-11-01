<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finmangas</title>
    <link rel="stylesheet" type="text/css" href="styles/stylelogin.css">
    <link rel="shortcut icon" href="imgs/logo.png">
</head>

<body>
    <main>
        <section style="margin-top:0; width: 600px; padding-bottom: 0px;">
            <div class="tabelalogin">
                <div class="color"></div>
                <div class="color"></div>
                <div class="color"></div>
                <div class="boxlogin">
                    <div class="container">
                        <div class="square" style="--i:0"></div>
                        <div class="square" style="--i:1"></div>
                        <div class="square" style="--i:2"></div>
                        <div class="square" style="--i:3"></div>
                        <div class="square" style="--i:4;"></div>
                        <div class="form">
                            <img width="70px" src="imgs/logo1.png">
                            <h2>Registrar-se</h2>
                            <form action="conexãoDB/cadastrar.php" method="post" id="formCadastrar"
                                name="formCadastrar">
                                <div class="inputbox">
                                    <input type="text" name="usuario" id="usuario" placeholder="Usuário">
                                </div>
                                <div class="inputbox">
                                    <input type="text" name="email" id="email" placeholder="Email">
                                </div>
                                <div class="inputbox">
                                    <input type="password" name="senha" id="senha" placeholder="Senha">
                                </div>
                                <div class="inputbox">
                                    <input type="password" name="senhaconfirmada" placeholder="Confirmar senha">
                                </div>
                                <div class="inputbox">
                                    <input type="submit" value="cadastrar" style="font-size:15px;" placeholder="Login">
                                </div>
                                <p class="forget">Esqueceu sua senha ?<a href="trocasenha.php">Clique aqui</a></p>
                                <p class="forget">Já tem conta ?<a href="index.php">Faça login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
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
</body>