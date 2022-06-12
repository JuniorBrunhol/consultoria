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
                          
    <p>Sr(a),<b> <?php echo $_SESSION['UsuarioNome']; ?>,</b> preencha abaixo com os dados de sua empresa.</p>
    <?php      // Validação do usuário com empresas que atende

 
      $sql2 = "SELECT * FROM `consultoria` WHERE (`id_consultoria` = '".$consultoria_usuarios."')"; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
       while ($lista2 = mysqli_fetch_assoc ($retorno2)) {
        $razaosocial = $lista2['razaosocial_consultoria'];
        $idconsultoria = $lista2['id_consultoria'];
        $imagem = $lista2['imagem_consultoria'];
        $fantasia = $lista2['fantasia_consultoria'];
        $cnpj = $lista2['cnpj_consultoria'];
        $ie = $lista2['ie_consultoria'];
        $telefone = $lista2['telefone_consultoria'];
        $email = $lista2['email_consultoria'];
        $licenca = $lista2['licenca_consultoria'];
        $licenca2 = date('d/m/Y',  strtotime($licenca));
        $plano = $lista2['plano_consultoria'];      
        $endereco = $lista2['endereco_consultoria'];      
        $bairro = $lista2['bairro_consultoria'];      
        $cidade = $lista2['cidade_consultoria'];      
        $uf = $lista2['uf_consultoria'];      


       }
 ?>
  
      
         <form action="gravar_meusdados.php" method="POST" enctype="multipart/form-data">
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>DADOS DA MINHA EMPRESA:</h2>
                        </div>
                     
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">RAZÃO SOCIAL:</span>
                                    <div class="nk-int-st">
                                    
                                        <input type="text" class="form-control" id="razaosocial" minlength="10" maxlength="50"name="razaosocial" value="<?php echo $razaosocial; ?>">
    </DIV>
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
                                    
                                        <input type="text" class="form-control" id="fantasia"  minlength="10" maxlength="30" name="fantasia" value="<?php echo $fantasia; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">CNPJ:</span>
                                    <div class="nk-int-st">
                                        
                                            <input type="text" id="cnpj" name="cnpj"  minlength="5"  maxlength="20" class="form-control input-sm" value="<?php echo $cnpj; ?>">
                                       
                                    </div>
                                    
                                    <span class="input-group-addon nk-ic-st-pro">IE:</span>
                                    <div class="nk-int-st">
                                     
                                            <input type="text" id="ie" name="ie" class="form-control input-sm" minlength="5"  maxlength="20" value="<?php echo $ie; ?>">
                                        
                                    </div> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">ENDEREÇO:</span>
                                    <div class="nk-int-st">
                                    
                                        <input type="text" id="endereco" name="endereco" class="form-control" minlength="6"  maxlength="250" id="titulo" name="titulo" value="<?php echo $endereco; ?>">
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">BAIRRO:</span>
                                    <div class="nk-int-st">
                                        
                                            <input type="text" id="bairro" name="bairro" minlength="6"  maxlength="100" class="form-control input-sm" value="<?php echo $bairro; ?>">
                                       
                                    </div>
                                    <span class="input-group-addon nk-ic-st-pro">CIDADE:</span>
                                    <div class="nk-int-st">
                                     
                                            <input type="text" id="cidade" name="cidade" minlength="6"  maxlength="100"  class="form-control input-sm" value="<?php echo $cidade; ?>">
                                        
                                    </div>
                                    <span class="input-group-addon nk-ic-st-pro">UF:</span>
                                    <div class="nk-int-st">
                                     
                                            <input type="text" id="uf" name="uf"  minlength="1"  maxlength="2" class="form-control input-sm" value="<?php echo $uf; ?>">
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">TELEFONE:</span>
                                  <div class="nk-int-st">
                                        
                                            <input type="text" id="telefone" name="telefone" minlength="6"  maxlength="20"  class="form-control input-sm" value="<?php echo $telefone; ?>">
                                       
                                    </div>
                                    <span class="input-group-addon nk-ic-st-pro">E-MAIL:</span>
                                  <div class="nk-int-st">
                                     
                                            <input type="text" id="email" name="email"  minlength="6"  maxlength="100" class="form-control input-sm" value="<?php echo $email; ?>">
</div>
                              
</div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental mg-t-15">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">LICENÇA:</span>
                                  <div class="nk-int-st">
                                        
                                            <input type="text" id="licenca2" name="licenca2" disabled="disabled" class="form-control input-sm" value="<?php echo $licenca2; ?>">
                                            <input type="hidden" id="licenca" name="licenca"class="form-control input-sm" value="<?php echo $licenca2; ?>">
                                      
                                    </div>
                                  
                                    <span class="input-group-addon nk-ic-st-pro">PLANO:</span>
                                  <div class="nk-int-st">
                                     
                                            <input type="text" id="plano2" name="plano2" disabled="disabled" class="form-control input-sm" value="<?php echo $plano; ?>">
                                            <input type="hidden" id="plano" name="plano" class="form-control input-sm" value="<?php echo $plano; ?>">
</div>
                              
</div>

                                    </div>
                                </div>
                            </div>
<div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">LOGO ATUAL CADASTRADA:</span>
                                 
		
                                    <div class="nk-int-st">
                                    <?php echo $imagem; ?>
                                      <img src="img/logo/<?php echo $imagem; ?>" width=160 height=80>
                                   
    </DIV></DIV>
                                
    </DIV></DIV>  </DIV>
    <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">CLIQUE PARA ATUALIZAR A LOGO:</span>
                                 
		
                                    <div class="nk-int-st">
                                  
                                    <input type="file" class="form-control" name="imagem" accept="image/*">  
                                    <input type="hidden" id="imagem2" name="imagem2" value="<?php echo $imagem; ?>">  
                                    <input type="hidden" id="id" name="id" value="<?php echo $consultoria_usuarios; ?>">  
    </DIV></DIV>
                                
    </DIV></DIV>  </DIV>
    <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">

                                <div class="col-lg-6 col-md-3 col-sm-3 col-xs-12">
                              <BR><bR>
                              
                            


                                <A HREF="gravar_meusdados.php"><button type="submit" class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home()">
       
      <i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button></A>
         </form>
     					    	
         <A HREF="restrito.php"> <button  type="button" class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg" value="Enviar" onclick=" relocate_home1()">
                                      
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





