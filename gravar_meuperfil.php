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

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$imagem = $_FILES['imagem'];
$imagem2 = $_POST['imagem2'];
$telefone = $_POST['telefone'];
$lattes = $_POST['lattes'];
$site = $_POST['site'];
$formacao = $_POST['formacao'];
$viagem = $_POST['viagem'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];      
$youtube = $_POST['youtube'];      
$twitter = $_POST['twitter'];      
$discord = $_POST['discord'];      
$telegram = $_POST['telegram'];     
$linkedin = $_POST['linkedin'];      
$tiktok = $_POST['tiktok'];     
$atuacao1 = $_POST['atuacao1'];     
$atuacao2 = $_POST['atuacao2'];     
$atuacao3 = $_POST['atuacao3'];     
$atuacao4 = $_POST['atuacao4'];     
$atuacao5 = $_POST['atuacao5'];     



if($_FILES['imagem']['size'] == 0)
 {
    $sql2 = "UPDATE usuarios SET nome_usuarios='".$nome."', email_usuarios='".$email."', imagem_usuarios='".$imagem2."', facebook_usuarios='".$facebook."', instagram_usuarios='".$instagram."', twitter_usuarios='".$twitter."', youtube_usuarios='".$youtube."', discord_usuarios='".$discord."', telegram_usuarios='".$telegram."', linkedin_usuarios='".$linkedin."', tiktok_usuarios='".$tiktok."', site_usuarios='".$site."', formacao_usuarios='".$formacao."', viagem_usuarios='".$viagem."', atuacao1_usuarios='".$atuacao1."', atuacao2_usuarios='".$atuacao2."', atuacao3_usuarios='".$atuacao3."', atuacao4_usuarios='".$atuacao4."', atuacao5_usuarios='".$atuacao5."', telefone_usuarios='".$telefone."', lattes_usuarios='".$lattes."' WHERE id_usuarios='$id'"; 
    $resultado_usuario2 = mysqli_query($mysqli, $sql2)or die(mysqli_error($mysqli));
    header("Location: restrito.php"); exit;
} else {
    $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = './img/profile/'; //Diretório para uploads 
    move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo  

    $sql = "UPDATE usuarios SET nome_usuarios='".$nome."', email_usuarios='".$email."', imagem_usuarios='".$new_name."', facebook_usuarios='".$facebook."', instagram_usuarios='".$instagram."', twitter_usuarios='".$twitter."', youtube_usuarios='".$youtube."', discord_usuarios='".$discord."', telegram_usuarios='".$telegram."', linkedin_usuarios='".$linkedin."', tiktok_usuarios='".$tiktok."', site_usuarios='".$site."', formacao_usuarios='".$formacao."', viagem_usuarios='".$viagem."', atuacao1_usuarios='".$atuacao1."', atuacao2_usuarios='".$atuacao2."', atuacao3_usuarios='".$atuacao3."', atuacao4_usuarios='".$atuacao4."', atuacao5_usuarios='".$atuacao5."', telefone_usuarios='".$telefone."', lattes_usuarios='".$lattes."' WHERE id_usuarios='$id'"; 
    $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));
    header("Location: restrito.php"); exit;
  
     
    }
?>