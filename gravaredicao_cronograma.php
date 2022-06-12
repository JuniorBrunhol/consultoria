<?php
include_once 'conexao/conexao.php';

// A sessão precisa ser iniciada em cada página diferente
if (!isset($_SESSION)) session_start();

$nivel_necessario = 1;

// Verifica se não há a variável da sessão que identifica o usuário
if (!isset($_SESSION['UsuarioID']) OR ($_SESSION['UsuarioNivel'] <$nivel_necessario)) {
    // Destrói a sessão por segurança
    session_destroy();
    // Redireciona o visitante de volta pro login
    header("Location: index.php"); exit;
}

$idconsultor = $_SESSION['UsuarioID'];
$nivelacesso_consultor = $_SESSION['UsuarioNivel'];
$EmpresaID =  $_SESSION['EmpresaID'];
$plano = $_SESSION['Plano'];
$consultoria_usuarios = $_SESSION['Consultoria'];
$id = $_POST['id'];
$datainicial_cronograma = implode("-",array_reverse(explode("/",$_POST['datainicial_cronograma'])));
$previsaofim_cronograma = implode("-",array_reverse(explode("/",$_POST['previsaofim_cronograma'])));
$objetivo_cronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['objetivo_cronograma'])));

$titulo_cronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_cronograma'])));


$sql1 = "UPDATE cronograma SET 
titulo_cronograma = '".$titulo_cronograma."',
objetivo_cronograma = '".$objetivo_cronograma."',
datainicial_cronograma = '".$datainicial_cronograma."',
previsaofim_cronograma = '".$previsaofim_cronograma."'
WHERE id_cronograma='$id'";
$resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));

header("Location: planodetrabalho.php"); exit;
?>