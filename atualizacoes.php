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
      <!-- animate CSS
      ============================================ -->
      <link rel="stylesheet" href="css/animate.css">
      <!-- normalize CSS
      ============================================ -->
      <link rel="stylesheet" href="css/normalize.css">
      <!-- mCustomScrollbar CSS
      ============================================ -->
      <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
      <!-- wave CSS
      ============================================ -->
      <link rel="stylesheet" href="css/wave/waves.min.css">
      <!-- Notika icon CSS
      ============================================ -->
      <link rel="stylesheet" href="css/notika-custom-icon.css">
      <!-- main CSS
      ============================================ -->
      <link rel="stylesheet" href="css/main.css">
      <!-- style CSS
      ============================================ -->
      <link rel="stylesheet" href="style2.css">
      <!-- responsive CSS
      ============================================ -->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- modernizr JS
      ============================================ -->
      <script src="js/vendor/modernizr-2.8.3.min.js"></script>
    
  </head>
  
  <body>
      <!--[if lt IE 8]>
              <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->
         
  <br><br>
         
  <div class="container">
              <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="data-table-list">
                          <div class="basic-tb-hd">
                          
    <p>Sr(a),<b> <?php echo $_SESSION['UsuarioNome']; ?>,</b> segue abaixo as últimas atualizações de melhoria no sistema que foram realizadas.</p>
   
  
 
                         
<br>
                                   
                                    <A HREF="restrito.php">   <button  type="button" class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg" value="Enviar" onclick=" relocate_home1()">
                                      
    <font face="arial" size="2">  Voltar  </font></button></A>
      
                                                       
                      
                      

          
                      <BR>
                          <!-- Data Table area Start-->
                          <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>ATUALIZAÇÕES:</h2>
                        </div>
                            <table id="data-table-basic" class="table table-striped" width=100%>
                                <thead>
   
                               
          

                                    <tr><th width=50%>Solicitação</th>
                                        <th width=10% align="center"> Descrição</th>
                                        <th width=10% align="center">Criado em</th>
                                        <th width=10% align="center">Conclusão</th>
                                        <th width=10% align="center">Descrição</th>
                                    </tr>
                                </thead>
                                <tbody>
                     

                              
<?php      // Validação do usuário com empresas que atende
$filtro = 0;
$concluido = "Concluído";
$sql = "SELECT * FROM `solicitacao` WHERE  (`usuario_solicitacao` = '".$filtro."') and (`status_solicitacao` = '".$concluido."')";
$retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
 while ($lista = mysqli_fetch_assoc ($retorno)) {
      $titulo = $lista['titulo_solicitacao'];
      $cadastro = $lista['cadastro_solicitacao'];
      $previsao = $lista['previsao_solicitacao'];
      $conclusao = $lista['conclusao_solicitacao'];
      $status = $lista['status_solicitacao'];
      $descricao = $lista['descricao_solicitacao'];
?>      <tr>
                                        <td><?php echo $titulo; ?></td>
                                        <td> <button type="button" class="btn btn-warning warning-icon-notika btn-reco-mg btn-button-mg" data-container="body" data-toggle="popover" data-placement="bottom" data-content="<?php echo $descricao; ?>">  <font face="arial" size="2">  Descrição  </font></button>
     </td>
                                        <td><?php echo date('d/m/Y',  strtotime($cadastro)); ?></td>
                                        
                            
                                        <td>
                                        <?php if ($conclusao == null) {

                                        }    else{
                                            echo date('d/m/Y',  strtotime($conclusao)); 
                                        }  ?>
                                       </td>
                                        <td><?php echo $status; ?></td>
                                      </tr>
<?php } ?>
                                </tbody>
                               
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->
                          <br><br>
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
      <!--  wave JS
      ============================================ -->
      <script src="js/wave/waves.min.js"></script>
      <script src="js/wave/wave-active.js"></script>
      <!-- icheck JS
      ============================================ -->
      <script src="js/icheck/icheck.min.js"></script>
      <script src="js/icheck/icheck-active.js"></script>
      <!--  todo JS
      ============================================ -->
      <script src="js/todo/jquery.todo.js"></script>
      <!-- Login JS
      ============================================ -->
      <script src="js/login/login-action.js"></script>
      <!-- plugins JS
      ============================================ -->
      <script src="js/plugins.js"></script>
      <!-- main JS
      ============================================ -->
      <script src="js/main.js"></script>
  </body>
  
  </html>





