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

$datainicial_cronograma = implode("-",array_reverse(explode("/",$_POST['datainicial_cronograma'])));
$previsaofim_cronograma = implode("-",array_reverse(explode("/",$_POST['previsaofim_cronograma'])));
$objetivo_cronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['objetivo_cronograma'])));
$atingimento_cronograma = 0;
$titulo_cronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_cronograma'])));
$apreciacao_cronograma = 'Pendente';


$sql = "INSERT INTO cronograma (
titulo_cronograma,
consultoria_cronograma,
empresa_cronograma,
usuario_cronograma,
datainicial_cronograma,
previsaofim_cronograma,
objetivo_cronograma,
atingimento_cronograma,
apreciacao_cronograma
) VALUES (
'$titulo_cronograma',
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$datainicial_cronograma',
'$previsaofim_cronograma',
'$objetivo_cronograma',
'$atingimento_cronograma',
'$apreciacao_cronograma'
)";

      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_cronograma) AS id_cronograma FROM `cronograma` WHERE (`empresa_cronograma` = '".$EmpresaID."') AND  (`consultoria_cronograma` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)) {
          $id = $dados2['id_cronograma'];
  header("Location:planodetrabalho.php"); exit;    
}
?>