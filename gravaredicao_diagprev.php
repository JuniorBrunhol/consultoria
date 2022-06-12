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
$EmpresaID =  $_SESSION['EmpresaID'];
$plano = $_SESSION['Plano'];
$consultoria_usuarios = $_SESSION['Consultoria'];

$id_diagprev  = $_POST['id_diagprev'];
$titulo_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_diagprev'])));
$contato_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['contato_diagprev'])));
$cargo_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cargo_diagprev'])));
$segmento_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['segmento_diagprev'])));
$comercio_diagprev  = $_POST['comercio_diagprev'];
$industria_diagprev  = $_POST['industria_diagprev'];
$servico_diagprev  = $_POST['servico_diagprev'];
$qtdefuncionariosatual_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['qtdefuncionariosatual_diagprev'])));
$qtdefuncionariospico_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['qtdefuncionariospico_diagprev'])));
$porte_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['porte_diagprev'])));
$areaconstruida_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['areaconstruida_diagprev'])));
$marca_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['marca_diagprev'])));
$origemreceita_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['origemreceita_diagprev'])));
$custosfixos_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['custosfixos_diagprev'])));
$custosvariaveis_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['custosvariaveis_diagprev'])));
$margemlucro_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['margemlucro_diagprev'])));
$individamento_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['individamento_diagprev'])));
$faturamento_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['faturamento_diagprev'])));
$sazonalidade_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['sazonalidade_diagprev'])));
$publicoalvo_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['publicoalvo_diagprev'])));
$concorrentes_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['concorrentes_diagprev'])));
$corebusiness_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['corebusiness_diagprev'])));
$publicidade_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['publicidade_diagprev'])));
$midiassociais_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['midiassociais_diagprev'])));
$ecommerce_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['ecommerce_diagprev'])));
$folhapagamento_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['folhapagamento_diagprev'])));
$tempomedio_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['tempomedio_diagprev'])));
$liderancacomum_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['liderancacomum_diagprev'])));
$turnover_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['turnover_diagprev'])));
$clima_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['clima_diagprev'])));
$recrutamento_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['recrutamento_diagprev'])));
$horasextras_diagprev = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['horasextras_diagprev'])));
$legalizacao_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['legalizacao_diagprev'])));
$logistica_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['logistica_diagprev'])));
$estoque_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['estoque_diagprev'])));
$armazenagem_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['armazenagem_diagprev'])));
$processos_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['processos_diagprev'])));
$tempomediofornecedor_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['tempomediofornecedor_diagprev'])));
$tempomediocliente_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['tempomediocliente_diagprev'])));
$frota_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['frota_diagprev'])));
$equipamentos_diagprev = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['equipamentos_diagprev'])));
$licencas_diagprev = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['licencas_diagprev'])));
$erp_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['erp_diagprev'])));
$nivelsenha_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['nivelsenha_diagprev'])));
$lgpd_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['lgpd_diagprev'])));
$sistemasuporte_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['sistemasuporte_diagprev'])));
$crm_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['crm_diagprev'])));
$parceriascomerciais_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['parceriascomerciais_diagprev'])));
$parceriassociais_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['parceriassociais_diagprev'])));
$terceirizados_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['terceirizados_diagprev'])));
$programassociais_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['programassociais_diagprev'])));
$sac_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['sac_diagprev'])));
$desafiosinternos_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['desafiosinternos_diagprev'])));
$desafiosexternos_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['desafiosexternos_diagprev'])));
$rivalidadeconcorrentes_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['rivalidadeconcorrentes_diagprev'])));
$processos2_diagprev = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['processos2_diagprev'])));
$rotinas_diagprev = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['rotinas_diagprev'])));
$reunioes_diagprev = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['reunioes_diagprev'])));
$kpisestabelecidos_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['kpisestabelecidos_diagprev'])));
$metascurto_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['metascurto_diagprev'])));
$metasmedio_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['metasmedio_diagprev'])));
$metaslongo_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['metaslongo_diagprev'])));
$avaliacaoconsultor_diagprev  = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['avaliacaoconsultor_diagprev'])));



            $sql1 = "UPDATE diagprev SET 
            id_diagprev = '".$id_diagprev."',
