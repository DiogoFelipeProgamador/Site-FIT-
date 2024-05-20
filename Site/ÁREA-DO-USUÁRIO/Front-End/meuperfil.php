<?php

    session_start();  
    include_once('config.php');      
    //print_r($_SESSION);
    if((!isset($_SESSION['email'])) == true and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login');
    }
    else{
        $logado = $_SESSION['email'];
    }

    $sql = "SELECT * FROM usuarios WHERE email = '$logado' ORDER BY id DESC";
    $result = $conexao->query($sql);
    
    // Verificar se a consulta retornou resultados
    if ($result->num_rows > 0) {
        // Como é esperado apenas um resultado para o usuário logado, não é necessário usar um loop
        $user_data = mysqli_fetch_assoc($result);
        $id = $user_data['id'];
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
        $tmb = 88.362 + (13.397 * $peso) + (4.799 * ($alturacerta * 100)) - (5.677 * $idade);
        if($sexo == 'mulher'){
            $tmb = 447.593 + (9.247 * $peso) + (3.098 * $alturacerta) - (4.330 * $idade);
        }
        $fcminideal = (220 - $idade) * 0.60;
        $fcmaxideal = (220 - $idade) * 0.75;
        if($sexo == 'mulher'){
            $fcminideal = (226 - $idade) * 0.60;
            $fcmaxideal = (226 - $idade) * 0.75;
        }
        $_SESSION['id'] = $id;
    }

    $sql_check_questionnaire = "SELECT questionariorespondido FROM questionários WHERE email = '$logado'";
$result_check_questionnaire = $conexao->query($sql_check_questionnaire);

if ($result_check_questionnaire->num_rows > 0) {
    $row = $result_check_questionnaire->fetch_assoc();
    $questionario_respondido = $row['questionariorespondido'];

    if ($questionario_respondido == 1) {
        // Se o usuário já respondeu ao questionário, redirecione-o para outra página
        header("Location: meuperfil-recomendações");
        exit;
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
            <li><a href="inicio.php">Home</a></li>
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


    <section class="system">
        <div class="dados-usuario">
        <img src ="imagens/img-usuario.png"/> 
        <?php echo"<h1>Nome: $nome </h1>";?>
        <?php echo"<h1>E-mail: $logado</h1>";?>
        <?php echo"<h1>Altura: $alturacerta M</h1>";?>
        <?php echo"<h1>Peso: $peso KG</h1>";?>
        <?php echo"<h1>Sexo: $sexo </h1>";?>
        <?php echo"<h1>Idade: $idade</h1>";?>
        </div>
        <?php echo "<a href=\"editar\"><input type=\"button\" value=\"Alterar dados\"></a>";?>
    </section>

    </section>

    <section class="calculos-usuario">
        <div class="box-calculos">
            <div class="titulo-box">
                <h1>Resultados</h1>
            </div>
            <?php echo "<p>SEU IMC É: $imc</p>"; if($imc < 18.5){echo "<p>Você está abaixo do peso</p>";}else if($imc >= 18.5){echo "<p>Você está com peso normal</p>";}else if($imc >=25){echo "<p>Você está acima do peso</p>";}else if($imc >= 30){echo "<p>Você está com obsedidade grau I</p>";}else if($imc >= 35){echo "<p>Você está com obesidade grau II</p>";}else if($imc > 40){echo "<p>Você está com obesidade grau III</p>";}?>
            <?php echo "<p>SEU TMB É: $tmb </p>" ?>
            <?php echo "<p>SUA FC MÍNIMA IDEAL PARA EMAGRECER É: $fcminideal </p>" ?>
            <?php echo "<p>SUA FC MÁXIMA IDEAL PARA EMAGRECER É: $fcmaxideal </p>" ?>
        </div>
        <div class="box-calculos">
        <div class="titulo-box">
                <h1>Questionários</h1>
            </div>
            <form method="POST" action="verificarrespostas.php">
            <div class="questions">
            <h1>Você se alimenta bem? </h1>
            <input type="radio" name="questions1" id="yes" value="yes" required>
            <label for="questions">Sim</label>
            <input type="radio" name="questions1" id="no" value="no" required>
            <label for="questions">Não</label>
            </div>
            <div class="questions">
            <h1>Você pratica exercícios fisícos? </h1>
            <input type="radio" name="questions2" id="yes" value="yes" required>
            <label for="questions">Sim</label>
            <input type="radio" name="questions2" id="no" value="no" required>
            <label for="questions">Não</label>
            </div>
            <div class="questions">
            <h1>Você bebe muita água? </h1>
            <input type="radio" name="questions3" id="yes" value="yes" required>
            <label for="questions">Sim</label>
            <input type="radio" name="questions3" id="no" value="no" required>
            <label for="questions">Não</label>
            </div>
            <div class="questions">
            <h1>Você utiliza muita açucar e sal para fazer comida? </h1>
            <input type="radio" name="questions4" id="yes" value="yes" required>
            <label for="questions">Sim</label>
            <input type="radio" name="questions4" id="no" value="no" required>
            <label for="questions">Não</label>
            </div>
            <input type="submit" value="Enviar respostas">
            </form>
        </div>
        <div class="box-calculos">
        <div class="titulo-box">
                <h1>Recomendações</h1>
            </div>
            <div class="recomendacoes-text">
            <h1>As recomendações so serão exibidas apos responder o questionário.</h1>
            </div>
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