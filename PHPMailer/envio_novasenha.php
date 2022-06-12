<?php
session_start();
include_once '../conexao/conexao.php';
$email = $_POST ['email'];
$chave = $_POST ['chave'];
$senha = $_POST ['senha'];

$email = preg_replace('/[^[:alnum:]_][s]/', '',$_POST ["email"]);
$chave = preg_replace('/[^[:alpha:]_][s]/', '',$_POST ["chave"]);
$senha = addslashes ($senha);



$sql = "SELECT * FROM usuarios WHERE email_usuarios = '$email' ";// Verifica se já existe o email no banco
$result = mysqli_query ($mysqli , $sql) or die ('Erro consultar e-mail:<br/>'.mysql_error());
$values = mysqli_fetch_assoc($result);
$id = $values['id_usuarios'];
$senha_antiga = $values['senha_usuarios'];
$chave_antiga = sha1 ($id.$senha_antiga);

$options = ['cost' => 13];
$senha_segura = password_hash ($senha, PASSWORD_DEFAULT, $options);

if($chave_antiga == $chave){
    $result_usuario = "UPDATE usuarios SET  senha_usuarios='".$senha_segura."' WHERE id_usuarios= $id";
$resultado_usuario = mysqli_query($mysqli, $result_usuario)or die(mysqli_error($mysqli));
    echo "<script>
    alert ('Senha Alterada com sucesso!');
    window.location.href='../index.php'; </script>";
} else {
    echo "<script>
    alert ('Houve um erro e sua senha não pode ser alterada. Contacte o administrador do sistema.');
        window.location.href='../index.php';  </script>";
}

?>