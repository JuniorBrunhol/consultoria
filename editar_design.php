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
    <!-- End Header Top Area -->

    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                <div class="alert alert-info" role="alert">
                        <ul>
                            <li><a href="index.php">Home </a>/ <a href="canvas.php">Design Thinking </a>/ Editar</li>
                            
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
										<h2>Design Thinking</h2>
                    <p>Criado em 15/02/2022 por <i> Junior Brunhol de Araujo</i></p>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <form id="form" name="form" method="post" action="gravar_design.php">
     					    	
              <button type="button" class="btn btn-warning warning-icon-notika btn-reco-mg btn-button-mg" data-container="body" data-toggle="popover" data-placement="bottom" data-content="O grande objetivo do Design Thinking é converter dificuldades e limitações em benefícios para o cliente e valor de negócio para a sua empresa. Convide pessoas de áreas diferentes para participar do processo.">  <i class="far fa-lightbulb"><font face="arial" size="2">  Ajuda  </font></i></button>
                               
                    
                               
                                <button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home()">

<script>
function relocate_home()
{
     location.href = "gravar_design.php";
} 
</script>  <i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button>
                                <button class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home1()">

<script>
function relocate_home1()
{
     location.href = "designthinking.php";
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
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Coloque um título para seu Design Thinking: 
                            </h2><br>
                            
               
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Preencha o seu título"><br>
                    <textarea type="text" class="form-control" id="obs" name="obs" rows="5" placeholder="Observações do Consultor"></textarea>
  
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
                            <h2>EMPATIA - Escolhido o problema que deseja resolver precisamos entender quais são os elementos do cenário. Quem são as pessoas envolvidas?
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="produto" name="produto" rows="10" placeholder="Como fazer isso?

Mapeio o cenário total, quem são os envolvidos?
Se tiver a oportunidade de ir a campo observe sem intervir.
Se engaje, realize as atividades como ele realiza para realmente “se por no lugar”.
Assista, veja como é o dia a dia deles, pergunte e ouça o que eles dizem sem interromper.
Anote tudo, grave (se possível), desenhe colete todas as informações."></textarea>
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
                            <h2>DEFINIR - Escolha e defina qual problema será trabalhado. É primordial para manter o foco e gerar soluções claras.
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="preco" name="preco" rows="10" placeholder="Preencha seguindo as dicas a seguir: Leve em consideração o ponto de vista do cliente. Quais “dores” são mais latentes?
Dentre essas dores, qual será o foco das soluções geradas? Escolha um problema para ser trabalhado. 
Se estiver difícil de decidir faça uma votação entre a sua equipe, de 3 votos para cada membro e selecione o problema mais votado.
No fim dessa etapa você deve ter três coisas definidas: qual a necessidade/problema a ser abordada? Quem é o público alvo? Qual a visão do projeto (objetivo)?."></textarea>
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
                            <h2>IDEAR - Pense no maior número de soluções possíveis para o problema. Volume é muito importante nesse momento! 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="praca" name="praca" rows="10" placeholder="Não “corte” as ideias alheias. Esse não é o momento de julgar a viabilidade das ideias.
Incentive ideias malucas, delas podem surgir insights valiosos.
Busque o volume, tenha muitas ideias, mesmo que as primeiras sejam muito boas.
Construa sob as ideias dos seus colegas, misture, complemente as ideias alheias.
Preste muita atenção nas ideias dos seus colegas, eles podem ter visto algo que você não enxergou.
Colocando a mão na massa, em idear, você deve seguir os seguintes passos:

Reúna sua equipe e anote as ideias em uma folha que todos possam ver.
Faça muitas perguntas: Como nós poderíamos resolver o problema x?
Faça um Brainstorming, crie mapas mentais, esboce soluções.
Selecione as ideias mais interessantes. Faça uma votação entre a sua equipe (isso, novamente).
Escolha dois ou três ideias para prototipar. Depende do tamanho da sua equipe você pode dividi-la em duas ou três partes."></textarea>
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
                            <h2>PROTOTIPAR - Hora de construir os protótipos! Tudo que for construído nessa etapa serve unica e exclusivamente para teste!
                                </h2>    <br>
                          


                                <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="promocao" name="promocao" rows="10" placeholder="Um bom protótipo é aquele que você investe o mínimo de tempo, esforço e recursos financeiros para gerar aprendizado.
Em resumo: crie soluções de baixa fidelidade para testar hipóteses!
Podemos dividir essa etapa em duas fases: planejamento e construção.
Em planejamento comece respondendo a pergunta: o que queremos aprender com esse protótipo?
Escreva isso em um local visível para toda a equipe.
Desenhe o mapa do protótipo. Liste os envolvidos, as funcionalidades do protótipo e como as pessoas e o processo se relacionam.
Depois disso analise as ferramentas que você e sua equipe tem disponíveis, o tempo (não gaste mais do que um dia) e as expertises dos integrantes.
Praticamente tudo pode ser prototipado! Se está parecendo muito difícil, você provavelmente está querendo colocar mais detalhes do que o necessário no protótipo. Foque no que você quer aprender!
"></textarea>
        </div>
            </div>
                     
        



                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>TESTAR - Já temos um protótipo, agora é hora de testar nossa proposta com clientes reais. 
                                </h2>    <br>
                          


                                <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="promocao" name="promocao" rows="10" placeholder="O objetivo principal é ouvir e aprender com os usuários, eles tevem testar seu produto e serviço e fazer as suas considerações.

O seu principal papel é observar e anotar o máximo possível.

Apresente os protótipos aos clientes e receber feedbacks. Pergunte sempre o “por que?” das decisões que os clientes tomarem (isso é uma ótima fonte de aprendizado).

Faça com que os testes cheguem o mais próximo possível de uma situação real. Simule o ambiente se for necessário.

Ouça e analise os feedbacks. Utilize essas informações para melhorar os protótipos. Após cada teste se for necessário volte a prototipagem e melhore o modelo."></textarea>
        </div>
            </div>
                     
        



                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>IMPLEMENTAR - Os processos de descoberta, prototipagem e teste são muito interessantes, mas não valem de nada se o projeto não for executado de verdade. 
                                </h2>    <br>
                          


                                <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="promocao" name="promocao" rows="10" placeholder="Desse ponto você deve selecionar os membros da sua equipe que tem mais conhecimento do mercado e são melhores em planejamento e execução para por o projeto no mercado.
                    
                    Preencha o nome destes profissionais aqui."></textarea>
        </div>
            </div>
                     
        



                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    </form>
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