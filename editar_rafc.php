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
  $prop = $_GET['id'];

  $sql = "SELECT * FROM `rafc` WHERE (`id_rafc` =  '".$prop."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
   while ($lista = mysqli_fetch_assoc ($retorno)) {
    $id_rafc = $lista['id_rafc'];
    $consultoria_rafc = $lista['consultoria_rafc'];
    $empresa_rafc = $lista['empresa_rafc'];
    $usuario_rafc = $lista['usuario_rafc'];
    $datainicio_rafc = $lista['datainicio_rafc'];
    $datatermino_rafc = $lista['datatermino_rafc'];
    $temporeuniao_rafc = $lista['temporeuniao_rafc'];
    $local_rafc = $lista['local_rafc'];
    $participantes_rafc = $lista['participantes_rafc'];
    $assunto_rafc = $lista['assunto_rafc'];
    $area_rafc = $lista['area_rafc'];
    $resumo_rafc = $lista['resumo_rafc'];
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
                            <li><a href="index.php">Home </a>/  Clientes / <a href="rafc.php">RAFC - Registro de Atendimento Fora do Cliente </a>/ Editar</li>
                            
                        </ul>      
                        
                </div>
                   
                </div>
            </div>
        </div>
    </div>
  
         <!-- Data Table area Start-->
         <form id="form" name="form" method="post" action="gravaredicao_rafc.php">  
         <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                        <h1>RAFC - Registro de Atendimento Fora do Cliente</h1><br>    
                                            
               
                       <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">HORÁRIO INÍCIO:</label>
                                    </div>
                                    <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12">
                                    <input type="hidden" class="form-control" id="id_rafc" name="id_rafc"   value="<?php echo $id_rafc; ?>"><br>
             
                                    <input type="text" class="form-control" id="datainicio_rafc" name="datainicio_rafc"  required placeholder="Preencha o horário inicial" value="<?php echo $datainicio_rafc; ?>"><br>
             
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">HORÁRIO TÉRMINO:</label>
                                    </div>
                                    <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="datatermino_rafc" name="datatermino_rafc"  required placeholder="Preencha o horário de término"  value="<?php echo $datatermino_rafc; ?>"><br>
             
                                    </div>
                                  </div>
       <BR>                           <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">LOCAL:</label>
                                    </div>
                                    <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="local_rafc" name="local_rafc"  required placeholder="Local da reunião" value="<?php echo $local_rafc; ?>"><br>
             
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">ÁREA / SETOR DA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="area_rafc" name="area_rafc"  required placeholder="Setor da Empresa" value="<?php echo $area_rafc; ?>"><br>
             
                                    </div>
                                  </div>
   <BR>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">ASSUNTO DA REUNIÃO:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="assunto_rafc" name="assunto_rafc"  required placeholder="Qual o assunto da reunião?"  value="<?php echo $assunto_rafc; ?>">
                      
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PARTICIPANTES DA REUNIÃO:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="participantes_rafc" name="participantes_rafc" rows="3"  required placeholder="Quais são as pessoas que participaram desta reunião"><?php echo $participantes_rafc; ?></textarea>
   
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


                
  <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">RESUMO DA REUNIÃO: </label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="resumo_rafc" name="resumo_rafc" rows="6"  required placeholder="Escreva um breve resumo de tudo o que aconteceu durante a reunião"><?php echo $resumo_rafc; ?></textarea>
 
                                    <br><br>
                                         
                           
                                      
                                         <a href="gravaredicao_rafc.php"><button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
         
        <i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button></a>
                                        <a href="rafc.php"> <button class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home1()">
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