<?php
session_start();
include_once("conexao/conexao.php");
$id = ($_POST['id']);
  $email = ($_POST['email']);
  $nome = ($_POST['nome']);
  $senha = ($_POST['senha']);
  $nivel = ($_POST['nivel']);
  $imagem = ($_POST['imagem']);

	 if (!empty($_POST) AND  empty($_POST['senha'])) {
      header("Location: novasenha.php?email=$email"); exit;
  } 
  


      $result_usuario = "UPDATE usuarios SET senha_usuarios='".$senha."' WHERE id_usuarios= $id";
$resultado_usuario = mysqli_query($mysqli, $result_usuario)or die(mysqli_error($mysqli));
  
 
     

   if (!isset($_SESSION)) session_start();

   // Salva os dados encontrados na sessão
   $_SESSION['UsuarioID'] = $id;
   $_SESSION['UsuarioNome'] = $nome;
   $_SESSION['UsuarioNivel'] = $nivel;
   $_SESSION['UsuarioImagem'] = $imagem;
   $_SESSION['Usuarioemail'] = $email;
    
   // Redireciona o visitante
   header("Location: restrito.php"); exit;
  ?>










