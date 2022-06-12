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

$id = $_POST['id_4psmarketing'];

$titulo_4psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_4psmarketing'])));
$produto_4psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['produto_4psmarketing'])));
$preco_4psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['preco_4psmarketing'])));
$praca_4psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['praca_4psmarketing'])));
$promocao_4psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['promocao_4psmarketing'])));
$resumo_4psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_4psmarketing'])));


$sql1 = "UPDATE 4psmarketing SET 
titulo_4psmarketing = '".$titulo_4psmarketing."',
produto_4psmarketing = '".$produto_4psmarketing."',
preco_4psmarketing = '".$preco_4psmarketing."',
praca_4psmarketing = '".$praca_4psmarketing."',
promocao_4psmarketing = '".$promocao_4psmarketing."',
resumo_4psmarketing = '".$resumo_4psmarketing."'
WHERE id_4psmarketing='$id'";
$resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));

header("Location: visualiza_4psmarketing.php?id=$id"); exit;


          
           
           
  
?>