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

   if(t == "celular"){
      if(v[0] == 14){
         i.setAttribute("maxlength", "14");
        
         if (v.length == 2) i.value += ")";
         if (v.length == 9) i.value += "-";
     
         
      }else{
         i.setAttribute("maxlength", "13");
         if (v.length == 2) i.value += " ";
         if (v.length == 8) i.value += "-";
      }
   }   
}
</script>


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
                          
    <p>Sr(a),<b> <?php echo $_SESSION['UsuarioNome']; ?>,</b> preencha abaixo com os seus dados profissionais.</p>
    <?php      // Validação do usuário com empresas que atende

 
      $sql2 = "SELECT * FROM `usuarios` WHERE (`id_usuarios` = '".$idconsultor."')"; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
       while ($lista2 = mysqli_fetch_assoc ($retorno2)) {
        $nome = $lista2['nome_usuarios'];
        $email = $lista2['email_usuarios'];
        $imagem = $lista2['imagem_usuarios'];
        $facebook = $lista2['facebook_usuarios'];
        $instagram = $lista2['instagram_usuarios'];
        $twitter = $lista2['twitter_usuarios'];
        $youtube = $lista2['youtube_usuarios'];
        $discord = $lista2['discord_usuarios'];
        $telegram = $lista2['telegram_usuarios'];
        $linkedin = $lista2['linkedin_usuarios'];      
        $tiktok = $lista2['tiktok_usuarios'];      
        $site = $lista2['site_usuarios'];      
        $formacao = $lista2['formacao_usuarios'];      
        $viagem = $lista2['viagem_usuarios'];      
        $atuacao1 = $lista2['atuacao1_usuarios']; 
        $atuacao2 = $lista2['atuacao2_usuarios']; 
        $atuacao3 = $lista2['atuacao3_usuarios']; 
        $atuacao4 = $lista2['atuacao4_usuarios']; 
        $atuacao5 = $lista2['atuacao5_usuarios']; 
        $lattes = $lista2['lattes_usuarios']; 
        $telefone = $lista2['telefone_usuarios']; 

       }
 ?>
  
      
         <form action="gravar_meuperfil.php" method="POST" enctype="multipart/form-data">
         <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>MEU PERFIL PROFISSIONAL:</h2>
                        </div>
                     
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">NOME:</span>
                                    <div class="nk-int-st">
                                    
                                        <input type="text" class="form-control" id="nome"  name="nome" value="<?php echo $nome; ?>">
                                     
                                    </div> </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">TELEFONE:</span>
                                    <div class="nk-int-st">
                                        
                                            <input type="text" id="telefone" name="telefone" oninput="mascara(this, 'celular')"  class="form-control input-sm" value="<?php echo $telefone; ?>">
                                       
                                    </div>
                                   
                                    <span class="input-group-addon nk-ic-st-pro">E-MAIL:</span>
                                    <div class="nk-int-st">
                                            <input type="text" id="email" name="email"  minlength="6"  maxlength="100" class="form-control input-sm" value="<?php echo $email; ?>">
