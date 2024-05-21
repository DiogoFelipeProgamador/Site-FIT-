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
        if($alturacerta > 3){
            $alturacerta = $alturacerta/100;
        }
        $peso = $user_data['peso'];
        $datanasc = $user_data['datanasc'];
        $sexo = $user_data['sexo'];
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

    <section class="cadastrar">
            <form action="SaveEdit.php" method="POST">
                <div class="box-cadastrar">
                <h1>Alteração de dados</h1>
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Nome" value="<?php echo $name ?>" required>
                <label>E-mail</label>
                <input type="text" name="email"  placeholder="E-mail" value="<?php echo $email ?>" required>
                <label>Altura</label>
                <input type="number" name="altura" step ="0.010"  placeholder="Altura" value="<?php echo $alturacerta ?>" required>
                <label>Peso</label>
                <input type="number" name="peso" step="0.010" placeholder="Peso" value="<?php echo $peso ?>" required>
                <label>Data de Nascimento</label>
                <input type="date" name="datanasc" value="<?php echo $datanasc ?>" required>
                <label>Sexo</label>
                <select name="sexo" required>
                    <option value="homem" <?php echo ($sexo == 'homem') ? 'selected' : '' ?>>Masculino</option>
                    <option value="mulher" <?php echo ($sexo == 'mulher') ? 'selected' : '' ?>>Feminino</option>
                    <option value="outro" <?php echo ($sexo == 'outro') ? 'selected' : '' ?>>Outro</option>
                </select>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" value="Atualizar">
                <a href="meuperfil">Voltar</a>
                <a href="alterar-senha">Alterar Senha</a>
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