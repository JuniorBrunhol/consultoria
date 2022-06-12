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
    $data_pestel = $lista['data_pestel'];
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

    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                <div class="alert alert-info" role="alert">
                        <ul>
                            <li><a href="index.php">Home </a>/ <a href="pestel.php">Análise Pestel </a>/ Visualizar</li>
                            
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
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									
									<div class="breadcomb-ctn">
										<h2>Analise Pestel</h2>
										<p>Criado em <i><?php echo date('d/m/Y',  strtotime($data_pestel)); ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
                <a href="editar_pestel.php?id=<?php echo $id_pestel;?>">	<button data-toggle="tooltip" data-placement="left" title="Editar Análise Pestel" class="btn" ><i class="notika-icon notika-left-arrow"></i></button></a>
                <a href="pdf-visualiza_pestel.php?id=<?php echo $id_pestel;?>">	<button data-toggle="tooltip" data-placement="left" title="Download Análise Pestel" class="btn"><i class="notika-icon notika-sent"></i></button></a>
								</div>
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
                            <h2>Título Análise Pestel: 
                            </h2>
                            
               
                    <?php echo $titulo_pestel; ?>
     
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
                                                        
                                                    <?php echo $Ppoliticas_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">ELEIÇÕES E TENDÊNCIAS POLÍTICAS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                  <?php echo $Peleicoes_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">MUDANÇA DE GOVERNO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Pgoverno_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">POLÍTICAS DE NEGOCIAÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                   <?php echo $Pnegociacao_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">FINANCIAMENTO, BOLSAS E INICIATIVAS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                  <?php echo $Pfinanciamento_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">GUERRAS, TERRORISMO E CONFLITOS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Pguerras_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PROBLEMAS POLÍTICOS INTERNOS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Pinternos_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">RELAÇÕES ENTRE PAÍSES:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Prelacao_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">CORRUPÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Pcorrupcao_pestel; ?>
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
                                                        
                                                    <?php echo $Eeconomia_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TRIBUTAÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Etributacao_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">INFLAÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Einflacao_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">JUROS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Ejuros_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TENDÊNCIAS ECONÔMICAS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                 <?php echo $Etendencias_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PROBLEMAS SAZONAIS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Esazonais_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">CRESCIMENTO DA INDÚSTRIA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Eindustria_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TAXAS DE IMPORTAÇÃO / EXPORTAÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                  <?php echo $Eimportacao_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">COMÉRCIO INTERNACIONAL:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                   <?php echo $Ecomercio_pestel; ?>
                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TAXAS DE CÂMBIO INTERNACIONAIS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                   <?php echo $Ecambio_pestel; ?>
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
                                                        
                                                   <?php echo $Staxa_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">MUDANÇAS DE GERAÇÕES:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Sgeracoes_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TENDÊNCIAS DE ESTILO DE VIDA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Sestilo_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">TABUS CULTURAIS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Stabus_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">ATRIBUTOS OU OPINIÕES DE CONSUMIDORES:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Sconsumidores_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PADRÕES DE COMPRA DO CONSUMIDOR:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Spadrao_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PROBLEMAS ÉTICOS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Seticos_pestel; ?>
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
                                                        
                                                    <?php echo $Temergentes_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">MATURIDADE DA TECNOLOGIA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Tmaturidade_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">LEGISLAÇÃO TECNOLÓGICA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                   <?php echo $Tlegislacao_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PESQUISA DE INOVAÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Tinovacao_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">INFORMAÇÃO E COMUNICAÇÕES:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Tinformacoes_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">DESENVOLVIMENTO DE TECNOLOGIA CONCORRENTE:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Tdesenvolvimento_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PROBLEMAS DE PROPRIEDADE INTELECTUAL:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Tintelectual_pestel; ?>
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
                                                        
                                                    <?php echo $Fregulamentos_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">REDUÇÃO DA PEGADA DE CARBONO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Freducao_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">SUSTENTABILIDADE:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        <?php echo $Fsustentabilidade_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">GESTÃO DE RESÍDUOS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Fresiduos_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">POLUIÇÃO:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Fpoluicao_pestel; ?>
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
                                                        
                                                    <?php echo $Llegislacao_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">LEGISLAÇÃO FUTURA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Lfutura_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">LEGISLAÇÃO INTERNACIONAL:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Linternacional_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">ÓRGÃOS E PROCESSOS REGULATÓRIOS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Lregulatorios_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">LEI TRABALHISTA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Ltrabalhista_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">PROTEÇÃO DO CONSUMIDOR:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Lprotecao_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">NORMAS DE SAÚDE E SEGURANÇA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Lnormas_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">REGULAMENTOS FISCAIS:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Lfiscais_pestel; ?>
                                                    <br>
                                                    </div>
                                                  
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                        <label class="hrzn-fm">NORMAS ESPECÍFICAS DA INDÚSTRIA:</label>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                                        
                                                    <?php echo $Lindustria_pestel; ?>
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
                            </h2>
                            
               
                      <?php echo $resumo_pestel; ?>
                      <br><br> 
                      
            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
   
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