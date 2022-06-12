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
  
  $sql = "SELECT * FROM `swot` WHERE (`id_swot` = '".$consulta."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
  while($lista = mysqli_fetch_assoc($retorno)){
    $consultoria_swot = $lista['consultoria_swot'];
$empresa_swot = $lista['empresa_swot'];
$usuario_swot = $lista['usuario_swot'];
$data_swot = $lista['data_swot'];
$titulo_swot = $lista['titulo_swot'];
$fraquezas_swot = $lista['fraquezas_swot'];
$forcas_swot = $lista['forcas_swot'];
$ameacas_swot = $lista['ameacas_swot'];
$oportunidades_swot = $lista['oportunidades_swot'];
$resultado_swot = $lista['resultado_swot'];

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
 
 
  $html .= '<table width=100%>';
         $html .= '<tr>
        <td id="minhatabela"align=center ><img width=140 height=70 src="img/logo/'.$logo.'"></td>
        <td bgcolor="#ffffff" colspan=2  align=left><font size=2><strong>'.$razaosocial_consultoria.'</strong><br>'.$endereco_consultoria.'<br><strong>E-mail:</strong>'.$email_consultoria.' - <strong>Telefone:</strong> '.$telefone_consultoria.'<br><strong>Responsável:</strong>'.$responsavel_consultoria.'</font></td>
       
     </tr>';  
    
     $html .= '<tr>
   
     <td bgcolor="#ffffff" colspan=3 align=center><STRONG><font size=5><BR>ANÁLISE SWOT<BR><BR></font></STRONG></td>
    
  </tr>';  
     $html .= '<tr>
     <td id="minhatabela"align=right ><strong><font size=2>Empresa:</font></strong></td>
     <td bgcolor="#ffffff" align=left colspan=2  ><font size=2>'.$razaosocial_empresa.'</font></td>
    
  </tr>';  
  $html .= '<tr>
  <td id="minhatabela"align=right ><strong><font size=2>Realizado em:</font></strong></td>
  <td bgcolor="#ffffff" colspan=2  align=justify><font size=2>'.date('d/m/Y',  strtotime($data_swot)).'</font></td>
 
</tr>';  
$html .= '<tr>
<td id="minhatabela"align=right valign=top><strong><font size=2>Diagnóstico do Consultor:</font></strong></td>
<td bgcolor="#ffffff"  colspan=2  align=JUSTIFY><font size=2>'.$resultado_swot.'<BR><BR></font></td>

</tr>';  



    $html .= '<tr>
        <td id="minhatabela" rowspan="2" align=center ><h2>SWOT</h2></td>
        <td bgcolor="#c9c9c9" width=40%  align=center><h3>Fatores Positivos</h3></td>
        <td bgcolor="#c9c9c9" width=40%  align=center><h3>Fatores Negativos</h3></td>
     </tr>';
     $html .= '<tr>
       
        <td bgcolor="#ececec" align=center height=30><strong>Forças</strong></td>
        <td bgcolor="#ececec" align=center height=30><strong>Fraquezas</strong></td>
     </tr>';
     $html .= '<tr bgcolor="#c9c9c9" >

        <td align=center><h3>Fatores<br>Internos</h3></td>
       
        <td bgcolor="#f6c285" id="minhatabela2" align=left height=200 valign=top cellpadding=10 ><font size=2>'.
        $forcas_swot.'</font>
         
        </td>
        <td bgcolor="#ede48f" id="minhatabela2" align=left height=200 valign=top cellpadding=10><font size=2>'.
       $fraquezas_swot.'</font>
        </td>
        </tr>';

        $html .= '<tr bgcolor="#c9c9c9">
        <td align=center><h3>Fatores<br>Externos</h3></td>
        <td bgcolor="#f8dcdc"id="minhatabela2" align=left height=200 valign=top cellpadding=10><font size=2>'.$oportunidades_swot.'</font>
        </td>
        <td bgcolor="#5fdbe2" id="minhatabela2" align=left height=200 valign=top cellpadding=10><font size=2>'.$ameacas_swot.'</font>
        </td>
        </tr>';
        $html .= '<tr>
        <td bgcolor="#ffffff" align=center height=30><strong>Análise SWOT</strong></td>
        <td bgcolor="#ececec" align=center height=30><strong>Oportunidades</strong></td>
        <td bgcolor="#ececec" align=center height=30><strong>Ameaças</strong></td>
     </tr>';

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
"swot.pdf", 
array(
"Attachment" => false //Para realizar o download somente alterar para true
)
);

?>