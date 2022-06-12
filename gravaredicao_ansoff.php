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

$id = $_POST['id_ansoff'];

$titulo_ansoff = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_ansoff'])));
$penetracao_ansoff = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['penetracao_ansoff'])));
$produto_ansoff = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['produto_ansoff'])));
$mercado_ansoff = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['mercado_ansoff'])));
$diversificacao_ansoff = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['diversificacao_ansoff'])));
$resumo_ansoff = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_ansoff'])));


$sql1 = "UPDATE ansoff SET 
titulo_ansoff = '".$titulo_ansoff."',
penetracao_ansoff = '".$penetracao_ansoff."',
produto_ansoff = '".$produto_ansoff."',
mercado_ansoff = '".$mercado_ansoff."',
diversificacao_ansoff = '".$diversificacao_ansoff."',
resumo_ansoff = '".$resumo_ansoff."'
WHERE id_ansoff='$id'";
$resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));

header("Location: visualiza_ansoff.php?id=$id"); exit;


          
           
           
  
?>