empresa_diagprev = '".$EmpresaID."',
titulo_diagprev = '".$titulo_diagprev."',
contato_diagprev = '".$contato_diagprev."',
cargo_diagprev = '".$cargo_diagprev."',
segmento_diagprev = '".$segmento_diagprev."',
comercio_diagprev = '".$comercio_diagprev."',
industria_diagprev = '".$industria_diagprev."',
servico_diagprev = '".$servico_diagprev."',
qtdefuncionariosatual_diagprev = '".$qtdefuncionariosatual_diagprev."',
qtdefuncionariospico_diagprev = '".$qtdefuncionariospico_diagprev."',
porte_diagprev = '".$porte_diagprev."',
areaconstruida_diagprev = '".$areaconstruida_diagprev."',
marca_diagprev = '".$marca_diagprev."',
origemreceita_diagprev = '".$origemreceita_diagprev."',
custosfixos_diagprev = '".$custosfixos_diagprev."',
custosvariaveis_diagprev = '".$custosvariaveis_diagprev."',
margemlucro_diagprev = '".$margemlucro_diagprev."',
individamento_diagprev = '".$individamento_diagprev."',
faturamento_diagprev = '".$faturamento_diagprev."',
sazonalidade_diagprev = '".$sazonalidade_diagprev."',
publicoalvo_diagprev = '".$publicoalvo_diagprev."',
concorrentes_diagprev = '".$concorrentes_diagprev."',
corebusiness_diagprev = '".$corebusiness_diagprev."',
publicidade_diagprev = '".$publicidade_diagprev."',
midiassociais_diagprev = '".$midiassociais_diagprev."',
ecommerce_diagprev = '".$ecommerce_diagprev."',
folhapagamento_diagprev = '".$folhapagamento_diagprev."',
tempomedio_diagprev = '".$tempomedio_diagprev."',
liderancacomum_diagprev = '".$liderancacomum_diagprev."',
turnover_diagprev = '".$turnover_diagprev."',
clima_diagprev = '".$clima_diagprev."',
recrutamento_diagprev = '".$recrutamento_diagprev."',
horasextras_diagprev = '".$horasextras_diagprev."',
legalizacao_diagprev = '".$legalizacao_diagprev."',
logistica_diagprev = '".$logistica_diagprev."',
estoque_diagprev = '".$estoque_diagprev."',
armazenagem_diagprev = '".$armazenagem_diagprev."',
processos_diagprev = '".$processos_diagprev."',
tempomediofornecedor_diagprev = '".$tempomediofornecedor_diagprev."',
tempomediocliente_diagprev = '".$tempomediocliente_diagprev."',
frota_diagprev = '".$frota_diagprev."',
equipamentos_diagprev = '".$equipamentos_diagprev."',
licencas_diagprev = '".$licencas_diagprev."',
erp_diagprev = '".$erp_diagprev."',
nivelsenha_diagprev = '".$nivelsenha_diagprev."',
lgpd_diagprev = '".$lgpd_diagprev."',
sistemasuporte_diagprev = '".$sistemasuporte_diagprev."',
crm_diagprev = '".$crm_diagprev."',
parceriascomerciais_diagprev = '".$parceriascomerciais_diagprev."',
parceriassociais_diagprev = '".$parceriassociais_diagprev."',
terceirizados_diagprev = '".$terceirizados_diagprev."',
programassociais_diagprev = '".$programassociais_diagprev."',
sac_diagprev = '".$sac_diagprev."',
desafiosinternos_diagprev = '".$desafiosinternos_diagprev."',
desafiosexternos_diagprev = '".$desafiosexternos_diagprev."',
rivalidadeconcorrentes_diagprev = '".$rivalidadeconcorrentes_diagprev."',
processos2_diagprev = '".$processos2_diagprev."',
rotinas_diagprev = '".$rotinas_diagprev."',
reunioes_diagprev = '".$reunioes_diagprev."',
kpisestabelecidos_diagprev = '".$kpisestabelecidos_diagprev."',
metascurto_diagprev = '".$metascurto_diagprev."',
metasmedio_diagprev = '".$metasmedio_diagprev."',
metaslongo_diagprev = '".$metaslongo_diagprev."',
avaliacaoconsultor_diagprev = '".$avaliacaoconsultor_diagprev."'

            WHERE id_diagprev='$id_diagprev'"; 
            $resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));
          
            header("Location:visualiza_diagprev.php?id=$id_diagprev"); exit;
             
          
           
           
  
?>