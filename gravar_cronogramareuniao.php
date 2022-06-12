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


$data_contrato = date('Y-m-d H:i:s');



$data_cronogramareuniao= implode("-",array_reverse(explode("/",$_POST['data_cronogramareuniao'])));
$titulo_cronogramareuniao= $_POST['titulo_cronogramareuniao'];
$participantes_cronogramareuniao= str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['participantes_cronogramareuniao'])));
$resumo_cronogramareuniao= str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_cronogramareuniao'])));
$status = 'Pendente';





$sql = "INSERT INTO cronogramareuniao(
consultoria_cronogramareuniao,
empresa_cronogramareuniao,
usuario_cronogramareuniao,
data_cronogramareuniao,
titulo_cronogramareuniao,
participantes_cronogramareuniao,
resumo_cronogramareuniao,
status_cronogramareuniao
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$data_cronogramareuniao',
'$titulo_cronogramareuniao',
'$participantes_cronogramareuniao',
'$resumo_cronogramareuniao',
'$status'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_cronogramareuniao) AS id_cronogramareuniao FROM `cronogramareuniao` WHERE (`empresa_cronogramareuniao` = '".$EmpresaID."') AND  (`consultoria_cronogramareuniao` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_cronogramareuniao'];
  header("Location:visualiza_cronogramareuniao.php?id=$id"); exit;


      
}
?>