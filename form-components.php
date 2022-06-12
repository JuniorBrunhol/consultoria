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

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Form Components | Notika - Notika Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- font awesome CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
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
    <!-- summernote CSS
		============================================ -->
    <link rel="stylesheet" href="css/summernote/summernote.css">
    <!-- Range Slider CSS
		============================================ -->
    <link rel="stylesheet" href="css/themesaller-forms.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- Notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="css/notika-custom-icon.css">
    <!-- bootstrap select CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap-select/bootstrap-select.css">
    <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="css/datapicker/datepicker3.css">
    <!-- Color Picker CSS
		============================================ -->
    <link rel="stylesheet" href="css/color-picker/farbtastic.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/chosen/chosen.css">
    <!-- notification CSS
		============================================ -->
    <link rel="stylesheet" href="css/notification/notification.css">
    <!-- dropzone CSS
		============================================ -->
    <link rel="stylesheet" href="css/dropzone/dropzone.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="css/wave/waves.min.css">
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
      <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i><span>CLIENTE</span><b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="clientes.php">DADOS GERAIS</a></li>
            <li><a href="questionario.php">QUESTIONÁRIO</a></li>
            <li><a href="contrato.php">CONTRATO</a></li>
            <li><a href="pagamento.php">PAGAMENTO</a></li>
           
          </ul>
        </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">  <i class="icon-dashboard"></i><span>DASHBOARD</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="dashboard1.php">DASHBOARD 1</a></li>
            <li><a href="dashboard2.php">DASHBOARD 2</a></li>
            <li><a href="dashboard3.php">DASHBOARD 3</a></li>
            <li><a href="dashboard4.php">DASHBOARD 4</a></li>
            <li><a href="metrics.php">METRICS</a></li>
            <li><a href="analytics.php">ANALYTICS</a></li>
          </ul>
        </li> 
        <li><a href="5w2h.php"><i class="icon-pencil"></i><span>5W2H</span> </a> </li>
        <li><a href="kpis.php"><i class="icon-map-marker"></i><span>KPIs</span> </a> </li>
        <li><a href="graficos.php"><i class="icon-bar-chart"></i><span>GRÁFICOS</span> </a> </li>
        <li><a href="relatorios.php"><i class="icon-copy"></i><span>RELATÓRIOS</span> </a> </li>
     
          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-pushpin"></i><span>PROJETOS</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="canvas.php">CANVAS</a></li>
            <li><a href="planodenegocios.php">PLANO DE NEGÓCIOS</a></li>
            <li><a href="analise360.php">ANÁLISE 360º</a></li>
            <li><a href="mapaempatia.php">MAPA DA EMPATIA</a></li>
            <li><a href="missao.php">MISSÃO, VISÃO, VALORES</a></li>
            <li><a href="designthinking.php">DESIGN THINKING</a></li>
            <li><a href="gantt.php">DIAGRAMA DE GANTT</a></li>
            <li><a href="basico.php">MATRIZ BÁSICO</a></li>
          </ul>
        </li>
           
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-road"></i><span>ESTRATÉGIA</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="porter.php">5 FORÇAS DE PORTER</a></li>
            <li><a href="concorrencia.php">MAPEAMENTO DE CONCORRÊNCIA</a></li>
            <li><a href="swot.php">SWOT</a></li>
            <li><a href="inovacao.php">4Ps DA INOVAÇÃO</a></li>
            <li><a href="jobtobedone.php">JOB TO BE DONE</a></li>
            <li><a href="matrizbcg.php">MATRIZ BCG</a></li>
            <li><a href="nps.php">PESQUISA NPS</a></li>
          
          </ul>
        </li>
             
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-money"></i><span>FINANÇAS</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="fluxodecaixa.php">FLUXO DE CAIXA</a></li>
            <li><a href="breakeven.php">PONTO DE EQUILIBRIO</a></li>
            <li><a href="prazomedio.php">PRAZO MÉDIO</a></li>
            <li><a href="cmv.php">CÁLCULO CMV</a></li>
            <li><a href="capitaldegiro.php">CAPITAL DE GIRO</a></li>
         
          </ul>
        </li>
             
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-group"></i><span>PESSOAS</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="ciclodegente.php">CICLO DE GENTE</a></li>
            <li><a href="desempenho.php">AVALIAÇÃO DE DESEMPENHO</a></li>
            <li><a href="clima.php">PESQUISA DE CLIMA</a></li>
            <li><a href="comportamental.php">PERFIL COMPORTAMENTAL</a></li>
            <li><a href="feedback.php">MATRIZ DE FEEDBACK</a></li>
            <li><a href="matrizlideranca.php">MATRIZ DE LIDERANÇA</a></li>
           
          </ul>
        </li>
             
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-trophy"></i><span>GESTÃO</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="smart.php">METAS SMART</a></li>
            <li><a href="702010.php">70% - 20% - 10%</a></li>
            <li><a href="5s.php">5S</a></li>
            <li><a href="fluxograma.php">FLUXOGRAMA</a></li>
            <li><a href="eisenhower.php">MATRIZ DE EISENHOWER</a></li>
            <li><a href="anomalia.php">RELATO DE ANOMALIA</a></li>
            <li><a href="ans.php">ANS</a></li>
            <li><a href="5porques.php">5 PORQUÊS</a></li>
          </ul>
        </li>

        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-star"></i><span>QUALIDADE</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="controle.php">CARTA DE CONTROLE</a></li>
            <li><a href="pareto.php">DIAGRAMA DE PARETO</a></li>
            <li><a href="pishikawa.php">DIAGRAMA DE ISHIKAWA</a></li>
            <li><a href="dispersao.php">DIAGRAMA DE DISPERSÃO</a></li>
            <li><a href="histograma.php">HISTOGRAMA</a></li>
            <li><a href="6sigma.php">6 SIGMA</a></li>
            <li><a href="fmea.php">FMEA</a></li>
            <li><a href="gut.php">GUT</a></li>
            <li><a href="pdca.php">PDCA</a></li>
            <li><a href="dmaic.php">DMAIC</a></li>

          </ul>
        </li>

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
                            <li><a href="index.php">Home </a>/ <a href="novocliente.php">Dados Gerais </a>/ Adicionar</li>
                            
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
										<h2>Dados Gerais</h2>
										<p>Caso altere os dados clique no botão Salvar</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <form action="gravar_novocliente.php" method="POST" enctype="multipart/form-data">
     					    	
              <button type="button" class="btn btn-warning warning-icon-notika btn-reco-mg btn-button-mg" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Estas análises de cenário se dividem em: 
