<?php
session_start();


include_once('config.php');



if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['nome'];
    $email = $_POST['email'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $datanasc = $_POST['datanasc'];
    $sexo = $_POST['sexo'];

    $sqlUpdate = "UPDATE usuarios SET nome='$name',email='$email',altura='$altura',peso='$peso',datanasc='$datanasc',sexo='$sexo' WHERE id='$id'";
    $sqlUpdatelogin = "UPDATE loginsite SET email='$email' WHERE id='$id'";
    $sqlUpdatequestionarios = "UPDATE questionários SET nome='$name',email='$email' WHERE id='$id'";

    $result = $conexao->query($sqlUpdate);
    $resultlogin = $conexao->query($sqlUpdatelogin);
    $resultquestionarios = $conexao->query($sqlUpdatequestionarios);

    $_SESSION['email'] = $email;
}
header('Location:meuperfil');





?>