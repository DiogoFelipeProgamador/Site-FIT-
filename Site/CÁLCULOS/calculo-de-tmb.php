<?php

    session_start();  
    include_once('config.php');      
    //print_r($_SESSION);
    if((!isset($_SESSION['email'])) == true and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: calculo-tmb');
    }
    else{
        $logado = $_SESSION['email'];
    }

    $sql = "SELECT * FROM cadastro WHERE email = '$logado' ORDER BY id DESC";
    $result = $conexao->query($sql);
    
    // Verificar se a consulta retornou resultados
    if ($result->num_rows > 0) {
        // Como é esperado apenas um resultado para o usuário logado, não é necessário usar um loop
        $user_data = mysqli_fetch_assoc($result);
        
        $nome = $user_data['nome'];
        $altura = $user_data['altura'];
        $alturacomponto = str_replace(',', '.', $altura);
        $alturacerta = (float) $alturacomponto;
        if($alturacerta > 100){
            $alturacerta = $alturacerta/100;
        }
        $peso = $user_data['peso'];
        $datanasc = $user_data['datanasc'];
        $data_nascimento = new DateTime($datanasc);
        $data_atual = new DateTime(13-04-2024); // Data atual
        $intervalo = $data_atual->diff($data_nascimento);
        $idade = $intervalo->y;
        $sexo = $user_data['sexo'];
        $imc = $peso / ($alturacerta * $alturacerta);
        $imc = number_format($imc, 2, '.', '');
        $tmb = 88.362 + (13.97 * $peso) + (4.799 * ($alturacerta * 100)) - (5.677 * $idade);
        if($sexo == 'mulher'){
            $tmb = 447.593 + (9.247 * $peso) + (3.098 * $alturacerta) - (4.330 * $idade);
        }
        $fcminideal = (220 - $idade) * 0.60;
        $fcmaxideal = (220 - $idade) * 0.75;
        if($sexo == 'mulher'){
            $fcminideal = (226 - $idade) * 0.60;
            $fcmaxideal = (226 - $idade) * 0.75;
        }
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
            <li><?php echo"<a href=\"meuperfil\">$nome</a>"?></li>
            <li><a href="sair">Sair</a></li>
            <li class="button-test"><a href="calculos">Testes</a></li>
        </ul>
        <div class="menu-icon" onclick="menuShow()">
            <img src="imagens/btn-menu.png">
        </div><!--menu-icon-->
    </nav>


    </header>

    <section class="cauculo-tmb">
        <div class="box-cauculo-tmb">
            <h1 class="titulo-do-tmb">Calcular O TMB</h1>
            <h1 class="height-tmb">Altura</h1>
            <input type="text" id="height-tmb">
            <h1>Peso</h1>
            <input type="text" id="weight-tmb">
            <h1>Idade</h1>
            <input type="text" id="age-tmb">
            <select id="options">
                <option value="1" id="option1">Homem</option>
                <option value="2" id="option2">Mulher</option>
            </select>
            <button onclick="calcular()">Calcular</button>
            <h1 id="text_area-tmb"></h1>
        </div>
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



