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
  $consulta = $_SESSION['numero_contrato'];
  

  $sql = "SELECT * FROM `contrato` WHERE (`id_contrato` = '".$consulta."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
  while($lista = mysqli_fetch_assoc($retorno)){
    $id_contrato = $lista['id_contrato'];
    $titulopagina_contrato = $lista['titulopagina_contrato'];
    $titulotopo_contrato = $lista['titulotopo_contrato'];
    $modelo_contrato = $lista['modelo_contrato'];
    $datacricao_contrato = $lista['data_contrato'];
    $status_contrato = $lista['status_contrato'];
    $consultoria_contrato = $lista['consultoria_contrato'];
    $empresa_contrato = $lista['empresa_contrato'];
    $usuario_contrato = $lista['usuario_contrato'];
    $textoinicial_contrato = $lista['textoinicial_contrato'];
    $cl1titulo_contrato = $lista['cl1titulo_contrato'];
    $texto1_contrato = $lista['texto1_contrato'];
    $cl2titulo_contrato = $lista['cl2titulo_contrato'];
    $texto2_contrato = $lista['texto2_contrato'];
    $cl3titulo_contrato = $lista['cl3titulo_contrato'];
    $texto3_contrato = $lista['texto3_contrato'];
    $cl4titulo_contrato = $lista['cl4titulo_contrato'];
    $texto4_contrato = $lista['texto4_contrato'];
    $cl5titulo_contrato = $lista['cl5titulo_contrato'];
    $texto5_contrato = $lista['texto5_contrato'];
    $cl6titulo_contrato = $lista['cl6titulo_contrato'];
    $texto6_contrato = $lista['texto6_contrato'];
    $cl7titulo_contrato = $lista['cl7titulo_contrato'];
    $texto7_contrato = $lista['texto7_contrato'];
    $cl8titulo_contrato = $lista['cl8titulo_contrato'];
    $texto8_contrato = $lista['texto8_contrato'];
    $cl9titulo_contrato = $lista['cl9titulo_contrato'];
    $texto9_contrato = $lista['texto9_contrato'];
    $cl10titulo_contrato = $lista['cl10titulo_contrato'];
    $texto10_contrato = $lista['texto10_contrato'];
    $cl11titulo_contrato = $lista['cl11titulo_contrato'];
    $texto11_contrato = $lista['texto11_contrato'];
    $cl12titulo_contrato = $lista['cl12titulo_contrato'];
    $texto12_contrato = $lista['texto12_contrato'];
    $cl13titulo_contrato = $lista['cl13titulo_contrato'];
    $texto13_contrato = $lista['texto13_contrato'];
    $cl14titulo_contrato = $lista['cl14titulo_contrato'];
    $texto14_contrato = $lista['texto14_contrato'];
    $cl15titulo_contrato = $lista['cl15titulo_contrato'];
    $texto15_contrato = $lista['texto15_contrato'];
    $anexo_contrato = $lista['anexo_contrato'];
    $botao1_contrato = $lista['botao1_contrato'];    
    $botao2_contrato = $lista['botao2_contrato'];    
    $botao3_contrato = $lista['botao3_contrato'];    
    $botao4_contrato = $lista['botao4_contrato'];    
    $botao5_contrato = $lista['botao5_contrato'];    
    $botao6_contrato = $lista['botao6_contrato'];    
    $botao7_contrato = $lista['botao7_contrato'];    
    $botao8_contrato = $lista['botao8_contrato'];    
    $botao9_contrato = $lista['botao9_contrato'];    
    $botao10_contrato = $lista['botao10_contrato'];    
    $botao11_contrato = $lista['botao11_contrato'];    
    $botao12_contrato = $lista['botao12_contrato'];    
    $botao13_contrato = $lista['botao13_contrato'];    
    $botao14_contrato = $lista['botao14_contrato'];    
    $botao15_contrato = $lista['botao15_contrato'];    
    $modelo_contrato = $lista['modelo_contrato'];    
        $status = 'pendente';
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
                            <li><a href="index.php">Home </a>/ <a href="contrato.php">Contrato de Consultoria</a>/ Visualizar</li>
                            
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
										<h2>Visualizar Contrato de Consultoria</h2>
										<p>Criado em <i><?php echo date('d/m/Y',  strtotime($datacricao_contrato)); ?></i> .</p>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-3 col-xs-3">
        		<a href="editar_contrato.php?id=<?php echo  $id_contrato;?>">	<button data-toggle="tooltip" data-placement="left" title="Editar Contrato" class="btn" ><i class="notika-icon notika-left-arrow"></i></button></a>
        
             <a href="pdf-visualiza_contrato.php?id=<?php echo  $id_contrato;?>"> <button data-toggle="tooltip" data-placement="left" title="Download arquivo" class="btn" value="Input Button" onclick=" relocate_home()"><i class="notika-icon notika-sent"></i></button></a>
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
                         <br><br>
                        <strong><h2> <?php echo $titulotopo_contrato; ?> </h2> </strong>
    </div>        
    <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
                        <br><br>     
                        <?php echo $textoinicial_contrato; ?>
    
 
   </div>
   <?php 
if ($botao1_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl1titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto1_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            
            <?php 
if ($botao2_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl2titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto2_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          

<?php 
if ($botao3_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl3titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto3_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            <?php 
if ($botao4_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl4titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto4_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            <?php 
if ($botao5_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl5titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto5_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            <?php 
if ($botao6_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl6titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto6_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            <?php 
if ($botao7_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl7titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto7_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            <?php 
if ($botao8_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl8titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto8_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            <?php 
if ($botao9_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl9titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto9_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            <?php 
if ($botao10_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl10titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto10_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            <?php 
if ($botao11_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl11titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto11_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            <?php 
if ($botao12_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl12titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto12_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            <?php 
if ($botao13_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl13titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto13_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            <?php 
if ($botao14_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl14titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto14_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            <?php 
if ($botao15_contrato == '.on.') { ?>
   <div class="col-lg-11 col-md-7 col-sm-7 col-xs-12">
<br><br><strong><?php echo $cl15titulo_contrato; ?> </strong><br><br>
 <font align-text="justify"><?php echo $texto15_contrato; ?></font>
<br><br>

</div> <?php
}else{

}
            ?>          
            











                    
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