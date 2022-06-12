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


$idcomentario = $_GET["idcomentario"];

$contato = $_POST["contato"];
$empresa = $_POST["empresa"];
$descricao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST["descricao"])));


            $sql1 = "UPDATE comentarios SET 
            idconsultoria_comentarios='".$consultoria_usuarios."', 
            contato_comentarios='".$contato."', 
           empresa_comentarios='".$empresa."', 
            descricao_comentarios='".$descricao."' 
            WHERE id_comentarios='$idcomentario'";
            
            $resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));
            header("Location:comentarios.php"); exit;
        

          
           
           
  
?>