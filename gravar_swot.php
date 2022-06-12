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





$titulo_swot = $_POST['titulo_swot'];
$fraquezas_swot = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['fraquezas_swot'])));
$forcas_swot = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['forcas_swot'])));
$ameacas_swot = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['ameacas_swot'])));
$oportunidades_swot = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['oportunidades_swot'])));
$resultado_swot = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resultado_swot'])));

$sql = "INSERT INTO swot (
consultoria_swot,
empresa_swot,
usuario_swot,
titulo_swot,
fraquezas_swot,
forcas_swot,
ameacas_swot,
oportunidades_swot,
resultado_swot
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$titulo_swot',
'$fraquezas_swot',
'$forcas_swot',
'$ameacas_swot',
'$oportunidades_swot',
'$resultado_swot'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_swot) AS id_swot FROM `swot` WHERE (`empresa_swot` = '".$EmpresaID."') AND  (`consultoria_swot` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_swot'];
  header("Location:visualiza_swot.php?id=$id"); exit;


      
}
?>