</div>
</div>
	

                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">SITE:</span>
                                    <div class="nk-int-st">
                                    
                                    <input type="text" class="form-control" id="site"  name="site" value="<?php echo $nome; ?>">
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">FORMAÇÃO:</span>
                                    <div class="nk-int-st">
                                    
                                    <textarea type="text" class="form-control" id="formacao" name="formacao" rows="10" minlength="10" maxlength="900" ><?php echo $formacao; ?></textarea>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">CURRÍCULO LATTES:</span>
                                    <div class="nk-int-st">
                                        
                                            <input type="text" id="lattes" name="lattes"  class="form-control input-sm" value="<?php echo $lattes; ?>">
                                       
                                    </div>
                                    
                                    <span class="input-group-addon nk-ic-st-pro">DISPONIBILIDADE PARA VIAGEM:</span>
                                    <div class="nk-int-st">
                                     
                                    <select id="viagem" class="form-control" name="viagem">
                                    <option value="<?php echo $viagem; ?>" selected ><?php echo $viagem; ?></option>   
                                    <option value="Sim">Sim</option>
                                        <option value="Não">Não</option>
                                       
                                    </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        



                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">MEU AVATAR:</span>
                                 
		
                                    <div class="nk-int-st">
                                    <?php echo $imagem; ?>
                                      <img src="img/profile/<?php echo $imagem; ?>" width=160 height=160>
                                      </DIV></DIV>
                                
                                </DIV></DIV>  </DIV>
                                <div class="form-example-int form-horizental">
                                                        <div class="form-group">
                                                            <div class="row">
                                                            <div class="input-group">

                                                            <span class="input-group-addon nk-ic-st-pro">NOVO AVATAR:</span>
                                                            <div class="nk-int-st">
                                                            <input type="file" name="imagem" accept="image/*">  
                                    <input type="hidden" id="imagem2" name="imagem2" value="<?php echo $imagem; ?>">  
                                    <input type="hidden" id="id" name="id" value="<?php echo $idconsultor; ?>">  
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
<br><br>
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>REDES SOCIAIS:</h2>
                        </div>
                     



                            <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">FACEBOOK:</span>
                                    <div class="nk-int-st">
                                        
                                            <input type="text" id="facebook" name="facebook" class="form-control input-sm" value="<?php echo $facebook; ?>">
                                       
                                    </div>
                                   
                                    <span class="input-group-addon nk-ic-st-pro">INSTAGRAM:</span>
                                    <div class="nk-int-st">
                                     
                                            <input type="text" id="instagram" name="instagram" class="form-control input-sm" value="<?php echo $instagram; ?>">
</div>
</div>            </div>
                                </div>
                            </div>


                            <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">YOUTUBE:</span>
                                    <div class="nk-int-st">
                                        
                                            <input type="text" id="youtube" name="youtube" class="form-control input-sm" value="<?php echo $youtube; ?>">
                                       
                                    </div>
                                  
                                    <span class="input-group-addon nk-ic-st-pro">TWITTER:</span>
                                    <div class="nk-int-st">
                                     
                                            <input type="text" id="twitter" name="twitter" class="form-control input-sm" value="<?php echo $twitter; ?>">
</div> </div>
                                                                  </div>
                                </div>
                            </div>

                            <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">DISCORD:</span>
                                    <div class="nk-int-st">
                                        
                                            <input type="text" id="discord" name="discord" class="form-control input-sm" value="<?php echo $discord; ?>">
                                       
                                    </div>
                                   
                                    <span class="input-group-addon nk-ic-st-pro">TELEGRAM:</span>
                                    <div class="nk-int-st">
                                     
                                            <input type="text" id="telegram" name="telegram" class="form-control input-sm" value="<?php echo $telegram; ?>">
</div>
</div>           </div>
                                </div>
                            </div>



                            <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">LINKEDIN:</span>
                                    <div class="nk-int-st">
                                        
                                            <input type="text" id="linkedin" name="linkedin" class="form-control input-sm" value="<?php echo $linkedin; ?>">
                                       
                                    </div>
                                   
                                    <span class="input-group-addon nk-ic-st-pro">TIKTOK:</span>
                                    <div class="nk-int-st">
                                     
                                            <input type="text" id="tiktok" name="tiktok" class="form-control input-sm" value="<?php echo $tiktok; ?>">
</div>
</div>           </div>
                                </div>
                            </div>
