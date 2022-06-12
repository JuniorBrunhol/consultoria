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

$status2 = 'Reaberto pelo Cliente';
$status = 'Reaberto pelo Consultor';
$id_chamado = $_GET['id'];
$data = date('Y-m-d H:i:s');

if ($nivelacesso_consultor == 4) {

$sql1 = "UPDATE chamado SET 
dataultimaresposta_chamado = '".$data."',
datafechamento_chamado = NULL,
status_chamado = '".$status2."'
WHERE id_chamado='$id_chamado'";
$resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));

header("Location: chamados.php"); exit;
}else{

     
    $sql1 = "UPDATE chamado SET 
    dataultimaresposta_chamado = '".$data."',
    datafechamento_chamado = NULL,
    status_chamado = '".$status."'
    WHERE id_chamado='$id_chamado'";
    $resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));
    
    header("Location: chamados.php"); exit;

}

          
           
           
  
?>
   

      

 

