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


    <script>
function mascara(i,t){
   
   var v = i.value;
   
   if(isNaN(v[v.length-1])){
      i.value = v.substring(0, v.length-1);
      return;
   }
   
   if(t == "nascimento"){
      i.setAttribute("maxlength", "10");
      if (v.length == 2 || v.length == 5) i.value += "/";
   }

   if(t == "hora"){
      i.setAttribute("maxlength", "9");
      if (v.length == 2 || v.length == 5) i.value += ":";
   }

   if(t == "cpf"){
      i.setAttribute("maxlength", "14");
      if (v.length == 3 || v.length == 7) i.value += ".";
      if (v.length == 11) i.value += "-";
   }

   if(t == "cnpj"){
      i.setAttribute("maxlength", "13");
      if (v.length == 2 || v.length == 8) i.value += "-";
     
   }

   if(t == "cep"){
      i.setAttribute("maxlength", "9");
      if (v.length == 5) i.value += "-";
   }

   if(t == "telefone"){
      if(v[0] == 13){
         i.setAttribute("maxlength", "13");
         if (v.length == 2 || v.length == 5) i.value += "-";
         
      }else{
         i.setAttribute("maxlength", "13");
         if (v.length == 4) i.value += "-";
      }
   }
}
</script>
   
   




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
                            <li><a href="index.php">Home </a>/ <a href="planodetrabalho.php">Plano de Trabalho </a>/ Visualizar</li>
                            
                        </ul>      
                        
                </div>
                   
                </div>
            </div>
        </div>
    </div>
    <div class="breadcomb-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="breadcomb-list">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<div class="breadcomb-wp">
									
									<div class="breadcomb-ctn">
                  <?php   $sql3 = "SELECT * FROM `cronograma` WHERE (`id_cronograma` = '".$id."') "; 
    $retorno3 = mysqli_query ($mysqli , $sql3) or die (mysql_error());
    while($dados3 = mysqli_fetch_array($retorno3)){
    $id_cronograma = $dados3['id_cronograma'];
    $datainicial_cronograma = $dados3['datainicial_cronograma'];
    $previsaofim_cronograma = $dados3['previsaofim_cronograma'];
    $dataregistro_cronograma = $dados3['dataregistro_cronograma'];
    $titulo_cronograma = $dados3['titulo_cronograma'];
    $atingimento_cronograma = $dados3['atingimento_cronograma'];
    $objetivo_cronograma = $dados3['objetivo_cronograma'];
    }
    ?>
										<h2>PLANO DE TRABALHO</h2>
                    <p>Criado em <i><?php echo date('d/m/Y H:m:s',  strtotime($dataregistro_cronograma)); ?></p>
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
								<div class="breadcomb-report">
                <a href="editar_planodetrabalho.php?id=<?php echo $id_cronograma;?>">	<button data-toggle="tooltip" data-placement="left" title="Editar Plano de Trabalho" class="btn" ><i class="notika-icon notika-left-arrow"></i></button></a>
                <a href="pdf-visualiza_planodetrabalho.php?id=<?php echo $id_cronograma;?>">	<button data-toggle="tooltip" data-placement="left" title="Download Plano de Trabalho" class="btn"><i class="notika-icon notika-sent"></i></button></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
       				    	
            
         
         <!-- Data Table area Start-->
        
         
        <div class="container">
         <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="data-table-list">
       
         
                  
                   <table border=1>
                     <tr>
                       <td colspan=3 style="padding:10px;"><strong>TÍTULO DO PLANO DE TRABALHO: </strong>
                      <?php echo $titulo_cronograma;?>
                       </td>
                     </tr>
                     <tr>
                       <td width=33% style="padding:10px;"><strong>PREVISÃO INÍCIO:</strong>
                       <?php echo date('d/m/Y',  strtotime($datainicial_cronograma)); ?>
                       </td>
                    
                       <td width=33%  style="padding:10px;"><strong>PREVISÃO TÉRMINO:</strong>
                     <?php echo date('d/m/Y',  strtotime($previsaofim_cronograma)); ?>
                       </td>

                       <td width=34%  style="padding:10px;"><strong>ATINGIMENTO:</strong>
 <?php  $sql39 = "SELECT count(cronograma_tarefa) AS total39 FROM tarefa WHERE (`cronograma_tarefa` = '".$id_cronograma."')";
            $retorno39 = mysqli_query($mysqli,$sql39);
            $values39 = mysqli_fetch_assoc($retorno39);
            $num_rows39=$values39['total39'];
                               
            $sql49 = "SELECT count(cronograma_tarefa) AS total49 FROM tarefa WHERE (`cronograma_tarefa` = '".$id_cronograma."') AND (`status_tarefa` = 'CONCLUÍDO')";
            $retorno49 = mysqli_query($mysqli,$sql49);
            $values49 = mysqli_fetch_assoc($retorno49);
            $num_rows49=$values49['total49'];
                       
            if ($num_rows39 == 0){
              $percentual2 = 0;
            } else {
            $percentual2 = ($num_rows49/$num_rows39)*100;
          }
                                  echo $percentual2; ?> %
                       </td>
                     </tr>
                     <tr>
                       <td colspan=3  style="padding:10px;"><strong>OBJETIVO DO PROCESSO DE CONSULTORIA: </strong>
                   <?php echo $objetivo_cronograma;?>
                       </td>
                     </tr>
        </table>
        <table width=100% border=1>
          <tr>
          <?php   $sql4 = "SELECT * FROM `acaocronograma` WHERE (`idcronograma_acaocronograma` = '".$id_cronograma."')"; 
    $retorno4 = mysqli_query ($mysqli , $sql4) or die (mysql_error());
    while($dados4 = mysqli_fetch_array($retorno4)){
      $tarefa_acaocronograma = str_replace('<br />', "\n", $dados4['tarefa_acaocronograma']);
      
      $id_acaocronograma = $dados4['id_acaocronograma'];
   
    ?>
            <td colspan=5  style="padding:10px;"><strong>Etapa:</strong> <?php echo $tarefa_acaocronograma; ?></td>
    </tr>
    <tr>
      <td width=3% bgcolor=#000000 style="padding:10px;"></td>
      <td width=47% style="padding:10px;"><strong>Tarefa</strong></td>
      <td width=20% align="center" style="padding:10px;"><strong>Vencimento</strong></td>
      <td width=15% align="center" style="padding:10px;"><strong>Dono</strong></td>
      <td width=15% align="center" style="padding:10px;"><strong>Status</strong></td>
    </tr>
    <?php      
                          $sql = "SELECT * FROM `tarefa` WHERE (`bloco_tarefa` = '".$id_acaocronograma."') "; 
    $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
    while($lista= mysqli_fetch_array($retorno)){
        $tarefa_tarefa = str_replace('<br />', "\n", $lista['tarefa_tarefa']);
        $id_tarefa = str_replace('<br />', "\n", $lista['id_tarefa']);
        $vencimento_tarefa = str_replace('<br />', "\n", $lista['vencimento_tarefa']);
        $dono_tarefa = str_replace('<br />', "\n", $lista['dono_tarefa']);
      
       
       
        $status_tarefa = str_replace('<br />', "\n", $lista['status_tarefa']);
        
       

   
   
?>
                                    <tr>
                                      <td bgcolor=#000000></td>
                                        <td style="padding:10px;"><div id="espaco"><Font size="2"><?php echo $tarefa_tarefa; ?></div></td>
                                        <td align="center"><Font size="2"><?php echo date('d/m/Y',  strtotime($vencimento_tarefa)); ?></td>
                                        
                                        <td align="center"><Font size="2"><?php echo $dono_tarefa; ?>
                                    </td>
                                  
                                        <td align="center">
                                        <?php 
                                        
                                        echo $status_tarefa; ?>
                                        
                                     
                                        
                                                                     
                                      </tr>
                                     <?php } }?>

    
    </table>

 <br><br>
                      
                 
            
            </div>
           </div>
          </div>
        </div><br>
 
       <!-- Data Table area End-->    <!-- Data Table area End-->
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