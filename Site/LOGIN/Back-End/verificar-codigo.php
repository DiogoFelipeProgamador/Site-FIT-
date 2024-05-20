<?php
// Inicie a sessão
session_start();

// Verifica se o formulário foi enviado
if(isset($_POST['submit'])) {
    // Obtém o código digitado pelo usuário
    $codigo_digitado = $_POST['codigo'];

    // Obtém o e-mail do usuário da sessão
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        // Se o e-mail não estiver na sessão, redirecione de volta à página anterior ou exiba uma mensagem de erro
        // Você pode redirecionar o usuário ou exibir uma mensagem de erro
    }

    // Inclui o arquivo de configuração do banco de dados
    include_once('config.php');

    // Verifica se o código digitado corresponde ao código de verificação no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND codigoverificacao = '$codigo_digitado'";
    $result = $conexao->query($sql);

    if($result->num_rows > 0) {
        // Código de verificação correto, redirecione para a página de redefinição de senha
        header("Location: redefinir-senha");
        exit();
    } else {
        // Código de verificação incorreto, redirecione de volta à página anterior com uma mensagem de erro
        $_SESSION['error'] = "Codigo incorreto digite novamente.";
        header("Location: codigoverificacao"); 
        exit();
    }
}
?>