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

$idcronograma_acaocronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['idcronograma_acaocronograma'])));
$dataprevisao_acaocronograma = implode("-",array_reverse(explode("/",$_POST['dataprevisao_acaocronograma'])));
$tarefa_acaocronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['tarefa_acaocronograma'])));
$descricao_acaocronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['descricao_acaocronograma'])));
$dono_acaocronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['dono_acaocronograma'])));
$peso_acaocronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['peso_acaocronograma'])));
$aproveitamento_acaocronograma = 0;




$sql = "INSERT INTO acaocronograma (
idcronograma_acaocronograma,
consultoria_acaocronograma,
empresa_acaocronograma,
usuario_acaocronograma,
tarefa_acaocronograma,
descricao_acaocronograma,
dataprevisao_acaocronograma,
aproveitamento_acaocronograma,
dono_acaocronograma,
peso_acaocronograma
) VALUES (
'$idcronograma_acaocronograma',
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$tarefa_acaocronograma',
'$descricao_acaocronograma',
'$dataprevisao_acaocronograma',
'$aproveitamento_acaocronograma',
'$dono_acaocronograma',
'$peso_acaocronograma'
)";

      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_cronograma) AS id_cronograma FROM `cronograma` WHERE (`empresa_cronograma` = '".$EmpresaID."') AND  (`consultoria_cronograma` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)) {
          $id = $dados2['id_cronograma'];
  header("Location:criar_acoesplanodetrabalho.php?id=$id"); exit;    
}
?>