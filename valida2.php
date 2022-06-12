<?php
session_start();
include_once("conexao/conexao.php");
    
	  // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
  if (!empty($_POST) AND (empty($_POST['usuario']) OR empty($_POST['senha']))) {
      header("Location: index.php"); exit;
  }

  $usuario = addslashes($_POST['usuario']);
  $senha = addslashes($_POST['senha']);



   // Validação do usuário/senha digitados
   $sql = "SELECT * FROM `usuarios` WHERE (`email_usuarios` = '".$usuario ."') AND (`senha_usuarios` = '". $senha ."')  LIMIT 1"; 
   $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
   $resultado = mysqli_fetch_assoc($retorno);
        $senha_usuario = $resultado['senha_usuarios'];
   if (mysqli_num_rows($retorno) != 1) {
    // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
    echo "E-mail ou Senha inválido!"; exit;
} 
elseif   (( $senha == "1234abcd" ) AND ($senha_usuario = "1234abcd" )) { 
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
        header("Location: novasenha.php?email=$usuario"); exit;
    } else {
    // Salva os dados encontados na variável $resultado
    
   
    // Se a sessão não existir, inicia uma
    if (!isset($_SESSION)) session_start();

    // Salva os dados encontrados na sessão
    $_SESSION['UsuarioID'] = $resultado['id_usuarios'];
    $_SESSION['UsuarioNome'] = $resultado['nome_usuarios'];
    $_SESSION['UsuarioNivel'] = $resultado['nivelacesso_usuarios'];
    $_SESSION['UsuarioImagem'] = $resultado['imagem_usuarios'];
    $_SESSION['Usuarioemail'] = $resultado['email_usuarios'];
    $_SESSION['Consultoria'] = $resultado['consultoria_usuarios'];
          // Redireciona o visitante
          header("Location: restrito.php"); exit;
}   
      ?>