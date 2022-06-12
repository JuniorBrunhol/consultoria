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
                            <li><a href="index.php">Home </a>/ <a href="porter.php">5 Forças de Porter </a>/ Novo</li>
                            
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
										<h2>5 Forças de Porter</h2>
								
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
              <form id="form" name="form" method="post" action="gravar_porter.php">
     					    	
            
                               
                    
                               
                                  
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
                            <h2>Coloque um título para sua Ferramenta 5 Forças de Porter: 
                            </h2><br>
                            
               
                    <input type="text" class="form-control" id="titulo_swot" name="titulo_swot" placeholder="Preencha um título para identificar sua análise swot"><br>
     
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
                            <h2>NOVOS ENTRANTES
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="entrantes_porter" name="entrantes_porter" rows="10" placeholder="Muitas empresas entram no mercado com o desejo de conseguir uma fatia (parcela) de um setor e frequentemente recursos substanciais. Caso haja barreiras de entradas que possam dificultar a sua inserção, fica mais difícil a sua fixação no mercado: a ameaça de entrada é pequena. Se o concorrente se estabelecer pode haver perda de rentabilidade por parte da empresa. Com a ajuda de barreiras ficará muito difícil para o concorrente roubar os melhores clientes, assim caso o concorrente se estabeleça no mercado, eventualmente vai ficar com os piores clientes, portanto pensando duas vezes antes de entrar no novo mercado. Essa ameaça também pode ser conhecida como A ameaça de novos entrantes, ou mesmo Barreiras à entrada de concorrentes."></textarea>
        </div>
            </div>
                        </div>
                        <div class="basic-tb-hd">
                            <h2>AÇÃO PARA BLINDAGEM DE NOVOS ENTRANTES
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="acaoentrantes_porter" name="acaoentrantes_porter" rows="10" placeholder=""></textarea>
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
                            <h2>PODER DE NEGOCIAÇÃO COM FORNECEDORES  
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="negociacao_porter" name="negociacao_porter" rows="10" placeholder="Também descrito como mercado de insumos. Fornecedores de matérias-primas, componentes e serviços para a empresa pode ser uma fonte de poder. Fornecedores podem recusar-se a trabalhar com a empresa, ou por exemplo, cobrar preços excessivamente elevados para recursos únicos."></textarea>
        </div>
            </div>
                        </div>
                        <div class="basic-tb-hd">
                            <h2>AÇÃO PARA PODER DE NEGOCIAÇÃO COM FORNECEDORES
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="acaonegociacao_porter" name="acaonegociacao_porter" rows="10" placeholder=""></textarea>
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
                            <h2>CONCORRÊNCIA DE MERCADO  
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="concorrencia_porter" name="concorrencia_porter" rows="10" placeholder="Para a maioria das indústrias, esse é o principal determinante da competitividade do mercado. Às vezes rivais competem agressivamente, não só em relação ao preço do produto, como também a inovação, marketing, etc.

Número de concorrentes e repartição de quotas de mercado;
Taxa de crescimento da indústria;
Diversidade de concorrentes;
Complexidade e assimetria informacional;
Grau de diferenciação dos produtos;
As barreiras à saída;
Em situações de elevada rivalidade os concorrentes procuram ativamente captar clientes, as margens são esmagadas e a atuação centra-se em cortes de preços e descontos de quantidade. Lembrando que esse sistema é feito para servir pessoas e como consequência vem os lucros."></textarea>
        </div>
            </div>
          
                      </div>
                      <div class="basic-tb-hd">
                            <h2>AÇÃO PARA CONCORRÊNCIA DE MERCADO
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="acaoconcorrencia_porter" name="acaoconcorrencia_porter" rows="10" placeholder=""></textarea>
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
                            <h2>BARGANHA DOS CLIENTES  
                                </h2>    <br>
                          


                                <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="barganha_porter" name="barganha_porter" rows="10" placeholder="Os clientes exigem mais qualidade por um menor preço de bens e serviços. Também competindo com a indústria, forçando os preços para baixo. Assim jogando os concorrentes uns contra os outros.[2]

Também descrito como o mercado de realizações. A capacidade dos clientes de colocar a empresa sob pressão, e também, afetar os clientes com a sensibilidade à evolução dos preços.

Preço da compra total
Disponibilidade de informação do comprador em relação ao produto
Existência de produtos substitutos
Da sua dimensão enquanto clientes
Da sua capacidade de integração a montante"></textarea>
                         
      
                  </div>
            </div>
                     
        



                        </div>
                        <div class="basic-tb-hd">
                            <h2>AÇÃO PARA BARGANHA DE CLIENTES
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="acaobarganha_porter" name="acaobarganha_porter" rows="10" placeholder=""></textarea>
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
                            <h2>PRODUTOS / SERVIÇOS SUBSTITUTOS  
                                </h2>    <br>
                          


                                <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="produto_porter" name="produto_porter" rows="10" placeholder="A existência de produtos (bens e serviços) substitutos no mercado, que analisados, desempenham funções equivalentes ou parecidas é uma condição básica de barganha que pode afectar as empresas. Assim os substitutos (bens ou serviços) podem limitar os lucros em tempos normais, e como também podem reduzir as fontes de riqueza que a indústria pode obter em tempos de prosperidade.[1]

Há, assim, a análise de quantos concorrentes existem, dos seus preços e da qualidade comparada ao negócio que está sendo examinado, bem como quanto do lucro tais concorrentes estão ganhando, a fim de que se possa aferir a possibilidade de baixar seus custos ainda mais (ou não).

A “ameaça” da concorrência é informada pela troca de custos, tanto imediatos quanto a longo prazo, considerando também a inclinação do comprador para realizar mudanças."></textarea>
                         
      
                  </div>
            </div>
                     
                                </div>
                                <div class="basic-tb-hd">
                            <h2>AÇÃO PARA PRODUTOS / SERVIÇOS SUBSTITUTOS
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="acaoproduto_porter" name="acaoproduto_porter" rows="10" placeholder=""></textarea>
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
                            <h2>OBSERVAÇÕES DO CONSULTOR: 
                            </h2><br>
                            
               
                      <textarea type="text" class="form-control" id="resumo_porter" name="resumo_porter" rows="5" placeholder="Observações do Consultor"></textarea>
                      <br><br> 
                                         <a href="gravar_porter.php"><button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
         
        <i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button></a>
                                        <a href="porter.php"> <button class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home1()">
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