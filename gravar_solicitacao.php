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
$consultoria_usuarios = $_SESSION['Consultoria'];


$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$status = "Pendente";
$data = date('Y-m-d', strtotime('+0 days'));

$date = date('Y-m-d', strtotime('+30 days'));

        $sql2 = "INSERT INTO solicitacao ( titulo_solicitacao, cadastro_solicitacao, previsao_solicitacao,  status_solicitacao, usuario_solicitacao, descricao_solicitacao ) VALUES ('$titulo','$data','$date','$status','$idconsultor','$descricao')";
        if (mysqli_query($mysqli, $sql2)) {
        header("Location: solicitacoes.php"); exit;
        } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
        }




?>