<?php 
$dbHost = 'localhost';
$dbUsername = 'pasco443_fitplus';
$dbPassword = 'Senha22!';
$dbName = 'pasco443_cadastro';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

/*if($conexao->connect_errno){
    echo "Erro";
}
else{
    echo"Conexão efetuada com sucesso";
}
*/


?>