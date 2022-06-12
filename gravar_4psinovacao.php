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





$titulo_4psinovacao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_4psinovacao'])));
$processos_4psinovacao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['processos_4psinovacao'])));
$pessoas_4psinovacao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['pessoas_4psinovacao'])));
$politicas_4psinovacao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['politicas_4psinovacao'])));
$proposito_4psinovacao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['proposito_4psinovacao'])));
$resumo_4psinovacao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_4psinovacao'])));


$sql = "INSERT INTO 4psinovacao (
    consultoria_4psinovacao,
    empresa_4psinovacao,
    usuario_4psinovacao,
    titulo_4psinovacao,
processos_4psinovacao,
pessoas_4psinovacao,
politicas_4psinovacao,
proposito_4psinovacao,
resumo_4psinovacao
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$titulo_4psinovacao',
'$processos_4psinovacao',
'$pessoas_4psinovacao',
'$politicas_4psinovacao',
'$proposito_4psinovacao',
'$resumo_4psinovacao'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_4psinovacao) AS id_4psinovacao FROM `4psinovacao` WHERE (`empresa_4psinovacao` = '".$EmpresaID."') AND  (`consultoria_4psinovacao` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_4psinovacao'];
  header("Location:visualiza_4psinovacao.php?id=$id"); exit;


      
}
?>