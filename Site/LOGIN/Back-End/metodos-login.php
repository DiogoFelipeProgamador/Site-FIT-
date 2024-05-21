<? 
class Login{

public static function redirectloginerror($error_message){
    $redirect_url = 'login?error=' . urlencode($error_message);
    header('Location: ' . $redirect_url);
    exit;

}

public static function verificarsenhahash($result, $email, $senha) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $senha_hash = $row['senha'];
        if (password_verify($senha, $senha_hash)) {
            // Senha correta, inicia a sessão e redireciona para a página do sistema
            $_SESSION['email'] = $email;
            header('Location: meuperfil');
            exit;
        }
    }
    // Senha incorreta
    $error_message = "Email ou senha incorretos.";
    header('Location: login?error=' . urlencode($error_message));
    exit;
}


}


?>