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


$titulo_4psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_4psmarketing'])));
$produto_4psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['produto_4psmarketing'])));
$preco_4psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['preco_4psmarketing'])));
$praca_4psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['praca_4psmarketing'])));
$promocao_4psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['promocao_4psmarketing'])));
$resumo_4psmarketing = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_4psmarketing'])));


$sql = "INSERT INTO 4psmarketing (
consultoria_4psmarketing,
empresa_4psmarketing,
usuario_4psmarketing,
titulo_4psmarketing,
produto_4psmarketing,
preco_4psmarketing,
praca_4psmarketing,
promocao_4psmarketing,
resumo_4psmarketing
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$titulo_4psmarketing',
'$produto_4psmarketing',
'$preco_4psmarketing',
'$praca_4psmarketing',
'$promocao_4psmarketing',
'$resumo_4psmarketing'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_4psmarketing) AS id_4psmarketing FROM `4psmarketing` WHERE (`empresa_4psmarketing` = '".$EmpresaID."') AND  (`consultoria_4psmarketing` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_4psmarketing'];
  header("Location:visualiza_4psmarketing.php?id=$id"); exit;


      
}
?>