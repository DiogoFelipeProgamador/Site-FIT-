<?php
    include_once('config.php');
    session_start();
    
    if(isset($_SESSION['email'])) {
        $logado = $_SESSION['email'];
    } else {
        header('Location: login');
        exit;
    }


$logado = $_SESSION['email'];

    $sqlSelect = "SELECT * FROM usuarios WHERE email='$logado'";
    $result = $conexao->query($sqlSelect);

   if($result->num_rows > 0){
    while($user_data = mysqli_fetch_assoc($result)){
        $id = $user_data['id'];
        $name = $user_data['nome'];
        $email = $user_data['email'];
        $altura = $user_data['altura'];
        $alturacomponto = str_replace(',', '.', $altura);
        $alturacerta = (float) $alturacomponto;
        if($alturacerta > 100){
            $alturacerta = $alturacerta/100;
        }
        $peso = $user_data['peso'];
        $datanasc = $user_data['datanasc'];
        $sexo = $user_data['sexo'];
        $_SESSION['id'] = $id;
    }

   }
   else{
    header('Location: meuperfil');
   }

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
            <li><a href="inicio.php">Home</a></li>
            <li><a href="alimentação">Alimentação</a></li>
            <li><a href="exercicios">Exercicios</a></li>
            <li><a href="inicio#fit+">Fit+</a></li>
            <li><?php echo"<a href=\"meuperfil\">$name</a>"?></li>
            <li><a href="sair">Sair</a></li>
            <li class="button-test"><a href="calculos">Testes</a></li>
        </ul>
        <div class="menu-icon" onclick="menuShow()">
            <img src="imagens/btn-menu.png">
        </div><!--menu-icon-->
    </nav>


    </header>



    <section class="alterar-senha-logado">
        <form method="POST" action="verificaralteracaosenha.php">
        <div class="box-senha-logado">
        <div class="senha-alterar-error">
        <?
        if(isset($_SESSION['error'])) {
        echo "<p>{$_SESSION['error']}</p>";
        unset($_SESSION['error']);} 
        ?>
        </div>
            <h1>Alteração de senha</h1>
            <label for="senha-atual">Senha Atual</label>
            <input type="password" id="senha-atual" name="senha-atual">
            <label for="senha-nova">Nova Senha</label>
            <input type="password" id="senha-nova" name="senha-nova">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="submit" value="Alterar" name="submit">
            <a href="editar.php">Voltar</a>
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
