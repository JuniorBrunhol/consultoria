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


$nome_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['nome_usuarios'])));
$email_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['email_usuarios'])));
$senha_usuarios = '1234abcd';
$imagem_usuarios = $_FILES["imagem_usuarios"];

$horas_usuarios = 0;
$nivelacesso_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['nivelacesso_usuarios'])));
$facebook_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['facebook_usuarios'])));
$instagram_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['instagram_usuarios'])));
$twitter_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['twitter_usuarios'])));
$youtube_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['youtube_usuarios'])));
$discord_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['discord_usuarios'])));
$telegram_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['telegram_usuarios'])));
$linkedin_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['linkedin_usuarios'])));
$tiktok_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['tiktok_usuarios'])));
$site_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['site_usuarios'])));
$formacao_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['formacao_usuarios'])));
$viagem_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['viagem_usuarios'])));
$atuacao1_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['atuacao1_usuarios'])));
$atuacao2_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['atuacao2_usuarios'])));
$atuacao3_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['atuacao3_usuarios'])));
$atuacao4_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['atuacao4_usuarios'])));
$atuacao5_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['atuacao5_usuarios'])));
$telefone_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['telefone_usuarios'])));
$lattes_usuarios = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['lattes_usuarios'])));

if(isset($_FILES['imagem_usuarios']))
 {
    $ext = strtolower(substr($_FILES['imagem_usuarios']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = './img/profile/'; //Diretório para uploads 
    move_uploaded_file($_FILES['imagem_usuarios']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    
    
    
$sql2 = "INSERT INTO usuarios ( 
  nome_usuarios,
email_usuarios,
senha_usuarios,
imagem_usuarios,
consultoria_usuarios,
horas_usuarios,
nivelacesso_usuarios,
facebook_usuarios,
instagram_usuarios,
twitter_usuarios,
youtube_usuarios,
discord_usuarios,
telegram_usuarios,
linkedin_usuarios,
tiktok_usuarios,
site_usuarios,
formacao_usuarios,
viagem_usuarios,
atuacao1_usuarios,
atuacao2_usuarios,
atuacao3_usuarios,
atuacao4_usuarios,
atuacao5_usuarios,
telefone_usuarios,
lattes_usuarios
  ) VALUES (
    '$nome_usuarios',
'$email_usuarios',
'$senha_usuarios',
'$new_name',
'$consultoria_usuarios',
'$horas_usuarios',
'$nivelacesso_usuarios',
'$facebook_usuarios',
'$instagram_usuarios',
'$twitter_usuarios',
'$youtube_usuarios',
'$discord_usuarios',
'$telegram_usuarios',
'$linkedin_usuarios',
'$tiktok_usuarios',
'$site_usuarios',
'$formacao_usuarios',
'$viagem_usuarios',
'$atuacao1_usuarios',
'$atuacao2_usuarios',
'$atuacao3_usuarios',
'$atuacao4_usuarios',
'$atuacao5_usuarios',
'$telefone_usuarios',
'$lattes_usuarios'
  )";
if (mysqli_query($mysqli, $sql2)) {
header("Location: terceirizar.php"); exit;
} else {
echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
}
        } else {
       
$sql2 = "INSERT INTO usuarios ( 
  nome_usuarios,
email_usuarios,
senha_usuarios,

consultoria_usuarios,
horas_usuarios,
nivelacesso_usuarios,
facebook_usuarios,
instagram_usuarios,
twitter_usuarios,
youtube_usuarios,
discord_usuarios,
telegram_usuarios,
linkedin_usuarios,
tiktok_usuarios,
site_usuarios,
formacao_usuarios,
viagem_usuarios,
atuacao1_usuarios,
atuacao2_usuarios,
atuacao3_usuarios,
atuacao4_usuarios,
atuacao5_usuarios,
telefone_usuarios,
lattes_usuarios
  ) VALUES (
    '$nome_usuarios',
'$email_usuarios',
'$senha_usuarios',

'$consultoria_usuarios',
'$horas_usuarios',
'$nivelacesso_usuarios',
'$facebook_usuarios',
'$instagram_usuarios',
'$twitter_usuarios',
'$youtube_usuarios',
'$discord_usuarios',
'$telegram_usuarios',
'$linkedin_usuarios',
'$tiktok_usuarios',
'$site_usuarios',
'$formacao_usuarios',
'$viagem_usuarios',
'$atuacao1_usuarios',
'$atuacao2_usuarios',
'$atuacao3_usuarios',
'$atuacao4_usuarios',
'$atuacao5_usuarios',
'$telefone_usuarios',
'$lattes_usuarios'
  )";
if (mysqli_query($mysqli, $sql2)) {
header("Location: terceirizar.php"); exit;
} else {
echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
}

        }



