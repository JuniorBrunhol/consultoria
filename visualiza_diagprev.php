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



  $sql = "SELECT * FROM `diagprev` WHERE (`id_diagprev` =  '".$pesquisa_diagprev."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
   while ($lista = mysqli_fetch_assoc ($retorno)) {
    $id_diagprev = str_replace('<br />', "\n", $lista['id_diagprev']);
    $data_diagprev = $lista['data_diagprev'];
    $titulo_diagprev = str_replace('<br />', "\n", $lista['titulo_diagprev']);
    $contato_diagprev = str_replace('<br />', "\n", $lista['contato_diagprev']);
    $cargo_diagprev = str_replace('<br />', "\n", $lista['cargo_diagprev']);
    $segmento_diagprev = str_replace('<br />', "\n", $lista['segmento_diagprev']);
    $comercio_diagprev = str_replace('<br />', "\n", $lista['comercio_diagprev']);
    $industria_diagprev = str_replace('<br />', "\n", $lista['industria_diagprev']);
    $servico_diagprev = str_replace('<br />', "\n", $lista['servico_diagprev']);
    $qtdefuncionariosatual_diagprev = str_replace('<br />', "\n", $lista['qtdefuncionariosatual_diagprev']);
    $qtdefuncionariospico_diagprev = str_replace('<br />', "\n", $lista['qtdefuncionariospico_diagprev']);
    $porte_diagprev = str_replace('<br />', "\n", $lista['porte_diagprev']);
    $areaconstruida_diagprev = str_replace('<br />', "\n", $lista['areaconstruida_diagprev']);
    $marca_diagprev = str_replace('<br />', "\n", $lista['marca_diagprev']);
    $origemreceita_diagprev = str_replace('<br />', "\n", $lista['origemreceita_diagprev']);
    $custosfixos_diagprev = str_replace('<br />', "\n", $lista['custosfixos_diagprev']);
    $custosvariaveis_diagprev = str_replace('<br />', "\n", $lista['custosvariaveis_diagprev']);
    $margemlucro_diagprev = str_replace('<br />', "\n", $lista['margemlucro_diagprev']);
    $individamento_diagprev = str_replace('<br />', "\n", $lista['individamento_diagprev']);
    $faturamento_diagprev = str_replace('<br />', "\n", $lista['faturamento_diagprev']);
    $sazonalidade_diagprev = str_replace('<br />', "\n", $lista['sazonalidade_diagprev']);
    $publicoalvo_diagprev = str_replace('<br />', "\n", $lista['publicoalvo_diagprev']);
    $concorrentes_diagprev = str_replace('<br />', "\n", $lista['concorrentes_diagprev']);
    $corebusiness_diagprev = str_replace('<br />', "\n", $lista['corebusiness_diagprev']);
    $publicidade_diagprev = str_replace('<br />', "\n", $lista['publicidade_diagprev']);
    $midiassociais_diagprev = str_replace('<br />', "\n", $lista['midiassociais_diagprev']);
    $ecommerce_diagprev = str_replace('<br />', "\n", $lista['ecommerce_diagprev']);
    $folhapagamento_diagprev = str_replace('<br />', "\n", $lista['folhapagamento_diagprev']);
    $tempomedio_diagprev = str_replace('<br />', "\n", $lista['tempomedio_diagprev']);
    $liderancacomum_diagprev = str_replace('<br />', "\n", $lista['liderancacomum_diagprev']);
    $turnover_diagprev = str_replace('<br />', "\n", $lista['turnover_diagprev']);
    $clima_diagprev = str_replace('<br />', "\n", $lista['clima_diagprev']);
    $recrutamento_diagprev = str_replace('<br />', "\n", $lista['recrutamento_diagprev']);
    $horasextras_diagprev = str_replace('<br />', "\n", $lista['horasextras_diagprev']);
    $legalizacao_diagprev = str_replace('<br />', "\n", $lista['legalizacao_diagprev']);
    $logistica_diagprev = str_replace('<br />', "\n", $lista['logistica_diagprev']);
    $estoque_diagprev = str_replace('<br />', "\n", $lista['estoque_diagprev']);
    $armazenagem_diagprev = str_replace('<br />', "\n", $lista['armazenagem_diagprev']);
    $processos_diagprev = str_replace('<br />', "\n", $lista['processos_diagprev']);
    $tempomediofornecedor_diagprev = str_replace('<br />', "\n", $lista['tempomediofornecedor_diagprev']);
    $tempomediocliente_diagprev = str_replace('<br />', "\n", $lista['tempomediocliente_diagprev']);
    $frota_diagprev = str_replace('<br />', "\n", $lista['frota_diagprev']);
    $equipamentos_diagprev = str_replace('<br />', "\n", $lista['equipamentos_diagprev']);
    $licencas_diagprev = str_replace('<br />', "\n", $lista['licencas_diagprev']);
    $erp_diagprev = str_replace('<br />', "\n", $lista['erp_diagprev']);
    $nivelsenha_diagprev = str_replace('<br />', "\n", $lista['nivelsenha_diagprev']);
    $lgpd_diagprev = str_replace('<br />', "\n", $lista['lgpd_diagprev']);
    $sistemasuporte_diagprev = str_replace('<br />', "\n", $lista['sistemasuporte_diagprev']);
    $crm_diagprev = str_replace('<br />', "\n", $lista['crm_diagprev']);
    $parceriascomerciais_diagprev = str_replace('<br />', "\n", $lista['parceriascomerciais_diagprev']);
    $parceriassociais_diagprev = str_replace('<br />', "\n", $lista['parceriassociais_diagprev']);
    $terceirizados_diagprev = str_replace('<br />', "\n", $lista['terceirizados_diagprev']);
    $programassociais_diagprev = str_replace('<br />', "\n", $lista['programassociais_diagprev']);
    $sac_diagprev = str_replace('<br />', "\n", $lista['sac_diagprev']);
    $desafiosinternos_diagprev = str_replace('<br />', "\n", $lista['desafiosinternos_diagprev']);
    $desafiosexternos_diagprev = str_replace('<br />', "\n", $lista['desafiosexternos_diagprev']);
    $rivalidadeconcorrentes_diagprev = str_replace('<br />', "\n", $lista['rivalidadeconcorrentes_diagprev']);
    $processos2_diagprev = str_replace('<br />', "\n", $lista['processos2_diagprev']);
    $rotinas_diagprev = str_replace('<br />', "\n", $lista['rotinas_diagprev']);
    $reunioes_diagprev = str_replace('<br />', "\n", $lista['reunioes_diagprev']);
    $kpisestabelecidos_diagprev = str_replace('<br />', "\n", $lista['kpisestabelecidos_diagprev']);
    $metascurto_diagprev = str_replace('<br />', "\n", $lista['metascurto_diagprev']);
    $metasmedio_diagprev = str_replace('<br />', "\n", $lista['metasmedio_diagprev']);
    $metaslongo_diagprev = str_replace('<br />', "\n", $lista['metaslongo_diagprev']);
    $avaliacaoconsultor_diagprev = str_replace('<br />', "\n", $lista['avaliacaoconsultor_diagprev']);
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
                            <li><a href="index.php">Home </a>/ <a href="diagprev.php">Diagnóstico Empresarial</a>/ Visualizar</li>
                            
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
							<div class="col-lg-10 col-md-9 col-sm-9 col-xs-9">
								<div class="breadcomb-wp">
									
									<div class="breadcomb-ctn">
										<h2>Visualizar Diagnóstico Empresarial</h2>
										<p>Criado em <i><?php echo date('d/m/Y',  strtotime($data_diagprev)); ?></i> .</p>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3">
        		<a href="editar_diagprev.php?id=<?php echo  $pesquisa_diagprev;?>"><button data-toggle="tooltip" data-placement="left" title="Editar Proposta" class="btn"><i class="notika-icon notika-left-arrow"></i></button></a>
    
            <a href="pdf-visualiza_diagprev.php?id=<?php echo  $pesquisa_diagprev;?>">	  <button data-toggle="tooltip" data-placement="left" title="Download arquivo" class="btn"><i class="notika-icon notika-sent"></i></button></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Breadcomb area End-->
         <!-- Data Table area Start-->
        
       
        <!-- Data Table area Start-->
        <form id="form" name="form" method="post" action="gravaredicao_diagprev.php">  
         <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                        <h2>DIAGNÓSTICO EMPRESARIAL</h2>
                        <label class="hrzn-fm">TÍTULO:</label>
                            
               
                  <?php echo $titulo_diagprev; ?>
            
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
                            <h2>DADOS GERAIS
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  


              
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CONTATO NA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <?php echo $contato_diagprev; ?> 
                               
                                    </div>
                                    </div>
                                
                      
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CARGO:</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                     
<?php echo $cargo_diagprev; ?> <br>
                         
                                    </div>
                                </div>
                                <br>
                      
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">SEGMENTO DA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <STRONG><I>Em qual o segmento a empresa atua?</I></STRONG><BR>
                              <?php echo $segmento_diagprev; ?>
                      
                                    </div>
                                </div>
                     
                                 
 
 
<br>
<div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PORTE DA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <STRONG><I>Qual o porte da empresa atualmente?</I></STRONG><BR>
                                    <?php echo $porte_diagprev; ?> 
                                 
                                    </div>  </div>
                                
    <br>                  
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">ÁREA CONSTRUÍDA:</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <STRONG><I>Qual o tamanho de área construída onde a empresa está situada? Se tiver filiais, qual a metragem total?</I></STRONG><BR>
                                   <?php echo $areaconstruida_diagprev; ?>
                                    </div>  </div>
        <br>                        
                      
                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">MARCA REGISTRADA?:</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <STRONG><I>A marca da empresa está registrada junto ao INPI?</I></STRONG><BR>
                                    <?php echo $marca_diagprev; ?>
                                    </div>
                                </div>
<br>
<div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TIPO DE OPERAÇÃO DA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <STRONG><I>Qual o tipo de operação da empresa?</I></STRONG><BR>
                                   <STRONG> COMÉRCIO: </STRONG>  <?php echo $comercio_diagprev; ?><BR>
                                   <STRONG>INDÚSTRIA:  </STRONG> <?php echo $industria_diagprev; ?><BR>
                                   <STRONG>SERVIÇO:   </STRONG> <?php echo $servico_diagprev; ?>
                                    
                                 
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
                            <h2>FINANÇAS 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">FONTES DE RECEITA:</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <STRONG><I>As receitas da empresa são oriundas de quais atividades?</I></STRONG><BR>
                                   <?php echo $origemreceita_diagprev; ?>

               
                                    </div>
                                </div><BR>

                                <div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CUSTOS FIXOS DA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <STRONG><I>Quais são os custos fixos da empresa?</I></STRONG><BR>
                                   <?php echo $custosfixos_diagprev; ?>

               
                                    </div>
                                </div>
                             

                                <BR>
 
 
<div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CUSTOS VARIÁVEIS DA EMPRESA:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Quais são os custos da empresa?</I></STRONG><BR>
                                 <?php echo $custosvariaveis_diagprev; ?>

               
                                    </div>
                                </div><br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">MARGEM DE CONTRIBUIÇÃO DA EMPRESA:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Qual a margem de contribuição da empresa?</I></STRONG><BR>
                                   <?php echo $margemlucro_diagprev; ?>

               
                                    </div></div> <br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">INDIVIDAMENTO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Qual o percentual de individamento da empresa?</I></STRONG><BR>
                                    <?php echo $individamento_diagprev; ?>

               
                                    </div>
                                </div><br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">FATURAMENTO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Qual o faturamento mensal e anual da empresa?</I></STRONG><BR>
                                  <?php echo $faturamento_diagprev; ?>

               
                                    </div>
                                </div><br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">SAZONALIDADE:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A empresa possui sazonalidades durante o ano?</I></STRONG><BR>
                                    <?php echo $sazonalidade_diagprev; ?>

               
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
                            <h2>COMERCIAL 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PÚBLICO ALVO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Qual o público alvo da empresa?</I></STRONG><BR>
                                    <?php echo $publicoalvo_diagprev; ?>

               
                                    </div>
                                </div><BR>

                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CONCORRENTES:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Quais são os principais concorrentes da empresa?</I></STRONG><BR>
                                   <?php echo $concorrentes_diagprev; ?>

               
                                    </div>
                                </div><br>
<div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">RIVALIDADE COM CONCORRENTES:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Como é a relação com os concorrentes da empresa?</I></STRONG><BR>
                                <?php echo $rivalidadeconcorrentes_diagprev; ?>

               
                                    </div>
                                </div><br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CORE BUSINESS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Quais são os produtos ou serviços "carro chefe" da empresa atualmente?</I></STRONG><BR>
                                    <?php echo $corebusiness_diagprev; ?>

               
                                    </div>
                                </div><br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PUBLICIDADE:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Como fé feito a publicidade da empresa?</I></STRONG><BR>
                                    <?php echo $publicidade_diagprev; ?>

               
                                    </div>
                                </div><br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">MÍDIAS SOCIAIS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Como são feitas e por quem são feitas as mídias sociais da empresa?</I></STRONG><BR>
                                    <?php echo $midiassociais_diagprev; ?>

               
                                    </div>
                                </div><br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">E-COMMERCE:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A empresa já vende pela internet?</I></STRONG><BR>
                                    <?php echo $ecommerce_diagprev; ?>

               
                                    </div>
                                </div><br>
                                 
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">SAC:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A empresa possui um canal direto de Serviço de Atendimento ao Consumidor?</I></STRONG><BR>
                                    <?php echo $sac_diagprev; ?>

               
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
                            <h2>RECURSOS HUMANOS 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">COLABORADORES:</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <STRONG><I>Quantos colaboradores a empresa tem atualmente?</I></STRONG><BR>
                                    <?php echo $qtdefuncionariosatual_diagprev; ?>
                                    </div></DIV><br><div class="row">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">QTDE COLABORADORES (PICO):</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                    <STRONG><I>Qual foi a maior quantidade que a empresa teve de funcionários até hoje?</I></STRONG><BR>
                                    <?php echo $qtdefuncionariospico_diagprev; ?>
                                    </div>
                                </div><br>
                                
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TERCEIRIZAÇÃO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A empresa possui profissionais terceirizados prestando serviço neste momento?</I></STRONG><BR>
                                    <?php echo $terceirizados_diagprev; ?>

               
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">FOLHA DE PAGAMENTO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Qual o valor atual da folha de pagamento da empresa?</I></STRONG><BR>
                                   <?php echo $folhapagamento_diagprev; ?>

               
                                    </div>
                                </div>
                                <br>                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">% DE SALÁRIO BASE X LIDERANÇA:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Quanto desta folha de pagamento é destinado para liderança e para profissionais de base?</I></STRONG><BR>
                                    <?php echo $liderancacomum_diagprev; ?>"


               
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEMPO MÉDIO DE CASA:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Qual o tempo médio de casa dos colaboradores atualmente?</I></STRONG><BR>
                                    <?php echo $tempomedio_diagprev; ?>

               
                                    </div>
                                </div>
                                <br>                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TURNOVER:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Qual o percentual de Turnover nos últimos 12 meses?</I></STRONG><BR>
                                    <?php echo $turnover_diagprev; ?>

               
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CLIMA ORGANIZACIONAL:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Como é o clima organizacional da empresa?</I></STRONG><BR>
                                    <?php echo $clima_diagprev; ?>

               
                                    </div>
                                </div>
                                <br><div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">RECRUTAMENTO E SELEÇÃO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Como é realizado o processo de Recrutamento e Seleção na empresa?</I></STRONG><BR>
                                    <?php echo $recrutamento_diagprev; ?>

               
                                    </div>
                                </div>
                                <br><div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">HORAS EXTRAS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Como funciona o processo de pagamento de horas extras na empresa?</I></STRONG><BR>
                                    <?php echo $horasextras_diagprev; ?>

               
                                    </div>
                                </div><br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">LEGALIZAÇÃO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Todos os colaboradores na empresa estão devidamente legalizados?</I></STRONG><BR>
                                    <?php echo $legalizacao_diagprev; ?>

               
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
                            <h2>LOGÍSTICA 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">FROTA:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A Frota é própria ou alugada? Quantos veículos têm no momento?</I></STRONG><BR>    
                                    <?php echo $frota_diagprev; ?>
                                    

                                 
                                    </div></DIV><BR><div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PROCESSO LOGÍSTICO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Como funciona o processo logístico desde a venda até a entrega no cliente?</I></STRONG><BR>    
                          
                         <?php echo $logistica_diagprev; ?>

                                    </div>
                                </div>
                                <br><div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEMPO MÉDIO ENTREGA CLIENTE:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Qual o tempo médio de entrega para um cliente atualmente?</I></STRONG><BR>    
                         
                                    <?php echo $tempomediocliente_diagprev; ?>

                                    </div>
                                </div>
                                <br>
                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">ARMAZENAGEM:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Como funciona o processo de armazenagem da empresa?</I></STRONG><BR>
                                   <?php echo $armazenagem_diagprev; ?>

               
                                    </div>
                                </div>
                                <br>                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">SEPARAÇÃO DE PRODUTOS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Como funciona o processo de separação e envio de produtos?</I></STRONG><BR>
                                    <?php echo $processos_diagprev; ?>

               
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEMPO MÉDIO DE ESTOQUE:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Atualmente a empresa possui estoque para quanto tempo?</I></STRONG><BR>
                                    <?php echo $estoque_diagprev; ?>

               
                                    </div>
                                </div><br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEMPO MÉDIO ENTREGA FORNECEDOR:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Quanto tempo em média atualmente um fornecedor demora para entregar?</I></STRONG><BR>
                                  <?php echo $tempomediofornecedor_diagprev; ?>

               
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
                            <h2>INFORMÁTICA E TI
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">EQUIPAMENTOS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Qual o estado atual dos equipamentos de informática e telefonia da empresa?</I></STRONG><BR>
                                    <?php echo $equipamentos_diagprev; ?>

                                    </div></div><br><div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">LICENÇAS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Os softwares usados na empresa são originais?</I></STRONG><BR>
                                    <?php echo $licencas_diagprev; ?>

                                    </div>
                                </div>
                                <br><div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">E.R.P.:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A empresa usa algum ERP? Ele é específico para o segmento?</I></STRONG><BR>
                                    <?php echo $erp_diagprev; ?>

                                    </div>
                                </div>
                                <br>
                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">SENHAS DE USO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Existe compartilhamento de senhas na empresa?</I></STRONG><BR>
                                    <?php echo $nivelsenha_diagprev; ?>

               
                                    </div>
                                </div>
                                <br><div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">LGPD:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Os colaboradores receberam treinamento de LGPD? Existe tratativas na empresa quanto a isso?</I></STRONG><BR>
                                    <?php echo $lgpd_diagprev; ?>

               
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">OUTROS SISTEMAS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A empresa utiliza outros sistemas ou robôs?</I></STRONG><BR>
                                    <?php echo $sistemasuporte_diagprev; ?>

               
                                    </div>
                                </div>
                                <br><div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">C.R.M.:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A empresa utiliza CRM para controlar suas prospecções e vendas?</I></STRONG><BR>
                                    <?php echo $crm_diagprev; ?>

               
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
                            <h2>PARCERIAS
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PARCERIAS COMERCIAIS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A empresa possui parceiros comerciais?</I></STRONG><BR>
                                    <?php echo $parceriascomerciais_diagprev; ?>

    </div></div><br>   <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">OUTRAS PARCERIAS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A empresa possui parcerias com associações ou outras entidades sociais?</I></STRONG><BR>
                                    <?php echo $parceriassociais_diagprev; ?>

                                    </div>
                                </div>
                                <br>   <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PROGRAMAS SOCIAIS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A empresa participa de algum programa social?</I></STRONG><BR>
                                    <?php echo $programassociais_diagprev; ?>

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
                            <h2>GESTÃO
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">DESAFIOS INTERNOS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Quais são os maiores desafios internos da empresa hoje?</I></STRONG><BR>
                               <?php echo $desafiosinternos_diagprev; ?>

                                    </div></div><br>   <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">DESAFIOS EXTERNOS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Quais são os maiores desafios externos da empresa hoje?</I></STRONG><BR>
                                    <?php echo $desafiosexternos_diagprev; ?>

                                    </div>
                                </div>
                                <br>   <div class="row">
                                     <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PROCESSOS ESTABELECIDOS:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Os processos de trabalho estão definidos e escritos?</I></STRONG><BR>
                                    <?php echo $processos2_diagprev; ?>

                                    </div>
                                </div><br>
                                <div class="row">
                                 <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">ROTINAS DE FUNÇÃO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Os colaboradores possuem rotinas estabelecidas, escritas e acompanhadas com frequência?</I></STRONG><BR>
                                    <?php echo $rotinas_diagprev; ?>

                                    </div>
                                </div><br>   <div class="row">
                                 <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">REUNIÕES DE ROTINA:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A empresa possui e executa um cronograma de reuniões?</I></STRONG><BR>
                                    <?php echo $reunioes_diagprev; ?>

                                    </div>
                                </div>

                                <br>   <div class="row">
                                 <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">INDICADORES (KPI):</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>A empresa possui KPIs e os acompanha?</I></STRONG><BR>
                                    <?php echo $kpisestabelecidos_diagprev; ?>

                                    </div>
                                </div><br>   <div class="row">
                                 <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">METAS CURTO PRAZO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Quais são as metas de curto prazo da empresa?</I></STRONG><BR>
                                    <?php echo $metascurto_diagprev; ?>

                                    </div>
                                </div><br><div class="row">
                                 <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">METAS DE MÉDIO PRAZO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Quais são as metas de médio prazo da empresa?</I></STRONG><BR>
                                    <?php echo $metasmedio_diagprev; ?>

                                    </div>
                                </div><br><div class="row">
                                 <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">METAS DE LONGO PRAZO:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Quais são as metas de longo prazo da empresa?</I></STRONG><BR>
                                   <?php echo $metaslongo_diagprev; ?>

                                    </div>
                                </div><br><div class="row">
                                 <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">AVALIAÇÃO FINAL DO CONSULTOR:</label>
                                    </div>
                                   <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                   <STRONG><I>Avaliação final do consultor. Resumo de tudo o que foi visto.</I></STRONG><BR>
                                   <?php echo $avaliacaoconsultor_diagprev; ?>
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
                  
    <!-- Data Table area End-->



    
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