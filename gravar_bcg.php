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





$titulo_bcg = $_POST['titulo_bcg'];
$estrela_bcg = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['estrela_bcg'])));
$questionamento_bcg = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['questionamento_bcg'])));
$vaca_bcg = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['vaca_bcg'])));
$abacaxi_bcg = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['abacaxi_bcg'])));
$resumo_bcg = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_bcg'])));

$sql = "INSERT INTO bcg (
consultoria_bcg,
empresa_bcg,
usuario_bcg,
titulo_bcg,
estrela_bcg,
questionamento_bcg,
vaca_bcg,
abacaxi_bcg,
resumo_bcg
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$titulo_bcg',
'$estrela_bcg',
'$questionamento_bcg',
'$vaca_bcg',
'$abacaxi_bcg',
'$resumo_bcg'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_bcg) AS id_bcg FROM `bcg` WHERE (`empresa_bcg` = '".$EmpresaID."') AND  (`consultoria_bcg` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_bcg'];
  header("Location:visualiza_bcg.php?id=$id"); exit;


      
}
?>