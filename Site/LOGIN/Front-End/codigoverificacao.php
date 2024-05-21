<?php
// Inicie a sessão
session_start();

// Verifique se o usuário está autenticado (ou seja, se o e-mail está na sessão)
if(!isset($_SESSION['email'])) {
    // Redirecione o usuário de volta à página anterior ou exiba uma mensagem de erro
    // Você pode redirecionar o usuário ou exibir uma mensagem de erro
}

// Obtém o e-mail do usuário da sessão
$email = $_SESSION['email'];

// Restante do seu código...
?>






<!DOCTYPE html>
<html>
<head>
    <title>Fitmais</title>
    <meta charset="utf-8">
    <link href="css/style.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scalejs/script.js">
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
            <li><a href="alimentação">Alimentação</a></li>
            <li><a href="exercicios">Exercicios</a></li>
            <li><a href="inicio#fit+">Fit+</a></li>
            <li class="button-test"><a href="calculos">Testes</a></li>
        </ul>
        <div class="menu-icon" onclick="menuShow()">
            <img src="imagens/btn-menu.png">
        </div><!--menu-icon-->
    </nav>


    </header>




    <section class="codigo-verificacao">
    <form action = "verificar-codigo.php" method = "POST">
    <div class="preencher-codigo">
    <div class="codigo-error">
    <?php
    if(isset($_SESSION['error'])) {
    echo "<p>{$_SESSION['error']}</p>";
    unset($_SESSION['error']);
    }
    ?>
    </div>
    <h1>Digite o codigo que você recebeu</h1>
    <input type="text" name="codigo">
    <input type="submit" value="Enviar" name="submit">
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