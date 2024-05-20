<?php
session_start();  
include_once('config.php');

if((!isset($_SESSION['email']))) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login');
    exit; // Encerra o script após o redirecionamento
}

$logado = $_SESSION['email'];
if(isset($_POST['questions1']) && isset($_POST['questions2'])) {
    // Depuração: Exibe os valores recebidos dos radio buttons
  

    $resposta1 = $_POST['questions1'] == 'yes' ? 'Sim' : 'Não';
    $resposta2 = $_POST['questions2'] == 'yes' ? 'Sim' : 'Não';
    $resposta3 = $_POST['questions3'] == 'yes' ? 'Sim' : 'Não';
    $resposta4 = $_POST['questions4'] == 'yes' ? 'Sim' : 'Não';
    // Debug: Exibir respostas após a verificação
   

    // Atualizar respostas no banco de dados
    $update_sql = "UPDATE questionários SET questao1 = '$resposta1', questao2 = '$resposta2', questao3 = '$resposta3', questao4 = '$resposta4' WHERE email = '$logado'";

    $result_update = $conexao->query($update_sql);

    if($result_update) {
    } else {
        echo "Erro ao atualizar as respostas: " . $conexao->error;
    }

    // Marcar o questionário como respondido
    $marcar_respondido_sql = "UPDATE questionários SET questionariorespondido = 1 WHERE email = '$logado'";
    $result_respondido = $conexao->query($marcar_respondido_sql);

    if($result_respondido) {
        header("Location: meuperfil");
        exit;
    }
}else{
    header("Location: meuperfil");
   
}
?>