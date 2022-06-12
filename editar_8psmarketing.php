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

  $sql = "SELECT * FROM `8psmarketing` WHERE (`id_8psmarketing` =  '".$id."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
   while ($lista = mysqli_fetch_assoc ($retorno)) {
    $id_8psmarketing = $lista['id_8psmarketing'];
    $titulo_8psmarketing = str_replace('<br />', "\n", $lista['titulo_8psmarketing']);
$pesquisa_8psmarketing = str_replace('<br />', "\n", $lista['pesquisa_8psmarketing']);
$planejamento_8psmarketing = str_replace('<br />', "\n", $lista['planejamento_8psmarketing']);
$producao_8psmarketing = str_replace('<br />', "\n", $lista['producao_8psmarketing']);
$publicacao_8psmarketing = str_replace('<br />', "\n", $lista['publicacao_8psmarketing']);
$promocao_8psmarketing = str_replace('<br />', "\n", $lista['promocao_8psmarketing']);
$propagacao_8psmarketing = str_replace('<br />', "\n", $lista['propagacao_8psmarketing']);
$personalizacao_8psmarketing = str_replace('<br />', "\n", $lista['personalizacao_8psmarketing']);
$precisao_8psmarketing = str_replace('<br />', "\n", $lista['precisao_8psmarketing']);
$resumo_8psmarketing = str_replace('<br />', "\n", $lista['resumo_8psmarketing']);

    
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
                            <li><a href="index.php">Home </a>/ <a href="8psmarketing.php">8Ps do Marketing Digital </a>/ Editar</li>
                            
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
										<h2>8Ps do Marketing Digital</h2>
								
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <form id="form" name="form" method="post" action="gravaredicao_8psmarketing.php">
     					    	
            
                               
                    
                               
                                  
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
                            <h2>Coloque um título para sua Ferramenta 8Ps do Marketing Digital: 
                            </h2><br>
                            
                            <input type="hidden" class="form-control" id="id_8psmarketing" name="id_8psmarketing" value="<?php echo $id_8psmarketing; ?>"><br>
     
                    <input type="text" class="form-control" id="titulo_8psmarketing" name="titulo_8psmarketing" placeholder="Preencha um título para identificar seu 8ps do Marketing Digital" value="<?php echo $titulo_8psmarketing; ?>"><br>
     
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
                            <h2>PESQUISA - Por onde começamos 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="pesquisa_8psmarketing" name="pesquisa_8psmarketing" rows="5" placeholder="A Pesquisa é responsável pelo estudo do perfil do consumidor e seu comportamento na internet. Entender as motivações, tendências e comportamentos é fundamental para conhecer e definir seu público-alvo e orientar as ações de marketing digital."><?php echo $pesquisa_8psmarketing; ?></textarea>
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
                            <h2>PLANEJAMENTO - Estruturando para iniciar
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="planejamento_8psmarketing" name="planejamento_8psmarketing" rows="5" placeholder="Agora que você já tem os dados e estatísticas do perfil do seu consumidor, é hora de planejar. O que será publicado? Para quem? Quando será enviado? Que dia, que horário? Em quais redes (Facebook, Instagram, Linkedin, Blog,…)? Terá posts patrocinados? O marketing digital exige muito planejamento. Comece tendo um objetivo bem claro."><?php echo $planejamento_8psmarketing; ?></textarea>
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
                            <h2>PRODUÇÃO - Como será a nossa estratégia? 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="producao_8psmarketing" name="producao_8psmarketing" rows="5" placeholder="Aqui não falamos de produção de produtos, mas da própria estratégia, de tornar o planejamento algo tangível, de sair do papel e colocar em prática. Aqui falamos dos canais e das ferramentas do marketing digital que tornarão o que foi planejado possível: sites, blogs, redes sociais, automação, SEO, Google Ads, Facebook Ads."><?php echo $producao_8psmarketing; ?></textarea>
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
                            <h2>PUBLICAÇÃO - Dando os primeiros passos 
                                </h2>    <br>
                          


                                <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="publicacao_8psmarketing" name="publicacao_8psmarketing" rows="5" placeholder="Esse é o momento de ativação do seu projeto, a fase das publicações. E ao pensar na publicação, foque no marketing de conteúdo, que traz resultados consideráveis de geração de leads. Produza conteúdos que interessem ao seu público/persona. Isso irá aproximá-lo da marca."><?php echo $publicacao_8psmarketing; ?></textarea>
                         
      
                  </div>
            </div>
            </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>   <br>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>PROMOÇÃO - Hora de mostrar o produto / serviço 
                                </h2>    <br>
                          


                                <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="promocao_8psmarketing" name="promocao_8psmarketing" rows="5" placeholder="O quinto P do Marketing Digital não fala de Promoção no sentido de baixar preços, mas sim, de promover a marca. Para isso, investir em mídia patrocinada pode gerar bons resultados para as suas publicações. Na sua estratégia, considere o Google Ads, Facebook Ads e Linkedin Ads. Promova sua marca sempre que puder, e não esqueça que para criar um relacionamento duradouro e saudável com seus clientes, é mais interessante promover o conteúdo que produtos e serviços. Ou seja, primeiro atraia-o pelo que você diz e depois pelo que você vende."><?php echo $promocao_8psmarketing; ?></textarea>
                         
      
                  </div>
            </div>
            </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>   <br>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>PROPAGAÇÃO - Hora de conferir os resultados 
                                </h2>    <br>
                          


                                <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="propagacao_8psmarketing" name="propagacao_8psmarketing" rows="5" placeholder="No P da Propagação, é hora de viralizar suas campanhas. Já ouviu falar que o melhor marketing é o boca a boca, não é? Pois aqui a diferença é que esse boca a boca se tornou virtual."><?php echo $propagacao_8psmarketing; ?></textarea>
                         
      
                  </div>
            </div>
            </div>
                     
                     </div>
                 </div>
             </div>
         </div>
     </div>    <br>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>PERSONALIZAÇÃO - Crie algo único 
                                </h2>    <br>
                          


                                <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="personalizacao_8psmarketing" name="personalizacao_8psmarketing" rows="5" placeholder="Nada torna um cliente mais próximo de uma marca do que a personalização. E personalização traz a fidelização. Como? O público começa a se identificar e se reconhecer com o conteúdo e passa a ver a marca com familiaridade e confiança. Isso ajuda a aumentar a interação e engajamento da sua marca na web, como nas redes sociais, blogs e sites, fazendo com que ela cresça e seja beneficiada pelos algoritmos dos buscadores e das próprias redes."><?php echo $personalizacao_8psmarketing; ?></textarea>
                         
      
                  </div>
            </div>
            </div>
                     
                     </div>
                 </div>
             </div>
         </div>
     </div>     <br>
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>PRECISÃO - Acerte o alvo 
                                </h2>    <br>
                          


                                <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="precisao_8psmarketing" name="precisao_8psmarketing" rows="5" placeholder="No Marketing Digital, uma das maiores vantagens é a possibilidade de mensurar o resultado de cada ação. Por isso, o P da Precisão avalia os resultados das estratégias realizadas. Para isso, usam-se KPIs (que em português significa indicadores-chave de performance). São métricas que avaliam o sucesso ou fracasso de determinada ação. Alguns dos KPIs mais usados para avaliar a performance de campanhas são o ROI (retorno sobre investimento), o custo por lead, o tíquete médio e taxas de conversão."><?php echo $precisao_8psmarketing; ?></textarea>
                         
      
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
                            <h2>Observações do Consultor: 
                            </h2><br>
                            
               
                      <textarea type="text" class="form-control" id="resumo_8psmarketing" name="resumo_8psmarketing" rows="5" placeholder="Observações do Consultor"><?php echo $resumo_8psmarketing; ?></textarea>
                      <br><br> 
                                         <a href="gravaredicao_8psmarketing.php"><button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
         
        <i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button></a>
                                        <a href="8psmarketing.php"> <button class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg">
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