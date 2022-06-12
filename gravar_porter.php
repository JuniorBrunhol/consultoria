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





$titulo_porter = $_POST['titulo_porter'];
$entrantes_porter = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['entrantes_porter'])));
$acaoentrantes_porter = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['acaoentrantes_porter'])));
$negociacao_porter = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['negociacao_porter'])));
$acaonegociacao_porter = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['acaonegociacao_porter'])));
$concorrencia_porter = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['concorrencia_porter'])));
$acaoconcorrencia_porter = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['acaoconcorrencia_porter'])));
$barganha_porter = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['barganha_porter'])));
$acaobarganha_porter = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['acaobarganha_porter'])));
$produto_porter = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['produto_porter'])));
$acaoproduto_porter = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['acaoproduto_porter'])));
$resumo_porter = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_porter'])));

$sql = "INSERT INTO porter (
consultoria_porter,
empresa_porter,
usuario_porter,
titulo_porter,
entrantes_porter,
acaoentrantes_porter,
negociacao_porter,
acaonegociacao_porter,
concorrencia_porter,
acaoconcorrencia_porter,
barganha_porter,
acaobarganha_porter,
produto_porter,
acaoproduto_porter,
resumo_porter
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$titulo_porter',
'$entrantes_porter',
'$acaoentrantes_porter',
'$negociacao_porter',
'$acaonegociacao_porter',
'$concorrencia_porter',
'$acaoconcorrencia_porter',
'$barganha_porter',
'$acaobarganha_porter',
'$produto_porter',
'$acaoproduto_porter',
'$resumo_porter'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_porter) AS id_porter FROM `porter` WHERE (`empresa_porter` = '".$EmpresaID."') AND  (`consultoria_porter` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_porter'];
  header("Location:visualiza_porter.php?id=$id"); exit;


      
}
?>