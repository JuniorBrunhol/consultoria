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
$cronograma = $_GET['cronograma'];  
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_usuario = "DELETE FROM acaocronograma WHERE id_acaocronograma='$id'";
	$resultado_usuario = mysqli_query($mysqli, $result_usuario);
	if(mysqli_affected_rows($mysqli)){
		$_SESSION['msg'] = "<p style='color:green;'>Registro deletado com sucesso</p>";
		header("Location: criar_acoesplanodetrabalho.php?id=$cronograma");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Não foi possível deletar o registro solicitado.o</p>";
    header("Location: bcg.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Selecione um Registro para deletar</p>";
	header("Location: bcg.php");
}
