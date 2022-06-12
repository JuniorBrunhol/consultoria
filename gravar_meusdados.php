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

$id = $_POST['id'];
$razaosocial = $_POST['razaosocial'];
$idconsultoria = $_POST['id'];
$imagem = $_FILES['imagem'];
$imagem2 = $_POST['imagem2'];
$fantasia = $_POST['fantasia'];
$cnpj = $_POST['cnpj'];
$ie = $_POST['ie'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];    
$endereco = $_POST['endereco'];      
$bairro = $_POST['bairro'];      
$cidade = $_POST['cidade'];      
$uf = $_POST['uf'];      



if($_FILES['imagem']['size'] == 0)
 {
    $sql2 = "UPDATE consultoria SET razaosocial_consultoria='".$razaosocial."', fantasia_consultoria='".$fantasia."', cnpj_consultoria='".$cnpj."', ie_consultoria='".$ie."', endereco_consultoria='".$endereco."', bairro_consultoria='".$bairro."', cidade_consultoria='".$cidade."', uf_consultoria='".$uf."', telefone_consultoria='".$telefone."', email_consultoria='".$email."', imagem_consultoria='".$imagem2."' WHERE id_consultoria='$id'"; 
    $resultado_usuario2 = mysqli_query($mysqli, $sql2)or die(mysqli_error($mysqli));
    header("Location: restrito.php"); exit;
} else {
    $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = './img/logo/'; //Diretório para uploads 
    move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo  

    $sql = "UPDATE consultoria SET razaosocial_consultoria='".$razaosocial."', fantasia_consultoria='".$fantasia."', cnpj_consultoria='".$cnpj."', ie_consultoria='".$ie."', endereco_consultoria='".$endereco."', bairro_consultoria='".$bairro."', cidade_consultoria='".$cidade."', uf_consultoria='".$uf."', telefone_consultoria='".$telefone."', email_consultoria='".$email."', imagem_consultoria='".$new_name."' WHERE id_consultoria='$id'"; 
    $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));
    header("Location: restrito.php"); exit;
  
     
    }
?>