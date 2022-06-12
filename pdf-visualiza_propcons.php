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
  $pesquisa_proposta = $_GET['id'];
  $sumario = " <h2>SUMÁRIO DA PROPOSTA</H2>
  1.	DADOS DO PROPONENTE	<BR>
2.	OBJETO DA CONSULTORIA<BR>
a.	OBJETIVO GERAL<BR>
b.	OBJETIVOS ESPECÍFICOS<BR>
3.	METODOLOGIA DE TRABALHO<BR>
4.	EQUIPE TÉCNICA<BR>
5.	CRONOGRAMA DE EXECUÇÃO<BR>
6.	PRODUTOS/ENTREGAS<BR>
7.	PREÇO<BR>
a.	FORMA DE PAGAMENTO<BR>
8.	VALIDADE DA PROPOSTA<BR>
9.	RESPONSABILIDADE DAS PARTES<BR>
a.	DO CONTRATANTE<BR>
b.	DA PROPONENTE<BR>
10.	CONFIDENCIALIDADE DA PROPOSTA<BR>
11. CONCLUSÃO<BR>
12. CONTATO CONSULTORIA<BR>
13. COMENTÁRIOS DE CLIENTES<BR>";

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

  $sql3 = "SELECT * FROM `proposta` WHERE (`id_proposta` = '".$pesquisa_proposta."') "; 
  $retorno3 = mysqli_query ($mysqli , $sql3) or die (mysql_error());
  while($dados3 = mysqli_fetch_array($retorno3)){
    $dataenvio_proposta = $dados3['dataenvio_proposta'];
    $pronome_proposta = $dados3['pronome_proposta'];
    $contato_proposta = $dados3['contato_proposta'];
    $titulo_proposta = $dados3['titulo_proposta'];
    $objeto_proposta = $dados3['objeto_proposta'];
    $objetivoespecifico_proposta = $dados3['objetivoespecifico_proposta'];
    $metodologia_proposta = $dados3['metodologia_proposta'];
    $equipetecnica_proposta = $dados3['equipetecnica_proposta'];
    $prazo_proposta = $dados3['prazo_proposta'];
    $entregas_proposta = $dados3['entregas_proposta'];
    $preco_proposta = $dados3['preco_proposta'];
    $formapagamento_proposta = $dados3['formapagamento_proposta'];
    $validade_proposta = $dados3['validade_proposta'];
    $responsabilidadecontratante_proposta = $dados3['responsabilidadecontratante_proposta'];
    $responsabilidadeproponente_proposta = $dados3['responsabilidadeproponente_proposta'];
    $confidencialidade_proposta = $dados3['confidencialidade_proposta'];
    $conclusao_proposta = $dados3['conclusao_proposta'];
    $frase_proposta = $dados3['frase_proposta'];
    $mostraremail_proposta = $dados3['mostraremail_proposta'];
    $mostrartelefone_proposta = $dados3['mostrartelefone_proposta'];
    $mostrarredesocial_proposta = $dados3['mostrarredesocial_proposta'];
    $mostrarcomentarios_proposta = $dados3['mostrarcomentarios_proposta'];
    
  }



  $html  = '<table align=center>';
  $html .= '<tbody>';
 
  $html .= '<tr><td align=right width=500><img width=160 height=80 src="img/logo/'.$logo.'">';
  $html .= '<tr><td align=left><br><br><font size=3>'.$pronome_proposta.' '.$contato_proposta. "</font>";




  $html .= '<tr><td align=center ><br><br><br><font size=5><strong>'.$titulo_proposta. "</strong></font><br><br><br>";
  $html .= '<tr><td align=left><br><br><strong><font size=3>PROPONENTE</font></strong><br>';
  $html .= '<tr><td align=left><font size=3>'.$razaosocial_consultoria. "</font><br><br>";
  $html .= '<tr><td align=left><font size=3><strong>DESTINATÁRIO</font></strong><br>';
  $html .= '<tr><td align=left><font size=3>'.$razaosocial_empresa. "</font><br><br><br><br>";
  $html .= '<tr><td align=left><strong><font size=3>OBJETO</font></strong><br>';
  $html .= '<tr><td align=justify><font size=3>'.$objeto_proposta. "</font><br><br>";
  $html .= '<tr><td align=justify><font size=3>'.$sumario."</font>";
  


  $html .= '<tr bgcolor=#ffffff><td align=left><br><br><h2>1.	DADOS DA PROPONENTE</h2>';
  $html .= '<tr bgcolor=#ffffff><td align=left><font size=3><strong>RAZÃO SOCIAL:</STRONG>'.$razaosocial_consultoria."</font><BR>";
  $html .= '<tr bgcolor=#ffffff><td align=left><font size=3><strong>NOME FANTASIA:</STRONG>'.$fantasia_consultoria."</font><BR>";
  $html .= '<tr bgcolor=#ffffff><td align=left><font size=3><strong>CNPJ:</STRONG>'.$cnpj_consultoria."</font><BR>";
  $html .= '<tr bgcolor=#ffffff><td align=left><font size=3><strong>IE:</STRONG>'.$ie_consultoria."</font><BR>";
  $html .= '<tr bgcolor=#ffffff><td align=left><font size=3><strong>ENDEREÇO:</STRONG>'.$endereco_consultoria.' - '.$bairro_consultoria.' - '.$cidade_consultoria.' - '.$uf_consultoria."</font><BR>";
  $html .= '<tr bgcolor=#ffffff><td align=left><font size=3><strong>CONTATOS:</STRONG> Telefone: '.$telefone_consultoria.' / E-mail: '.$email_consultoria."</font><BR>";
  $html .= '<tr bgcolor=#ffffff><td align=left><font size=3><strong>RESPONSÁVEL TÉCNICO:</STRONG>'.$responsavel_consultoria."</font><BR><BR>";
  
  $html .= '<tr bgcolor=#ffffff><td align=left><h2>2.	OBJETIVOS DA CONSULTORIA</h2><font size=3><strong>OBJETIVO GERAL:</STRONG></font><BR>'.$objeto_proposta."<br><br><strong>OBJETIVOS ESPECÍFICOS:</STRONG><br>$objetivoespecifico_proposta.</font><BR><br>";


  $html .= '<tr bgcolor=#ffffff><td align=justify><h2>3.	METODOLOGIA DE TRABALHO</h2><font size=3>'.$metodologia_proposta."</font><BR><br>";


  $html .= '<tr bgcolor=#ffffff><td align=justify><h2>4.	EQUIPE TÉCNICA</h2><font size=3>'.$equipetecnica_proposta."</font><BR><br>";
  

  $html .= '<tr bgcolor=#ffffff><td align=justify><h2>5.	PRAZO E CRONOGRAMA DE EXECUÇÃO</h2><font size=3>'.$prazo_proposta."</font><BR><br>";


  $html .= '<tr bgcolor=#ffffff><td align=justify><h2>6.	PRODUTOS/ENTREGAS</h2><font size=3>'.$entregas_proposta."</font><BR><br>";


  $html .= '<tr bgcolor=#ffffff><td align=justify><h2>7.	PREÇO</h2><font size=3>'.$preco_proposta."</font><BR><br>";


  $html .= '<tr bgcolor=#ffffff><td align=justify><h2>7.a)	FORMA DE PAGAMENTO</h2><font size=3>'.$formapagamento_proposta."</font><BR><br>";


  $html .= '<tr bgcolor=#ffffff><td align=justify><h2>8.	VALIDADE DA PROPOSTA</h2><font size=3>'.$validade_proposta."</font><BR><br>";


  $html .= '<tr bgcolor=#ffffff><td align=justify><h2>9.	RESPONSABILIDADES DAS PARTES</h2><font size=3><strong>Do CONTRATANTE:</STRONG><BR>'.$responsabilidadecontratante_proposta."</font><BR><BR><strong>Da PROPONENTE:</STRONG></font><BR>'.$responsabilidadeproponente_proposta</font><BR><br>";
 

  $html .= '<tr bgcolor=#ffffff><td align=left><h2>10.	CONFIDENCIALIDADE DA PROPOSTA</h2>';
  $html .= '<tr bgcolor=#ffffff><td align=justify><font size=3>'.$confidencialidade_proposta."</font><BR><br><BR><br>";
  $html .= '<tr bgcolor=#ffffff><td align=center><font size=3>___________________________________________________</font><BR>';
  $html .= '<tr bgcolor=#ffffff><td align=center><font size=3>'.$responsavel_consultoria."</font><BR>";
  $html .= '<tr bgcolor=#ffffff><td align=center><font size=3>'.$razaosocial_consultoria."</font><BR>";
  $html .= '<tr bgcolor=#ffffff><td align=center><font size=3>'.$cnpj_consultoria."</font><BR><BR><br><BR>";

  if ($mostraremail_proposta == 'on') {
  $html .= '<tr bgcolor=#ffffff><td align=left><h2>CONTATOS DO PROPONENTE:</h2>';
  $html .= '<tr bgcolor=#ffffff><td align=left><font size=3> <strong>RAZÃO SOCIAL: </STRONG>'.$razaosocial_consultoria."</font><br>";
  $html .= '<tr bgcolor=#ffffff><td align=left><font size=3> <strong>RESPONSÁVEL TÉCNICO: </STRONG>'.$responsavel_consultoria."</font><br>";
  $html .= '<tr bgcolor=#ffffff><td align=left><font size=3> <strong>TELEFONE: </STRONG>'.$telefone_consultoria."</font><br>";
  $html .= '<tr bgcolor=#ffffff><td align=left><font size=3><strong>EMAIL: </STRONG>'.$email_consultoria."</font><br><br>";
  }

  if ($mostrarredesocial_proposta == 'on') {
    $html .= '<tr bgcolor=#ffffff><td align=left><h2>REDES SOCIAIS DO PROPONENTE:</h2>';
    $html .= '<tr bgcolor=#ffffff><td align=left width=30><font size=3><img width=24 src="img/logo/instagram.png"><img width=10 src="img/logo/espaco.png"><strong>  INSTAGRAM: </STRONG><img width=10 src="img/logo/espaco.png">' .$instagram_consultoria."</font><br><br>";
    $html .= '<tr bgcolor=#ffffff><td align=left><font size=3> <img width=24 src="img/logo/facebook.png"><strong><img width=10 src="img/logo/espaco.png">  FACEBOOK: </STRONG><img width=10 src="img/logo/espaco.png">'.$facebook_consultoria."</font><br><br>";
    $html .= '<tr bgcolor=#ffffff><td align=left><font size=3> <img width=24 src="img/logo/youtube.png"><strong><img width=10 src="img/logo/espaco.png">  YOUTUBE: </STRONG><img width=10 src="img/logo/espaco.png">'.$youtube_consultoria."</font><br><br>";
    $html .= '<tr bgcolor=#ffffff><td align=left><font size=3> <img width=24 src="img/logo/telegram.jpg"><strong><img width=10 src="img/logo/espaco.png">  TELEGRAM: </STRONG><img width=10 src="img/logo/espaco.png">'.$telegram_consultoria."</font><br><br>";
    $html .= '<tr bgcolor=#ffffff><td align=left><font size=3> <img width=24 src="img/logo/linkedin.png"><strong><img width=10 src="img/logo/espaco.png">  LINKEDIN: </STRONG><img width=10 src="img/logo/espaco.png">'.$linkedin_consultoria."</font><br><br>";
    $html .= '<tr bgcolor=#ffffff><td align=left><font size=3><img width=24 src="img/logo/twitter.png"><strong><img width=10 src="img/logo/espaco.png">  TWITTER: </STRONG><img width=10 src="img/logo/espaco.png">'.$twitter_consultoria."</font><br><br>";
    }
  
    if ($mostrarcomentarios_proposta == 'on') {
      $html .= '<tr bgcolor=#ffffff><td align=left><h2>O QUE OS CLIENTES COMENTAM SOBRE NOSSA CONSULTORIA:</h2>';

      
      $sql10 = "SELECT * FROM `comentarios` WHERE (`idconsultoria_comentarios` = '".$id_consultoria."')  "; 
      $retorno10 = mysqli_query ($mysqli , $sql10) or die (mysql_error());
      while($dados10 = mysqli_fetch_array($retorno10)){
        $descricao_comentarios = $dados10['descricao_comentarios'];
        $contato_comentarios = $dados10['contato_comentarios'];
        $empresa_comentarios = $dados10['empresa_comentarios'];

      $html .= '<tr bgcolor=#ffffff><td align=justify><i><font size=3> '.$descricao_comentarios."</font></i><br>";
      $html .= '<tr bgcolor=#ffffff><td align=left><i><strong><font size=3> '.$contato_comentarios.','.$empresa_comentarios. "</font></strong></i><br><br><br>";
    }
  }
  




  
  $html .= '</tbody>';
  $html .= '</table';



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
"proposta.pdf", 
array(
"Attachment" => false //Para realizar o download somente alterar para true
)
);

?>