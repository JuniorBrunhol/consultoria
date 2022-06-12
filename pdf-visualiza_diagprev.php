
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
  $pesquisa_diagprev = $_GET['id'];

  $sql1 = "SELECT * FROM `consultoria` WHERE (`id_consultoria` = '".$consultoria_usuarios."')  "; 
  $retorno1 = mysqli_query ($mysqli , $sql1) or die (mysql_error());
  while($dados1 = mysqli_fetch_array($retorno1)){
    
    $logo = $dados1['imagem_consultoria'];
   
  }

  $sql = "SELECT * FROM `diagprev` WHERE (`id_diagprev` =  '".$pesquisa_diagprev."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
   while ($lista = mysqli_fetch_assoc ($retorno)) {
    $id_diagprev = $lista['id_diagprev'];
    $data_diagprev = $lista['data_diagprev'];
    $titulo_diagprev = $lista['titulo_diagprev'];
    $contato_diagprev = $lista['contato_diagprev'];
    $cargo_diagprev = $lista['cargo_diagprev'];
    $segmento_diagprev = $lista['segmento_diagprev'];
    $comercio_diagprev = $lista['comercio_diagprev'];
    $industria_diagprev = $lista['industria_diagprev'];
    $servico_diagprev = $lista['servico_diagprev'];
    $qtdefuncionariosatual_diagprev = $lista['qtdefuncionariosatual_diagprev'];
    $qtdefuncionariospico_diagprev = $lista['qtdefuncionariospico_diagprev'];
    $porte_diagprev = $lista['porte_diagprev'];
    $areaconstruida_diagprev = $lista['areaconstruida_diagprev'];
    $marca_diagprev = $lista['marca_diagprev'];
    $origemreceita_diagprev = $lista['origemreceita_diagprev'];
    $custosfixos_diagprev = $lista['custosfixos_diagprev'];
    $custosvariaveis_diagprev = $lista['custosvariaveis_diagprev'];
    $margemlucro_diagprev = $lista['margemlucro_diagprev'];
    $individamento_diagprev = $lista['individamento_diagprev'];
    $faturamento_diagprev = $lista['faturamento_diagprev'];
    $sazonalidade_diagprev = $lista['sazonalidade_diagprev'];
    $publicoalvo_diagprev = $lista['publicoalvo_diagprev'];
    $concorrentes_diagprev = $lista['concorrentes_diagprev'];
    $corebusiness_diagprev = $lista['corebusiness_diagprev'];
    $publicidade_diagprev = $lista['publicidade_diagprev'];
    $midiassociais_diagprev = $lista['midiassociais_diagprev'];
    $ecommerce_diagprev = $lista['ecommerce_diagprev'];
    $folhapagamento_diagprev = $lista['folhapagamento_diagprev'];
    $tempomedio_diagprev = $lista['tempomedio_diagprev'];
    $liderancacomum_diagprev = $lista['liderancacomum_diagprev'];
    $turnover_diagprev = $lista['turnover_diagprev'];
    $clima_diagprev = $lista['clima_diagprev'];
    $recrutamento_diagprev = $lista['recrutamento_diagprev'];
    $horasextras_diagprev = $lista['horasextras_diagprev'];
    $legalizacao_diagprev = $lista['legalizacao_diagprev'];
    $logistica_diagprev = $lista['logistica_diagprev'];
    $estoque_diagprev = $lista['estoque_diagprev'];
    $armazenagem_diagprev = $lista['armazenagem_diagprev'];
    $processos_diagprev = $lista['processos_diagprev'];
    $tempomediofornecedor_diagprev = $lista['tempomediofornecedor_diagprev'];
    $tempomediocliente_diagprev = $lista['tempomediocliente_diagprev'];
    $frota_diagprev = $lista['frota_diagprev'];
    $equipamentos_diagprev = $lista['equipamentos_diagprev'];
    $licencas_diagprev = $lista['licencas_diagprev'];
    $erp_diagprev = $lista['erp_diagprev'];
    $nivelsenha_diagprev = $lista['nivelsenha_diagprev'];
    $lgpd_diagprev = $lista['lgpd_diagprev'];
    $sistemasuporte_diagprev = $lista['sistemasuporte_diagprev'];
    $crm_diagprev = $lista['crm_diagprev'];
    $parceriascomerciais_diagprev = $lista['parceriascomerciais_diagprev'];
    $parceriassociais_diagprev = $lista['parceriassociais_diagprev'];
    $terceirizados_diagprev = $lista['terceirizados_diagprev'];
    $programassociais_diagprev = $lista['programassociais_diagprev'];
    $sac_diagprev = $lista['sac_diagprev'];
    $desafiosinternos_diagprev = $lista['desafiosinternos_diagprev'];
    $desafiosexternos_diagprev = $lista['desafiosexternos_diagprev'];
    $rivalidadeconcorrentes_diagprev = $lista['rivalidadeconcorrentes_diagprev'];
    $processos2_diagprev = $lista['processos2_diagprev'];
    $rotinas_diagprev = $lista['rotinas_diagprev'];
    $reunioes_diagprev = $lista['reunioes_diagprev'];
    $kpisestabelecidos_diagprev = $lista['kpisestabelecidos_diagprev'];
    $metascurto_diagprev = $lista['metascurto_diagprev'];
    $metasmedio_diagprev = $lista['metasmedio_diagprev'];
    $metaslongo_diagprev = $lista['metaslongo_diagprev'];
    $avaliacaoconsultor_diagprev = $lista['avaliacaoconsultor_diagprev'];
  }


  $html  = '<table align=center width=100% cellspacing=0 cellpadding=4>';
  $html .= '<tbody>';
  $html .= '<tr><td align=left width=40%><img width=160 height=80 src="img/logo/'.$logo.'"><br><br></td><td> <h2>DIAGNÓSTICO EMPRESARIAL</h2></td></tr>';
  
  $html .= '<tr><td align=left valign=top><font size=3><strong> TÍTULO:</strong></td><td>'.$titulo_diagprev."</font><br></td></tr>";
  $html .= '<tr><td align=left valign=top> <font size=3><strong>CRIADO EM:</strong> <i> </td><td>'.date('d/m/Y',  strtotime($data_diagprev))."</i></font><bR><br><bR></td></tr>";

  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top  bgcolor=gray><font size=5 color=#ffffff>DADOS GERAIS:</font></td><td bgcolor=gray></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=3><br>CONTATO: </td><td><br>'.$contato_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>CARGO: </td><td>'.$cargo_diagprev. "</font><br><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>SEGMENTO: </td><td>      <STRONG><I>Em qual o segmento a empresa atua?</I></STRONG><BR>'.$segmento_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>PORTE: </td><td>      <STRONG><I>Qual o porte da empresa atualmente?</I></STRONG><BR>'.$porte_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>ÁREA CONSTRUÍDA: </td><td>      <STRONG><I>Qual o tamanho de área construída onde a empresa está situada? Se tiver filiais, qual a metragem total?</I></STRONG><BR>'.$areaconstruida_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>MARCA REGISTRADA: </td><td>      <STRONG><I>A marca da empresa está registrada junto ao INPI?</I></STRONG><BR>'.$marca_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>TIPO DE OPERAÇÃO DA EMPRESA: </td><td>      <STRONG><I>Qual o tipo de operação da empresa?</I></STRONG><BR>COMÉRCIO:'.$comercio_diagprev.'<BR>INDÚSTRIA:'.$industria_diagprev.'<BR>SERVIÇO:'.$servico_diagprev."</font><br><br></td></tr>";

  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top  bgcolor=gray><font size=5 color=#ffffff>FINANÇAS:</font></td><td bgcolor=gray></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=3><br>FONTES DE RECEITA: </td><td><br> <STRONG><I>As receitas da empresa são oriundas de quais atividades?</I></STRONG><BR>'.$origemreceita_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>CUSTOS FIXOS: </td><td> <STRONG><I>Quais são os custos fixos da empresa?</I></STRONG><BR>'.$custosfixos_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>CUSTOS VARIÁVEIS: </td><td>      <STRONG><I>Quais são os custos da empresa?</I></STRONG><BR>'.$custosvariaveis_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>MARGEM DE CONTRIBUIÇÃO: </td><td>      <STRONG><I>Qual a margem de contribuição da empresa?</I></STRONG><BR>'.$margemlucro_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>ENDIVIDAMENTO: </td><td>      <STRONG><I>Qual o percentual de individamento da empresa?</I></STRONG><BR>'.$individamento_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>FATURAMENTO: </td><td>      <STRONG><I>Qual o faturamento mensal e anual da empresa?</I></STRONG><BR>'.$faturamento_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>SAZONALIDADE: </td><td>      <STRONG><I>A empresa possui sazonalidades durante o ano?</I></STRONG><BR>'.$sazonalidade_diagprev."</font><br><br></td></tr>";
  
  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top  bgcolor=gray><font size=5 color=#ffffff>COMERCIAL:</font></td><td bgcolor=gray></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=3><br>PÚBLICO ALVO: </td><td><br> <STRONG><I>Qual o público alvo da empresa?</I></STRONG><BR>'.$publicoalvo_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>CONCORRENTES: </td><td> <STRONG><I>Quais são os principais concorrentes da empresa?</I></STRONG><BR>'.$concorrentes_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>RIVALIDADE COM CONCORRENTES: </td><td>      <STRONG><I>Como é a relação com os concorrentes da empresa?</I></STRONG><BR>'.$rivalidadeconcorrentes_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>CORE BUSINESS: </td><td>      <STRONG><I>Quais são os produtos ou serviços "carro chefe" da empresa atualmente?</I></STRONG><BR>'.$corebusiness_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>PUBLICIDADE: </td><td>      <STRONG><I>Como fé feito a publicidade da empresa?</I></STRONG><BR>'.$publicidade_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>MÍDIAS SOCIAIS: </td><td>      <STRONG><I>Como são feitas e por quem são feitas as mídias sociais da empresa?</I></STRONG><BR>'.$midiassociais_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>E-COMMERCE: </td><td>      <STRONG><I>A empresa já vende pela internet?</I></STRONG><BR>'.$ecommerce_diagprev."</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>SAC: </td><td>      <STRONG><I>A empresa possui um canal direto de Serviço de Atendimento ao Consumidor?</I></STRONG><BR>'.$sac_diagprev."</font><br><br></td></tr>";
  
  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top  bgcolor=gray><font size=5 color=#ffffff>RECURSOS HUMANOS:</font></td><td bgcolor=gray></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=3><br>QTDE COLABORADORES: </td><td><br> <STRONG><I>Quantos colaboradores a empresa tem atualmente?</I></STRONG><BR>'.$qtdefuncionariosatual_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>QTDE COLABORADORES (PICO): </td><td> <STRONG><I>QQual foi a maior quantidade que a empresa teve de funcionários até hoje?</I></STRONG><BR>'.$qtdefuncionariospico_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>TERCEIRIZAÇÃO: </td><td>      <STRONG><I>A empresa possui profissionais terceirizados prestando serviço neste momento?</I></STRONG><BR>'.$terceirizados_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>FOLHA DE PAGAMENTO: </td><td>      <STRONG><I>Qual o valor atual da folha de pagamento da empresa?</I></STRONG><BR>'.$folhapagamento_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>% DE SALÁRIO BASE X LIDERANÇA: </td><td>      <STRONG><I>Quanto desta folha de pagamento é destinado para liderança e para profissionais de base?<</I></STRONG><BR>'.$liderancacomum_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>TEMPO MÉDIO DE CASA: </td><td>      <STRONG><I>Qual o tempo médio de casa dos colaboradores atualmente?</I></STRONG><BR>'.$tempomedio_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>TURNOVER: </td><td>      <STRONG><I>Qual o percentual de Turnover nos últimos 12 meses?</I></STRONG><BR>'.$turnover_diagprev."</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>CLIMA ORGANIZACIONAL: </td><td>      <STRONG><I>Como é o clima organizacional da empresa?</I></STRONG><BR>'.$clima_diagprev."</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>RECRUTAMENTO E SELEÇÃO: </td><td>      <STRONG><I>Como é realizado o processo de Recrutamento e Seleção na empresa?</I></STRONG><BR>'.$recrutamento_diagprev."</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>HORAS EXTRAS: </td><td>      <STRONG><I>Como funciona o processo de pagamento de horas extras na empresa?</I></STRONG><BR>'.$horasextras_diagprev."</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>LEGALIZAÇÃO: </td><td>      <STRONG><I>Todos os colaboradores na empresa estão devidamente legalizados?</I></STRONG><BR>'.$legalizacao_diagprev."</font><br><br></td></tr>";

  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top  bgcolor=gray><font size=5 color=#ffffff>LOGÍSTICA:</font></td><td bgcolor=gray></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=3><br>FROTA: </td><td><br> <STRONG><I>A Frota é própria ou alugada? Quantos veículos têm no momento?</I></STRONG><BR>'.$frota_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>PROCESSO LOGÍSTICO: </td><td> <STRONG><I>Como funciona o processo logístico desde a venda até a entrega no cliente?</I></STRONG><BR>'.$logistica_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>TEMPO MÉDIO ENTREGA CLIENTE: </td><td>      <STRONG><I>Qual o tempo médio de entrega para um cliente atualmente?</I></STRONG><BR>'.$tempomediocliente_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>ARMAZENAGEM: </td><td>      <STRONG><I>Como funciona o processo de armazenagem da empresa?</I></STRONG><BR>'.$armazenagem_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>SEPARAÇÃO DE PRODUTOS: </td><td>      <STRONG><I>Como funciona o processo de separação e envio de produtos?<</I></STRONG><BR>'.$processos_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>TEMPO MÉDIO DE ESTOQUE: </td><td>      <STRONG><I>Atualmente a empresa possui estoque para quanto tempo?</I></STRONG><BR>'.$estoque_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>TEMPO MÉDIO ENTREGA FORNECEDOR: </td><td>      <STRONG><I>Quanto tempo em média atualmente um fornecedor demora para entregar?</I></STRONG><BR>'.$tempomediofornecedor_diagprev."</font><br><br></td></tr>";

  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top  bgcolor=gray><font size=5 color=#ffffff>INFORMÁTICA E TI:</font></td><td bgcolor=gray></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=3><br>EQUIPAMENTOS: </td><td><br> <STRONG><I>Qual o estado atual dos equipamentos de informática e telefonia da empresa?</I></STRONG><BR>'.$equipamentos_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>LICENÇAS: </td><td> <STRONG><I>Os softwares usados na empresa são originais?</I></STRONG><BR>'.$licencas_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>SISTEMA E.R.P.: </td><td>      <STRONG><I>A empresa usa algum ERP? Ele é específico para o segmento?</I></STRONG><BR>'.$erp_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>SENHAS DE USO: </td><td>      <STRONG><I>Existe compartilhamento de senhas na empresa?</I></STRONG><BR>'.$nivelsenha_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>LGPD: </td><td>      <STRONG><I>Os colaboradores receberam treinamento de LGPD? Existe tratativas na empresa quanto a isso?<</I></STRONG><BR>'.$lgpd_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>OUTROS SISTEMAS: </td><td>      <STRONG><I>A empresa utiliza outros sistemas ou robôs?</I></STRONG><BR>'.$sistemasuporte_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>C.R.M.: </td><td>      <STRONG><I>A empresa utiliza CRM para controlar suas prospecções e vendas?</I></STRONG><BR>'.$crm_diagprev."</font><br><br></td></tr>";

  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top  bgcolor=gray><font size=5 color=#ffffff>PARCERIAS:</font></td><td bgcolor=gray></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=3><br>PARCERIAS COMERCIAIS: </td><td><br> <STRONG><I>A empresa possui parceiros comerciais?</I></STRONG><BR>'.$parceriascomerciais_diagprev."</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>OUTRAS PARCERIAS: </td><td> <STRONG><I>A empresa possui parcerias com associações ou outras entidades sociais?</I></STRONG><BR>'.$parceriassociais_diagprev."</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>PROGRAMAS SOCIAIS: </td><td>      <STRONG><I>A empresa participa de algum programa social?</I></STRONG><BR>'.$programassociais_diagprev."</font><br><br></td></tr>";

  $html .= '<tr bgcolor=gray border-color=gray><td align=left valign=top  bgcolor=gray><font size=5 color=#ffffff>GESTÃO:</font></td><td bgcolor=gray></td></tr>';
  $html .= '<tr><td align=left valign=top><strong><font size=3><br>DESAFIOS INTERNOS: </td><td><br> <STRONG><I>Quais são os maiores desafios internos da empresa hoje?</I></STRONG><BR>'.$desafiosinternos_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>DESAFIOS EXTERNOS: </td><td> <STRONG><I>Quais são os maiores desafios externos da empresa hoje?</I></STRONG><BR>'.$desafiosexternos_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>PROCESSOS ESTABELECIDOS: </td><td>      <STRONG><I>Os processos de trabalho estão definidos e escritos?</I></STRONG><BR>'.$processos2_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>ROTINAS DE FUNÇÃO: </td><td>      <STRONG><I>Os colaboradores possuem rotinas estabelecidas, escritas e acompanhadas com frequência?</I></STRONG><BR>'.$rotinas_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>REUNIÕES DE ROTINA: </td><td>      <STRONG><I>A empresa possui e executa um cronograma de reuniões?<</I></STRONG><BR>'.$reunioes_diagprev. "</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>INDICADORES (KPI):: </td><td>      <STRONG><I>A empresa possui KPIs e os acompanha?</I></STRONG><BR>'.$kpisestabelecidos_diagprev."</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>METAS CURTO PRAZO: </td><td>      <STRONG><I>Quais são as metas de curto prazo da empresa?</I></STRONG><BR>'.$metascurto_diagprev."</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>METAS MÉDIO PRAZO: </td><td>      <STRONG><I>Quais são as metas de médio prazo da empresa?</I></STRONG><BR>'.$metasmedio_diagprev."</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>METAS LONGO PRAZO: </td><td>      <STRONG><I>Quais são as metas de longo prazo da empresa?</I></STRONG><BR>'.$metaslongo_diagprev."</font><br><br></td></tr>";
  $html .= '<tr><td align=left valign=top><strong><font size=3>AVALIAÇÃO FINAL DO CONSULTOR: </td><td>      <STRONG><I>Avaliação final do consultor. Resumo de tudo o que foi visto.</I></STRONG><BR>'.$avaliacaoconsultor_diagprev."</font><br><br></td></tr>";
 

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