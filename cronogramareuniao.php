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
    <!-- Caminho -->
    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                <div class="alert alert-info" role="alert">
                        <ul>
                            <li><a href="index.php">Home </a>/ Cliente / Cronograma de Reunião</li>
                            
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
                            <h2>Cronograma de Reunião</h2>
                            <p>Crie um cronograma de sua próxima reunião com o cliente e envie para a aprovação do cliente.</p>
                        </div>
                        <a href = "criar_cronogramareuniao.php"><div class="table-responsive"> <button type="button" class="btn btn-primary btn-lg">
Novo Cronograma de Reunião</button></a><br><br>
                
                            <table id="data-table-basic" class="table table-striped" width=100%>
                                <thead>
   
                               
          

                                    <tr><th width=44%>Cronograma de Reunião</th>
                                        <th width=8% align="center">Status</th>
                                        <th width=8% align="center">Data Reunião</th>
                                        <th width=8% align="center">Visualizar</th>
                                        <th width=8% align="center">Editar</th>
                                        <th width=8% align="center">Excluir</th>
                                        <th width=8% align="center">Enviar Aprovação</th>
                                        <th width=8% align="center">Aprovação Cliente</th>

                                     
                                    </tr>
                                </thead>
                                <tbody>
                         <?php      
                          $sql3 = "SELECT * FROM `cronogramareuniao` WHERE (`consultoria_cronogramareuniao` = '".$consultoria_usuarios."') AND (`empresa_cronogramareuniao` = '".$EmpresaID."') "; 
    $retorno3 = mysqli_query ($mysqli , $sql3) or die (mysql_error());
    while($dados3 = mysqli_fetch_array($retorno3)){
    $id_cronogramareuniao = $dados3['id_cronogramareuniao'];
    $dataregistro_cronogramareuniao = $dados3['dataregistro_cronogramareuniao'];
    $data_cronogramareuniao = $dados3['data_cronogramareuniao'];
    $status_cronogramareuniao = $dados3['status_cronogramareuniao'];
    $titulo_cronogramareuniao = $dados3['titulo_cronogramareuniao'];

    
  
?>
                                    <tr>
                                        <td><div id="espaco"><?php echo $titulo_cronogramareuniao; ?></div></td>
                                        <td><?php echo $status_cronogramareuniao; ?></td>
                                        <td><?php echo date('d/m/Y',  strtotime($data_cronogramareuniao)); ?></td>
                                  
                                        <td><a href="visualiza_cronogramareuniao.php?id=<?php echo $id_cronogramareuniao; ?>"><button type="button" class="btn btn-success btn-sm">Visualizar</button>
                                      
                                      </a>
                                    </td>
                                  
                                        <td><a href="editar_cronogramareuniao.php?id=<?php echo $id_cronogramareuniao; ?>"><button type="button" class="btn btn-warning btn-sm"  value="Input Button">Editar</button></a></td>
                                        <td><a href="apagar_cronogramareuniao.php?id=<?php echo $id_cronogramareuniao; ?>"><button type="button" class="btn btn-danger btn-sm">Excluir</button></td>
                                        <td align="center">
                                          
                                          <?php 
                                          if ($nivelacesso_consultor == 4) {
                                           echo 'Restrito ao Consultor';
                                          }
                                          if (($status_cronogramareuniao == 'Pendente') AND ($nivelacesso_consultor <> 4)) { ?>
                                              <a href="submeter_cronogramareuniao.php?id=<?php echo $id_cronogramareuniao; ?>&apreciacao=<?php echo $status_cronogramareuniao; ?>"><button type="button" class="btn btn-danger btn-sm"  value="Input Button">Enviar para Aprovação</button></a>
                                        <?php  } if (($status_cronogramareuniao == 'Enviado') AND ($nivelacesso_consultor <> 4)) { ?>
                                          <a href="submeter_cronogramareuniao.php?id=<?php echo $id_cronogramareuniao; ?>&apreciacao=<?php echo $status_cronogramareuniao; ?>"><button type="button" class="btn btn-success btn-sm"  value="Input Button">Enviado para Aprovação</button></a>
                                        <?PHP } if (($status_cronogramareuniao == 'Aprovado') AND ($nivelacesso_consultor <> 4)) { ?>
                                          <a href="submeter_cronogramareuniao.php?id=<?php echo $id_cronogramareuniao; ?>&apreciacao=<?php echo $status_cronogramareuniao; ?>"><button type="button" class="btn btn-primary btn-sm"  value="Input Button">Aprovado pelo Cliente</button></a>
                                          <?PHP } ?>
                                        </td>
                                        <td align="center">
                                          
                                          <?php 
                                           if ($nivelacesso_consultor <> 4) { 
                                            echo 'Exclusivo para Cliente';
                                           }
                                           if (($status_cronogramareuniao == 'Pendente') AND ($nivelacesso_consultor == 4)) { 
                                           echo 'Aguardando ser Enviado'; } 
                                           if (($status_cronogramareuniao <> 'Pendente') AND ($nivelacesso_consultor == 4)) { ?>
                                                                              
                                              <a href="submeter_cronogramareuniao.php?id=<?php echo $id_cronogramareuniao; ?>&apreciacao=<?php echo 'Reprovar'; ?>"><button type="button" class="btn btn-danger btn-sm"  value="Input Button">Reprovar</button></a>
                                       
                                          <a href="submeter_cronogramareuniao.php?id=<?php echo $id_cronogramareuniao; ?>&apreciacao=<?php echo 'Aprovar'; ?>"><button type="button" class="btn btn-success btn-sm"  value="Input Button">Aprovar</button></a>
                                        
                                      
                                          <?PHP } ?>
                                        </td>      
                                      </tr>
                                      <?php } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>Cronograma de Reunião</th>
                                        <th align="center">Status</th>
                                        <th align="center">Data Reunião</th>
                                        <th align="center">Visualizar</th>
                                        <th align="center">Editar</th>
                                        <th align="center">Excluir</th>
                                        <th align="center">Enviar Aprovação</th>
                                        <th align="center">Aprovação Cliente</th>
                                   
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