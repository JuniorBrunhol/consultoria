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

$titulo_eisenhower = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_eisenhower'])));
$programe_eisenhower = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['programe_eisenhower'])));
$faca_eisenhower = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['faca_eisenhower'])));
$elimine_eisenhower = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['elimine_eisenhower'])));
$delegue_eisenhower = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['delegue_eisenhower'])));
$resumo_eisenhower = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_eisenhower'])));


$sql = "INSERT INTO eisenhower (
consultoria_eisenhower,
empresa_eisenhower,
usuario_eisenhower,
titulo_eisenhower,
programe_eisenhower,
faca_eisenhower,
elimine_eisenhower,
delegue_eisenhower,
resumo_eisenhower
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$titulo_eisenhower',
'$programe_eisenhower',
'$faca_eisenhower',
'$elimine_eisenhower',
'$delegue_eisenhower',
'$resumo_eisenhower'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_eisenhower) AS id_eisenhower FROM `eisenhower` WHERE (`empresa_eisenhower` = '".$EmpresaID."') AND  (`consultoria_eisenhower` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_eisenhower'];
  header("Location:visualiza_eisenhower.php?id=$id"); exit;


      
}
?>