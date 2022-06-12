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



  $sql = "SELECT * FROM `4psinovacao` WHERE (`id_4psinovacao` = '".$consulta."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
  while($lista = mysqli_fetch_assoc($retorno)){
    $id_4psinovacao = $lista['id_4psinovacao'];
    $consultoria_4psinovacao = $lista['consultoria_4psinovacao'];
$empresa_4psinovacao = $lista['empresa_4psinovacao'];
$usuario_4psinovacao = $lista['usuario_4psinovacao'];
$data_4psinovacao = $lista['data_4psinovacao'];
$titulo_4psinovacao = $lista['titulo_4psinovacao'];
$processos_4psinovacao = $lista['processos_4psinovacao'];
$pessoas_4psinovacao = $lista['pessoas_4psinovacao'];
$politicas_4psinovacao = $lista['politicas_4psinovacao'];
$proposito_4psinovacao = $lista['proposito_4psinovacao'];
$resumo_4psinovacao = $lista['resumo_4psinovacao'];


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


  $html  = '<body>';
 
  $html  = '<table>';

  $html .= '<tr><td width=140 align=center><img width=140 height=70 src="img/logo/'.$logo.'"></td><td align=left><font size=2><strong>'.$razaosocial_consultoria.'</strong><br>'.$endereco_consultoria.'<br><strong>E-mail:</strong>'.$email_consultoria.' - <strong>Telefone:</strong> '.$telefone_consultoria.'<br><strong>Responsável:</strong>'.$responsavel_consultoria.'</font></td></tr>';
  $html .= '<tr><td colspan=2 align=center><br><h2><strong>4PS DA INOVAÇÃO</strong><br><br></H2></td></tr>';

 
  $html .= '<tr><td colspan=2><strong><font size=3>TÍTULO: </font></strong><font size=3>' .$titulo_4psinovacao. '</font><BR><font size=2>Desenvolvido em '.date('d/m/Y',  strtotime($data_4psinovacao)). "</font><BR></td></tr>";
    
  $html .= '<tr><td colspan=2><br><br><strong><font size=3>PROPÓSITO:</font></strong><br></td></tr>';
   $html .= '<tr><td align=justify colspan=2><font size=2>'.$proposito_4psinovacao. "</font><BR></td></tr>";
  
  $html .= '<tr><td colspan=2><br><br><strong><font size=3>PROCESSOS:</font></strong><br></td></tr>';
   $html .= '<tr><td align=justify colspan=2><font size=2>'.$processos_4psinovacao. "</font><BR></td></tr>";
  
  $html .= '<tr><td colspan=2><br><br><strong><font size=3>PESSOAS:</font></strong><br></td></tr>';
   $html .= '<tr><td align=justify colspan=2><font size=2>'.$pessoas_4psinovacao. "</font><BR></td></tr>";
  
  $html .= '<tr><td colspan=2><br><br><strong><font size=3>POLÍTICAS:</font></strong><br></td></tr>';
   $html .= '<tr><td align=justify colspan=2><font size=2>'.$politicas_4psinovacao. "</font><BR></td></tr>";
  
  $html .= '<tr><td colspan=2><br><br><strong><font size=3>OBSERVAÇÃO DO CONSULTOR:</font></strong><br></td></tr>';
   $html .= '<tr><td align=justify colspan=2><font size=2>'.$resumo_4psinovacao. "</font><BR></td></tr>";
  
   $html .= '</table>'; 
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
"4psinovacao.pdf", 
array(
"Attachment" => false //Para realizar o download somente alterar para true
)
);

?>