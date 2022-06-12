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
  

  $sql = "SELECT * FROM `reuniao` WHERE (`id_reuniao` = '".$consulta."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
  while($lista = mysqli_fetch_assoc($retorno)){
    $consultoria_reuniao = $lista['consultoria_reuniao'];
$empresa_reuniao = $lista['empresa_reuniao'];
$usuario_reuniao = $lista['usuario_reuniao'];
$datainicio_reuniao = $lista['datainicio_reuniao'];
$datatermino_reuniao = $lista['datatermino_reuniao'];
$temporeuniao_reuniao = $lista['temporeuniao_reuniao'];
$local_reuniao = $lista['local_reuniao'];
$participantes_reuniao = $lista['participantes_reuniao'];
$assunto_reuniao = $lista['assunto_reuniao'];
$area_reuniao = $lista['area_reuniao'];
$follow_reuniao = $lista['follow_reuniao'];
$tarefas_reuniao = $lista['tarefas_reuniao'];
$ferramentas_reuniao = $lista['ferramentas_reuniao'];
$pontospositivos_reuniao = $lista['pontospositivos_reuniao'];
$pontosnegativos_reuniao = $lista['pontosnegativos_reuniao'];
$resumo_reuniao = $lista['resumo_reuniao'];
$status_reuniao = $lista['status_reuniao'];
$datainicio_reuniao = date('d/m/Y H:i:s',  strtotime($datainicio_reuniao));
$datatermino_reuniao = date('d/m/Y H:i:s',  strtotime($datatermino_reuniao));


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
 
 
  $html .= '<img width=160 src="img/logo/'.$logo.'"><br>';
  $html .= '<h3  align=center><strong>REGISTRO DE REUNIÃO DE CONSULTORIA</strong></h3>';
  
  $html .= '<p align=left><br><strong><font size=4>'.$razaosocial_consultoria. "</font></strong></p>";
  $html .= '<p align=left><font size=2><STRONG>Endereço: </STRONG>'.$endereco_consultoria.' - '.$bairro_consultoria.' - '.$cidade_consultoria.' - '.$uf_consultoria."</font></p>";
  $html .= '<p align=left><font size=2><STRONG>CNPJ: </STRONG>'.$cnpj_consultoria.' - <STRONG>INSCRIÇÃO ESTADUAL: </STRONG> '.$ie_consultoria.'</font></p>';
  $html .= '<p align=left><font size=2> <STRONG>E-MAIL: </STRONG> '.$email_consultoria.' - <STRONG>TELEFONE: </STRONG> '.$telefone_consultoria.'</font></p><br><br>';
  
  $html .= '<p align=left><strong><font size=4><STRONG>CLIENTE: </strong>'.$razaosocial_empresa. "</font></p>";
  $html .= '<p align=left><font size=2><STRONG>ENDEREÇO: </strong>'.$endereco_empresa.' - '.$bairro_empresa.' - '.$cidade_empresa.' - '.$uf_empresa.'</font></p>';
  $html .= '<p align=left><font size=2><STRONG>CNPJ: </STRONG>'.$cnpj_empresa.' - <STRONG>INSCRIÇÃO ESTADUAL: </STRONG> '.$ie_empresa.'</font></p>';
  $html .= '<p align=left><font size=2> <STRONG>E-MAIL: </STRONG> '.$email_empresa.' - <STRONG>TELEFONE: </STRONG> '.$telefone_empresa.'</font></p><br><br>';
  
  $html .= '<p align=left><strong><font size=2>INÍCIO DA REUNIÃO: </strong> '.$datainicio_reuniao. "</font></p>";
  $html .= '<p align=left><strong><font size=2>TÉRMINO DA REUNIÃO: </strong> '.$datatermino_reuniao. "</font></p>";
  $html .= '<p align=left><strong><font size=2>DURAÇÃO: </strong> '.$temporeuniao_reuniao. " minutos</font></p>";
  $html .= '<p align=left><strong><font size=2>LOCAL DA REUNIÃO: </strong> '.$local_reuniao. "</font></p>";
  $html .= '<p align=left><strong><font size=2>ÁREA / SETOR DA EMPRESA QUE FOI ATENDIDA: </strong> '.$area_reuniao. "</font></p>";
  $html .= '<p align=left><strong><font size=2> ASSUNTO: </strong> '.$assunto_reuniao. "</font></p><br><br>";
  $html .= '<p align=justify><strong><font size=4>PARTICIPANTES: </strong> <br></font></p>';
  $html .= '<p align=justify><font size=2>'.$participantes_reuniao. "</font></p><br>";

    $html .= '<p align=left><strong><font size=4>FOLLOW´UP DAS TAREFAS DA ÚLTIMA REUNIÃO:</font></strong><br></p>';
    $html .= '<p align=justify><font size=2>'.$follow_reuniao. "</font></p><br>";
  
    $html .= '<p align=left><strong><font size=4>AÇÕES DEIXADAS PARA EXECUÇÃO:</font></strong></p>';
    $html .= '<p align=justify><font size=2>'.$tarefas_reuniao. "</font></p><br>";

    $html .= '<p align=left><strong><font size=4>FERRAMENTAS DE GESTÃO UTILIZADAS:</font></strong></p>';
    $html .= '<p align=justify><font size=2>'.$ferramentas_reuniao. "</font></p><br>";

    
    $html .= '<p align=left><strong><font size=4>PONTOS POSITIVOS DA REUNIÃO:</font></strong></p>';
    $html .= '<p align=justify><font size=2>'.$pontospositivos_reuniao. "</font></p><br>";

    $html .= '<p align=left><strong><font size=4>PONTOS NEGATIVOS DA REUNIÃO:</font></strong></p>';
    $html .= '<p align=justify><font size=2>'.$pontosnegativos_reuniao. "</font></p><br>";

    $html .= '<p align=left><strong><font size=4>RESUMO DA REUNIÃO:</font></strong></p>';
    $html .= '<p align=justify><font size=2>'.$resumo_reuniao. "</font></p>";

  
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
"resumo_de_reunião.pdf", 
array(
"Attachment" => false //Para realizar o download somente alterar para true
)
);

?>