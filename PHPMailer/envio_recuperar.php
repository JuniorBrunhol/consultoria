<?php
session_start();
include_once '../conexao/conexao.php';


$usuarioemail = $_POST['contato'];
          
   echo $usuarioemail;
   $sql = "SELECT * FROM usuarios WHERE email_usuarios = '$usuarioemail' ";// Verifica se já existe o email no banco
   $result = mysqli_query ($mysqli , $sql) or die ('Erro consultar e-mail:<br/>'.mysql_error());
   $values = mysqli_fetch_assoc($result);
   $idgestor = $values['id_usuarios'];
   $senha = $values['senha_usuarios'];
   $email = $values['email_usuarios'];
   $chave = sha1 ($idgestor.$senha);

  


ini_set( 'display_errors', 1 );
error_reporting( E_ALL );
$from = "suporte@adviserpro.com.br";
$to = $usuario;
$subject = "Assistente de Recuperação de Senha do sistema AdvisorPro";
$message = 'Foi solicitado uma nova senha para o sistema AdvisorPro. Clique <a href="https://www.adviserpro.com.br/rlima/PHPMailer/novasenha.php?chave='.$chave.'">aqui</a> para gerar uma nova senha.';
$headers = "From:" . $from;
mail($to,$subject,$message, $headers);
echo ("<SCRIPT LANGUAGE='JavaScript'>
window.alert('Você será direcionado para alterar sua senha.')

</SCRIPT>");
          
?>

