<?
if(isset($_POST['submit'])){
      include_once('config.php');      
      session_start();

      $name = $_POST['nome'];
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      $altura = $_POST['altura'];
      $peso = $_POST['peso'];
      $datanasc = $_POST['datanasc'];
      $sexo = $_POST['sexo'];

      $senha_hash = password_hash($senha, PASSWORD_DEFAULT);


      $result = mysqli_query($conexao, "SELECT * FROM cadastro WHERE email='$email'");
      if(mysqli_num_rows($result) > 0) {
        $mensagem_erro = "Este email já está em uso.";
        header('Location: cadastrar.php?erro=' . urlencode($mensagem_erro));
      } else {
          $result_insert = mysqli_query($conexao, "INSERT INTO cadastro(nome,email,altura,peso,datanasc,sexo) 
          VALUES ('$name','$email','$altura','$peso','$datanasc','$sexo')");
          $result_insert = mysqli_query($conexao, "INSERT INTO loginsite(email,senha) 
          VALUES ('$email','$senha_hash')");
          $result_insert = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,altura,peso,datanasc,sexo) 
          VALUES ('$name','$email','$altura','$peso','$datanasc','$sexo')");
          $result_insert = mysqli_query($conexao, "INSERT INTO questionários(nome,email) 
          VALUES ('$name','$email')");
          if($result_insert) {
              header('Location: meuperfil');

          } else {
              echo "Erro ao cadastrar usuário.";
          }
      }
  }
?>