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
                            <li><a href="index.php">Home </a>/ <a href="planodetrabalho.php">Plano de Trabalho </a>/ Etapas do Projeto</li>
                            
                        </ul>      
                        
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
           <h2>PLANO DE TRABALHO</h2><BR>
           <?php   $sql3 = "SELECT * FROM `cronograma` WHERE (`id_cronograma` = '".$id."') "; 
    $retorno3 = mysqli_query ($mysqli , $sql3) or die (mysql_error());
    while($dados3 = mysqli_fetch_array($retorno3)){
    $id_cronograma = $dados3['id_cronograma'];
    $datainicial_cronograma = $dados3['datainicial_cronograma'];
    $previsaofim_cronograma = $dados3['previsaofim_cronograma'];
    $titulo_cronograma = $dados3['titulo_cronograma'];
    $atingimento_cronograma = $dados3['atingimento_cronograma'];
    $objetivo_cronograma = $dados3['objetivo_cronograma'];
    }
    ?>
                   <div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">
                    <label>TÍTULO DO PLANO DE TRABALHO: </label> <?php echo $titulo_cronograma;?>
                    
                   </div>
                  
<br>
                  <div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">
                    <label>PREVISÃO INÍCIO:</label> <?php echo date('d/m/Y',  strtotime($datainicial_cronograma)); ?>  
                    <label> - PREVISÃO TÉRMINO: </label><?php echo date('d/m/Y',  strtotime($previsaofim_cronograma)); ?>
                    <label> - ATINGIMENTO:</label> <?php  $sql39 = "SELECT count(cronograma_tarefa) AS total39 FROM tarefa WHERE (`cronograma_tarefa` = '".$id_cronograma."')";
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
                    </div>
                  <br>
                  
                  <div class="col-lg-12 col-md-3 col-sm-3 col-xs-12">
                    <label>OBJETIVO DO PROCESSO DE CONSULTORIA:</label> <?php echo $objetivo_cronograma;?> 
                      </div>
                      
