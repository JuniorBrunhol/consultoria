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





$tarefa_tarefa = $_POST['tarefa_tarefa'];
$nivel_tarefa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['nivel_tarefa'])));
$cronograma_tarefa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['id_categoria'])));
$bloco_tarefa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['id_sub_categoria'])));
$dono_tarefa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['dono_tarefa'])));
$vencimento_tarefa = implode("-",array_reverse(explode("/",$_POST['vencimento_tarefa'])));
$status_tarefa = 'PENDENTE';

$sql = "INSERT INTO tarefa (
tarefa_tarefa,
vencimento_tarefa,
dono_tarefa,
consultoria_tarefa,
empresa_tarefa,
usuario_tarefa,
cronograma_tarefa,
bloco_tarefa,
nivel_tarefa,
status_tarefa
) VALUES (
  '$tarefa_tarefa',
'$vencimento_tarefa',
'$dono_tarefa',
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$cronograma_tarefa',
'$bloco_tarefa',
'$nivel_tarefa',
'$status_tarefa'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_tarefa) AS id_tarefa FROM `tarefa` WHERE (`empresa_tarefa` = '".$EmpresaID."') AND  (`consultoria_tarefa` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_tarefa'];
  header("Location:principal.php"); exit;


      
}
?>