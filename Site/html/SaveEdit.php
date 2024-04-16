<?php


include_once('config.php');



if(isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $datanasc = $_POST['datanasc'];
    $sexo = $_POST['sexo'];

    $sqlUpdate = "UPDATE formulario SET nome='$name',email='$email',senha='$senha',altura='$altura',peso='$peso',datanasc='$datanasc',sexo='$sexo' WHERE id='$id'";

    $result = $conexao->query($sqlUpdate);
}
header('Location:sistema.php');





?>