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


$sql = "INSERT INTO 8psmarketing (
consultoria_8psmarketing,
empresa_8psmarketing,
usuario_8psmarketing,
titulo_8psmarketing,
pesquisa_8psmarketing,
planejamento_8psmarketing,
producao_8psmarketing,
publicacao_8psmarketing,
promocao_8psmarketing,
propagacao_8psmarketing,
personalizacao_8psmarketing,
precisao_8psmarketing,
resumo_8psmarketing
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$titulo_8psmarketing',
'$pesquisa_8psmarketing',
'$planejamento_8psmarketing',
'$producao_8psmarketing',
'$publicacao_8psmarketing',
'$promocao_8psmarketing',
'$propagacao_8psmarketing',
'$personalizacao_8psmarketing',
'$precisao_8psmarketing',
'$resumo_8psmarketing'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_8psmarketing) AS id_8psmarketing FROM `8psmarketing` WHERE (`empresa_8psmarketing` = '".$EmpresaID."') AND  (`consultoria_8psmarketing` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_8psmarketing'];
  header("Location:visualiza_8psmarketing.php?id=$id"); exit;


      
}
?>