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





$titulo_ansoff = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_ansoff'])));
$penetracao_ansoff = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['penetracao_ansoff'])));
$produto_ansoff = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['produto_ansoff'])));
$mercado_ansoff = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['mercado_ansoff'])));
$diversificacao_ansoff = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['diversificacao_ansoff'])));
$resumo_ansoff = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_ansoff'])));

$sql = "INSERT INTO ansoff (
consultoria_ansoff,
empresa_ansoff,
usuario_ansoff,
titulo_ansoff,
penetracao_ansoff,
produto_ansoff,
mercado_ansoff,
diversificacao_ansoff,
resumo_ansoff
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$titulo_ansoff',
'$penetracao_ansoff',
'$produto_ansoff',
'$mercado_ansoff',
'$diversificacao_ansoff',
'$resumo_ansoff'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_ansoff) AS id_ansoff FROM `ansoff` WHERE (`empresa_ansoff` = '".$EmpresaID."') AND  (`consultoria_ansoff` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_ansoff'];
  header("Location:visualiza_ansoff.php?id=$id"); exit;


      
}
?>