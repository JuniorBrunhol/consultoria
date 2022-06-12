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




$titulo_kpi = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_kpi'])));

$area_kpi = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['area_kpi'])));
$frequencia_kpi = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['frequencia_kpi'])));

$metaanual_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metaanual_kpi"]);
$metadiaria_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metadiaria_kpi"]);
$metajaneiro_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metajaneiro_kpi"]);
$metafevereiro_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metafevereiro_kpi"]);
$metamarco_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metamarco_kpi"]);
$metaabril_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metaabril_kpi"]);
$metamaio_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metamaio_kpi"]);
$metajunho_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metajunho_kpi"]);
$metajulho_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metajulho_kpi"]);
$metaagosto_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metaagosto_kpi"]);
$metasetembro_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metasetembro_kpi"]);
$metaoutubro_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metaoutubro_kpi"]);
$metanovembro_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metanovembro_kpi"]);
$metadezembro_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metadezembro_kpi"]);
$metasemanal_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metasemanal_kpi"]);
$metatrimestral_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metatrimestral_kpi"]);
$metasemestral_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metasemestral_kpi"]);
$metamensal_kpi = preg_replace("/[^0-9,]+/i","",$_POST["metamensal_kpi"]);
$descricao_kpi = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['descricao_kpi'])));

$metaanual_kpi =str_replace(",",".",$metaanual_kpi);
$metadiaria_kpi =str_replace(",",".",$metadiaria_kpi);
$metajaneiro_kpi =str_replace(",",".",$metajaneiro_kpi);
$metafevereiro_kpi =str_replace(",",".",$metafevereiro_kpi);
$metamarco_kpi =str_replace(",",".",$metamarco_kpi);
$metaabril_kpi =str_replace(",",".",$metaabril_kpi);
$metamaio_kpi =str_replace(",",".",$metamaio_kpi);
$metajunho_kpi =str_replace(",",".",$metajunho_kpi);
$metajulho_kpi =str_replace(",",".",$metajulho_kpi);
$metaagosto_kpi =str_replace(",",".",$metaagosto_kpi);
$metasetembro_kpi =str_replace(",",".",$metasetembro_kpi);
$metaoutubro_kpi =str_replace(",",".",$metaoutubro_kpi);
$metanovembro_kpi =str_replace(",",".",$metanovembro_kpi);
$metadezembro_kpi =str_replace(",",".",$metadezembro_kpi);
$metasemanal_kpi =str_replace(",",".",$metasemanal_kpi);
$metatrimestral_kpi =str_replace(",",".",$metatrimestral_kpi);
$metasemestral_kpi =str_replace(",",".",$metasemestral_kpi);
$metamensal_kpi =str_replace(",",".",$metamensal_kpi);



$sql = "INSERT INTO kpi (
titulo_kpi,
area_kpi,
consultoria_kpi,
empresa_kpi,
frequencia_kpi,
metaanual_kpi,
metadiaria_kpi,
metajaneiro_kpi,
metafevereiro_kpi,
metamarco_kpi,
metaabril_kpi,
metamaio_kpi,
metajunho_kpi,
metajulho_kpi,
metaagosto_kpi,
metasetembro_kpi,
metaoutubro_kpi,
metanovembro_kpi,
metadezembro_kpi,
metasemanal_kpi,
metatrimestral_kpi,
metasemestral_kpi,
descricao_kpi,
metamensal_kpi
) VALUES (
  '$titulo_kpi',
'$area_kpi',
'$consultoria_usuarios',
'$EmpresaID',
'$frequencia_kpi',
'$metaanual_kpi',
'$metadiaria_kpi',
'$metajaneiro_kpi',
'$metafevereiro_kpi',
'$metamarco_kpi',
'$metaabril_kpi',
'$metamaio_kpi',
'$metajunho_kpi',
'$metajulho_kpi',
'$metaagosto_kpi',
'$metasetembro_kpi',
'$metaoutubro_kpi',
'$metanovembro_kpi',
'$metadezembro_kpi',
'$metasemanal_kpi',
'$metatrimestral_kpi',
'$metasemestral_kpi',
'$descricao_kpi',
'$metamensal_kpi'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));
      header("Location:kpi.php"); exit;
     
?>