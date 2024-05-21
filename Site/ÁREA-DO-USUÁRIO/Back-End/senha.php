<!DOCTYPE html>
<html>
<head>
    <title>Fitmais</title>
    <meta charset="utf-8">
    <link href="../css/style.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">
    <script src="../js/script.js"></script>
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
            <li><a href="login">Login</a></li>
            <li class="button-test"><a href="cauculos">Testes</a></li>
        </ul>
        <div class="menu-icon" onclick="menuShow()">
            <img src="../imagens/btn-menu.png">
        </div><!--menu-icon-->
    </nav>


    </header>



    <section class="senha">
        <form method = "POST" action ="verificar_email.php">
            <div class="box-senha">
            <div class="senha-error">
            <?php
            if(isset($_GET['error']) && $_GET['error'] == 'email_nao_existente') {
            echo "<p>O e-mail fornecido não está cadastrado. Por favor, verifique o e-mail e tente novamente.</p>";
            }
            ?>
            </div>
                <h1>Alterar a senha</h1>
                <p>*Digite o e-mail da sua conta para enviarmos o codigo de redefinição</p>
                <label>E-mail</label>
                <input type="text" id="email" name="email">
                <input type="submit" name = "submit" value="Enviar">
                <a href="login">Voltar</a>
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