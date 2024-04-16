<?php

    session_start();  
    include_once('config.php');      
    //print_r($_SESSION);
    if((!isset($_SESSION['email'])) == true and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    else{
        $logado = $_SESSION['email'];
    }

    $sql = "SELECT * FROM formulario WHERE email = '$logado' ORDER BY id DESC";
    $result = $conexao->query($sql);
    
    // Verificar se a consulta retornou resultados
    if ($result->num_rows > 0) {
        // Como é esperado apenas um resultado para o usuário logado, não é necessário usar um loop
        $user_data = mysqli_fetch_assoc($result);
        $id = $user_data['id'];
        $nome = $user_data['nome'];
        $altura = $user_data['altura'];
        $peso = $user_data['peso'];
        $datanasc = $user_data['datanasc'];
        $data_nascimento = new DateTime($datanasc);
        $data_atual = new DateTime(13-04-2024); // Data atual
        $intervalo = $data_atual->diff($data_nascimento);
        $idade = $intervalo->y;
        $sexo = $user_data['sexo'];
        $imc = $peso / ($altura * $altura);
        $imc = number_format($imc, 2, '.', '');
        $tmb = 88.362 + (13.97 * $peso) + (4.799 * ($altura * 100)) - (5.677 * $idade);
        if($sexo == 'mulher'){
            $tmb = 447.593 + (9.247 * $peso) + (3.098 * $altura) - (4.330 * $idade);
        }
        $fcminideal = (220 - $idade) * 0.60;
        $fcmaxideal = (220 - $idade) * 0.75;
        if($sexo == 'mulher'){
            $fcminideal = (226 - $idade) * 0.60;
            $fcmaxideal = (226 - $idade) * 0.75;
        }
        $agua = $peso * 0.035;
    }

    $sql_check_questionnaire = "SELECT questionariorespondido FROM formulario WHERE email = '$logado'";
$result_check_questionnaire = $conexao->query($sql_check_questionnaire);

$questao1 = $user_data['questao1'];
$questao2 = $user_data['questao2'];
$questao3 = $user_data['questao3'];
$questao4 = $user_data['questao4'];    

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
            <li><a href="index.php">Home</a></li>
            <li><a href="alimentação.php">Alimentação</a></li>
            <li><a href="exercicios.php">Exercicios</a></li>
            <li><a href="index.php #fit+">Fit+</a></li>
            <li><?php echo"<a href=\"sistema.php\">$nome</a>"?></li>
            <li><a href="sair.php">Sair</a></li>
            <li class="button-test"><a href="calculos.php">Testes</a></li>
        </ul>
        <div class="menu-icon" onclick="menuShow()">
            <img src="../imagens/btn-menu.png">
        </div><!--menu-icon-->
    </nav>


    </header>


    <section class="system">
        <div class="dados-usuario">
        <img src ="../imagens/img-usuario.png"/> 
        <?php echo"<h1>Nome: $nome </h1>";?>
        <?php echo"<h1>E-mail: $logado</h1>";?>
        <?php echo"<h1>Altura: $altura M</h1>";?>
        <?php echo"<h1>Peso: $peso KG</h1>";?>
        <?php echo"<h1>Sexo: $sexo </h1>";?>
        <?php echo"<h1>Idade: $idade</h1>";?>
        </div>
        <?php echo "<a href=\"editar.php?id=$user_data[id]\"><input type=\"button\" value=\"Alterar dados\"></a>";?>
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
            <div class="box-quest-verificado">
            <img src="../imagens/img-verificado.png">
            <h1>Questionário respondido.</h1>
            </div>
            <div class="box-quest-h1">
            </div>

        </div>
        <div class="box-calculos">
        <div class="titulo-box">
                <h1>Recomendações</h1>
            </div>
            <div class="recomendacoes-text">
            <?php if($questao1 == 'Sim'){echo"<p>Continue se alimentando corretamente, de preferencia a legumes.</p>";}else{
                echo"<p>Procure um nutricionista para montar uma alimentação saudavel.</p>";
            }


            if($questao2 == 'Sim'){
                echo "<p>Continue fazendo exercícios com a ajuda de um profissional.</p>";
            }else{
                echo "<p>Procure um medico para começar a fazer exercícios fisicos.</p>";
            }

            if($questao3 == 'Sim'){
                echo "<p>Continue tomando muita água, você deve tomar pelos menos $agua litros de agua por dia </p>";
            }else{
                echo"<p>Começe a tomar mais água pois é muito importante, você deve tomar pelo menos $agua litros de agua por dia.</p>";
            }

            if($questao4 == 'Sim'){echo "<p>Diminua o uso do açucar e do sal pois o uso excessivo deles pode causar problemas de saude, o recomendado pela OMS é o consumo diario de 5g por dia de sal, o consumo de açucar recomendado é de 25 gramas por dia. </p>";}
            else{
                echo "<p>Continue usando sal e açucar moderadamente pois o consumo excessivo pode causar problemas de saude, o recomendado pela OMS é o consumo diario de 5g por dia de sal, o consumo de açucar recomendado é de 25 gramas por dia.</p>";
            }

            

            
            
            
            ?>
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