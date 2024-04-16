<?php
session_start();
    //print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
        // Acessa
        include_once('config.php');
        $email= $_POST['email'];
        $senha= $_POST['senha'];
        

       /* print_r('E-mail: ' .$email);
        print_r('<br>');
        print_r('Senha: ' .$senha);
        */

        $sql = "SELECT * FROM formulario WHERE email = '$email' and senha = '$senha'";

        $result = $conexao->query($sql);

        //print_r($sql);
        //print_r($result);

        if(mysqli_num_rows($result) < 1){
            unset($_SESSION['email']);
            unset($_SESSION['senha']);
            $error_message = "Email ou senha incorretos.";
            header('Location: login.php?error=' . urlencode($error_message));
        
        
        }
        else{
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }
    }
    else{
        // Não acessa
        header('Location: login.php');
    }
?>