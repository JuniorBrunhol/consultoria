<?php
include_once 'conexao/conexao.php';






$nome = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['nome'])));
$email = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['email'])));
$telefone = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['telefone'])));
$empresa = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['empresa'])));
$eusou = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['eusou'])));
$consultores = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['consultores'])));

$sql = "INSERT INTO contato (
nome_contato,
telefone_contato,
email_contato,
empresa_contato,
eusou_contato,
colaboradores_contato
) VALUES (
'$nome',
'$telefone',
'$email',
'$empresa',
'$eusou',
'$colaboradores'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

    
  header("Location:index.html"); exit;


      

?>