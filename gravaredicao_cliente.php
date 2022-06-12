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



$id = $_POST['id'];
$imagem = $_FILES['imagem'];
$imagem2 = $_POST['imagem2'];
$razaosocial_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['razaosocial_empresa'])));
$nomefantasia_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['nomefantasia_empresa'])));
$cnpj_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cnpj_empresa'])));
$ie_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['ie_empresa'])));
$telefone_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['telefone_empresa'])));
$endereco_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['endereco_empresa'])));
$bairro_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['bairro_empresa'])));
$cidade_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cidade_empresa'])));
$uf_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['uf_empresa'])));
$email_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['email_empresa'])));
$responsavel_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['responsavel_empresa'])));
$pais_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['pais_empresa'])));
$rg_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['rg_empresa'])));
$cpf_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cpf_empresa'])));
$objetivo_empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['objetivo_empresa'])));


if($_FILES['imagem']['size'] == 0)
 {
    $sql2 = "UPDATE empresa SET 
  razaosocial_empresa = '".$razaosocial_empresa."',
nomefantasia_empresa = '".$nomefantasia_empresa."',
imagem_empresa = '".$imagem2."',
cnpj_empresa = '".$cnpj_empresa."',
ie_empresa = '".$ie_empresa."',
telefone_empresa = '".$telefone_empresa."',
endereco_empresa = '".$endereco_empresa."',
bairro_empresa = '".$bairro_empresa."',
cidade_empresa = '".$cidade_empresa."',
uf_empresa = '".$uf_empresa."',
email_empresa = '".$email_empresa."',
responsavel_empresa = '".$responsavel_empresa."',
pais_empresa = '".$pais_empresa."',
rg_empresa = '".$rg_empresa."',
cpf_empresa = '".$cpf_empresa."',
objetivo_empresa = '".$objetivo_empresa."'
 WHERE id_empresa='$id'"; 
    $resultado_usuario2 = mysqli_query($mysqli, $sql2)or die(mysqli_error($mysqli));
    header("Location: principal.php"); exit;
} else {
    $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = './img/clientes/'; //Diretório para uploads 
    move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo  

    $sql = "UPDATE empresa SET 
   razaosocial_empresa = '".$razaosocial_empresa."',
nomefantasia_empresa = '".$nomefantasia_empresa."',
imagem_empresa = '".$new_name."',
cnpj_empresa = '".$cnpj_empresa."',
ie_empresa = '".$ie_empresa."',
telefone_empresa = '".$telefone_empresa."',
endereco_empresa = '".$endereco_empresa."',
bairro_empresa = '".$bairro_empresa."',
cidade_empresa = '".$cidade_empresa."',
uf_empresa = '".$uf_empresa."',
email_empresa = '".$email_empresa."',
responsavel_empresa = '".$responsavel_empresa."',
pais_empresa = '".$pais_empresa."',
rg_empresa = '".$rg_empresa."',
cpf_empresa = '".$cpf_empresa."',
objetivo_empresa = '".$objetivo_empresa."'
 WHERE id_empresa='$id'";    
 $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));
    header("Location: principal.php"); exit;
  
     
    }
?>