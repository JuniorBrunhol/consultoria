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

  $sql = "SELECT * FROM `pestel` WHERE (`id_pestel` =  '".$id."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
   while ($lista = mysqli_fetch_assoc ($retorno)) {
    $id_pestel = $lista['id_pestel'];
    $titulo_pestel = str_replace('<br />', "\n", $lista['titulo_pestel']);
$Ppoliticas_pestel = str_replace('<br />', "\n", $lista['Ppoliticas_pestel']);
$Peleicoes_pestel = str_replace('<br />', "\n", $lista['Peleicoes_pestel']);
$Pgoverno_pestel = str_replace('<br />', "\n", $lista['Pgoverno_pestel']);
$Pnegociacao_pestel = str_replace('<br />', "\n", $lista['Pnegociacao_pestel']);
$Pfinanciamento_pestel = str_replace('<br />', "\n", $lista['Pfinanciamento_pestel']);
$Pguerras_pestel = str_replace('<br />', "\n", $lista['Pguerras_pestel']);
$Pinternos_pestel = str_replace('<br />', "\n", $lista['Pinternos_pestel']);
$Prelacao_pestel = str_replace('<br />', "\n", $lista['Prelacao_pestel']);
$Pcorrupcao_pestel = str_replace('<br />', "\n", $lista['Pcorrupcao_pestel']);
$Eeconomia_pestel = str_replace('<br />', "\n", $lista['Eeconomia_pestel']);
$Etributacao_pestel = str_replace('<br />', "\n", $lista['Etributacao_pestel']);
$Einflacao_pestel = str_replace('<br />', "\n", $lista['Einflacao_pestel']);
$Ejuros_pestel = str_replace('<br />', "\n", $lista['Ejuros_pestel']);
$Etendencias_pestel = str_replace('<br />', "\n", $lista['Etendencias_pestel']);
$Esazonais_pestel = str_replace('<br />', "\n", $lista['Esazonais_pestel']);
$Eindustria_pestel = str_replace('<br />', "\n", $lista['Eindustria_pestel']);
$Eimportacao_pestel = str_replace('<br />', "\n", $lista['Eimportacao_pestel']);
$Ecomercio_pestel = str_replace('<br />', "\n", $lista['Ecomercio_pestel']);
$Ecambio_pestel = str_replace('<br />', "\n", $lista['Ecambio_pestel']);
$Staxa_pestel = str_replace('<br />', "\n", $lista['Staxa_pestel']);
$Sgeracoes_pestel = str_replace('<br />', "\n", $lista['Sgeracoes_pestel']);
$Sestilo_pestel = str_replace('<br />', "\n", $lista['Sestilo_pestel']);
$Stabus_pestel = str_replace('<br />', "\n", $lista['Stabus_pestel']);
$Sconsumidores = str_replace('<br />', "\n", $lista['Sconsumidores']);
$Spadrao_pestel = str_replace('<br />', "\n", $lista['Spadrao_pestel']);
$Seticos_pestel = str_replace('<br />', "\n", $lista['Seticos_pestel']);
$Temergentes_pestel = str_replace('<br />', "\n", $lista['Temergentes_pestel']);
$Tmaturidade_pestel = str_replace('<br />', "\n", $lista['Tmaturidade_pestel']);
$Tlegislacao_pestel = str_replace('<br />', "\n", $lista['Tlegislacao_pestel']);
$Tinovacao_pestel = str_replace('<br />', "\n", $lista['Tinovacao_pestel']);
$Tinformacoes_pestel = str_replace('<br />', "\n", $lista['Tinformacoes_pestel']);
$Tdesenvolvimento_pestel = str_replace('<br />', "\n", $lista['Tdesenvolvimento_pestel']);
$Tintelectual_pestel = str_replace('<br />', "\n", $lista['Tintelectual_pestel']);
$Fregulamentos_pestel = str_replace('<br />', "\n", $lista['Fregulamentos_pestel']);
$Freducao_pestel = str_replace('<br />', "\n", $lista['Freducao_pestel']);
$Fsustentabilidade_pestel = str_replace('<br />', "\n", $lista['Fsustentabilidade_pestel']);
$Fresiduos_pestel = str_replace('<br />', "\n", $lista['Fresiduos_pestel']);
$Fpoluicao_pestel = str_replace('<br />', "\n", $lista['Fpoluicao_pestel']);
$Llegislacao_pestel = str_replace('<br />', "\n", $lista['Llegislacao_pestel']);
$Lfutura_pestel = str_replace('<br />', "\n", $lista['Lfutura_pestel']);
$Linternacional_pestel = str_replace('<br />', "\n", $lista['Linternacional_pestel']);
$Lregulatorios_pestel = str_replace('<br />', "\n", $lista['Lregulatorios_pestel']);
$Ltrabalhista_pestel = str_replace('<br />', "\n", $lista['Ltrabalhista_pestel']);
$Lprotecao_pestel = str_replace('<br />', "\n", $lista['Lprotecao_pestel']);
$Lnormas_pestel = str_replace('<br />', "\n", $lista['Lnormas_pestel']);
$Lfiscais_pestel = str_replace('<br />', "\n", $lista['Lfiscais_pestel']);
$Lindustria_pestel = str_replace('<br />', "\n", $lista['Lindustria_pestel']);
$resumo_pestel = str_replace('<br />', "\n", $lista['resumo_pestel']);

   
    }


