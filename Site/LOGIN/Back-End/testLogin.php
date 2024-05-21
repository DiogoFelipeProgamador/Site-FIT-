<?php
session_start();

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    include_once('config.php');
    include_once('metodos-login.php');   
    
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
        Login::redirectloginerror($error_message);
    }
    else{
        Login::verificarsenhahash($result, $email, $senha);
    }
}
?>