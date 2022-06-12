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


$titulo_diagnosticosituacional  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_diagnosticosituacional'])));
$texto_diagnosticosituacional  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto_diagnosticosituacional'])));

    

$sql = "INSERT INTO diagnosticosituacional (
consultoria_diagnosticosituacional,
empresa_diagnosticosituacional,
titulo_diagnosticosituacional,
texto_diagnosticosituacional,
usuario_diagnosticosituacional
 ) VALUES (
 '$consultoria_usuarios', 
'$EmpresaID',
'$titulo_diagnosticosituacional',
'$texto_diagnosticosituacional',
'$idconsultor'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_diagnosticosituacional) AS id_diagnosticosituacional FROM `diagnosticosituacional` WHERE (`empresa_diagnosticosituacional` = '".$EmpresaID."') AND  (`consultoria_diagnosticosituacional` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_diagnosticosituacional'];
    header("Location:diagsituc.php"); exit;
    


      
}
?>