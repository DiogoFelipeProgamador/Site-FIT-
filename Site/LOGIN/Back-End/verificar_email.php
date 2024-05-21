<?php
// Verifica se o formulário foi enviado
session_start();

// Verifica se o formulário foi enviado
if(isset($_POST['submit'])) {
    // Obtém o e-mail fornecido pelo usuário
    $email = $_POST['email'];

    // Armazene o e-mail em uma sessão
    $_SESSION['email'] = $email;
    // Inclui o arquivo de configuração do banco de dados
    include_once('config.php'); 
    include_once('metodos-redefinição.php');   

    // Verifica se o e-mail existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conexao->query($sql);

    if($result->num_rows > 0) {
        // Gera um código de verificação
        $codigo_verificacao = Senha::geradordecodigodeverificação(); // Pode ser um número aleatório de 4 dígitos

        // Salva o código de verificação no banco de dados
        Senha::atualizarbancodedados($email, $codigo_verificacao, $conexao);
        
        // Envie um e-mail com o código de verificação para o usuário
        $assunto = 'Código de Verificação';
        $mensagem = "Seu código de verificação é: $codigo_verificacao";
        $headers = 'From: fitplus@pascoalonveiculos.com'; 

        // Use a função mail() para enviar o e-mail
        if(mail($email, $assunto, $mensagem, $headers)) {
            // E-mail enviado com sucesso
            header("Location: codigoverificacao");
            exit();
        } else {
            // Erro ao enviar o e-mail
            echo "Erro ao enviar o e-mail. Por favor, tente novamente mais tarde.";
        }
    } else {
        // Se o e-mail não existir no banco de dados, redirecione para senha.php exibindo a mensagem de erro
        header("Location: senha.php?error=email_nao_existente"); 
        exit();
    }
}
?>