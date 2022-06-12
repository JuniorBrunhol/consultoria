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

$status2 = 'Pendente Resposta Cliente';
$status = 'Pendente Resposta Consultor';
$id_chamado = $_POST['id_chamado'];
$comentario_chamado = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['comentario_chamado'])));
$data = date('Y-m-d H:i:s');

echo $idconsultor;
echo $id_chamado;
echo $comentario_chamado;

if ($nivelacesso_consultor == 4) {
$sql = "INSERT INTO respostachamado (
chamado_respostachamado,
usuario_respostachamado,
texto_respostachamado
) VALUES (
'$id_chamado',
'$idconsultor',
'$comentario_chamado'
)";
$resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

$sql1 = "UPDATE chamado SET 
dataultimaresposta_chamado = '".$data."',
status_chamado = '".$status."'
WHERE id_chamado='$id_chamado'";
$resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));

header("Location: visualiza_chamados.php?id=$id_chamado"); exit;
}else{

  $sql = "INSERT INTO respostachamado (
    chamado_respostachamado,
    usuario_respostachamado,
    texto_respostachamado
    ) VALUES (
    '$id_chamado',
    '$idconsultor',
    '$comentario_chamado'
    )";
    $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));
    
    $sql1 = "UPDATE chamado SET 
    dataultimaresposta_chamado = '".$data."',
    status_chamado = '".$status2."'
    WHERE id_chamado='$id_chamado'";
    $resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));
    
    header("Location: visualiza_chamados.php?id=$id_chamado"); exit;

}

          
           
           
  
?>
   

      

 

