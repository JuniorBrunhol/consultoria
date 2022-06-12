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
  $pesquisa_proposta = $_GET['id'];



  $sql1 = "SELECT * FROM `consultoria` WHERE (`id_consultoria` = '".$consultoria_usuarios."')  "; 
  $retorno1 = mysqli_query ($mysqli , $sql1) or die (mysql_error());
  while($dados1 = mysqli_fetch_array($retorno1)){
    $id_consultoria = $dados1['id_consultoria'];    
    $razaosocial_consultoria = $dados1['razaosocial_consultoria'];
    $responsavel_consultoria = $dados1['responsavel_consultoria'];
    $fantasia_consultoria = $dados1['fantasia_consultoria'];
    $cnpj_consultoria = $dados1['cnpj_consultoria'];
    $ie_consultoria = $dados1['ie_consultoria'];
    $endereco_consultoria = $dados1['endereco_consultoria'];
    $bairro_consultoria = $dados1['bairro_consultoria'];
    $cidade_consultoria = $dados1['cidade_consultoria'];
    $uf_consultoria = $dados1['uf_consultoria'];
    $telefone_consultoria = $dados1['telefone_consultoria'];
    $email_consultoria = $dados1['email_consultoria'];
    $logo = $dados1['imagem_consultoria'];
    $instagram_consultoria = $dados1['instagram_consultoria'];
    $facebook_consultoria = $dados1['facebook_consultoria'];
    $youtube_consultoria = $dados1['youtube_consultoria'];
    $telegram_consultoria = $dados1['telegram_consultoria'];
    $linkedin_consultoria = $dados1['linkedin_consultoria'];
    $twitter_consultoria = $dados1['twitter_consultoria'];
  }

  $sql2 = "SELECT * FROM `empresa` WHERE (`id_empresa` = '".$EmpresaID."') "; 
  $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
  while($dados2 = mysqli_fetch_array($retorno2)){
    $razaosocial_empresa = $dados2['razaosocial_empresa'];
    $nomefantasia_empresa = $dados2['nomefantasia_empresa'];
    $cnpj_empresa = $dados2['cnpj_empresa'];
    $ie_empresa = $dados2['ie_empresa'];
    $telefone_empresa = $dados2['telefone_empresa'];
    $email_empresa = $dados2['email_empresa'];
    $endereco_empresa = $dados2['endereco_empresa'];
    $bairro_empresa = $dados2['bairro_empresa'];
    $cidade_empresa = $dados2['cidade_empresa'];
    $uf_empresa = $dados2['uf_empresa'];
    $objetivo_empresa = $dados2['objetivo_empresa'];
    $imagem_empresa = $dados2['imagem_empresa'];
      }

  $sql3 = "SELECT * FROM `proposta` WHERE (`id_proposta` = '".$pesquisa_proposta."') "; 
  $retorno3 = mysqli_query ($mysqli , $sql3) or die (mysql_error());
  while($dados3 = mysqli_fetch_assoc($retorno3)){
    $dataenvio_proposta = $dados3['dataenvio_proposta'];
    $pronome_proposta = $dados3['pronome_proposta'];
    $contato_proposta = $dados3['contato_proposta'];
    $titulo_proposta = $dados3['titulo_proposta'];
    $objeto_proposta = $dados3['objeto_proposta'];
    $objetivoespecifico_proposta = $dados3['objetivoespecifico_proposta'];
    $metodologia_proposta = $dados3['metodologia_proposta'];
    $equipetecnica_proposta = $dados3['equipetecnica_proposta'];
    $prazo_proposta = $dados3['prazo_proposta'];
    $entregas_proposta = $dados3['entregas_proposta'];
    $preco_proposta = $dados3['preco_proposta'];
    $formapagamento_proposta = $dados3['formapagamento_proposta'];
    $validade_proposta = $dados3['validade_proposta'];
    $responsabilidadecontratante_proposta = $dados3['responsabilidadecontratante_proposta'];
    $responsabilidadeproponente_proposta = $dados3['responsabilidadeproponente_proposta'];
    $confidencialidade_proposta = $dados3['confidencialidade_proposta'];
    $conclusao_proposta = $dados3['conclusao_proposta'];
    $frase_proposta = $dados3['frase_proposta'];
    $mostraremail_proposta = $dados3['mostraremail_proposta'];
    $mostrartelefone_proposta = $dados3['mostrartelefone_proposta'];
    $mostrarredesocial_proposta = $dados3['mostrarredesocial_proposta'];
    $mostrarcomentarios_proposta = $dados3['mostrarcomentarios_proposta'];
    
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
                            <li><a href="index.php">Home </a>/ <a href="propcons.php">Proposta de Consultoria</a>/ Novo</li>
                            
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
										<h2>Visualizar Proposta de Consultoria</h2>
										<p>Criado em <i><?php echo date('d/m/Y',  strtotime($dataenvio_proposta)); ?></i> .</p>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3">
        			<A HREF="editar_propcons.php?id=<?php echo  $pesquisa_proposta;?>"><button data-toggle="tooltip" data-placement="left" title="Editar Proposta" class="btn"><i class="notika-icon notika-left-arrow"></i></button></a>
              <A HREF="pdf-visualiza_propcons.php?id=<?php echo  $pesquisa_proposta;?>"><button data-toggle="tooltip" data-placement="left" title="Download arquivo" class="btn"><i class="notika-icon notika-sent"></i></button></a>
   
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- Breadcomb area End-->
         <!-- Data Table area Start-->
        
       
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list2">
                        
                               
                        <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
                         
                         <img width=160 height=80 src="img/logo/<?php echo $logo; ?>"></div>
                         <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
                         <br><br>
                        <strong> <?php echo $pronome_proposta; ?>  <?php echo $contato_proposta; ?>, </strong>
    </div>        
    <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
                        <br><br>  <br><br>    <h2>
                        <strong><?php echo $titulo_proposta; ?></strong>
    </h2>
 
   </div>
<div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong>PROPONENTE:</strong><br>
<?php echo $razaosocial_consultoria; ?>
<br><br>
<strong>DESTINATÁRIO:</strong><br>
<?php echo $razaosocial_empresa; ?>
   <br><Br> </div>
    <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<strong>OBJETO:</strong><br>
<?php echo $objeto_proposta; ?>
 </div>
<div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
  
<br>
<br><br>
<br> <h2>SUMÁRIO DA PROPOSTA</H2>
<BR>
1.	DADOS DO PROPONENTE	<BR>
2.	OBJETO DA CONSULTORIA<BR>
a.	OBJETIVO GERAL<BR>
b.	OBJETIVOS ESPECÍFICOS<BR>
3.	METODOLOGIA DE TRABALHO<BR>
4.	EQUIPE TÉCNICA<BR>
5.	CRONOGRAMA DE EXECUÇÃO<BR>
6.	PRODUTOS/ENTREGAS<BR>
7.	PREÇO<BR>
a.	FORMA DE PAGAMENTO<BR>
8.	VALIDADE DA PROPOSTA<BR>
9.	RESPONSABILIDADE DAS PARTES<BR>
a.	DO CONTRATANTE<BR>
b.	DA PROPONENTE<BR>
10.	CONFIDENCIALIDADE DA PROPOSTA<BR>
11. CONCLUSÃO<BR>
12. CONTATO CONSULTORIA<BR>
13. COMENTÁRIOS DE CLIENTES<BR>
    </DIV>
  


    <div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><br>
<h2>1.	DADOS DA PROPONENTE</h2><br>

<strong>RAZÃO SOCIAL: 	</strong><?php echo $razaosocial_consultoria; ?>	<br>
<strong>NOME FANTASIA:		</strong><?php echo $fantasia_consultoria; ?><br>
<strong>CNPJ:		</strong><?php echo $cnpj_consultoria; ?><br>
<strong>IE:		</strong><?php echo $ie_consultoria; ?><br>
<strong>ENDEREÇO:		</strong><?php echo $endereco_consultoria; ?> - <?php echo $bairro_consultoria; ?> - <?php echo $cidade_consultoria; ?> - <?php echo $uf_consultoria; ?><br>
<strong>CONTATOS:		</strong>TELEFONE: <?php echo $telefone_consultoria; ?> / E-MAIL: <?php echo $telefone_consultoria; ?> <br>
<strong>RESPONSÁVEL TÉCNICO:	</strong><?php echo $responsavel_consultoria; ?>
    </div>

    <div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><br>
<h2>2.	OBJETIVOS DA CONSULTORIA</h2><br>

<STRONG>a)	Objetivo Geral:</STRONG><BR>
<?php echo $objeto_proposta; ?><br><br>

