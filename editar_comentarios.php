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
  $EmpresaID =  $_SESSION['EmpresaID'];
  $plano = $_SESSION['Plano'];
  $consultoria_usuarios = $_SESSION['Consultoria'];
  $idcomentario = $_GET['coment'];
  unset($_GET['coment']);

$sql = "SELECT * FROM `comentarios` WHERE (`id_comentarios` = '". $idcomentario."')"; 
$retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
 while ($lista = mysqli_fetch_assoc ($retorno)) {
      $contato = $lista['contato_comentarios'];
      $empresa = $lista['empresa_comentarios'];
      $idconsultoria = $lista['idconsultoria_comentarios'];
      $descricao = $lista['descricao_comentarios'];
      $idcomentario = $lista['id_comentarios'];
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
                          
    <p>Sr(a),<b> <?php echo $_SESSION['UsuarioNome']; ?>,</b> Edite o comentário selecionado.</p>
   
  
      
         <form action="gravaredicao_comentarios.php?idcomentario=<?php echo $idcomentario; ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>EDIÇÃO DE COMENTARIOS:</h2>
                        </div>
                     
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Contato:</label>
                                    </div>
                                    <div class="col-lg-4 col-md-7 col-sm-7 col-xs-12">
                                    
                                        <input type="text" class="form-control" id="contato" minlength="10" maxlength="195" name="contato" placeholder="Preencha com o nome da pessoa" value="<?php echo $contato; ?>">
                                     
                                    </div>
                                    <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">Empresa:</label>
                                    </div>
                                    <div class="col-lg-4 col-md-7 col-sm-7 col-xs-12">
                                    
                                        <input type="text" class="form-control" id="contato" minlength="10" maxlength="195" name="empresa" placeholder="Preencha com o nome da empresa" value="<?php echo $empresa; ?>">
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                  
                  
         

                                        <label class="hrzn-fm">Comentário:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="descricao" name="descricao" rows="10" minlength="10" placeholder="Preencha suas sugestão / solicitação aqui."> <?php echo $descricao; ?>"</textarea>
              
                                    </div>
                                </div>
                            </div>
                        </div>
                 
<div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        
                                    </div>
		
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                 
                         
<br>
                                <button type="submit" class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home()">
       
       <script>
       function relocate_home()
       {
            location.href = "gravaredicao_comentarios.php?idcomentario=<?php echo $idcomentario; ?>";
       } 
       </script>  <i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button>
         </form>
     					    	
                     <button type="button" class="btn btn-warning warning-icon-notika btn-reco-mg btn-button-mg" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Preencha todos os campos para efetivar o cadastro do novo cliente corretamente.">  <i class="far fa-lightbulb"><font face="arial" size="2">  Ajuda  </font></i></button>
                                      
                           
                                      
                                   
                                       <button  type="button" class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg" value="Enviar" onclick=" relocate_home1()">
                                      
        <i class="notika-icon notika-close"><font face="arial" size="2">  Cancelar  </font></i></button>
        <script>
       function relocate_home1()
       {
            location.href = "restrito.php";
       } 
       </script>  
                                    </div>
                                </div>
                            </div>
                        </div>                                       
                      
                      

                        </div>
                  </div>
              </div>
          </div>
      </div>
  
                          </div>
          
                      
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





