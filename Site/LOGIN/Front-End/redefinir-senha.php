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
        <div class="logo animate__animated animate__bounce" onclick="(window.location='../página-inicial/inicio')">
            <h1>FIT+</h1>
        </div><!--logo-->
        <ul>
        <li><a href="../página-inicial/inicio">Home</a></li>
            <li><a href="../informações/alimentação">Alimentação</a></li>
            <li><a href="../informações/exercicios">Exercicios</a></li>
            <li><a href="../página-inicial/inicio#fit+">Fit+</a></li>
            <li><a href="login">Login</a></li>
            <li class="button-test"><a href="../cálculos/calculos">Testes</a></li>
        </ul>
        <div class="menu-icon" onclick="menuShow()">
            <img src="../imagens/btn-menu.png">
        </div><!--menu-icon-->
    </nav>


    </header>



    <section class = "alterar-senha">
    <form method = "POST" action = "verificar-redefinicao.php">
    <div class="preencher-nova-senha">
    <h1>Digite sua nova senha</h1>
    <input type= "text" name="nova-senha">
    <input type = "submit" value="Enviar" name="submit">
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