?>
<!doctype html>
<html class="no-js" lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sistema Integrado de Consultoria</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Google Fonts
		============================================ -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link href="css/font-awesome.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->

    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
	<!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
    <link rel="stylesheet" href="css/wave/button.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- Data Table JS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>


   




</head>

<body>
 
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <!-- LOGO DO CLIENTE CONSULTOR -->
                        <a href="principal.php"><img src="img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        
                        <ul class="nav navbar-nav notika-top-nav">
                           
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-menu"></i></span></a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
    <li><a href="meusdados.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> MEU PERFIL</a></li>
    <li><a href="configuracoes.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> CONFIGURAÇÕES</a></li>
    <li><a href="ajuda.php"><span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span> AJUDA</a></li>
    <li role="separator" class="divider"></li>
    <li><a href="restrito.php"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> SAIR</a></li>
  </ul>
</div>
                            </li>
                         
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->
      <!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
   

    <ul class="mainnav">
    <?php   
    $sql3 = "SELECT * FROM `menu` WHERE (`nivel_menu` <= '".$plano."') and (`status_menu` = '".$ativo."')ORDER BY id_menu"; 
    $retorno3 = mysqli_query ($mysqli , $sql3) or die (mysql_error());
     while ($lista3 = mysqli_fetch_assoc ($retorno3)) {
          $descricao_menu = $lista3['descricao_menu'];
          $imagem_menu = $lista3['imagem_menu'];
          $id_menu = $lista3['id_menu'];
     
          $nivel_menu = $lista3['nivel_menu'];
          
                
           ?> 
     
 

      <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="<?php echo $imagem_menu; ?>"></i><span><?php echo $descricao_menu; ?></span><b class="caret"></b></a>
   
         <?PHP 
          $sql4 = "SELECT * FROM `submenu` WHERE (`nivel_submenu` <= '".$plano."') and (`menu_submenu` = '".$id_menu."') and (`status_submenu` = '".$ativo."') ORDER BY ordem_submenu"; 
    $retorno4 = mysqli_query ($mysqli , $sql4) or die (mysql_error());
   if (mysqli_num_rows($retorno4) == 0 ) {
       }else {
           ?>  <ul class="dropdown-menu">
               <?php
    while ($lista4 = mysqli_fetch_array ($retorno4)) {
        
          $descricao_submenu = $lista4['descricao_submenu'];
          $link_submenu = $lista4['link_submenu'];
          ?>
     
            <li><a href="<?php echo $link_submenu; ?>"><?php echo $descricao_submenu; ?></a></li>
       
            <?php } ?>
         
            </ul>
            <?php } ?>
        </li>
        <?php } ?>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div><br>
    <!-- End Header Top Area -->

    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                <div class="alert alert-info" role="alert">
                        <ul>
                            <li><a href="index.php">Home </a>/ <a href="pestel.php">Análise Pestel </a>/ Novo</li>
                            
                        </ul>      
                        
                </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area Start-->
	<div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<div class="breadcomb-wp">
									
									<div class="breadcomb-ctn">
										<h2>Análise Pestel</h2>
								
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <form id="form" name="form" method="post" action="gravaredicao_pestel.php">
     					    	
            
                               
                    
                               
                                  
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Breadcomb area End-->
         <!-- Data Table area Start-->
        
         <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Coloque um título para sua Ferramenta Análise Pestel: 
                            </h2><br>
                            
                            <input type="hidden" class="form-control" id="id_pestel" name="id_pestel"  value="<?php echo $id_pestel; ?>"><br>
     
                    <input type="text" class="form-control" id="titulo_pestel" name="titulo_pestel" placeholder="Preencha um título para identificar sua análise Pestel" value="<?php echo $titulo_pestel; ?>"><br>
     
            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>



          <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>P - Fatores Políticos 
                            </h2>
                            Fatores Políticos: referem-se ao grau de intervenção do governo na economia. Aqui podemos incluir questões referentes aos regulamentos específicos do setor impostos pelo governo.
                            <br>                            <br>
                            <div id="formulario">
                             <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">POLÍTICAS GOVERNAMENTAIS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Ppoliticas_pestel" name="Ppoliticas_pestel" rows="2" placeholder="A política governamental nos âmbitos Federal, Estadual ou Municipal tem interferido no seu setor?"><?php echo $Ppoliticas_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">ELEIÇÕES E TENDÊNCIAS POLÍTICAS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Peleicoes_pestel" name="Peleicoes_pestel" rows="2" placeholder="O que muda em caso de troca de governo na eleição próxima? Se o atual governo permanecer, existe tendência de melhora ou piora?"><?php echo $Peleicoes_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">MUDANÇA DE GOVERNO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Pgoverno_pestel" name="Pgoverno_pestel" rows="2" placeholder="Em caso de mudança de governo na próxima eleição, como a empresa pode se beneficiar com isso?"><?php echo $Pgoverno_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">POLÍTICAS DE NEGOCIAÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Pnegociacao_pestel" name="Pnegociacao_pestel" rows="2" placeholder="Como o governo aborda a relação com empresas e como a empresa pode se beneficiar disso?"><?php echo $Pnegociacao_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">FINANCIAMENTO, BOLSAS E INICIATIVAS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Pfinanciamento_pestel" name="Pfinanciamento_pestel" rows="2" placeholder="Quais parcerias a empresa pode fazer para independente do cenário que se desenhar, crescer a atingir mais setores da sociaedade?"><?php echo $Pfinanciamento_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">GUERRAS, TERRORISMO E CONFLITOS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Pguerras_pestel" name="Pguerras_pestel" rows="2" placeholder="Caso ocorrem conflitos fora do controle da empresa, o que ela pode fazer para se proteger?"><?php echo $Pguerras_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PROBLEMAS POLÍTICOS INTERNOS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Pinternos_pestel" name="Pinternos_pestel" rows="2" placeholder="Caso ocorrem conflitos internos como recessão, crise política e outros, em virtude de problemas políticos internos e fora do controle da empresa, o que ela pode fazer para se proteger?"><?php echo $Pinternos_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">RELAÇÕES ENTRE PAÍSES:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Prelacao_pestel" name="Prelacao_pestel" rows="2" placeholder="Para seu segmento de negócio, existe dependência, seja na compra ou na venda, com outros países? Como sua empresa pode se blindar contra isso?"><?php echo $Prelacao_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">CORRUPÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Pcorrupcao_pestel" name="Pcorrupcao_pestel" rows="2" placeholder="Com respeito aos governos Federal, Estadual e Municipal, de zero a 10, qual o nível de corrupção e como isso afeta o dia a dia da empresa?"><?php echo $Pcorrupcao_pestel; ?></textarea>
                    <br>
                                                    </div>
                                                  
                                                </div>


                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            
                                                                                            








                          </div>
                              </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>E - Fatores Econômicos 
                            </h2>
                            Fatores Econômicos: incluem taxa de inflação, taxa de câmbio, taxa de juros, taxa de emprego/desemprego e outros indicadores de crescimento econômico. Os fatores econômicos enfrentados por uma organização têm um impacto significativo na forma como uma empresa transportará suas operações no futuro.     <br><br>
                            <div id="formulario">
                             <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">ECONOMIA LOCAL:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Eeconomia_pestel" name="Eeconomia_pestel" rows="2" placeholder="Qual a condição da economia local neste momento e qual a dependência da empresa em relação a economia local neste momento?"><?php echo $Eeconomia_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TRIBUTAÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Etributacao_pestel" name="Etributacao_pestel" rows="2" placeholder="A empresa tem dado a devida atenção a gestão tributária no momento? Quais são os desafios e oportunidades?"><?php echo $Etributacao_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">INFLAÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Einflacao_pestel" name="Einflacao_pestel" rows="2" placeholder="O país vive um cenário de inflação neste momento? O que a empresa tem feito para enfrentar este problema?"><?php echo $Einflacao_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">JUROS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Ejuros_pestel" name="Ejuros_pestel" rows="2" placeholder="Existe um cenário de alta de Juros neste momento? O que a empresa tem feito para enfrentar este problema?"><?php echo $Ejuros_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TENDÊNCIAS ECONÔMICAS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Etendencias_pestel" name="Etendencias_pestel" rows="2" placeholder="Quais são as tendências para a economia neste momento?"><?php echo $Etendencias_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PROBLEMAS SAZONAIS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Esazonais_pestel" name="Esazonais_pestel" rows="2" placeholder="A empresa sofre com sazonalidade? O que tem feito para fugir deste problema?"><?php echo $Esazonais_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">CRESCIMENTO DA INDÚSTRIA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Eindustria_pestel" name="Eindustria_pestel" rows="2" placeholder="No momento atual as indústrias estão crescendo ou em rescessão?"><?php echo $Eindustria_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TAXAS DE IMPORTAÇÃO / EXPORTAÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Eimportacao_pestel" name="Eimportacao_pestel" rows="2" placeholder="Quais são as taxas de importação / exportação para o segmento da empresa e para o país neste momento?"><?php echo $Eimportacao_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">COMÉRCIO INTERNACIONAL:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Ecomercio_pestel" name="Ecomercio_pestel" rows="2" placeholder="O país tem adotado uma postura protecionista ou liberal em relação ao comércio com outros países.?"><?php echo $Ecomercio_pestel; ?></textarea>
                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TAXAS DE CÂMBIO INTERNACIONAIS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Ecambio_pestel" name="Ecambio_pestel" rows="2" placeholder="Quais são as taxas de câmbio utilizadas atualmente? Essas taxas atraem concorrentes para o meu mercado ou afastam novos concorrentes externos?"><?php echo $Ecambio_pestel; ?></textarea>
                    <br>
                                                    </div>
                                                  
                                                </div>

                                                
                          </div>
                              </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>S - Fatores Sociais 
                            </h2>Fatores Sociais: incluem diferentes aspectos culturais e demográficos da sociedade que formam o macroambiente da organização. Aqui falamos de distribuição etária, população e sua taxa de crescimento, consciência de saúde e consciência de segurança. <br><br>
                            <div id="formulario">
                             <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TAXA DE CRESCIMENTO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Staxa_pestel" name="Staxa_pestel" rows="2" placeholder="Qual a taxa de crescimento atual do país? Seu público possui uma faixa etária específica? Essa faixa etária está em crescimento?"><?php echo $Staxa_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">MUDANÇAS DE GERAÇÕES:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Sgeracoes_pestel" name="Sgeracoes_pestel" rows="2" placeholder="Com a mudança nas gerações, o consumo do seu produto está aumentando ou diminuindo?"><?php echo $Sgeracoes_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TENDÊNCIAS DE ESTILO DE VIDA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Sestilo_pestel" name="Sestilo_pestel" rows="2" placeholder="O estilo de vida atual das pessoas é um incentivador para o uso / compra dos seus produtos ou não?"><?php echo $Sestilo_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TABUS CULTURAIS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Stabus_pestel" name="Stabus_pestel" rows="2" placeholder="Existe algum tabu ou resistência na sociedade que impede ou restringe o uso do seu produto?"><?php echo $Stabus_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">ATRIBUTOS OU OPINIÕES DE CONSUMIDORES:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Sconsumidores" name="Sconsumidores" rows="2" placeholder="Qual a opinião dos consumidores sobre os seus produtos? Sua empresa possui um canal direto onde os clientes podem expressar suas opiniões ou dar sugestões?"><?php echo $Sconsumidores_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PADRÕES DE COMPRA DO CONSUMIDOR:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Spadrao_pestel" name="Spadrao_pestel" rows="2" placeholder="Qual o padrão de compra do seu consumidor? A empresa possui isso mapeado?"><?php echo $Spadrao_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PROBLEMAS ÉTICOS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Seticos_pestel" name="Seticos_pestel" rows="2" placeholder="Existe algum problema ético na comercialização dos seus produtos?"><?php echo $Seticos_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>

                          </div>
                              </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>T - Fatores Tecnológicos 
                            </h2>Fatores Tecnológicos: a tecnologia evolui a um ritmo acelerado, o que faz com que empresas precisem estar atualizadas a essas mudanças. Neste item são incluídos fatores como mudanças tecnológicas, taxa de obsolescência, automação e, claro, inovação. <br><br>
                            <div id="formulario">
                             <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TECNOLOGIAS EMERGENTES:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Temergentes_pestel" name="Temergentes_pestel" rows="2" placeholder="Existe alguma tecnologia atual que influencia nos seus resultados?"><?php echo $Temergentes_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">MATURIDADE DA TECNOLOGIA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Tmaturidade_pestel" name="Tmaturidade_pestel" rows="2" placeholder="É necessário alguma tecnologia para que você consiga performar no seu negócio? Qual o nível de investimento que sua empresa fez nesta tecnologia?"><?php echo $Tmaturidade_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">LEGISLAÇÃO TECNOLÓGICA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Tlegislacao_pestel" name="Tlegislacao_pestel" rows="2" placeholder="Existe uma legislação que regule especificamente as tecnlogias usadas em sua empresa?"><?php echo $Tlegislacao_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PESQUISA DE INOVAÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Tinovacao_pestel" name="Tinovacao_pestel" rows="2" placeholder="Sua empresa realiza algum tipo de pesquisa em inovação?"><?php echo $Tinovacao_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">INFORMAÇÃO E COMUNICAÇÕES:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Tinformacoes_pestel" name="Tinformacoes_pestel" rows="2" placeholder="Existe algum tipo de informação importante ou fonte que você não consegue ter acesso e que prejudica sua performance empresarial?"><?php echo $Tinformacoes_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">DESENVOLVIMENTO DE TECNOLOGIA CONCORRENTE:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Tdesenvolvimento_pestel" name="Tdesenvolvimento_pestel" rows="2" placeholder="Seus concorrentes possuem ou têm desenvolvido alguma tecnlogia que você não tem?"><?php echo $Tdesenvolvimento_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PROBLEMAS DE PROPRIEDADE INTELECTUAL:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Tintelectual_pestel" name="Tintelectual_pestel" rows="2" placeholder="Suas inovações possuem registro de INPI? Seus concorrentes possuem inovações com registro de INPI que você não consegue utilizar por alguma razão?"><?php echo $Tintelectual_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>

                                             
                          </div>
                              </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>E - Fatores Ambientais 
                            </h2>Fatores ambientais: dizem respeito à influência do meio ambiente e o impacto dos aspectos ecológicos. Com o aumento da importância da RSE (Responsabilidade Social Empresarial), fatores ambientais tornam-se cada vez mais importantes.<br><br>
                            <div id="formulario">
                             <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">REGULAÇÕES AMBIENTAIS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Fregulamentos_pestel" name="Fregulamentos_pestel" rows="2" placeholder="Existe alguma Regulação ambiental que prejudica o crescimento do seu negócio?"><?php echo $Fregulamentos_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">REDUÇÃO DA PEGADA DE CARBONO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Freducao_pestel" name="Freducao_pestel" rows="2" placeholder="Sua empresa ou concorrentes possuem alguma iniciativa de redução de pegadas de carbono?"><?php echo $Freducao_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">SUSTENTABILIDADE:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Fsustentabilidade_pestel" name="Fsustentabilidade_pestel" rows="2" placeholder="Sua empresa ou concorrentes possuem alguma iniciativa ou programa visando sustentabilidade?"><?php echo $Fsustentabilidade_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">GESTÃO DE RESÍDUOS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Fresiduos_pestel" name="Fresiduos_pestel" rows="2" placeholder="Sua empresa ou concorrentes possuem alguma ação em Gestão de Resíduos?"><?php echo $Fresiduos_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">POLUIÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Fpoluicao_pestel" name="Fpoluicao_pestel" rows="2" placeholder="Sua empresa ou concorrentes possuem algum programa visando a redução dos níveis de poluição?"><?php echo $Fpoluicao_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                


                          </div>
                              </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>L - Fatores Legais 
                            </h2>Fatores legais: qualquer empresa, independente do porte, deve entender o que é legal e permitido nos territórios em que atuam. Além disso, é necessário estar ciente de qualquer alteração na legislação e o impacto que isso possa ter sobre as operações comerciais e financeiras, especialmente porque novas leis podem significar aumento de imposto, o que impacta no orçamento empresarial. <br><br>
                            <div id="formulario">
                             <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">LEGISLAÇÃO ATUAL:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Llegislacao_pestel" name="Llegislacao_pestel" rows="2" placeholder="Em relação a legislação atual, ela favorece a comercialização dos produtos ou não?"><?php echo $Llegislacao_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">LEGISLAÇÃO FUTURA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Lfutura_pestel" name="Lfutura_pestel" rows="2" placeholder="Existe algum projeto de lei ou lei em tramitação que favorece ou desfavorece a comercialização dos seus produtos?"><?php echo $Lfutura_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">LEGISLAÇÃO INTERNACIONAL:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Linternacional_pestel" name="Linternacional_pestel" rows="2" placeholder="Existe alguma legislação internacional que favorece ou prejudica seu negócio?"><?php echo $Linternacional_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">ÓRGÃOS E PROCESSOS REGULATÓRIOS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Lregulatorios_pestel" name="Lregulatorios_pestel" rows="2" placeholder="Existe órgãos ou processos regulatórios que dificultam o seu negócio de uma maneira geral? Como os seus concorrentes lidam com isso?"><?php echo $Lregulatorios_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">LEI TRABALHISTA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Ltrabalhista_pestel" name="Ltrabalhista_pestel" rows="2" placeholder="Como sua empresa e concorrentes lidam com as leis trabalhistas?"><?php echo $Ltrabalhista_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PROTEÇÃO DO CONSUMIDOR:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Lprotecao_pestel" name="Lprotecao_pestel" rows="2" placeholder="Como sua empresa e concorrentes lidam com as leis de proteção ao consumidor?"><?php echo $Lprotecao_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">NORMAS DE SAÚDE E SEGURANÇA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Lnormas_pestel" name="Lnormas_pestel" rows="2" placeholder="Como sua empresa e concorrentes lidam com as normas de saúde e segurança?"><?php echo $Lnormas_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">REGULAMENTOS FISCAIS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Lfiscais_pestel" name="Lfiscais_pestel" rows="2" placeholder="Sua empresa e concorrentes enfrentam fiscalizações frequentemente? Como lidam com isso?"><?php echo $Lfiscais_pestel; ?></textarea>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">NORMAS ESPECÍFICAS DA INDÚSTRIA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <textarea type="text" class="form-control" id="Lindustria_pestel" name="Lindustria_pestel" rows="2" placeholder="Sua empresa é indústria? Caso seja, existe alguma legislação específica que precisa seguir? Existe algum programa de qualidade?"><?php echo $Lindustria_pestel; ?></textarea>
                    <br>
                                                    </div>
                                                  
                                                </div>


                          </div>
                              </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
   
  <br>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>OBSERVAÇÕES DO CONSULTOR: 
                            </h2><br>
                            
               
                      <textarea type="text" class="form-control" id="resumo_pestes" name="resumo_pestel" rows="5" placeholder="Observações do Consultor"><?php echo $resumo_pestel; ?></textarea>
                      <br><br> 
                                         <a href="gravaredicao_pestel.php"><button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
         
        <i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button></a>
                                        <a href="pestel.php"> <button class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home1()">
          <i class="notika-icon notika-close"><font face="arial" size="2">  Cancelar  </font></i></button></a>
                  
          </form>
   
            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
   
    <!-- Data Table area End-->
    <br><br><br><br><br><br>
     <!-- Start Footer area-->
    <footer class="footer navbar-fixed-bottom">
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2022. Todos os direitos reservados para Sistema Integrado de Consultoria</p>
                    </div>
                </div>
            </div>
        </div>
    </div></footer>
    <!-- End Footer area-->
   
    
    <!-- jquery
		============================================ -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="js/counterup/jquery.counterup.min.js"></script>
    <script src="js/counterup/waypoints.min.js"></script>
    <script src="js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="js/sparkline/jquery.sparkline.min.js"></script>
    <script src="js/sparkline/sparkline-active.js"></script>
    <!-- flot JS
		============================================ -->
    <script src="js/flot/jquery.flot.js"></script>
    <script src="js/flot/jquery.flot.resize.js"></script>
    <script src="js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="js/knob/jquery.knob.js"></script>
    <script src="js/knob/jquery.appear.js"></script>
    <script src="js/knob/knob-active.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
	<!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- Data Table JS
		============================================ -->
    <script src="js/data-table/jquery.dataTables.min.js"></script>
    <script src="js/data-table/data-table-act.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
  
</body>

</html>