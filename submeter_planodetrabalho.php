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

$id = $_GET['id'];
$apreciacao = $_GET['apreciacao'];

if ($apreciacao == 'Pendente'){
  $status2 = 'Enviado';

}
if ($apreciacao == 'Enviado'){
  $status2 = 'Pendente';
}
if ($apreciacao == 'Aprovado'){
  $status2 = 'Pendente';
}

if ($apreciacao == 'Aprovar'){
  $status2 = 'Aprovado';
}

if ($apreciacao == 'Reprovar'){
  $status2 = 'Pendente';
}


$sql1 = "UPDATE cronograma SET 
apreciacao_cronograma = '".$status2."'
WHERE id_cronograma='$id'";
$resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));

header("Location: apreciacao.php"); exit;


          
           
           
  
?>

