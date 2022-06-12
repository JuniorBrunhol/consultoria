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


$contato = $_POST["contato"];
$empresa = $_POST["empresa"];
$descricao = $_POST["descricao"];

        $sql2 = "INSERT INTO comentarios ( idconsultoria_comentarios, contato_comentarios, empresa_comentarios, descricao_comentarios ) VALUES ('$consultoria_usuarios','$contato','$empresa','$descricao')";
        if (mysqli_query($mysqli, $sql2)) {
        header("Location: comentarios.php"); exit;
        } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
        }




?>