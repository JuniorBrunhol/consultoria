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

$id = $_POST['id_8psmarketing'];

$titulo_8psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_8psmarketing'])));
$pesquisa_8psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['pesquisa_8psmarketing'])));
$planejamento_8psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['planejamento_8psmarketing'])));
$producao_8psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['producao_8psmarketing'])));
$publicacao_8psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['publicacao_8psmarketing'])));
$promocao_8psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['promocao_8psmarketing'])));
$propagacao_8psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['propagacao_8psmarketing'])));
$personalizacao_8psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['personalizacao_8psmarketing'])));
$precisao_8psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['precisao_8psmarketing'])));
$resumo_8psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_8psmarketing'])));


$sql1 = "UPDATE 8psmarketing SET titulo_8psmarketing = '".$titulo_8psmarketing."',
pesquisa_8psmarketing = '".$pesquisa_8psmarketing."',
planejamento_8psmarketing = '".$planejamento_8psmarketing."',
producao_8psmarketing = '".$producao_8psmarketing."',
publicacao_8psmarketing = '".$publicacao_8psmarketing."',
promocao_8psmarketing = '".$promocao_8psmarketing."',
propagacao_8psmarketing = '".$propagacao_8psmarketing."',
personalizacao_8psmarketing = '".$personalizacao_8psmarketing."',
precisao_8psmarketing = '".$precisao_8psmarketing."',
resumo_8psmarketing = '".$resumo_8psmarketing."'
WHERE id_8psmarketing='$id'";
$resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));

header("Location: visualiza_8psmarketing.php?id=$id"); exit;


          
           
           
  
?>