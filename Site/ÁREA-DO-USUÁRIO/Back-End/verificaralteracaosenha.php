<?php
session_start();
include_once('config.php');

if(isset($_POST['submit'])) {
    // Obtenha os dados do formulário
    $senha_atual = $_POST['senha-atual'];
    $nova_senha = $_POST['senha-nova'];

    // Obtém o ID do usuário logado
    $id_usuario = $_SESSION['id'];

    // Consulta o banco de dados para obter a senha atual do usuário
    $sql_select = "SELECT senha FROM loginsite WHERE id = $id_usuario";
    $result = $conexao->query($sql_select);

    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $senha_hash = $row['senha'];

        // Verifica se a senha atual fornecida pelo usuário corresponde à senha armazenada no banco de dados
        if(password_verify($senha_atual, $senha_hash)) {
            // A senha atual está correta, então atualize a senha no banco de dados
            $senha_nova_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
            $sql_update = "UPDATE loginsite SET senha = '$senha_nova_hash' WHERE id = $id_usuario";
            if($conexao->query($sql_update)) {
                $_SESSION['success'] = "Senha alterada com sucesso!";
                header("Location: meuperfil"); // Redireciona para a página de perfil ou outra página de sua escolha
                exit();
            } else {
                $_SESSION['error'] = "Erro ao atualizar a senha. Por favor, tente novamente mais tarde.";
            }
        } else {
            $_SESSION['error'] = "Senha atual incorreta.";
        }
    } else {
        $_SESSION['error'] = "Erro ao obter a senha atual do usuário.";
    }

    header("Location: alterar-senha"); // Redireciona de volta para a página de alteração de senha
    exit();
}
?>