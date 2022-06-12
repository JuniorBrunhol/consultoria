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





$titulo_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulo_pestel'])));
$Ppoliticas_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Ppoliticas_pestel'])));
$Peleicoes_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Peleicoes_pestel'])));
$Pgoverno_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Pgoverno_pestel'])));
$Pnegociacao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Pnegociacao_pestel'])));
$Pfinanciamento_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Pfinanciamento_pestel'])));
$Pguerras_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Pguerras_pestel'])));
$Pinternos_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Pinternos_pestel'])));
$Prelacao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Prelacao_pestel'])));
$Pcorrupcao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Pcorrupcao_pestel'])));
$Eeconomia_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Eeconomia_pestel'])));
$Etributacao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Etributacao_pestel'])));
$Einflacao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Einflacao_pestel'])));
$Ejuros_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Ejuros_pestel'])));
$Etendencias_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Etendencias_pestel'])));
$Esazonais_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Esazonais_pestel'])));
$Eindustria_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Eindustria_pestel'])));
$Eimportacao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Eimportacao_pestel'])));
$Ecomercio_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Ecomercio_pestel'])));
$Ecambio_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Ecambio_pestel'])));
$Staxa_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Staxa_pestel'])));
$Sgeracoes_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Sgeracoes_pestel'])));
$Sestilo_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Sestilo_pestel'])));
$Stabus_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Stabus_pestel'])));
$Sconsumidores = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Sconsumidores'])));
$Spadrao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Spadrao_pestel'])));
$Seticos_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Seticos_pestel'])));
$Temergentes_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Temergentes_pestel'])));
$Tmaturidade_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Tmaturidade_pestel'])));
$Tlegislacao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Tlegislacao_pestel'])));
$Tinovacao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Tinovacao_pestel'])));
$Tinformacoes_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Tinformacoes_pestel'])));
$Tdesenvolvimento_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Tdesenvolvimento_pestel'])));
$Tintelectual_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Tintelectual_pestel'])));
$Fregulamentos_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Fregulamentos_pestel'])));
$Freducao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Freducao_pestel'])));
$Fsustentabilidade_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Fsustentabilidade_pestel'])));
$Fresiduos_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Fresiduos_pestel'])));
$Fpoluicao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Fpoluicao_pestel'])));
$Llegislacao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Llegislacao_pestel'])));
$Lfutura_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Lfutura_pestel'])));
$Linternacional_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Linternacional_pestel'])));
$Lregulatorios_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Lregulatorios_pestel'])));
$Ltrabalhista_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Ltrabalhista_pestel'])));
$Lprotecao_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Lprotecao_pestel'])));
$Lnormas_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Lnormas_pestel'])));
$Lfiscais_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Lfiscais_pestel'])));
$Lindustria_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['Lindustria_pestel'])));
$resumo_pestel = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['resumo_pestel'])));


$sql = "INSERT INTO pestel (
consultoria_pestel,
empresa_pestel,
usuario_pestel,
titulo_pestel,
Ppoliticas_pestel,
Peleicoes_pestel,
Pgoverno_pestel,
Pnegociacao_pestel,
Pfinanciamento_pestel,
Pguerras_pestel,
Pinternos_pestel,
Prelacao_pestel,
Pcorrupcao_pestel,
Eeconomia_pestel,
Etributacao_pestel,
Einflacao_pestel,
Ejuros_pestel,
Etendencias_pestel,
Esazonais_pestel,
Eindustria_pestel,
Eimportacao_pestel,
Ecomercio_pestel,
Ecambio_pestel,
Staxa_pestel,
Sgeracoes_pestel,
Sestilo_pestel,
Stabus_pestel,
Sconsumidores,
Spadrao_pestel,
Seticos_pestel,
Temergentes_pestel,
Tmaturidade_pestel,
Tlegislacao_pestel,
Tinovacao_pestel,
Tinformacoes_pestel,
Tdesenvolvimento_pestel,
Tintelectual_pestel,
Fregulamentos_pestel,
Freducao_pestel,
Fsustentabilidade_pestel,
Fresiduos_pestel,
Fpoluicao_pestel,
Llegislacao_pestel,
Lfutura_pestel,
Linternacional_pestel,
Lregulatorios_pestel,
Ltrabalhista_pestel,
Lprotecao_pestel,
Lnormas_pestel,
Lfiscais_pestel,
Lindustria_pestel,
resumo_pestel
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$titulo_pestel',
'$Ppoliticas_pestel',
'$Peleicoes_pestel',
'$Pgoverno_pestel',
'$Pnegociacao_pestel',
'$Pfinanciamento_pestel',
'$Pguerras_pestel',
'$Pinternos_pestel',
'$Prelacao_pestel',
'$Pcorrupcao_pestel',
'$Eeconomia_pestel',
'$Etributacao_pestel',
'$Einflacao_pestel',
'$Ejuros_pestel',
'$Etendencias_pestel',
'$Esazonais_pestel',
'$Eindustria_pestel',
'$Eimportacao_pestel',
'$Ecomercio_pestel',
'$Ecambio_pestel',
'$Staxa_pestel',
'$Sgeracoes_pestel',
'$Sestilo_pestel',
'$Stabus_pestel',
'$Sconsumidores',
'$Spadrao_pestel',
'$Seticos_pestel',
'$Temergentes_pestel',
'$Tmaturidade_pestel',
'$Tlegislacao_pestel',
'$Tinovacao_pestel',
'$Tinformacoes_pestel',
'$Tdesenvolvimento_pestel',
'$Tintelectual_pestel',
'$Fregulamentos_pestel',
'$Freducao_pestel',
'$Fsustentabilidade_pestel',
'$Fresiduos_pestel',
'$Fpoluicao_pestel',
'$Llegislacao_pestel',
'$Lfutura_pestel',
'$Linternacional_pestel',
'$Lregulatorios_pestel',
'$Ltrabalhista_pestel',
'$Lprotecao_pestel',
'$Lnormas_pestel',
'$Lfiscais_pestel',
'$Lindustria_pestel',
'$resumo_pestel'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_pestel) AS id_pestel FROM `pestel` WHERE (`empresa_pestel` = '".$EmpresaID."') AND  (`consultoria_pestel` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_pestel'];
  header("Location:visualiza_pestel.php?id=$id"); exit;


      
}
?>