<br><Br>
                 
            
            </div>
           </div>
          </div>
        </div><br>
        <form id="form" name="form" method="post" action="gravar_acoesplanodetrabalho.php">
     	
        <div class="container">
         <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="data-table-list">
           <h2>ETAPAS DO PLANO DE TRABALHO</h2><BR>

                  <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro">ETAPA:</span> 
                    <div class="nk-int-st">
                    <input type="text" class="form-control" id="tarefa_acaocronograma" name="tarefa_acaocronograma" placeholder="Preencha com a tarefa do Plano de Trabalho"><br>
                    <input type="hidden" class="form-control" id="idcronograma_acaocronograma" name="idcronograma_acaocronograma" placeholder="Preencha com a tarefa do Plano de Trabalho" value="<?php echo $id; ?>"><br>
                    </div>
                  </div>
                  <br>
                  
                  <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro">DESCRIÇÃO DA ETAPA:</span> 
                    <div class="nk-int-st">
                    <textarea type="text" class="form-control" id="descricao_acaocronograma" name="descricao_acaocronograma" rows="6" placeholder="Descreva como deve ser feito essa tarefa"></textarea>
                    </div>
                  </div>
                  <br>

                  <div class="input-group">
                    <span class="input-group-addon nk-ic-st-pro">DATA PREVISÃO:</span> 
                    <div class="nk-int-st">
                    <input type="text" class="form-control" id="dataprevisao_acaocronograma" oninput="mascara(this, 'nascimento')" name="dataprevisao_acaocronograma" REQUIRED placeholder="Preencha a data de previsão"><br>
                    </div>
                    <span class="input-group-addon nk-ic-st-pro">RESPONSÁVEL:</span> 
                    <div class="nk-int-st">
                    <input type="text" class="form-control" id="dono_acaocronograma"  name="dono_acaocronograma" placeholder="Preencha o nome do Responsável"><br>
                    </div>
                    <span class="input-group-addon nk-ic-st-pro">NÍVEL:</span> 
                    <div class="nk-int-st">
                    
                                    <select id="peso_acaocronograma" class="form-control" name="peso_acaocronograma"> 
                                        <option value="1">Baixa Complexidade</option>
                                        <option value="2">Média Complexidade</option>
                                        <option value="3">Alta Complexidade</option>
                                       
                                    </select>
                                   
                                      </div>
                  </div>
                  <br>
                  
                

                  <div class="input-group">
                    <br><br>
                    <a href="gravar_acoesplanodetrabalho.php"><button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button></a>
                  </form> 
                  
                     
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
                        
                        <div class="table-responsive"> 

                
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Etapa</th>
                                        <th width=50 align="center">Descrição</th>
                                        <th width=110 align="center">Nível</th>
                                        <th width=100 align="center">Prev.Término</th>
                                        <th width=50 align="center">Ating.</th>
                                        <th width=50 align="center">Responsável</th>  
                                        <th width=50 align="center">Editar</th>
                                        <th width=50 align="center">Excluir</th>
                                    </tr>
                                </thead>
                                <tbody>
                             <?php   $sql4 = "SELECT * FROM `acaocronograma` WHERE (`idcronograma_acaocronograma` = '".$id_cronograma."')"; 
    $retorno4 = mysqli_query ($mysqli , $sql4) or die (mysql_error());
    while($dados4 = mysqli_fetch_array($retorno4)){
      $tarefa_acaocronograma = str_replace('<br />', "\n", $dados4['tarefa_acaocronograma']);
      $descricao_acaocronograma = str_replace('<br />', "\n", $dados4['descricao_acaocronograma']);
      $dataprevisao_acaocronograma = str_replace('<br />', "\n", $dados4['dataprevisao_acaocronograma']);
      $aproveitamento_acaocronograma = str_replace('<br />', "\n", $dados4['aproveitamento_acaocronograma']);
      $dono_acaocronograma = str_replace('<br />', "\n", $dados4['dono_acaocronograma']);
      $peso_acaocronograma = str_replace('<br />', "\n", $dados4['peso_acaocronograma']);
      $peso1 = 'Fácil - Rápido';
      $peso2 = 'Fácil - Demorado';
      $peso3 = 'Complexo - Demorado';
      $id_acaocronograma = $dados4['id_acaocronograma'];
   
    ?>
                                    <tr>
                                        <td><div id="espaco"><?php echo $tarefa_acaocronograma; ?></div></td>
                                        <td align="center"><button class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-search" title="<?php echo $descricao_acaocronograma; ?>"></i></button></td>
                                        <td align="center"><?php 
                                        
                                        if($peso_acaocronograma == 1){
                                          echo 'Baixa Complexidade';
                                        }
                                        if($peso_acaocronograma == 2){
                                          echo 'Média Complexidade';
                                        }
                                        if($peso_acaocronograma == 3){
                                          echo 'Alta Complexidade';
                                        } 
                                        
                                        ?></td>
                                        <td align="center"><?php echo date('d/m/Y',  strtotime($dataprevisao_acaocronograma)); ?></td>
                                        <td align="center">
                                          
                                        <?php  $sql39 = "SELECT count(bloco_tarefa) AS total39 FROM tarefa WHERE (`bloco_tarefa` = '". $id_acaocronograma."')";
            $retorno39 = mysqli_query($mysqli,$sql39);
            $values39 = mysqli_fetch_assoc($retorno39);
            $num_rows39=$values39['total39'];
                               
            $sql29 = "SELECT count(bloco_tarefa) AS total29 FROM tarefa WHERE (`bloco_tarefa` = '". $id_acaocronograma."') AND (`status_tarefa` = 'CONCLUÍDO')";
            $retorno29 = mysqli_query($mysqli,$sql29);
            $values29 = mysqli_fetch_assoc($retorno29);
            $num_rows29=$values29['total29'];
                       
            if ($num_rows39 == 0){
              $percentual = 0;
            } else {
            $percentual = ($num_rows29/$num_rows39)*100;
          }
                                  echo $percentual; ?> %
                                        
                                        </td>
                                        <td align="center"><?php echo $dono_acaocronograma; ?></td>
                                      
                                        <td align="center"><a href="editar_acoesplanodetrabalho.php?id=<?php echo $id_acaocronograma; ?>&cronograma=<?php echo $id_cronograma; ?>"><button type="button" class="btn btn-danger btn-sm">Editar</button></a></td>
                                        <td align="center"><a href="apagar_acaocronograma.php?id=<?php echo $id_acaocronograma; ?>&cronograma=<?php echo $id_cronograma; ?>"><button type="button" class="btn btn-warning btn-sm">Excluir</button></a></td>
                                        
                                      </tr>
<?php  } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>Etapa</th>
                                        <th width=50 align="center">Descrição</th>
                                        <th width=110 align="center">Nível</th>
                                        <th width=100 align="center">Prev.Término</th>
                                        <th width=50 align="center">Ating.</th>
                                        <th width=50 align="center">Responsável</th>  
                                        <th width=50 align="center">Editar</th>
                                        <th width=50 align="center">Excluir</th>
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