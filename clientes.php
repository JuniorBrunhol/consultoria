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


     
  
        $sql = "SELECT * FROM `empresa` WHERE (`id_empresa` = '".$EmpresaID."')"; 
        $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
        while ($lista = mysqli_fetch_assoc ($retorno)) {
          $razaosocial_empresa = str_replace('<br />', "\n", $lista['razaosocial_empresa']);
          $nomefantasia_empresa = str_replace('<br />', "\n", $lista['nomefantasia_empresa']);
          $imagem_empresa = str_replace('<br />', "\n", $lista['imagem_empresa']);
          $cnpj_empresa = str_replace('<br />', "\n", $lista['cnpj_empresa']);
          $ie_empresa = str_replace('<br />', "\n", $lista['ie_empresa']);
          $telefone_empresa = str_replace('<br />', "\n", $lista['telefone_empresa']);
          $endereco_empresa = str_replace('<br />', "\n", $lista['endereco_empresa']);
          $bairro_empresa = str_replace('<br />', "\n", $lista['bairro_empresa']);
          $cidade_empresa = str_replace('<br />', "\n", $lista['cidade_empresa']);
          $uf_empresa = str_replace('<br />', "\n", $lista['uf_empresa']);
          $email_empresa = str_replace('<br />', "\n", $lista['email_empresa']);
          $idconsultor_empresa = str_replace('<br />', "\n", $lista['idconsultor_empresa']);
          $responsavel_empresa = str_replace('<br />', "\n", $lista['responsavel_empresa']);
          $pais_empresa = str_replace('<br />', "\n", $lista['pais_empresa']);
          $rg_empresa = str_replace('<br />', "\n", $lista['rg_empresa']);
          $cpf_empresa = str_replace('<br />', "\n", $lista['cpf_empresa']);
          $objetivo_empresa = str_replace('<br />', "\n", $lista['objetivo_empresa']);
             
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
    <link rel="stylesheet" href="style2.css">
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
                        <a href="index.php"><img width="100" src="img/logo/logo.png" alt="" /></a>
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
                            <li><a href="index.php">Home </a>/ <a href="clientes.php">Dados Gerais </a>/ Visualizar - Editar</li>
                            
                        </ul>      
                        
                </div>
                   
                </div>
            </div>
        </div>
    </div>
  
        
    
         <!-- Data Table area Start-->
      
         <div class="data-table-area">
             <div class="container">
        <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 
                    <div class="form-example-wrap mg-t-30">
                        <div class="cmp-tb-hd cmp-int-hd">
                            <h2>DADOS DO CLIENTE:</h2>
                        </div>
                        <form action="gravaredicao_cliente.php" method="POST" enctype="multipart/form-data">
                        <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">RAZÃO SOCIAL:</span>
                                    <div class="nk-int-st">
                                    
                                        <input type="text" class="form-control" id="razaosocial_empresa" name="razaosocial_empresa" placeholder="Preencha com a Razão Social" value="<?php echo  $razaosocial_empresa;?>">
                                     
                                    </div>  </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">FANTASIA:</span>
                                    <div class="nk-int-st">
                                    
                                        <input type="text" class="form-control" id="nomefantasia_empresa" name="nomefantasia_empresa"  placeholder="Preencha com o nome fantasia" value="<?php echo  $nomefantasia_empresa;?>">
                                     
                                    </div>  </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">CNPJ:</span>
                                    <div class="nk-int-st">
                                    
                                        <input type="text" class="form-control" id="cnpj_empresa" name="cnpj_empresa"  placeholder="Preencha com o CNPJ da empresa" value="<?php echo  $cnpj_empresa;?>">
                                     
                                    </div>
                                    <span class="input-group-addon nk-ic-st-pro">IE:</span>
                                    <div class="nk-int-st">
                                    
                                    <input type="text" class="form-control" id="ie_empresa" name="ie_empresa"  placeholder="Preencha com a IE da empresa" value="<?php echo  $ie_empresa;?>">
                                 
                                </div>
                        
                                  </div>
                                </div>
                            </div>
                        </div>

                     
                        <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">ENDEREÇO:</span>
                                    <div class="nk-int-st">
                                    
                                        <input type="text" class="form-control" id="endereco_empresa" name="endereco_empresa"  placeholder="Preencha com o endereço da empresa" value="<?php echo  $endereco_empresa;?>">
                                     
                                    </div>  </div>
                                </div>
                            </div>
                        </div>
                     
                        <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">BAIRRO:</span>
                                    <div class="nk-int-st">
                                    
                                        <input type="text" class="form-control" id="bairro_empresa" name="bairro_empresa"  placeholder="Preencha com o bairro da empresa" value="<?php echo  $bairro_empresa;?>">
                                     
                                    </div>
                                    <span class="input-group-addon nk-ic-st-pro">CIDADE:</span>
                                    <div class="nk-int-st">
                                    
                                    <input type="text" class="form-control" id="cidade_empresa" name="cidade_empresa"  placeholder="Preencha com a cidade da empresa" value="<?php echo  $cidade_empresa;?>">
                                 
                                </div>
                                <span class="input-group-addon nk-ic-st-pro">UF:</span>
                                    <div class="nk-int-st">
                                    
                                    <input type="text" class="form-control" id="uf_empresa" name="uf_empresa"  placeholder="Preencha com a UF da empresa" value="<?php echo  $uf_empresa;?>">
                                 
                                </div>
                        
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">TELEFONE:</span>
                                    <div class="nk-int-st">
                                    
                                        <input type="text" class="form-control" id="telefone_empresa" name="telefone_empresa"  placeholder="Preencha com o telefone da empresa" value="<?php echo  $telefone_empresa;?>">
                                     
                                    </div>
                                    <span class="input-group-addon nk-ic-st-pro">E-MAIL:</span>
                                    <div class="nk-int-st">
                                    
                                    <input type="text" class="form-control" id="email_empresa" name="email_empresa"  placeholder="Preencha com o email da empresa" value="<?php echo  $email_empresa;?>">
                                 
                                </div>
                        
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">PAÍS:</span>
                                    <div class="nk-int-st">
                                    
                                        <input type="text" class="form-control" id="pais_empresa" name="pais_empresa"  placeholder="Preencha com o pais da empresa" value="<?php echo  $pais_empresa;?>">
                                     
                                    </div>
                                    <span class="input-group-addon nk-ic-st-pro">RESPONSÁVEL:</span>
                                    <div class="nk-int-st">
                                    
                                    <input type="text" class="form-control" id="responsavel_empresa" name="responsavel_empresa"  placeholder="Preencha com a responsavel da empresa" value="<?php echo  $responsavel_empresa;?>">
                                 
                                </div>
                        
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">CPF:</span>
                                    <div class="nk-int-st">
                                    
                                        <input type="text" class="form-control" id="cpf_empresa" name="cpf_empresa"  placeholder="Preencha com o cpf do responsável pela empresa" value="<?php echo  $cpf_empresa;?>">
                                     
                                    </div>
                                    <span class="input-group-addon nk-ic-st-pro">RG:</span>
                                    <div class="nk-int-st">
                                    
                                    <input type="text" class="form-control" id="rg_empresa" name="rg_empresa"  placeholder="Preencha com o rg do responsável pela empresa" value="<?php echo  $rg_empresa;?>">
                                 
                                </div>
                        
                                  </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-11 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">OBJETIVO DA CONSULTORIA:</span>
                                    <div class="nk-int-st">
                                    
                                        <input type="text" class="form-control" id="objetivo_empresa" name="objetivo_empresa" placeholder="Preencha com o objetivo do processo de consultoria" value="<?php echo  $objetivo_empresa;?>">
                                     
                                    </div>  </div>
                                </div>
                            </div>
                        </div>
                      
                        <div class="form-example-int form-horizental">
                            <div class="form-group">
                                <div class="row">
                                <div class="input-group">
                                    <span class="input-group-addon nk-ic-st-pro">LOGO ATUAL CLIENTE:</span>
                                 
		
                                    <div class="nk-int-st">
                                    <?php echo $imagem_empresa; ?>
                                      <img src="img/clientes/<?php echo $imagem_empresa; ?>" width=160 height=160>
                                      </DIV></DIV>
                                
                                </DIV></DIV>  </DIV>
                                <div class="form-example-int form-horizental">
                                                        <div class="form-group">
                                                            <div class="row">
                                                            <div class="input-group">

                                                            <span class="input-group-addon nk-ic-st-pro">NOVA LOGO CLIENTE:</span>
                                                            <div class="nk-int-st">
                                                          <br><br><br>  <input type="file" name="imagem" accept="image/*">  
                                    <input type="hidden" id="imagem2" name="imagem2" value="<?php echo $imagem_empresa; ?>">  
                                    <input type="hidden" id="id" name="id" value="<?php echo $EmpresaID; ?>">  
                                  
                                  
                           

                        <br><br>
                              
                            


                              <A HREF="gravaredicao_cliente.php"><button type="submit" class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home()">
     
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


    





      </form>
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