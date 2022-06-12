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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous">
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
                <div class="col-lg-12">
                    <div class="data-table-list1">
                        <div class="basic-tb-hd">
                        
  <p>Olá,<b> <?php echo $_SESSION['UsuarioNome']; ?>!</b></p>
  
  <p>Selecione abaixo para qual cliente deseja acessar o sistema.</p><br>
 
  <div class="conct-sc-ic2">
  <a class="btn" href="novocliente.php">Novo Cliente</i> </a>
</div>
<div class="conct-sc-ic2">
<a class="btn" href="meusdados.php">Consultoria</i> </a>
</div>
<div class="conct-sc-ic2">
<a class="btn" href="meuperfil.php">Meu Perfil</i> </a>
</div>
<div class="conct-sc-ic2">
<a class="btn" href="atualizacoes.php">Atualizações</i> </a>
</div>
<div class="conct-sc-ic2">
<a class="btn" href="agendado.php">Calendário</i> </a>
</div>
<div class="conct-sc-ic2">
<a class="btn" href="solicitacoes.php">Solicitações</i> </a>
</div>
<div class="conct-sc-ic2">
<a class="btn" href="comentarios.php">Comentários</i> </a>
</div>

        
</div>
                </div>
            </div>
        </div>
    </div>
<br>




        <div class="container">
            <div id="row">


                        <?php      // Validação do usuário com empresas que atende
            $sql = "SELECT * FROM `acesso_empresa` WHERE (`usuarios_acesso_empresa` = '".$idconsultor."')"; 
            $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
            while ($lista = mysqli_fetch_assoc ($retorno)) {
                  $empresaatendida = $lista['empresa_acesso_empresa'];
            
                  $sql2 = "SELECT * FROM `empresa` WHERE (`id_empresa` = '".$empresaatendida."')"; 
                  $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
                  while ($lista2 = mysqli_fetch_assoc ($retorno2)) {
                    $razaosocial = $lista2['razaosocial_empresa'];
                    $idempresa = $lista2['id_empresa'];
                    $imagem = $lista2['imagem_empresa'];
                    $fantasia = $lista2['nomefantasia_empresa'];
                    $objetivo = $lista2['objetivo_empresa'];
                    $diagnosticoprevio = $lista2['diagnosticoprevio_empresa'];
                    $proposta = $lista2['proposta_empresa'];
                    $contrato = $lista2['contrato_empresa'];
                    $planodetrabalho = $lista2['planodetrabalho_empresa'];
                    $apreciacao = $lista2['apreciacao_empresa'];
                    $diagnosticosituacional = $lista2['diagnosticosituacional_empresa'];
                    $cronograma = $lista2['cronograma_empresa'];
                    $status = $lista2['status_empresa'];

            ?>
                <div class="col-lg-6">
                    <div class="data-table-list1">
                        <div class="basic-tb-hd">

                        <div id="imagem">
                   
                        <a href="check_pagamento.php?var=<?php echo $idempresa; ?>"><img width=190 src="img/clientes/<?php echo $imagem; ?>"  alt="" /></a>                            </div>
                
                        <div id="botoes">
                <?php 

$sql41 = "SELECT count(empresa_diagprev) AS total41 FROM diagprev WHERE (`empresa_diagprev` = '".$idempresa."')";
            $retorno41 = mysqli_query($mysqli,$sql41);
            $values41 = mysqli_fetch_assoc($retorno41);
            $num_rows41=$values41['total41'];
            
            if ($num_rows41 > 0) { ?>
              <div id="aprovado"><i class="notika-icon notika-checked" title="Diagnóstico Prévio"></i></div>
           <?php } else { ?>
              <div id="reprovado"><i class="notika-icon notika-close" title="Diagnóstico Prévio"></i></div>
           
            <?php } ?>   
            

            <?php 

$sql42 = "SELECT count(empresa_proposta) AS total42 FROM proposta WHERE (`empresa_proposta` = '".$idempresa."')";
            $retorno42 = mysqli_query($mysqli,$sql42);
            $values42 = mysqli_fetch_assoc($retorno42);
            $num_rows42=$values42['total42'];
            
            if ($num_rows42 > 0) { ?>
              <div id="aprovado"><i class="notika-icon notika-checked" title="Proposta de Serviço"></i></div>
           <?php } else { ?>
              <div id="reprovado"><i class="notika-icon notika-close" title="Proposta de Serviço"></i></div>
           
            <?php } ?>   

            <?php 

$sql43 = "SELECT count(empresa_contrato) AS total43 FROM contrato WHERE (`empresa_contrato` = '".$idempresa."')";
            $retorno43 = mysqli_query($mysqli,$sql43);
            $values43 = mysqli_fetch_assoc($retorno43);
            $num_rows43=$values43['total43'];
            
            if ($num_rows43 > 0) { ?>
              <div id="aprovado"><i class="notika-icon notika-checked" title="Contrato de Trabalho"></i></div>
           <?php } else { ?>
              <div id="reprovado"><i class="notika-icon notika-close" title="Contrato de Trabalho"></i></div>
           
            <?php } ?>  

            <?php 

$sql44 = "SELECT count(empresa_cronograma) AS total44 FROM cronograma WHERE (`empresa_cronograma` = '".$idempresa."')";
            $retorno44 = mysqli_query($mysqli,$sql44);
            $values44 = mysqli_fetch_assoc($retorno44);
            $num_rows44=$values44['total44'];
            
            if ($num_rows44 > 0) { ?>
              <div id="aprovado"><i class="notika-icon notika-checked" title="Plano de Trabalho"></i></div>
           <?php } else { ?>
              <div id="reprovado"><i class="notika-icon notika-close" title="Plano de Trabalho"></i></div>
           
            <?php } ?>  
                               
                </div>
                <div id="botoes">
                <?php 

$sql45 = "SELECT count(empresa_cronograma) AS total45 FROM cronograma WHERE (`empresa_cronograma` = '".$idempresa."') AND (`apreciacao_cronograma` = 'Aprovado')";
            $retorno45 = mysqli_query($mysqli,$sql45);
            $values45 = mysqli_fetch_assoc($retorno45);
            $num_rows45=$values45['total45'];
            
            if ($num_rows45 > 0) { ?>
              <div id="aprovado"><i class="notika-icon notika-checked" title="Apreciação do Cliente"></i></div>
           <?php } else { ?>
              <div id="reprovado"><i class="notika-icon notika-close" title="Apreciação do Cliente"></i></div>
           
            <?php } ?>  
            <?php 

$sql46 = "SELECT count(empresa_diagnosticosituacional) AS total46 FROM diagnosticosituacional WHERE (`empresa_diagnosticosituacional` = '".$idempresa."')";
            $retorno46 = mysqli_query($mysqli,$sql46);
            $values46 = mysqli_fetch_assoc($retorno46);
            $num_rows46=$values46['total46'];
            
            if ($num_rows46 > 0) { ?>
              <div id="aprovado"><i class="notika-icon notika-checked" title="Diagnóstico Situacional"></i></div>
           <?php } else { ?>
              <div id="reprovado"><i class="notika-icon notika-close" title="Diagnóstico Situacional"></i></div>
           
            <?php } ?>  
                <?php 

$sql47 = "SELECT count(empresa_cronogramareuniao) AS total47 FROM cronogramareuniao WHERE (`empresa_cronogramareuniao` = '".$idempresa."')";
            $retorno47 = mysqli_query($mysqli,$sql47);
            $values47 = mysqli_fetch_assoc($retorno47);
            $num_rows47=$values47['total47'];
            
            if ($num_rows47 > 0) { ?>
              <div id="aprovado"><i class="notika-icon notika-checked" title="Cronograma de Reunião"></i></div>
           <?php } else { ?>
              <div id="reprovado"><i class="notika-icon notika-close" title="Cronograma de Reunião"></i></div>
           
            <?php } ?>  

                <?php 
                if ($status == 'notika-icon notika-checked'){ ?>
                  <div id="aprovado"><i class="<?php echo $status; ?>" title="Acesso do Cliente"></i></div>
                <?php }else{ ?>
                  <div id="reprovado"><i class="<?php echo $status; ?>" title="Acesso do Cliente"></i></div>
                <?php } ?>


              
                  <?php                          
        if ($num_rows42 > 0){
          $nota_proposta = 15;
        }else{
          $nota_proposta = 0;
        }

        if ($num_rows43 > 0) {
          $nota_contrato = 15;
        }else{
          $nota_contrato = 0;
        }

        if ($num_rows44 > 0) {
          $nota_planodetrabalho = 10;
        }else{
          $nota_planodetrabalho = 0;
        }

        if ($num_rows45 > 0) {
          $nota_apreciacao = 10;
        }else{
          $nota_apreciacao = 0;
        }

        if ($num_rows46 > 0) {
          $nota_diagnosticosituacional = 20;
        }else{
          $nota_diagnosticosituacional = 0;
        }

        if ($num_rows47 > 0) {
          $nota_cronograma = 15;
        }else{
          $nota_cronograma = 0;
        }

        if ($num_rows41 > 0) {
          $nota_diagnostico = 15;
        }else{
          $nota_diagnostico = 0;
        }
 
        $checked = $nota_diagnostico + $nota_proposta + $nota_contrato + $nota_planodetrabalho + $nota_apreciacao + $nota_diagnosticosituacional + $nota_cronograma;
?>
   </div>
            </div>



            <div id="texto">
                  
                        <h3><a href="check_pagamento.php?var=<?php echo $idempresa; ?>"><?php echo $fantasia; ?></a></h3>
								<p class="ctn-ads"><a href="check_pagamento.php?var=<?php echo $idempresa; ?>"><?php echo $razaosocial; ?></a></p>
                <p class="ctn-ads2"><?php echo $objetivo; ?></p>
      
                                                       <div class="social-st-list">
                            <div class="social-sn">
                                <h7><strong>Visitas:</strong></h7>
                                <p><?php 

$sql19 = "SELECT count(empresa_reuniao) AS total19 FROM reuniao WHERE (`empresa_reuniao` = '".$idempresa."')";
            $retorno19 = mysqli_query($mysqli,$sql19);
            $values19 = mysqli_fetch_assoc($retorno19);
            $num_rows19=$values19['total19'];
                               
                                  
                                  echo $num_rows19;  
                                ?></p>
                            </div>
                            <div class="social-sn">
                                <h7><strong>Hr. Atend:</strong></h7>
                                <p>

                                <?php 

$resultado = mysqli_query($mysqli, "SELECT sum(temporeuniao_reuniao) FROM reuniao WHERE (`empresa_reuniao` = '".$idempresa."')");
    $linhas = mysqli_num_rows($resultado);
 
 
    while($linhas = mysqli_fetch_array($resultado)){
         $tempo = $linhas['sum(temporeuniao_reuniao)']/60;
         echo round($tempo);
        }
            ?>
 
                                </p>
                            </div>
                            <div class="social-sn">
                                <h7><strong>Hr. RAFC:</strong></h7>
                                <p>
                                <?php 

$resultado2 = mysqli_query($mysqli, "SELECT sum(temporeuniao_rafc) FROM rafc WHERE (`empresa_rafc` = '".$idempresa."')");
    $linhas2 = mysqli_num_rows($resultado2);
 
 
    while($linhas2 = mysqli_fetch_array($resultado2)){
         $tempo2 = $linhas2['sum(temporeuniao_rafc)']/60;
         echo round($tempo2);
        }
            ?>
 
                             </p>
                            </div>
                            <div class="social-sn">
                                <h7><strong>CheckList:</strong></h7>
                                <p>
                                <?php 


         echo $checked;
        
            ?>
 
                             </p>
                            </div>
                        </div>     
          
 
        
                    </div>
                  
                </div>  <br>
            </div>
         

       
        <?php } }  ?>
        </div>
      </div></div>
      
<br>
   
             

             
     



    <!-- Contact area End-->
      
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