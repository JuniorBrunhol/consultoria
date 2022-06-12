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


$datainicio_reuniao = implode("-",array_reverse(explode("/",$_POST['datainicio_reuniao'])));
$datatermino_reuniao = implode("-",array_reverse(explode("/",$_POST['datatermino_reuniao'])));
$horarioinicio_reuniao = $_POST['horarioinicio_reuniao'];
$horariotermino_reuniao = $_POST['horariotermino_reuniao'];

$datedeinicio = new DateTime( $datainicio_reuniao . ' ' . $horarioinicio_reuniao );
$datedetermino = new DateTime( $datatermino_reuniao . ' ' . $horariotermino_reuniao );

$dateinicial_bd = $datedeinicio->format('Y-m-d H:i:s');
$datefinal_bd = $datedetermino->format('Y-m-d H:i:s');

$dateinicial_bd2 = new DateTime($dateinicial_bd);
$datefinal_bd2 = new DateTime($datefinal_bd);
$timePassed = $dateinicial_bd2->diff($datefinal_bd2);
$minutes  = $timePassed->days * 24 * 60;
$minutes += $timePassed->h * 60;
$minutes += $timePassed->i;

$temporeuniao_reuniao = $minutes;
$local_reuniao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['local_reuniao'])));
$assunto_reuniao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['assunto_reuniao'])));
$area_reuniao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['area_reuniao'])));
$follow_reuniao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['follow_reuniao'])));
$tarefas_reuniao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['tarefas_reuniao'])));
$ferramentas_reuniao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['ferramentas_reuniao'])));
$pontospositivos_reuniao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['pontospositivos_reuniao'])));
$pontosnegativos_reuniao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['pontosnegativos_reuniao'])));
$resumo_reuniao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_reuniao'])));






$id = $_POST['id'];


$sql1 = "UPDATE reuniao SET 
consultoria_reuniao = '".$consultoria_usuarios."',
empresa_reuniao = '".$EmpresaID."',
usuario_reuniao = '".$idconsultor."',
datainicio_reuniao = '".$dateinicial_bd."',
datatermino_reuniao = '".$datefinal_bd."',
temporeuniao_reuniao = '".$temporeuniao_reuniao."',
local_reuniao = '".$local_reuniao."',
assunto_reuniao = '".$assunto_reuniao."',
area_reuniao = '".$area_reuniao."',
follow_reuniao = '".$follow_reuniao."',
tarefas_reuniao = '".$tarefas_reuniao."',
ferramentas_reuniao = '".$ferramentas_reuniao."',
pontospositivos_reuniao = '".$pontospositivos_reuniao."',
pontosnegativos_reuniao = '".$pontosnegativos_reuniao."',
resumo_reuniao = '".$resumo_reuniao."'

WHERE id_reuniao='$id'"; 
$resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));
header("Location: visualiza_novareuniao.php?id=$id"); exit;


          
           
           
  
?>