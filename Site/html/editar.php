<?php
    if(!empty($_GET['id'])){
    
    include_once('config.php');
    session_start();

    $id = $_GET['id'];



    $sqlSelect = "SELECT * FROM formulario WHERE id=$id";

    $result = $conexao->query($sqlSelect);

   if($result->num_rows > 0){
    while($user_data = mysqli_fetch_assoc($result)){
        $name = $user_data['nome'];
        $email = $user_data['email'];
        $senha = $user_data['senha'];
        $altura = $user_data['altura'];
        $peso = $user_data['peso'];
        $datanasc = $user_data['datanasc'];
        $sexo = $user_data['sexo'];
    }

   }
   else{
    header('Location: sistema.php');
   }
    }
    else{
        header('Location:sistema.php');
    }

?>




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
        <div class="logo animate__animated animate__bounce" onclick="(window.location='index.php')">
            <h1>FIT+</h1>
        </div><!--logo-->
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="alimentação.html">Alimentação</a></li>
            <li><a href="exercicios.html">Exercicios</a></li>
            <li><a href="#fit+">Fit+</a></li>
            <li><?php echo"<a href=\"sistema.php\">$name</a>"?></li>
            <li><a href="sair.php">Sair</a></li>
            <li class="button-test"><a href="calculos.php">Testes</a></li>
        </ul>
        <div class="menu-icon" onclick="menuShow()">
            <img src="../imagens/btn-menu.png">
        </div><!--menu-icon-->
    </nav>


    </header>

    <section class="cadastrar">
            <form action="SaveEdit.php" method="POST">
                <div class="box-cadastrar">
                <h1>Alteração de dados</h1>
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Nome" value="<?php echo $name ?>">
                <label>E-mail</label>
                <input type="text" name="email"  placeholder="E-mail" value="<?php echo $email ?>">
                <label>Senha</label>
                <input type="text" name="senha"  placeholder="Senha" value="<?php echo $senha ?>">
                <label>Altura</label>
                <input type="text" name="altura"  placeholder="Altura" value="<?php echo $altura ?>">
                <label>Peso</label>
                <input type="text" name="peso" placeholder="Peso" value="<?php echo $peso ?>">
                <label>Data de Nascimento</label>
                <input type="date" name="datanasc" value="<?php echo $datanasc ?>">
                <label>Sexo</label>
                <select name="sexo">
                    <option value="homem" <?php echo ($sexo == 'homem') ? 'selected' : '' ?>>Masculino</option>
                    <option value="mulher" <?php echo ($sexo == 'mulher') ? 'selected' : '' ?>>Feminino</option>
                    <option value="outro" <?php echo ($sexo == 'outro') ? 'selected' : '' ?>>Outro</option>
                </select>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" value="Atualizar">
                <a href="sistema.php">Voltar</a>
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