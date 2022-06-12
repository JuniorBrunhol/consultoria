
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
  $id = $_GET['id'];

  $sql1 = "SELECT * FROM `consultoria` WHERE (`id_consultoria` = '".$consultoria_usuarios."')  "; 
  $retorno1 = mysqli_query ($mysqli , $sql1) or die (mysql_error());
  while($dados1 = mysqli_fetch_array($retorno1)){
    
    $logo = $dados1['imagem_consultoria'];
   
  }

  $sql = "SELECT * FROM `pestel` WHERE (`id_pestel` =  '".$id."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
   while ($lista = mysqli_fetch_assoc ($retorno)) {
      $consultoria_pestel = $lista['consultoria_pestel'];
      $empresa_pestel = $lista['empresa_pestel'];
      $usuario_pestel = $lista['usuario_pestel'];
      $data_pestel = $lista['data_pestel'];
      $titulo_pestel = $lista['titulo_pestel'];
      $Ppoliticas_pestel = $lista['Ppoliticas_pestel'];
      $Peleicoes_pestel = $lista['Peleicoes_pestel'];
      $Pgoverno_pestel = $lista['Pgoverno_pestel'];
      $Pnegociacao_pestel = $lista['Pnegociacao_pestel'];
      $Pfinanciamento_pestel = $lista['Pfinanciamento_pestel'];
      $Pguerras_pestel = $lista['Pguerras_pestel'];
      $Pinternos_pestel = $lista['Pinternos_pestel'];
      $Prelacao_pestel = $lista['Prelacao_pestel'];
      $Pcorrupcao_pestel = $lista['Pcorrupcao_pestel'];
      $Eeconomia_pestel = $lista['Eeconomia_pestel'];
      $Etributacao_pestel = $lista['Etributacao_pestel'];
      $Einflacao_pestel = $lista['Einflacao_pestel'];
      $Ejuros_pestel = $lista['Ejuros_pestel'];
      $Etendencias_pestel = $lista['Etendencias_pestel'];
      $Esazonais_pestel = $lista['Esazonais_pestel'];
      $Eindustria_pestel = $lista['Eindustria_pestel'];
      $Eimportacao_pestel = $lista['Eimportacao_pestel'];
      $Ecomercio_pestel = $lista['Ecomercio_pestel'];
      $Ecambio_pestel = $lista['Ecambio_pestel'];
      $Staxa_pestel = $lista['Staxa_pestel'];
      $Sgeracoes_pestel = $lista['Sgeracoes_pestel'];
      $Sestilo_pestel = $lista['Sestilo_pestel'];
      $Stabus_pestel = $lista['Stabus_pestel'];
      $Sconsumidores = $lista['Sconsumidores'];
      $Spadrao_pestel = $lista['Spadrao_pestel'];
      $Seticos_pestel = $lista['Seticos_pestel'];
      $Temergentes_pestel = $lista['Temergentes_pestel'];
      $Tmaturidade_pestel = $lista['Tmaturidade_pestel'];
      $Tlegislacao_pestel = $lista['Tlegislacao_pestel'];
      $Tinovacao_pestel = $lista['Tinovacao_pestel'];
      $Tinformacoes_pestel = $lista['Tinformacoes_pestel'];
      $Tdesenvolvimento_pestel = $lista['Tdesenvolvimento_pestel'];
      $Tintelectual_pestel = $lista['Tintelectual_pestel'];
      $Fregulamentos_pestel = $lista['Fregulamentos_pestel'];
      $Freducao_pestel = $lista['Freducao_pestel'];
      $Fsustentabilidade_pestel = $lista['Fsustentabilidade_pestel'];
      $Fresiduos_pestel = $lista['Fresiduos_pestel'];
      $Fpoluicao_pestel = $lista['Fpoluicao_pestel'];
      $Llegislacao_pestel = $lista['Llegislacao_pestel'];
      $Lfutura_pestel = $lista['Lfutura_pestel'];
      $Linternacional_pestel = $lista['Linternacional_pestel'];
      $Lregulatorios_pestel = $lista['Lregulatorios_pestel'];
      $Ltrabalhista_pestel = $lista['Ltrabalhista_pestel'];
      $Lprotecao_pestel = $lista['Lprotecao_pestel'];
      $Lnormas_pestel = $lista['Lnormas_pestel'];
      $Lfiscais_pestel = $lista['Lfiscais_pestel'];
      $Lindustria_pestel = $lista['Lindustria_pestel'];
      $resumo_pestel = $lista['resumo_pestel'];
      
  }


  $html  = '<table align=center width=100% cellspacing=0 cellpadding=4>';
  $html .= '<tbody>';
  $html .= '<tr><td align=left width=30%><img width=160 height=80 src="img/logo/'.$logo.'"><br><br></td><td> <h2>ANÁLISE PESTEL</h2></td></tr>';
  
  $html .= '<tr><td align=left valign=top><font size=3><strong> TÍTULO:</strong></td><td>'.$titulo_pestel."</font><br></td></tr>";
  $html .= '<tr><td align=left valign=top> <font size=3><strong>CRIADO EM:</strong> <i> </td><td>'.date('d/m/Y',  strtotime($data_pestel))."</i></font><bR><br><bR></td></tr>";

  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top colspan=2 bgcolor=gray><font size=3 color=#ffffff><font size=5>P - Fatores Políticos </font></td></tr>';
  $html .= '<tr><td align=justify valign=top colspan=2><font size=2>Fatores Políticos: referem-se ao grau de intervenção do governo na economia. Aqui podemos incluir questões referentes aos regulamentos específicos do setor impostos pelo governo.</font></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=2><br>POLÍTICAS GOVERNAMENTAIS: </td><td align=justify valign=top><font size=2><br>'.$Ppoliticas_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>ELEIÇÕES E TENDÊNCIAS POLÍTICAS: </td><td align=justify valign=top><font size=2>'.$Peleicoes_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>MUDANÇA DE GOVERNO: </td><td align=justify valign=top><font size=2>'.$Pgoverno_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>POLÍTICAS DE NEGOCIAÇÃO: </td><td align=justify valign=top><font size=2>'.$Pnegociacao_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>FINANCIAMENTO, BOLSAS E INICIATIVAS: </td><td align=justify valign=top><font size=2>'.$Pfinanciamento_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>GUERRAS, TERRORISMO E CONFLITOS: </td><td align=justify valign=top><font size=2>'.$Pguerras_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>PROBLEMAS POLÍTICOS INTERNOS: </td><td align=justify valign=top><font size=2>'.$Pinternos_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>RELAÇÕES ENTRE PAÍSES: </td><td align=justify valign=top><font size=2>'.$Prelacao_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>CORRUPÇÃO: <br><br></td><td align=justify valign=top><font size=2>'.$Pcorrupcao_pestel. "</font><br><br></td></tr>";

  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top colspan=2 bgcolor=gray><font size=3 color=#ffffff><font size=5>E - Fatores Econômicos</font></td></tr>';
  $html .= '<tr><td align=justify valign=top colspan=2><font size=2> Fatores Econômicos: incluem taxa de inflação, taxa de câmbio, taxa de juros, taxa de emprego/desemprego e outros indicadores de crescimento econômico. Os fatores econômicos enfrentados por uma organização têm um impacto significativo na forma como uma empresa transportará suas operações no futuro.</font></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=2><br>ECONOMIA LOCAL: </td><td align=justify valign=top><font size=2><br>'.$Eeconomia_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>TRIBUTAÇÃO: </td><td align=justify valign=top><font size=2>'.$Etributacao_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>INFLAÇÃO: </td><td align=justify valign=top><font size=2>'.$Einflacao_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>TAXA DE JUROS: </td><td align=justify valign=top><font size=2>'.$Ejuros_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>TENDÊNCIAS ECONÔMICAS: </td><td align=justify valign=top><font size=2>'.$Etendencias_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>PROBLEMAS SAZONAIS: </td><td align=justify valign=top><font size=2>'.$Esazonais_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>CRESCIMENTO DA INDÚSTRIA: </td><td align=justify valign=top><font size=2>'.$Eindustria_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>TAXAS DE IMPORTAÇÃO / EXPORTAÇÃO: </td><td align=justify valign=top><font size=2>'.$Eimportacao_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>COMÉRCIO INTERNACIONAL:</td><td align=justify valign=top><font size=2>'.$Ecomercio_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>TAXAS DE CÂMBIO INTERNACIONAIS:<br><br> </td><td align=justify valign=top><font size=2>'.$Ecambio_pestel. "</font><br><br></td></tr>";
 
  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top colspan=2 bgcolor=gray><font size=3 color=#ffffff><font size=5>S - Fatores Sociais</font></td></tr>';
  $html .= '<tr><td align=justify valign=top colspan=2><font size=2> Fatores Sociais: incluem diferentes aspectos culturais e demográficos da sociedade que formam o macroambiente da organização. Aqui falamos de distribuição etária, população e sua taxa de crescimento, consciência de saúde e consciência de segurança.</font></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=2><br>TAXA DE CRESCIMENTO POPULACIONAL: </td><td align=justify valign=top><font size=2><br>'.$Staxa_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>MUDANÇAS DE GERAÇÕES: </td><td align=justify valign=top><font size=2>'.$Sgeracoes_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>TENDÊNCIAS DE ESTILO DE VIDA: </td><td align=justify valign=top><font size=2>'.$Sestilo_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>TABUS CULTURAIS: </td><td align=justify valign=top><font size=2>'.$Stabus_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>ATRIBUTOS OU OPINIÕES DE CONSUMIDORES: </td><td align=justify valign=top><font size=2>'.$Sconsumidores. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>PADRÕES DE COMPRA DO CONSUMIDOR: </td><td align=justify valign=top><font size=2>'.$Spadrao_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>PROBLEMAS ÉTICOS:<br><br> </td><td align=justify valign=top><font size=2>'.$Seticos_pestel. "</font><br><br></td></tr>";
  
  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top colspan=2 bgcolor=gray><font size=3 color=#ffffff><font size=5>T - Fatores Tecnológicos</font></td></tr>';
  $html .= '<tr><td align=justify valign=top colspan=2><font size=2> Fatores Tecnológicos: a tecnologia evolui a um ritmo acelerado, o que faz com que empresas precisem estar atualizadas a essas mudanças. Neste item são incluídos fatores como mudanças tecnológicas, taxa de obsolescência, automação e, claro, inovação. </font></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=2><br>TECNOLOGIAS EMERGENTES: </td><td align=justify valign=top><font size=2><br>'.$Temergentes_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>MATURIDADE DA TECNOLOGIA: </td><td align=justify valign=top><font size=2>'.$Tmaturidade_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>LEGISLAÇÃO TECNOLÓGICA: </td><td align=justify valign=top><font size=2>'.$Tlegislacao_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>PESQUISA DE INOVAÇÃO: </td><td align=justify valign=top><font size=2>'.$Tinovacao_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>INFORMAÇÃO E COMUNICAÇÕES: </td><td align=justify valign=top><font size=2>'.$Tinformacoes_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>DESENVOLVIMENTO DE TECNOLOGIA NO CONCORRENTE: </td><td align=justify valign=top><font size=2>'.$Tdesenvolvimento_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>PROBLEMAS COM PROPRIEDADE INTELECTUAL:<br><br> </td><td align=justify valign=top><font size=2>'.$Tintelectual_pestel. "</font><br><br></td></tr>";
 
  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top colspan=2 bgcolor=gray><font size=3 color=#ffffff><font size=5>E - Fatores Ambientais</font></td></tr>';
  $html .= '<tr><td align=justify valign=top colspan=2><font size=2> Fatores ambientais: dizem respeito à influência do meio ambiente e o impacto dos aspectos ecológicos. Com o aumento da importância da RSE (Responsabilidade Social Empresarial), fatores ambientais tornam-se cada vez mais importantes. </font></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=2><br>REGULAÇÕES AMBIENTAIS: </td><td align=justify valign=top><font size=2><br>'.$Fregulamentos_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>REDUÇÃO DA PEGADA DE CARBONO: </td><td align=justify valign=top><font size=2>'.$Freducao_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>SUSTENTABILIDADE: </td><td align=justify valign=top><font size=2>'.$Fsustentabilidade_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>GESTÃO DE RESÍDUOS: </td><td align=justify valign=top><font size=2>'.$Fresiduos_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>POLUIÇÃO: <br><br></td><td align=justify valign=top><font size=2>'.$Fpoluicao_pestel. "</font><br><br></td></tr>";
  
  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top colspan=2 bgcolor=gray><font size=3 color=#ffffff><font size=5>L - Fatores Legais </font></td></tr>';
  $html .= '<tr><td align=justify valign=top colspan=2><font size=2>Fatores legais: qualquer empresa, independente do porte, deve entender o que é legal e permitido nos territórios em que atuam. Além disso, é necessário estar ciente de qualquer alteração na legislação e o impacto que isso possa ter sobre as operações comerciais e financeiras, especialmente porque novas leis podem significar aumento de imposto, o que impacta no orçamento empresarial.</font></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=2><br>LEGISLAÇÃO ATUAL: </td><td align=justify valign=top><font size=2><br>'.$Llegislacao_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>LEGISLAÇÃO FUTURA: </td><td align=justify valign=top><font size=2>'.$Lfutura_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>LEGISLAÇÃO INTERNACIONAL: </td><td align=justify valign=top><font size=2>'.$Linternacional_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>ÓRGÃOS E PROCESSOS REGULATÓRIOS: </td><td align=justify valign=top><font size=2>'.$Lregulatorios_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>LEI TRABALHISTA: </td><td align=justify valign=top><font size=2>'.$Ltrabalhista_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>PROTEÇÃO DO CONSUMIDOR: </td><td align=justify valign=top><font size=2>'.$Lprotecao_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>NORMAS DE SAÚDE E SEGURANÇA: </td><td align=justify valign=top><font size=2>'.$Lnormas_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>REGULAMENTOS FISCAIS: </td><td align=justify valign=top><font size=2>'.$Lfiscais_pestel. "</font></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=2>NORMAS ESPECÍFICAS DA INDÚSTRIA: <br><br></td><td align=justify valign=top><font size=2>'.$Lindustria_pestel. "</font><br><br></td></tr>";

  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top colspan=2 bgcolor=gray><font size=3 color=#ffffff><font size=5>OBSERVAÇÕES DO CONSULTOR </font></td></tr>';
  $html .= '<tr><td align=justify colspan=2 valign=top><font size=2><br>'.$resumo_pestel. "</font></td></tr>";
 
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
"diagnostico_empresarial.pdf", 
array(
"Attachment" => false //Para realizar o download somente alterar para true
)
);

?>