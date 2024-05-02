<?php
session_start();

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    include_once('config.php');
    
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    // Consulta preparada para obter o hash da senha
    $sql = "SELECT senha FROM loginsite WHERE email = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows < 1){
        // Email não encontrado
        $error_message = "Email ou senha incorretos.";
        header('Location: login?error=' . urlencode($error_message));
        exit;
    }
    else{
        // Email encontrado, obter hash da senha e verificar
        $row = $result->fetch_assoc();
        $senha_hash = $row['senha'];
        if(password_verify($senha, $senha_hash)){
            // Senha correta, inicia a sessão e redireciona para a página do sistema
            $_SESSION['email'] = $email;
            header('Location: meuperfil');
            exit;
        }
        else{
            // Senha incorreta
            $error_message = "Email ou senha incorretos.";
            header('Location: login?error=' . urlencode($error_message));
            exit;
        }
    }
}
else{
    // Não foram fornecidos email e senha
    $error_message = "Email e/ou senha não fornecidos.";
    header('Location: login?error=' . urlencode($error_message));
    exit;
}
?>