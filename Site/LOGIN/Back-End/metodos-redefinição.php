<? 
class Senha{
    public static function geradordecodigodeverificação(){
        return rand(1000, 9999);
    }

    public static function atualizarbancodedados($email, $codigo_verificacao, $conexao){
        $sql_update = "UPDATE usuarios SET codigoverificacao = '$codigo_verificacao' WHERE email = '$email'";
        $conexao->query($sql_update);
    }

    

  
}













?>