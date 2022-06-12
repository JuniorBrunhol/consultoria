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

$id = $_POST['id_4psinovacao'];

$titulo_4psinovacao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_4psinovacao'])));
$processos_4psinovacao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['processos_4psinovacao'])));
$pessoas_4psinovacao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['pessoas_4psinovacao'])));
$politicas_4psinovacao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['politicas_4psinovacao'])));
$proposito_4psinovacao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['proposito_4psinovacao'])));
$resumo_4psinovacao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_4psinovacao'])));


$sql1 = "UPDATE 4psinovacao SET 
titulo_4psinovacao = '".$titulo_4psinovacao."',
processos_4psinovacao = '".$processos_4psinovacao."',
pessoas_4psinovacao = '".$pessoas_4psinovacao."',
politicas_4psinovacao = '".$politicas_4psinovacao."',
proposito_4psinovacao = '".$proposito_4psinovacao."',
resumo_4psinovacao = '".$resumo_4psinovacao."'
WHERE id_4psinovacao='$id'";
$resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));

header("Location: visualiza_4psinovacao.php?id=$id"); exit;


          
           
           
  
?>