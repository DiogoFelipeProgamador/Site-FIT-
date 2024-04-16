<?php

    session_start();  
    include_once('config.php');      
    //print_r($_SESSION);
    if((!isset($_SESSION['email'])) == true and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: cauculos.html');
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
    <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
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



    <section class="cauculos">
        <div class="imc-cauculo">
            <h1>TESTE DO IMC:</h1>
            <p>Muitas pessoas buscam descobrir seu IMC quando iniciam uma dieta específica ou uma atividade física. E estão certas, pois ele aponta a normalidade - peso adequado -, a magreza ou a obesidade em diferentes níveis. Mas, com o resultado deste cálculo em mãos, o que fazer? E o que este número final diz sobre a saúde de cada pessoa?

                Eliziane Leite, endrocnologista que atua na Secretaria de Saúde do Distrito Federal, ensina que, para fazer o cálculo, basta dividir o peso pela altura ao quadrado. É importante ter as medidas exatas antes do cálculo. Não vale “chutar” ou arriscar um palpite. O número final representa o quanto a pessoa tem de massa muscular + massa de gordura + massa óssea. Com o resultado, o próximo passo é traduzi-lo. Veja a tabela para interpretar:
                
                IMC - Classificação do IMC
                
                Menor que 16 - Magreza grave
                
                16 a menor que 17 - Magreza moderada
                
                17 a menor que 18,5 - Magreza leve
                
                18,5 a menor que 25 - Saudável
                
                25 a menor que 30 - Sobrepeso
                
                30 a menor que 35 - Obesidade Grau I
                
                35 a menor que 40 - Obesidade Grau II (considerada severa)
                
                Maior que 40 - Obesidade Grau III (considerada mórbida) </p>

                <h1>Avaliando Resultados</h1>

                <p>Avaliando os resultados

                    Para os adultos jovens e pessoas com até os 65 anos, é recomendado fazer o IMC em casa. “Não é um cálculo difícil e é até bom, porque alerta para uma necessidade de procurar um especialista. Muitas vezes as pessoas se surpreendem, pois não se consideram ou não se enxergam num grau de obesidade. O cálculo é revelador”, diz Eliziane Leite.
                    
                    Com um profissional de saúde, é possível confirmar o número indicado pelo IMC. Dependendo do resultado, os médicos ou nutricionistas geralmente pedem exames adicionais para avaliar o grau de sobrepeso ou obesidade.
                    
                    Quando o índice de massa corporal recomendado está excedido, é porque a pessoa pode estar numa situação de sobrepeso com tendência à obesidade ou já ter a obesidade. E esse índice vai graduar de obesidade grau 1, grau 2, grau 3.
                    
                    Se o índice estiver muito abaixo da normalidade para o homem e para a mulher indica que a pessoa pode estar no estado de desnutrição, de perda expressiva de massa. E assim como a obesidade, também existem graus de magreza.</p>

                    <h1>Casos não recomendados</h1>

                    <p>Ao calcular o IMC, é importantíssimo levar em consideração se a pessoa é um atleta, uma criança ou um idoso. “No caso de uma pessoa que pratica musculação, por exemplo, o IMC pode muitas vezes não ser verdadeiro. O índice não pode ser interpretado do mesmo jeito que de uma pessoa sedentária, que provavelmente tem o índice de gordura muito maior. Então essa é uma crítica que se faz a usar o Índice de Massa Corporal de forma indiscriminada”, esclarece a médica.

                    Essas pessoas devem ser vistas por um profissional de Nutrição ou por um endrocnologista, que não se baseiam apenas pelo IMC. Para este público, são necessárias classificações específicas.
                        
                    Eliziane Leite indica que as pessoas façam uma autocrítica da qualidade de alimentação e atividade física. Um IMC dentro da normalidade não é o suficiente para considerar a pessoa 100% saudável. “Às vezes ela tem uma massa corporal normal, mas não está se alimentando adequadamente e é uma pessoa extremamente sedentária. O IMC normal não isenta de qualquer preocupação com a sua qualidade de vida”, destaca.</p>

                    <div class="imc-button">
                        <img src="../imagens/imc-png-button.png">
                        <div class="cauculo-button-imc" onclick="(window.location='program.php')">
                            <a>Caucular o meu IMC</a>
                        </div>
                    </div><!--imc-button-->
    
        </div><!--imc-cauculo-->

        <div class="tmb-cauculo">
            <h1>TESTE DE TMB:</h1>
            <p>Saber o quanto o organismo gasta de energia em um dia normal é um ótimo ponto de partida para quem quer emagrecer. A partir daí, é possível estabelecer uma dieta que estimule o organismo a queimar a tão indesejada gordura acumulada. Mas o que é, exatamente, a taxa metabólica basal? Como ela pode ser calculada? Que outras ações podem ser combinadas para estimular a perda de peso? Siga no texto e confira! </p>
            <h1>O que é a taxa metabolica basal?</h1>
            <p>A taxa metabólica basal (TMB) é a quantidade de energia necessária para a manutenção das funções vitais do organismo ao longo de 24 horas. Ela é medida em calorias, que é a energia extraída pelo nosso corpo a partir dos macronutrientes (carboidratos, proteínas e gorduras totais). </p>
            <h1>Existe taxa metabólica basal ideal?</h1>
            <p>Não há um valor universal para essa taxa, já que ela apresenta grandes variações de acordo com a idade, o sexo, os hormônios e as características genéticas de cada pessoa. 

            Por exemplo: se for um homem, que normalmente tem maior percentual de massa muscular que uma mulher, a taxa metabólica será maior, já que os músculos queimam muito mais calorias que a gordura.</p>

            <div class="tmb-button">
                <img src="../imagens/metabolismo.png">
                <div class="cauculo-tmb-button" onclick="(window.location='calculo-tmb.php')">
                    <a>Caucular o meu TMB</a>
                </div>
            </div>
        </div><!--tm-cauculo-->

        <div class="fc-ideal-cauculo">
            <h1>TESTE DA FC IDEAL PARA EMAGRECER:</h1>
            <p>A frequência cardíaca ideal para queimar gordura e emagrecer durante o treino é de 60 a 75% da frequência cardíaca (FC) máxima, que varia de acordo com a idade, e que pode ser medida com um frequencímetro. O treino nesta intensidade melhora o condicionamento físico, utilizando mais gordura como fonte de energia, contribuindo para perda de peso.

            Assim, antes de se iniciar qualquer tipo de treino de resistência, é importante saber qual a FC ideal que se deve manter durante o treino para queimar gordura e emagrecer. Além disso, é recomendado fazer um eletrocardiograma, especialmente se é iniciante ou se existe histórico de problemas cardíacos na família, para confirmar que não existe nenhum problema cardíaco, como arritmia, que impeça a prática deste tipo de exercício físico.</p>
            <h1>Como controlar a frequência cardíaca durante o treino</h1>
            <p>Para controlar a frequência cardíaca durante o treino, uma ótima opção é usar um frequencímetro. Existem alguns modelos parecidos com relógios, que podem ser programados para apitar sempre que os batimentos cardíacos saírem dos limites ideais do treino. Algumas das marcas de frequencímetros disponíveis no mercado são Polar, Garmin e Speedo.</p>
            <h1>Como calcular a frequência cardíaca para emagrecer</h1>
            <p>Para calcular a frequência cardíaca ideal para queimar gordura e emagrecer, durante o treino, deve-se aplicar a seguinte fórmula:

            Homens: 220 - idade e depois multiplicar esse valor por 0.60 e 0.75;
            Mulheres: 226 - idade e depois multiplicar esse valor por 0.60 e 0.75.
            Utilizando o mesmo exemplo, uma mulher com 30 anos, teria que fazer os seguintes cálculos:
                
            226 - 30 = 196; 196 x 0.60 = 117 - FC mínima ideal para emagrecer;
            196 x 0.75 = 147 - FC máxima ideal para emagrecer.</p>
            <div class="fc-ideal-button">
                <img src="../imagens/icon-fc-ideal.png">
                <div class="fc-ideal-cauculobutton" onclick="(window.location='calculo-fc.php')">
                    <a>Caucular a minha FC ideal</a>
                </div>
            </div>
        </div>

    </section><!--cauculos-->









    <footer class="rodape">
        <div class="box-rodape">
            <div class="text-rodape">
                <p>Todos os direitos reservados</p>
            </div>
        </div>
    </footer>









</body>









</html>
