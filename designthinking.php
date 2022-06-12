<?php
session_start();
include_once("conexao/conexao.php");
$empresa = 1;
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
    <!-- Caminho -->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                <div class="alert alert-info" role="alert">
                        <ul>
                            <li><a href="index.php">Home </a>/ Design Thinking</li>
                            
                        </ul>      
                </div>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Final caminho -->

     <!-- Data Table area Start-->
     <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Design Thinking</h2>
                            <p>A principal função do Design Thinking é entender o que seu cliente precisa e desenvolver soluções eficientes. </p>
                        </div>
                        <div class="table-responsive"> <button type="button" class="btn btn-primary btn-lg"                     value="Input Button" onclick=" relocate_home()">

<script>
function relocate_home()
{
     location.href = "criar_design.php";
} 
</script>Novo Design Thinking</button><br><br>
                
                            <table id="data-table-basic" class="table table-striped"  width=100%>
                                <thead>
                                    <tr>
                                        <th>Título do Design Thinking</th>
                                        <th>Criado em</th>
                                      
                                        <th width=50>Visualizar</th>
                                        <th width=50 align="center">Editar</th>
                                        <th width=50>Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div id="espaco">Tiger Nixon</div></td>
                                        <td>System Architect</td>
                                       
                                      
                                        <td><button type="button" class="btn btn-success btn-sm"  value="Input Button" onclick=" relocate_home2()">Visualizar</button>
                                        <script>
function relocate_home2()
{
     location.href = "visualiza_4ps.php";
} 
</script>
                                      </a>
                                    </td>
                                        <td><button type="button" class="btn btn-danger btn-sm">Excluir</button></td>
                                        <td><button type="button" class="btn btn-warning btn-sm"  value="Input Button" onclick=" relocate_home3()">Editar</button></td>
                                        <script>
function relocate_home3()
{
     location.href = "editar_design.php";
} 
</script>
                                      </tr>

                                </tbody>
                                    
                              
                                <tfoot>
                                    <tr>
                                        <th>Título do Design Thinking</th>
                                        <th>Criado em</th>
                                     
                                        <th>Visualizar</th>
                                        <th>Editar</th>
                                        <th>Excluir</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
    <br><br><br><br><br>
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