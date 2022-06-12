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
  $consulta = $_GET['id'];
  


  $sql = "SELECT * FROM `cronogramareuniao` WHERE (`id_cronogramareuniao` = '".$consulta."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
  while($lista = mysqli_fetch_assoc($retorno)){
    $consultoria_cronogramareuniao = $lista['consultoria_cronogramareuniao'];
$empresa_cronogramareuniao = $lista['empresa_cronogramareuniao'];
$usuario_cronogramareuniao = $lista['usuario_cronogramareuniao'];
$data_cronogramareuniao = $lista['data_cronogramareuniao'];
$titulo_cronogramareuniao = $lista['titulo_cronogramareuniao'];
$participantes_cronogramareuniao = $lista['participantes_cronogramareuniao'];
$resumo_cronogramareuniao = $lista['resumo_cronogramareuniao'];
$data_cronogramareuniao2 = date('d/m/Y',  strtotime($data_cronogramareuniao));

   }

   $sql1 = "SELECT * FROM `consultoria` WHERE (`id_consultoria` = '".$consultoria_usuarios."')  "; 
   $retorno1 = mysqli_query ($mysqli , $sql1) or die (mysql_error());
   while($dados1 = mysqli_fetch_array($retorno1)){
     $id_consultoria = $dados1['id_consultoria'];    
     $razaosocial_consultoria = $dados1['razaosocial_consultoria'];
     $responsavel_consultoria = $dados1['responsavel_consultoria'];
     $fantasia_consultoria = $dados1['fantasia_consultoria'];
     $cnpj_consultoria = $dados1['cnpj_consultoria'];
     $ie_consultoria = $dados1['ie_consultoria'];
     $endereco_consultoria = $dados1['endereco_consultoria'];
     $bairro_consultoria = $dados1['bairro_consultoria'];
     $cidade_consultoria = $dados1['cidade_consultoria'];
     $uf_consultoria = $dados1['uf_consultoria'];
     $telefone_consultoria = $dados1['telefone_consultoria'];
     $email_consultoria = $dados1['email_consultoria'];
     $logo = $dados1['imagem_consultoria'];
     $instagram_consultoria = $dados1['instagram_consultoria'];
     $facebook_consultoria = $dados1['facebook_consultoria'];
     $youtube_consultoria = $dados1['youtube_consultoria'];
     $telegram_consultoria = $dados1['telegram_consultoria'];
     $linkedin_consultoria = $dados1['linkedin_consultoria'];
     $twitter_consultoria = $dados1['twitter_consultoria'];
   }

   $sql2 = "SELECT * FROM `empresa` WHERE (`id_empresa` = '".$EmpresaID."') "; 
  $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
  while($dados2 = mysqli_fetch_array($retorno2)){
    $razaosocial_empresa = $dados2['razaosocial_empresa'];
    $nomefantasia_empresa = $dados2['nomefantasia_empresa'];
    $cnpj_empresa = $dados2['cnpj_empresa'];
    $ie_empresa = $dados2['ie_empresa'];
    $telefone_empresa = $dados2['telefone_empresa'];
    $email_empresa = $dados2['email_empresa'];
    $endereco_empresa = $dados2['endereco_empresa'];
    $bairro_empresa = $dados2['bairro_empresa'];
    $cidade_empresa = $dados2['cidade_empresa'];
    $uf_empresa = $dados2['uf_empresa'];
    $objetivo_empresa = $dados2['objetivo_empresa'];
    $imagem_empresa = $dados2['imagem_empresa'];
      }

  $html  = '<body>';
 
 
  $html .= '<img width=160 src="img/logo/'.$logo.'"><br><br><br<br>';
  $html .= '<h3  align=center><strong>CRONOGRAMA DE REUNIÃO</strong></h3><br>';
  
  $html .= '<p align=left><br><strong><font size=3>CONSULTORIA: '.$razaosocial_consultoria. "</font></strong></p>";
  $html .= '<p align=left><font size=2><STRONG>Endereço: </STRONG>'.$endereco_consultoria.' - '.$bairro_consultoria.' - '.$cidade_consultoria.' - '.$uf_consultoria."</font></p>";
  $html .= '<p align=left><font size=2><STRONG>CNPJ: </STRONG>'.$cnpj_consultoria.' - <STRONG>INSCRIÇÃO ESTADUAL: </STRONG> '.$ie_consultoria.'</font></p>';
  $html .= '<p align=left><font size=2> <STRONG>E-MAIL: </STRONG> '.$email_consultoria.' - <STRONG>TELEFONE: </STRONG> '.$telefone_consultoria.'</font></p>';
  
  $html .= '<p align=left><br><strong><font size=3><STRONG>CLIENTE: </strong>'.$razaosocial_empresa. "</font></p>";
  $html .= '<p align=left><font size=2><STRONG>ENDEREÇO: </strong>'.$endereco_empresa.' - '.$bairro_empresa.' - '.$cidade_empresa.' - '.$uf_empresa.'</font></p>';
  $html .= '<p align=left><font size=2><STRONG>CNPJ: </STRONG>'.$cnpj_empresa.' - <STRONG>INSCRIÇÃO ESTADUAL: </STRONG> '.$ie_empresa.'</font></p>';
  $html .= '<p align=left><font size=2> <STRONG>E-MAIL: </STRONG> '.$email_empresa.' - <STRONG>TELEFONE: </STRONG> '.$telefone_empresa.'</font></p>';
  
  $html .= '<p align=left><br><strong><BR><font size=2>DATA PREVISTA PARA REUNIÃO: </strong> '.$data_cronogramareuniao2. "</font></p>";
  $html .= '<p align=left><strong><font size=2> TÍTULO: </strong> '.$titulo_cronogramareuniao. "</font></p>";
  $html .= '<p align=justify><strong><font size=2>PARTICIPANTES: </strong></font><font size=2>'.$participantes_cronogramareuniao. "</font></p><br>";

    $html .= '<p align=left><strong><BR><font size=3>RESUMO DO CRONOGRAMA DA REUNIÃO:</font></strong></p>';
    $html .= '<p align=justify><font size=2>'.$resumo_cronogramareuniao. "</font></p>";

  
  $html .= '</body>';




//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();

// Carrega seu HTML
$dompdf->load_html('

'. $html .'
');

//Renderizar o html

$dompdf->set_paper("A4", "portrail");
$dompdf->render();
//Exibibir a página
$dompdf->stream(
"cronogramareuniao.pdf", 
array(
"Attachment" => false //Para realizar o download somente alterar para true
)
);

?>