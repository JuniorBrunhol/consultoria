<?php
include_once 'conexao/conexao.php';

  // A sessão precisa ser iniciada em cada página diferente
  if (!isset($_SESSION)) session_start();

  $nivel_necessario = 1;
  $ativo = "ATIVO";

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

$data = implode("-",array_reverse(explode("/",$_POST['data'])));
$id_kpi = $_POST['id_kpi'];
$resultado = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resultado'])));

$sql = "INSERT INTO dadoskpi (
idkpi_dadoskpi,
data_dadoskpi,
resultado_dadoskpi
) VALUES (
'$id_kpi',
'$data',
'$resultado'

)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_dadoskpi) AS id_dadoskpi FROM `dadoskpi` WHERE (`idkpi_dadoskpi` = '".$id_kpi."')"; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
         
  header("Location:cadastrar_dadoskpi.php?id=$id_kpi"); exit;


      
}
?>