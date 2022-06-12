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
                          
    <p>Sr(a),<b> <?php echo $_SESSION['UsuarioNome']; ?>,</b> preencha abaixo os dados do Novo cliente.</p>
   
  
      
         <form action="gravar_novocliente.php" method="POST" enctype="multipart/form-data">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>DADOS GERAIS:</h2>
                        </div>
                     
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">RAZÃO SOCIAL:</span>
                                   
                                    <div class="nk-int-st">
                                    <input type="text" class="form-control" id="razaosocial" name="razaosocial" placeholder="Preencha com a Razão Social">
                       </div>
                       </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                   
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">NOME FANTASIA:</span>
                                   
                                    <div class="nk-int-st">
                                    <input type="text" class="form-control" id="fantasia"  name="fantasia" placeholder="Preencha com o nome fantasia">
                                    </div>
                       </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">CNPJ:</span>
                                   
                                    <div class="nk-int-st">
                                    <input type="text" id="cnpj" name="cnpj"  class="form-control" placeholder="nº do CNPJ sem pontos ou traços">  
                 </div>
                 <span class="input-group-addon nk-ic-st-pro">  IE:</span>
                 <div class="nk-int-st">
                 <input type="text" id="ie" name="ie" class="form-control" placeholder="se não tiver escreva ISENTO">
                            </div>
            
                       </div>
                        
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">ENDEREÇO:</span>
                                   
                                    <div class="nk-int-st">
                                    <input type="text" id="endereco" name="endereco" class="form-control"  id="titulo" name="titulo" placeholder="Preencha com o endereço">
                                 </div>
                       </div>
                        
                          
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">

                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">BAIRRO:</span>
                                   
                                    <div class="nk-int-st">
                                    <input type="text" id="bairro" name="bairro"  class="form-control" placeholder="Preencha o bairro">
                                     </div>
                 <span class="input-group-addon nk-ic-st-pro">  CIDADE:</span>
                 <div class="nk-int-st">
                 <input type="text" id="cidade" name="cidade"   class="form-control" placeholder="Preencha a Cidade">
                                             </div>
                            <span class="input-group-addon nk-ic-st-pro">  UF:</span>
                 <div class="nk-int-st">
                 <input type="text" id="uf" name="uf"   class="form-control" placeholder="UF">
                                       </div>
           
                       </div>

                  
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">

                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">TELEFONE:</span>
                                   
                                    <div class="nk-int-st">
                                    <input type="text" id="telefone" name="telefone"   class="form-control" placeholder="Preencha o número do telefone">
                                      </div>
                 <span class="input-group-addon nk-ic-st-pro">  EMAIL:</span>
                 <div class="nk-int-st">
                 <input type="text" id="email" name="email" class="form-control" placeholder="Preencha o e-mail">                                       </div>
            
                       </div>


</div>
                              
	

                                    </div>
                                </div>
                            
                            <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">

                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">OBJETIVO:</span>
                                   
                                    <div class="nk-int-st">
                                    <input type="text" class="form-control" id="objetivo"   name="objetivo" placeholder="Preencha com o Objetivo a ser alcançado no processo de consultoria">
                                     </div>
                       </div>
                     
                                </div>
                            </div>
                        </div>

                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">

                                    <div class="input-group">
                              
                                    <span class="input-group-addon nk-ic-st-pro">LOGO DA EMPRESA:</span>
                                   
                                 
		
                                    <div class="nk-int-st">
                                    <input type="file" class="form-control" name="imagem" accept="image/*">  
                                    
                       </div> </div>
                     
                       </div>
                            </div>
                        </div> 

                       <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">

                                <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12">
                              <BR><bR>
                              


                                <a href= "gravar_novocliente.php";><button type="submit" class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
 <i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button></a>
         </form>
     					    	
                                      
                           
                                      
                                   
         <a href= "restrito.php";> <button  type="button" class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg">
                                      
        <i class="notika-icon notika-close"><font face="arial" size="2">  Cancelar  </font></i></button></a>
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





