<?php
// Inicie a sessão
session_start();

// Verifica se o formulário foi enviado
if(isset($_POST['submit'])) {
    // Obtém a nova senha fornecida pelo usuário
    $nova_senha = $_POST['nova-senha'];

    // Obtém o e-mail do usuário da sessão
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    } else {
        // Se o e-mail não estiver na sessão, redirecione de volta à página anterior ou exiba uma mensagem de erro
        // Você pode redirecionar o usuário ou exibir uma mensagem de erro
    }

    // Inclui o arquivo de configuração do banco de dados
    include_once('config.php');

    // Atualiza a senha do usuário no banco de dados
    $hashed_password = password_hash($nova_senha, PASSWORD_DEFAULT);
    $sql_update = "UPDATE loginsite SET senha = '$hashed_password' WHERE email = '$email'";
    if($conexao->query($sql_update)) {
        // Redireciona o usuário para a página de login ou outra página de sua escolha
        header("Location: login");
        exit();
    } else {
        // Se houver um erro ao atualizar a senha, exiba uma mensagem de erro
        echo "Erro ao atualizar a senha. Por favor, tente novamente mais tarde.";
    }
}
?>