<STRONG>b)	Objetivos Específicos:</STRONG><BR>
<?php echo $objetivoespecifico_proposta; ?>
</div>

<div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><br>
<h2>3.	METODOLOGIA DE TRABALHO</h2>
<?php echo $metodologia_proposta; ?>
</div>

<div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><br>
<h2>4.	EQUIPE TÉCNICA</h2>
<?php echo $equipetecnica_proposta; ?>
</div>

<div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><br>
<h2>5.	PRAZO E CRONOGRAMA DE EXECUÇÃO</h2>
<?php echo $prazo_proposta; ?>
</div>

<div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><br>
<h2>6.	PRODUTOS/ENTREGAS</h2>
<?php echo $entregas_proposta; ?>
</div>

<div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><br>
<h2>7.	PREÇO</h2>
<?php echo $preco_proposta; ?>
</div>

<div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><br>
<h2>7.a)	FORMA DE PAGAMENTO</h2>
<?php echo $formapagamento_proposta; ?>
</div>
 
<div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><br>
<h2>8.	VALIDADE DA PROPOSTA</h2>
<?php echo $validade_proposta; ?>
</div>

<div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><br>
<h2>9.	RESPONSABILIDADES DAS PARTES</h2><br>

<STRONG>a)	Do CONTRATANTE:</strong><br>
<?php echo $responsabilidadecontratante_proposta; ?><br><br>