Ambiente interno (Forças e Fraquezas) - Integração dos Processos, Padronização dos Processos, Eliminação de redundância, Foco na atividade principal. 
Ambiente externo (Oportunidades e Ameaças) - Confiabilidade e Confiança nos dados, Informação imediata de apoio à Gestão e Decisão estratégica, Redução de erros.">  <i class="far fa-lightbulb"><font face="arial" size="2">  Ajuda  </font></i></button>
                               
                    
                               
                                <button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home()">

<script>
function relocate_home()
{
     location.href = "gravar_4ps.php";
} 
</script>  <i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button>
                                <button  type="submit" class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg" value="Enviar" onclick=" relocate_home1()">
                               
<script>
function relocate_home1()
{
     location.href = "4ps.php";
} 
</script>  <i class="notika-icon notika-close"><font face="arial" size="2">  Cancelar  </font></i></button>
                                  
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
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>DADOS GERAIS:</h2>
                        </div>
                     
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Razão Social:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Preencha com a Razão Social">
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CNPJ:</label>
                                    </div>
                                    <div class="col-lg-4 col-md-7 col-sm-7 col-xs-12">
                                        
                                            <input type="text" class="form-control input-sm" placeholder="nº do CNPJ sem pontos ou traços">
                                       
                                    </div>
                                    <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">IE:</label>
                                    </div>
                                    <div class="col-lg-4 col-md-7 col-sm-7 col-xs-12">
                                     
                                            <input type="text" class="form-control input-sm" placeholder="se não tiver escreva ISENTO">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Endereço:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Preencha com o endereço">
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Bairro:</label>
                                    </div>
                                    <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12">
                                        
                                            <input type="text" class="form-control input-sm" placeholder="Preencha o bairro">
                                       
                                    </div>
                                    <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Cidade:</label>
                                    </div>
                                    <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12">
                                     
                                            <input type="text" class="form-control input-sm" placeholder="Preencha a Cidade">
                                        
                                    </div>
                                    <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">UF:</label>
                                    </div>
                                    <div class="col-lg-1 col-md-7 col-sm-7 col-xs-12">
                                     
                                            <input type="text" class="form-control input-sm" placeholder="UF">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Telefone:</label>
                                    </div>
                                    <div class="col-lg-4 col-md-7 col-sm-7 col-xs-12">
                                        
                                            <input type="text" class="form-control input-sm" placeholder="Preencha o número do telefone">
                                       
                                    </div>
                                    <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">E-mail:</label>
                                    </div>
                                    <div class="col-lg-4 col-md-7 col-sm-7 col-xs-12">
                                     
                                            <input type="text" class="form-control input-sm" placeholder="Preencha o e-mail">

                                         
                                          

    <!-- Dropzone area Start-->
    <div class="dropzone-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="dropdone-nk mg-t-30">
                        <div class="cmp-tb-hd">
                            <h2>Drag and Drop File Uploader</h2>
                            <p>DropzoneJS is an open source library that provides Drag and Drop file uploads with image previews. It’s lightweight, doesn't depend on any other library (like jQuery) and is highly customizable.</p>
                        </div>
                        <div id="dropzone1" class="multi-uploader-cs">
                            <form action="/upload" class="dropzone dropzone-nk needsclick" id="demo1-upload">
                                <div class="dz-message needsclick download-custom">
                                    <i class="notika-icon notika-cloud"></i>
                                    <h2>Drop files here or click to upload.</h2>
                                    <p><span class="note needsclick">(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</span>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dropzone area End-->
    <!-- Start Footer area-->
    <div class="footer-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="footer-copy-right">
                        <p>Copyright © 2018 
. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <!-- Input Mask JS
		============================================ -->
    <script src="js/jasny-bootstrap.min.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- rangle-slider JS
		============================================ -->
    <script src="js/rangle-slider/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="js/rangle-slider/jquery-ui-touch-punch.min.js"></script>
    <script src="js/rangle-slider/rangle-active.js"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
    <!-- bootstrap select JS
		============================================ -->
    <script src="js/bootstrap-select/bootstrap-select.js"></script>
    <!--  color-picker JS
		============================================ -->
    <script src="js/color-picker/farbtastic.min.js"></script>
    <script src="js/color-picker/color-picker.js"></script>
    <!--  notification JS
		============================================ -->
    <script src="js/notification/bootstrap-growl.min.js"></script>
    <script src="js/notification/notification-active.js"></script>
    <!--  summernote JS
		============================================ -->
    <script src="js/summernote/summernote-updated.min.js"></script>
    <script src="js/summernote/summernote-active.js"></script>
    <!-- dropzone JS
		============================================ -->
    <script src="js/dropzone/dropzone.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="js/wave/waves.min.js"></script>
    <script src="js/wave/wave-active.js"></script>
    <!--  chosen JS
		============================================ -->
    <script src="js/chosen/chosen.jquery.js"></script>
    <!--  Chat JS
		============================================ -->
    <script src="js/chat/jquery.chat.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <script src="js/tawk-chat.js"></script>
</body>

</html>