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

$id = $_POST['id_eisenhower'];

$titulo_eisenhower = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_eisenhower'])));
$programe_eisenhower = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['programe_eisenhower'])));
$faca_eisenhower = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['faca_eisenhower'])));
$elimine_eisenhower = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['elimine_eisenhower'])));
$delegue_eisenhower = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['delegue_eisenhower'])));
$resumo_eisenhower = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_eisenhower'])));


$sql1 = "UPDATE eisenhower SET 
titulo_eisenhower = '".$titulo_eisenhower."',
programe_eisenhower = '".$programe_eisenhower."',
faca_eisenhower = '".$faca_eisenhower."',
elimine_eisenhower = '".$elimine_eisenhower."',
delegue_eisenhower = '".$delegue_eisenhower."',
resumo_eisenhower = '".$resumo_eisenhower."'
WHERE id_eisenhower='$id'";
$resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));

header("Location: visualiza_eisenhower.php?id=$id"); exit;


          
           
           
  
?>