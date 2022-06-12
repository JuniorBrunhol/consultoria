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

$idacaocronograma_acaocronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['idacaocronograma_acaocronograma'])));
$peso2_acaocronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['peso2_acaocronograma'])));
$cronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cronograma'])));

$dataprevisao_acaocronograma = implode("-",array_reverse(explode("/",$_POST['dataprevisao_acaocronograma'])));
$tarefa_acaocronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['tarefa_acaocronograma'])));
$descricao_acaocronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['descricao_acaocronograma'])));
$dono_acaocronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['dono_acaocronograma'])));
$peso_acaocronograma = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['peso_acaocronograma'])));


if(empty($peso_acaocronograma)){
  $sql1 = "UPDATE acaocronograma SET 
  tarefa_acaocronograma = '".$tarefa_acaocronograma."',
  descricao_acaocronograma = '".$descricao_acaocronograma."',
  dono_acaocronograma = '".$dono_acaocronograma."',
  peso_acaocronograma = '".$peso_acaocronograma2."',
  dataprevisao_acaocronograma = '".$dataprevisao_acaocronograma."'
  WHERE id_acaocronograma='$idacaocronograma_acaocronograma'";
  $resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));
  
  header("Location: criar_acoesplanodetrabalho.php?id=$cronograma"); exit;

} else{
  $sql1 = "UPDATE acaocronograma SET 
  tarefa_acaocronograma = '".$tarefa_acaocronograma."',
  descricao_acaocronograma = '".$descricao_acaocronograma."',
  dono_acaocronograma = '".$dono_acaocronograma."',
  peso_acaocronograma = '".$peso_acaocronograma."',
  dataprevisao_acaocronograma = '".$dataprevisao_acaocronograma."'
  WHERE id_acaocronograma='$idacaocronograma_acaocronograma'";
  $resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));
  
  header("Location: criar_acoesplanodetrabalho.php?id=$cronograma"); exit;
}
            ?>   

            

            

