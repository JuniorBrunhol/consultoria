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


$nome_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['nome_usuarios'])));
$email_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['email_usuarios'])));
$senha_usuarios = '1234abcd';

   
$sql = "INSERT INTO usuarios ( 
  nome_usuarios,
email_usuarios,
senha_usuarios,
consultoria_usuarios,
empresa_usuarios,
nivelacesso_usuarios
  ) VALUES (
    '$nome_usuarios',
'$email_usuarios',
'$senha_usuarios',
'$consultoria_usuarios',
'$EmpresaID',
'4'
  )";
 $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

 $sql2 = "SELECT MAX(id_usuarios) AS id_usuarios FROM `usuarios` WHERE (`empresa_usuarios` = '".$EmpresaID."') AND  (`consultoria_usuarios` = '".$consultoria_usuarios."') "; 
 $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
 while($dados2 = mysqli_fetch_array($retorno2)){
     $id = $dados2['id_usuarios'];
 }

$sql3 = "INSERT INTO acesso_empresa ( 
 empresa_acesso_empresa,
consultoria_acesso_empresa,
usuarios_acesso_empresa
  ) VALUES (
    '$EmpresaID',
'$consultoria_usuarios',
'$id'
  )";
if (mysqli_query($mysqli, $sql3)) {
header("Location: acessodocliente.php"); exit;
} else {
echo "Error: " . $sql3 . "<br>" . mysqli_error($mysqli);
}
      


