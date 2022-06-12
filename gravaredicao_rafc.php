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

$local_rafc = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['local_rafc'])));
$assunto_rafc = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['assunto_rafc'])));
$area_rafc = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['area_rafc'])));
$resumo_rafc = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_rafc'])));
$participantes_rafc = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['participantes_rafc'])));
$prop = $_POST['id_rafc'];

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

$sql1 = "UPDATE rafc SET 
consultoria_rafc = '".$consultoria_usuarios."',
empresa_rafc = '".$EmpresaID."',
usuario_rafc = '".$idconsultor."',
datainicio_rafc = '".$datainicio_rafc."',
datatermino_rafc = '".$datatermino_rafc."',
temporeuniao_rafc = '".$temporeuniao_rafc."',
local_rafc = '".$local_rafc."',
participantes_rafc = '".$participantes_rafc."',
assunto_rafc = '".$assunto_rafc."',
area_rafc = '".$area_rafc."',
resumo_rafc = '".$resumo_rafc."'

WHERE id_rafc='$prop'"; 
$resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));
header("Location: visualiza_rafc.php?id=$prop"); exit;


          
           
           
  
?>