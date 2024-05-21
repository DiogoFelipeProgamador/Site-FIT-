<?php
$error_message = isset($_GET['error']) ? $_GET['error'] : '';
?>




<!DOCTYPE html>
<html>
<head>
    <title>Fitmais</title>
    <meta charset="utf-8">
    <link href="css/style.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
    <script src="js/script.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
</head>

<body>
    <header>
    <nav class="navbar">
        <div class="logo animate__animated animate__bounce" onclick="(window.location='inicio')">
            <h1>FIT+</h1>
        </div><!--logo-->
        <ul>
            <li><a href="inicio">Home</a></li>
            <li><a href=".alimentação">Alimentação</a></li>
            <li><a href="exercicios">Exercicios</a></li>
            <li><a href="inicio#fit+">Fit+</a></li>
            <li><a href="login">Login</a></li>
            <li class="button-test"><a href="../cálculos/calculos">Testes</a></li>
        </ul>
        <div class="menu-icon" onclick="menuShow()">
            <img src="imagens/btn-menu.png">
        </div><!--menu-icon-->
    </nav>


    </header>

    <section class="login">
        <form action="testLogin.php" method ="POST">
            <div class="box-login">
            <div class="login-error"><?php echo $error_message; ?></div>
            <h1>Login</h1>
            <label>E-mail</label>
            <input type="text" name="email" required>
            <label>Senha</label>
            <input type="password" name="senha" required>
            <input type="submit" name="submit" value="Entrar">
            <a href="cadastrar.php">Ainda não tenho cadastro</a>
            <a href="senha.php">Esqueci a senha</a>
            </div>
        </form>
    </section>

    <footer class="rodape">
        <div class="box-rodape">
            <div class="text-rodape">
                <p>Todos os direitos reservados</p>
            </div>
        </div>
    </footer>









</body>









</html>