<STRONG>b)	Da PROPONENTE:</strong><br>
<?php echo $responsabilidadeproponente_proposta; ?>
</div>

<div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><br>
<h2>10.	CONFIDENCIALIDADE DA PROPOSTA</h2>
<?php echo $confidencialidade_proposta; ?>
</div>

<div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><br><br><br><br><br>
________________________________________________________<br>
<?php echo $responsavel_consultoria; ?><br>
<?php echo $razaosocial_consultoria; ?><br>
<?php echo $cnpj_consultoria; ?><br>
    </div>

<?php
if ($mostraremail_proposta == 'on') {
  ?>
    <div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><Br>
    <H2>CONTATOS DO PROPONENTE:</H2>
    <strong>RAZÃO SOCIAL: </STRONG><?php echo $razaosocial_consultoria; ?><br>
    <strong>RESPONSÁVEL TÉCNICO: </STRONG><?php echo $responsavel_consultoria; ?><br>
    <strong>TELEFONE: </STRONG><?php echo $telefone_consultoria; ?><br>
    <strong>EMAIL: </STRONG><?php echo $email_consultoria; ?>
    </div>
<?php } ?>

<?php
if ($mostrarredesocial_proposta == 'on') {
  ?>
    <div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><Br>
    <H2>REDES SOCIAIS DO PROPONENTE:</H2><br>
    <p><img width=24 src="img/logo/instagram.png"><strong> INSTAGRAM: </STRONG><?php echo $instagram_consultoria; ?><br></p>
    <p><img width=24 src="img/logo/facebook.png"> <strong> FACEBOOK: </STRONG><?php echo $facebook_consultoria; ?><br></p>
    <p><img width=24 src="img/logo/youtube.png"><strong> YOUTUBE: </STRONG><?php echo $youtube_consultoria; ?><br></p>
    <p><img width=24 src="img/logo/telegram.jpg"><strong> TELEGRAM: </STRONG><?php echo $telegram_consultoria; ?><br></p>
    <p><img width=24 src="img/logo/linkedin.png"><strong> LINKEDIN: </STRONG><?php echo $linkedin_consultoria; ?></p>
    <p><img width=24 src="img/logo/twitter.png"><strong> TWITTER: </STRONG><?php echo $twitter_consultoria; ?></p>
    </div>
<?php } ?>

<?php
if ($mostrarcomentarios_proposta == 'on') {
  ?>
    <div class="col-lg-12 col-md-7 col-sm-7 col-xs-12"><br><Br>
    <H2>O QUE OS CLIENTES COMENTAM SOBRE NOSSA CONSULTORIA:</H2>
  <?php 
    $sql10 = "SELECT * FROM `comentarios` WHERE (`idconsultoria_comentarios` = '".$id_consultoria."')  "; 
  $retorno10 = mysqli_query ($mysqli , $sql10) or die (mysql_error());
  while($dados10 = mysqli_fetch_array($retorno10)){
    $descricao_comentarios = $dados10['descricao_comentarios'];
    $contato_comentarios = $dados10['contato_comentarios'];
    $empresa_comentarios = $dados10['empresa_comentarios'];
    ?>
    <?php echo $descricao_comentarios; ?><br>
    <strong><?php echo $contato_comentarios; ?>,  <?php echo $empresa_comentarios; ?></strong><br><br>
   
<?php } ?>
</div>
<?php } ?>                                 
                        
                    
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