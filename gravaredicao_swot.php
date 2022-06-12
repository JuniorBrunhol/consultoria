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

$id = $_POST['id_swot'];

$titulo_swot = $_POST['titulo_swot'];
$fraquezas_swot = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['fraquezas_swot'])));
$forcas_swot = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['forcas_swot'])));
$ameacas_swot = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['ameacas_swot'])));
$oportunidades_swot = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['oportunidades_swot'])));
$resultado_swot = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resultado_swot'])));


$sql1 = "UPDATE swot SET 
titulo_swot = '".$titulo_swot."',
fraquezas_swot = '".$fraquezas_swot."',
forcas_swot = '".$forcas_swot."',
ameacas_swot = '".$ameacas_swot."',
oportunidades_swot = '".$oportunidades_swot."',
resultado_swot = '".$resultado_swot."'
WHERE id_swot='$id'";
$resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));

header("Location: visualiza_swot.php?id=$id"); exit;


          
           
           
  
?>