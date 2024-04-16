<?php

    session_start();  
    include_once('config.php');      
    //print_r($_SESSION);
    if((!isset($_SESSION['email'])) == true and (!isset($_SESSION['senha']) == true)){
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: exercicios.html');
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

    <section class="exercicios-texto-explicacao">
        <div class="exercicio-explicacao">
            <div class="box-text">
                <h1>Exercicios</h1>
            </div>
            <div class="img-explicacao-exercicios">
                <div class="box-img-exercicios">
                </div><!--box-img-exercicios-->
                <div class="box-img-exercicios">
                </div><!--box-img-exercicios-->
                <div class="box-img-exercicios">
                </div><!--box-img-exercicios-->
            </div><!--img-explicacao-exercicios-->
        </div>
        <div class="explicacao-exercicios-text">
            <h1>QUAIS OS BENEFÌCIOS DO EXERCICIO FÍSICO?</h1>
            <p>Manter o funcionamento pleno do organismo depende, além de uma série de fatores, de manter a prática frequente de exercícios que estimulem o sistema circulatório e o respiratório, assim como a mobilidade corporal e a tenacidade dos músculos.

            Por outro lado, se feitos de maneira incorreta, os exercícios podem acarretar problemas para a saúde e reduzir a qualidade de vida do praticante. É preciso encontrar a atividade certa e, com o auxílio de um profissional, desempenhá-la da maneira que melhor se adéque às suas necessidades corporais.</p>

            <p>A atividade física está entre os hábitos mais recomendados para uma vida saudável. Devido a isso, a Organização Mundial da Saúde (OMS) passou a tratar o sedentarismo (que é a inatividade física) como um problema de saúde pública. A falta da prática de exercícios é um perigo crescente na sociedade, gerando maiores riscos à saúde e aumentando o índice de obesidade, doenças cardíacas, e a taxa de mortalidade.</p>

            <p>Fazer exercícios físicos de forma contínua e moderada pode trazer inúmeros benefícios. Entre eles, está controlar o peso, diminuir riscos de desenvolver doenças crônicas (como diabetes, hipertensão, depressão, doenças cardiovasculares) ou atenuar seus sintomas, gerar o fortalecimento muscular e aumentar a sensação de bem-estar. Assim você estará equilibrando sua saúde física e mental.</p>

            <p>Para conhecer melhor os principais benefícios da atividade física, continue conosco.</p>

            <h1>QUAIS OS BENEFÍCIOS DE PRATICAR ATIVIDADE FÍSICA?</h1>
            <p>A prática constante de atividades físicas pode garantir que você tenha mais qualidade de vida, afetando positivamente diversos aspectos da sua saúde. Para facilitar a compreensão desses benefícios, citamos e explicamos alguns deles a seguir. Confira!</p>
            <h1>Perda e controle de peso</h1>
            <p>Quando associada a uma alimentação sadia, a atividade física auxilia tanto no emagrecimento quanto na manutenção do peso desejável, já que a queima de calorias será frequente. Lembre-se de incluir os probióticos (presentes em iogurtes, queijos, coalhadas etc.).
            Para os que estão acima do peso, recomendam-se os exercícios aeróbicos, pois aceleram o metabolismo, gerando grande perda de gordura corporal. Alguns deles são: caminhada, corrida, ciclismo, natação, dança e outros.
            </p>
            
            <h1>Diminuição dos riscos de doenças crônicas</h1>
            <p>O exercício físico pode ajudar a prevenir patologias crônicas como doenças cardíacas e doenças vasculares, já que fortalece o músculo cardíaco, melhora a circulação sanguínea, reduz os níveis do colesterol ruim (LDL) e aumenta os níveis de colesterol bom (HDL).

            Além disso, há outras doenças que podem ser evitadas ou controladas através de exercícios:</p>

            <p><strong>● Hipertensão arterial:</strong>a redução da pressão acarreta a melhora do quadro de saúde, tornando possível que o uso de medicamentos não seja mais necessário (com autorização médica, obviamente);</p>
            <p><strong>● Diabetes:</strong>a diminuição da gordura corporal reduz também os níveis glicêmicos;</p>
            <p><strong>● Doenças ósseas:</strong>o fortalecimento da estrutura óssea previne contra a osteoporose, por exemplo;</p>
            <p><strong>● Doenças musculares:</strong>a melhora da flexibilidade e da postura evita dores e fortalece os músculos.</p>

            <h1>BENEFÍCIOS À SAÚDE MENTAL</h1>
            <p>Estudos mostram que a atividade física pode combater a ansiedade. Um dos fatores responsáveis por isso (e bastante simples, porém muitas vezes subestimado) é a concentração necessária durante um treino, por exemplo. Esse estado psicológico faz com que o indivíduo tenha momentos prazerosos, focando no exercício que está sendo realizado.

            Outra patologia mental que pode ter seus sintomas diminuídos e seu quadro melhorado é a depressão. O exercício físico libera certas substâncias durante sua prática e uma delas é a endorfina, um neurotransmissor capaz de proporcionar a sensação de serenidade e bem-estar.
            Em vista dos efeitos mencionados, atividades físicas são altamente recomendadas para combater distúrbios psíquicos que estão cada vez mais presentes no estilo de vida atual, em que o tempo é pouco e os compromissos são muitos.</p>

            <h1>QUAL A FREQUENCIA ADEQUADA?</h1>
            <p>A frequência e a intensidade de exercícios adequadas variam, basicamente, de acordo com a idade de cada pessoa. Felizmente, a OMS já realizou essa divisão, classificando da seguinte maneira:</p>
            <p>● de 5 a 17 anos de idade — o ideal indicado pela OMS é acima de 60 minutos semanais de atividade aeróbica, que varie de moderada a vigorosa;</p>
            <p>● de 18 a 64 anos de idade — é adequado manter por semana 150 minutos de exercícios aeróbicos moderados e 75 minutos de exercícios vigorosos;</p>
            <p>● acima dos 64 anos — aqui, também é recomendado manter 150 minutos de exercícios aeróbicos moderados e 75 minutos de exercícios vigorosos, ambos distribuídos durante a semana.</p>
            <p>Além disso, a OMS ainda dá outra dica: para obter benefícios adicionais, a quantidade de exercícios aeróbicos pode ser aumentada para 300 minutos semanais de atividade moderada e 150 minutos de atividade vigorosa.</p>

            <h1>QUAIS CUIDADOS É PRECISO TOMAR?</h1>
            <p>Como você já deve ter imaginado, a principal recomendação é não extrapolar as indicações da OMS para a frequência e intensidade de atividades físicas, apresentadas no tópico anterior. Além disso, há outros dois fatores que, combinados, podem ser de grande eficácia na prevenção de qualquer problema que possa decorrer dos exercícios físicos.

            O primeiro passo é consultar um médico antes de iniciar a prática. Esse profissional avaliará o seu estado de saúde e poderá dar as indicações sobre seus limites e necessidades corporais, de modo a orientar que rumo o exercício físico deverá tomar.
            Em seguida, é necessário contar com a ajuda de um profissional de educação física ou de um fisioterapeuta, em alguns casos. Ele será o responsável por interpretar adequadamente as recomendações e ressalvas feitas pelo médico e poderá orientar a sua atividade física de modo a evitar quaisquer prejuízos à sua saúde.

            Lembre-se de que não seguir esses passos pode resultar em vários problemas, que vão desde lesões musculares até problemas severos da coluna. Por isso, fique atento!

            Como vimos, a prática de atividade física é importante pelas vantagens que traz ao corpo e à mente. Introduzi-la na sua rotina pode evitar o desenvolvimento de doenças e amenizar os sinais e sintomas das preexistentes. Também pode aumentar sua produtividade no dia a dia, melhorar sua autoimagem e beneficiar sua vida social.</p>

        </div>

        <div class="video-exercicios-explicacao">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/PmVIfVI4uo0?si=ZOCPn91Mf0KdnR7o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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