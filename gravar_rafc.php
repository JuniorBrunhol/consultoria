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


$data_contrato = date('Y-m-d H:i:s');



$datainicio_rafc= implode("-",array_reverse(explode("/",$_POST['datainicio_rafc'])));
$datatermino_rafc= implode("-",array_reverse(explode("/",$_POST['datatermino_rafc'])));
$horarioinicio_rafc= $_POST['horarioinicio_rafc'];
$horariotermino_rafc= $_POST['horariotermino_rafc'];

$datedeinicio = new DateTime( $datainicio_rafc. ' ' . $horarioinicio_rafc);
$datedetermino = new DateTime( $datatermino_rafc. ' ' . $horariotermino_rafc);

$dateinicial_bd = $datedeinicio->format('Y-m-d H:i:s');
$datefinal_bd = $datedetermino->format('Y-m-d H:i:s');

$dateinicial_bd2 = new DateTime($dateinicial_bd);
$datefinal_bd2 = new DateTime($datefinal_bd);
$timePassed = $dateinicial_bd2->diff($datefinal_bd2);
$minutes  = $timePassed->days * 24 * 60;
$minutes += $timePassed->h * 60;
$minutes += $timePassed->i;




$temporeuniao_rafc= $minutes;
$local_rafc= $_POST['local_rafc'];
$assunto_rafc= $_POST['assunto_rafc'];
$area_rafc= $_POST['area_rafc'];
$participantes_rafc= str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['participantes_rafc'])));
$resumo_rafc= str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_rafc'])));






$sql = "INSERT INTO rafc(
consultoria_rafc,
empresa_rafc,
usuario_rafc,
datainicio_rafc,
datatermino_rafc,
temporeuniao_rafc,
local_rafc,
assunto_rafc,
area_rafc,
participantes_rafc,
resumo_rafc
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$dateinicial_bd',
'$datefinal_bd',
'$temporeuniao_rafc',
'$local_rafc',
'$assunto_rafc',
'$area_rafc',
'$participantes_rafc',
'$resumo_rafc'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_rafc) AS id_rafc FROM `rafc` WHERE (`empresa_rafc` = '".$EmpresaID."') AND  (`consultoria_rafc` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_rafc'];
  header("Location:visualiza_rafc.php?id=$id"); exit;


      
}
?>