<br><br>
                            <div class="cmp-tb-hd cmp-int-hd">
                            <h2>ÁREA DE ATUAÇÃO:</h2>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">ÁREA DE ATUAÇão 1:</span>
                                     <div class="nk-int-st">
                                    <select id="atuacao1" class="form-control" name="atuacao1">
                                    <option value="<?php echo $atuacao1; ?>" selected ><?php echo $atuacao1; ?></option>   
                                    <option value="Gestão Estratégica">Gestão Estratégica</option>
                                        <option value="Gestão Comercial">Gestão Comercial</option>
                                        <option value="Gestão Financeira">Gestão Financeira</option>
                                        <option value="Gestão em Processos">Gestão em Processos</option>
                                        <option value="Gestão de RH">Gestão de RH</option>
                                        <option value="Gestão em Logística">Gestão em Logística</option>
                                        <option value="Gestão de Ativos">Gestão de Ativos</option>
                                        <option value="Gestão em Segurança">Gestão em Segurança</option>
                                        <option value="Gestão Mercadológica">Gestão Mercadológica</option>
                                        <option value="Gestão em Inovação">Gestão em Inovação</option>
                                    </select>
                                   
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">ÁREA DE ATUAÇão 2:</span>
                                     <div class="nk-int-st">
                                    <select id="atuacao2" class="form-control" name="atuacao2">
                                    <option value="<?php echo $atuacao2; ?>" selected ><?php echo $atuacao2; ?></option>        
                                    <option value="Gestão Estratégica">Gestão Estratégica</option>
                                        <option value="Gestão Comercial">Gestão Comercial</option>
                                        <option value="Gestão Financeira">Gestão Financeira</option>
                                        <option value="Gestão em Processos">Gestão em Processos</option>
                                        <option value="Gestão de RH">Gestão de RH</option>
                                        <option value="Gestão em Logística">Gestão em Logística</option>
                                        <option value="Gestão de Ativos">Gestão de Ativos</option>
                                        <option value="Gestão em Segurança">Gestão em Segurança</option>
                                        <option value="Gestão Mercadológica">Gestão Mercadológica</option>
                                        <option value="Gestão em Inovação">Gestão em Inovação</option>
                                    </select>
                                   
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">ÁREA DE ATUAÇão 3:</span>
                                     <div class="nk-int-st">
                                    <select id="atuacao3" class="form-control" name="atuacao3" >
                                    <option value="<?php echo $atuacao3; ?>" selected ><?php echo $atuacao3; ?></option>   
                                         <option value="Gestão Estratégica">Gestão Estratégica</option>
                                        <option value="Gestão Comercial">Gestão Comercial</option>
                                        <option value="Gestão Financeira">Gestão Financeia</option>
                                        <option value="Gestão em Processos">Gestão em Processos</option>
                                        <option value="Gestão de RH">Gestão de RH</option>
                                        <option value="Gestão em Logística">Gestão em Logística</option>
                                        <option value="Gestão de Ativos">Gestão de Ativos</option>
                                        <option value="Gestão em Segurança">Gestão em Segurança</option>
                                        <option value="Gestão Mercadológica">Gestão Mercadológica</option>
                                        <option value="Gestão em Inovação">Gestão em Inovação</option>
                                    </select>
                                    </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">ÁREA DE ATUAÇão 4:</span>
                                     <div class="nk-int-st">
                                    <select id="atuacao4" class="form-control" name="atuacao4" >
                                    <option value="<?php echo $atuacao4; ?>" selected ><?php echo $atuacao4; ?></option>   
                                         <option value="Gestão Estratégica">Gestão Estratégica</option>
                                        <option value="Gestão Comercial">Gestão Comercial</option>
                                        <option value="Gestão Financeira">Gestão Financeia</option>
                                        <option value="Gestão em Processos">Gestão em Processos</option>
                                        <option value="Gestão de RH">Gestão de RH</option>
                                        <option value="Gestão em Logística">Gestão em Logística</option>
                                        <option value="Gestão de Ativos">Gestão de Ativos</option>
                                        <option value="Gestão em Segurança">Gestão em Segurança</option>
                                        <option value="Gestão Mercadológica">Gestão Mercadológica</option>
                                        <option value="Gestão em Inovação">Gestão em Inovação</option>
                                    </select>
                                    </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">ÁREA DE ATUAÇão 5:</span>
                                     <div class="nk-int-st">
                                    <select id="atuacao5" class="form-control" name="atuacao5" >
                                    <option value="<?php echo $atuacao5; ?>" selected ><?php echo $atuacao5; ?></option>   
                                         <option value="Gestão Estratégica">Gestão Estratégica</option>
                                        <option value="Gestão Comercial">Gestão Comercial</option>
                                        <option value="Gestão Financeira">Gestão Financeia</option>
                                        <option value="Gestão em Processos">Gestão em Processos</option>
                                        <option value="Gestão de RH">Gestão de RH</option>
                                        <option value="Gestão em Logística">Gestão em Logística</option>
                                        <option value="Gestão de Ativos">Gestão de Ativos</option>
                                        <option value="Gestão em Segurança">Gestão em Segurança</option>
                                        <option value="Gestão Mercadológica">Gestão Mercadológica</option>
                                        <option value="Gestão em Inovação">Gestão em Inovação</option>
                                    </select>
                                   
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                                <br><br>
                              
                            


                                <A HREF="gravar_meuperfil.php"><button type="submit" class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home()">
       
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





