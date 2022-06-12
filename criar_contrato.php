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
$modelo = 'Sim';

$sql1 = "SELECT * FROM `consultoria` WHERE (`id_consultoria` = '".$consultoria_usuarios."')  "; 
  $retorno1 = mysqli_query ($mysqli , $sql1) or die (mysql_error());
  while($dados1 = mysqli_fetch_array($retorno1)){
    $id_consultoria = $dados1['id_consultoria'];    
    $razaosocial_consultoria = $dados1['razaosocial_consultoria'];
    $responsavel_consultoria = $dados1['responsavel_consultoria'];
    $pais_consultoria = $dados1['pais_consultoria'];
    $rg_consultoria = $dados1['rg_consultoria'];
    $cpf_consultoria = $dados1['cpf_consultoria'];
    $fantasia_consultoria = $dados1['fantasia_consultoria'];
    $cnpj_consultoria = $dados1['cnpj_consultoria'];
    $ie_consultoria = $dados1['ie_consultoria'];
    $endereco_consultoria = $dados1['endereco_consultoria'];
    $bairro_consultoria = $dados1['bairro_consultoria'];
    $cidade_consultoria = $dados1['cidade_consultoria'];
    $uf_consultoria = $dados1['uf_consultoria'];
    $telefone_consultoria = $dados1['telefone_consultoria'];
    $email_consultoria = $dados1['email_consultoria'];
    $logo = $dados1['imagem_consultoria'];
    $instagram_consultoria = $dados1['instagram_consultoria'];
    $facebook_consultoria = $dados1['facebook_consultoria'];
    $youtube_consultoria = $dados1['youtube_consultoria'];
    $telegram_consultoria = $dados1['telegram_consultoria'];
    $linkedin_consultoria = $dados1['linkedin_consultoria'];
    $twitter_consultoria = $dados1['twitter_consultoria'];
  }

  $sql2 = "SELECT * FROM `empresa` WHERE (`id_empresa` = '".$EmpresaID."') "; 
  $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
  while($dados2 = mysqli_fetch_array($retorno2)){
    $razaosocial_empresa = $dados2['razaosocial_empresa'];
    $nomefantasia_empresa = $dados2['nomefantasia_empresa'];
    $cnpj_empresa = $dados2['cnpj_empresa'];
    $ie_empresa = $dados2['ie_empresa'];
    $telefone_empresa = $dados2['telefone_empresa'];
    $email_empresa = $dados2['email_empresa'];
    $endereco_empresa = $dados2['endereco_empresa'];
    $bairro_empresa = $dados2['bairro_empresa'];
    $cidade_empresa = $dados2['cidade_empresa'];
    $uf_empresa = $dados2['uf_empresa'];
    $objetivo_empresa = $dados2['objetivo_empresa'];
    $imagem_empresa = $dados2['imagem_empresa'];
    $responsavel_empresa = $dados2['responsavel_empresa'];
    $pais_empresa = $dados2['pais_empresa'];
    $rg_empresa = $dados2['rg_empresa'];
    $cpf_empresa = $dados2['cpf_empresa'];
    
      }












$clausulapartes = '
I.1. PARTE “A”: '.$razaosocial_consultoria.' empresa de consultoria, com sede na '.$endereco_consultoria.', '.$bairro_consultoria.', '.$cidade_consultoria.'-'.$uf_consultoria.', inscrita no CNPJ/MF sob o n° '.$cnpj_consultoria.', neste ato representada pelo seu Proprietário  '.$responsavel_consultoria.', '.$pais_consultoria.', empresário, portador da Cédula de Identidade RG n°  '.$rg_consultoria.' e inscrito no CPF/MF sob o n°  '.$cpf_consultoria.', neste CONTRATO, designada simplesmente CONTRATADA.

I.2. PARTE “B”: '.$razaosocial_empresa.', empresa com sede na '.$endereco_empresa.', '.$bairro_empresa.', '.$cidade_empresa.'-'.$uf_empresa.' inscrita no CNPJ/MF sob o n° '.$cnpj_empresa.', neste ato representada pelo seu sócio '.$responsavel_empresa.', '.$pais_empresa.', empresário, portador da Cédula de Identidade RG n°  '.$rg_empresa.' e inscrito no CPF/MF sob o n° '.$cpf_empresa.', nos termos do seu Contrato Social, doravante, neste CONTRATO, designada simplesmente CONTRATANTE.

§1 Considerando que a CONTRATADA está disposta a prestar os serviços a seguir enumerados e definidos à CONTRATANTE, e que esta está disposta a remunerar tais serviços de acordo com as condições também a seguir estipuladas,

RESOLVEM:';

    $sql30 = "SELECT * FROM `contrato` WHERE (`consultoria_contrato` = '".$consultoria_usuarios."') AND  (`empresa_contrato` = '".$EmpresaID."') AND (`modelo_contrato` = 'Sim')"; 
    $retorno30 = mysqli_query ($mysqli , $sql30) or die (mysql_error());
    while($dados30 = mysqli_fetch_array($retorno30)){
    $ultimo_idcontrato = $dados30['id_contrato'];

    }
    if(@mysqli_num_rows($retorno30) > 0){ //faça algo se não houver dados }else{/ /faça algo se houver dados }
    $sql = "SELECT * FROM `contrato` WHERE (`id_contrato` =  '".$ultimo_idcontrato."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
   while ($lista = mysqli_fetch_assoc ($retorno)) {
    $id_contrato = $lista['id_contrato'];
$titulopagina_contrato = $lista['titulopagina_contrato'];
$titulotopo_contrato = $lista['titulotopo_contrato'];
$modelo_contrato = $lista['modelo_contrato'];
$data_contrato = $lista['data_contrato'];
$status_contrato = $lista['status_contrato'];
$consultoria_contrato = $lista['consultoria_contrato'];
$empresa_contrato = $lista['empresa_contrato'];
$usuario_contrato = $lista['usuario_contrato'];
$textoinicial_contrato = $lista['textoinicial_contrato'];
$cl1titulo_contrato = $lista['cl1titulo_contrato'];
$texto1_contrato = str_replace('<br />', "\n", $lista['texto1_contrato']);
$cl2titulo_contrato = $lista['cl2titulo_contrato'];
$texto2_contrato = str_replace('<br />', "\n", $lista['texto2_contrato']);
$cl3titulo_contrato = $lista['cl3titulo_contrato'];
$texto3_contrato = str_replace('<br />', "\n", $lista['texto3_contrato']);
$cl4titulo_contrato = $lista['cl4titulo_contrato'];
$texto4_contrato = str_replace('<br />', "\n", $lista['texto4_contrato']);
$cl5titulo_contrato = $lista['cl5titulo_contrato'];
$texto5_contrato = str_replace('<br />', "\n", $lista['texto5_contrato']);
$cl6titulo_contrato = $lista['cl6titulo_contrato'];
$texto6_contrato = str_replace('<br />', "\n", $lista['texto6_contrato']);
$cl7titulo_contrato = $lista['cl7titulo_contrato'];
$texto7_contrato = str_replace('<br />', "\n", $lista['texto7_contrato']);
$cl8titulo_contrato = $lista['cl8titulo_contrato'];
$texto8_contrato = str_replace('<br />', "\n", $lista['texto8_contrato']);
$cl9titulo_contrato = $lista['cl9titulo_contrato'];
$texto9_contrato = str_replace('<br />', "\n", $lista['texto9_contrato']);
$cl10titulo_contrato = $lista['cl10titulo_contrato'];
$texto10_contrato = str_replace('<br />', "\n", $lista['texto10_contrato']);
$cl11titulo_contrato = $lista['cl11titulo_contrato'];
$texto11_contrato = str_replace('<br />', "\n", $lista['texto11_contrato']);
$cl12titulo_contrato = $lista['cl12titulo_contrato'];
$texto12_contrato = str_replace('<br />', "\n", $lista['texto12_contrato']);
$cl13titulo_contrato = $lista['cl13titulo_contrato'];
$texto13_contrato = str_replace('<br />', "\n", $lista['texto13_contrato']);
$cl14titulo_contrato = $lista['cl14titulo_contrato'];
$texto14_contrato = str_replace('<br />', "\n", $lista['texto14_contrato']);
$cl15titulo_contrato = $lista['cl15titulo_contrato'];
$texto15_contrato = str_replace('<br />', "\n", $lista['texto15_contrato']);
$anexo_contrato = $lista['anexo_contrato'];
    $status = 'pendente';
   }}else{

  $sql = "SELECT * FROM `contrato` WHERE (`id_contrato` = 1) "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
   while ($lista = mysqli_fetch_assoc ($retorno)) {
    $id_contrato = $lista['id_contrato'];
    $titulopagina_contrato = $lista['titulopagina_contrato'];
    $titulotopo_contrato = $lista['titulotopo_contrato'];
    $modelo_contrato = $lista['modelo_contrato'];
    $data_contrato = $lista['data_contrato'];
    $status_contrato = $lista['status_contrato'];
    $consultoria_contrato = $lista['consultoria_contrato'];
    $empresa_contrato = $lista['empresa_contrato'];
    $usuario_contrato = $lista['usuario_contrato'];
    $textoinicial_contrato = $lista['textoinicial_contrato'];
    $cl1titulo_contrato = $lista['cl1titulo_contrato'];
    $texto1_contrato = str_replace('<br />', "\n", $lista['texto1_contrato']);
    $cl2titulo_contrato = $lista['cl2titulo_contrato'];
    $texto2_contrato = str_replace('<br />', "\n", $lista['texto2_contrato']);
    $cl3titulo_contrato = $lista['cl3titulo_contrato'];
    $texto3_contrato = str_replace('<br />', "\n", $lista['texto3_contrato']);
    $cl4titulo_contrato = $lista['cl4titulo_contrato'];
    $texto4_contrato = str_replace('<br />', "\n", $lista['texto4_contrato']);
    $cl5titulo_contrato = $lista['cl5titulo_contrato'];
    $texto5_contrato = str_replace('<br />', "\n", $lista['texto5_contrato']);
    $cl6titulo_contrato = $lista['cl6titulo_contrato'];
    $texto6_contrato = str_replace('<br />', "\n", $lista['texto6_contrato']);
    $cl7titulo_contrato = $lista['cl7titulo_contrato'];
    $texto7_contrato = str_replace('<br />', "\n", $lista['texto7_contrato']);
    $cl8titulo_contrato = $lista['cl8titulo_contrato'];
    $texto8_contrato = str_replace('<br />', "\n", $lista['texto8_contrato']);
    $cl9titulo_contrato = $lista['cl9titulo_contrato'];
    $texto9_contrato = str_replace('<br />', "\n", $lista['texto9_contrato']);
    $cl10titulo_contrato = $lista['cl10titulo_contrato'];
    $texto10_contrato = str_replace('<br />', "\n", $lista['texto10_contrato']);
    $cl11titulo_contrato = $lista['cl11titulo_contrato'];
    $texto11_contrato = str_replace('<br />', "\n", $lista['texto11_contrato']);
    $cl12titulo_contrato = $lista['cl12titulo_contrato'];
    $texto12_contrato = str_replace('<br />', "\n", $lista['texto12_contrato']);
    $cl13titulo_contrato = $lista['cl13titulo_contrato'];
    $texto13_contrato = str_replace('<br />', "\n", $lista['texto13_contrato']);
    $cl14titulo_contrato = $lista['cl14titulo_contrato'];
    $texto14_contrato = str_replace('<br />', "\n", $lista['texto14_contrato']);
    $cl15titulo_contrato = $lista['cl15titulo_contrato'];
    $texto15_contrato = str_replace('<br />', "\n", $lista['texto15_contrato']);
    $anexo_contrato = $lista['anexo_contrato'];
        $status = 'pendente';




    } }
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
    <!-- End Header Top Area -->

    <div class="sale-statistic-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                <div class="alert alert-info" role="alert">
                        <ul>
                            <li><a href="index.php">Home </a>/  Clientes / <a href="contrato.php">Contrato de Consultoria </a>/ Novo</li>
                            
                        </ul>      
                        
                </div>
                   
                </div>
            </div>
        </div>
    </div>
  
         <!-- Data Table area Start-->
         <form id="form" name="form" method="post" action="gravar_contrato.php">  
         <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                        <h1>Contrato de Consultoria</h1><br>    
                                            
               
                       <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TITULO PÁGINA ANTERIOR:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="titulopagina_contrato" name="titulopagina_contrato"  required placeholder="Preencha o seu título" value="<?php echo $titulopagina_contrato; ?>"><br>
             
                                    </div><div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="modelo_contrato" class="ts-label">Modelo</label>
                                                <input id="modelo_contrato" name="modelo_contrato" type="checkbox" hidden="hidden">
                                                <label for="modelo_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div>
                                </div>
   
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DO TOPO DO CONTRATO:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="titulotopo_contrato" name="titulotopo_contrato"  required placeholder="Como deve vir escrito o título do contrato?" value="<?php echo $titulotopo_contrato; ?>">
                      
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO NO TOPO DO CONTRATO:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="textoinicial_contrato" name="textoinicial_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito no inicio do contrato"><?PHP echo $textoinicial_contrato; ?> </textarea>
   
                                    </div>
                                </div>
            
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


                    <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA I:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl1titulo_contrato" name="cl1titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl1titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao1_contrato" class="ts-label">Ativado</label>
                                                <input id="botao1_contrato" name="botao1_contrato" type="checkbox" checked checked="">
                                                <label for="botao1_contrato" class="ts-helper"></label>
                                                
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA I:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto1_contrato" name="texto1_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $clausulapartes; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>
  
  <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA II:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl2titulo_contrato" name="cl2titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl2titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao2_contrato" class="ts-label">Ativado</label>
                                                <input id="botao2_contrato" name="botao2_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao2_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA II:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto2_contrato" name="texto2_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto2_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>
  <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA III:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl3titulo_contrato" name="cl3titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl3titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao3_contrato" class="ts-label">Ativado</label>
                                                <input id="botao3_contrato" name="botao3_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao3_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA III:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto3_contrato" name="texto3_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto3_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>
  <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA IV:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl4titulo_contrato" name="cl4titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl4titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao4_contrato" class="ts-label">Ativado</label>
                                                <input id="botao4_contrato" name="botao4_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao4_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA IV:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto4_contrato" name="texto4_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto4_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>
  <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA V:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl5titulo_contrato" name="cl5titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl5titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao5_contrato" class="ts-label">Ativado</label>
                                                <input id="botao5_contrato" name="botao5_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao5_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA V:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto5_contrato" name="texto5_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto5_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>
  <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA VI:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl6titulo_contrato" name="cl6titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl6titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao6_contrato" class="ts-label">Ativado</label>
                                                <input id="botao6_contrato" name="botao6_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao6_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA VI:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto6_contrato" name="texto6_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto6_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>
  <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA VII:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl7titulo_contrato" name="cl7titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl7titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao7_contrato" class="ts-label">Ativado</label>
                                                <input id="botao7_contrato" name="botao7_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao7_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA VII:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto7_contrato" name="texto7_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto7_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>
  <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA VIII:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl8titulo_contrato" name="cl8titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl8titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao8_contrato" class="ts-label">Ativado</label>
                                                <input id="botao8_contrato" name="botao8_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao8_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA VIII:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto8_contrato" name="texto8_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto8_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>
  <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA IX:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl9titulo_contrato" name="cl9titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl9titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao9_contrato" class="ts-label">Ativado</label>
                                                <input id="botao9_contrato" name="botao9_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao9_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA IX:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto9_contrato" name="texto9_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto9_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>         <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA X:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl10titulo_contrato" name="cl10titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl10titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao10_contrato" class="ts-label">Ativado</label>
                                                <input id="botao10_contrato" name="botao10_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao10_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA X:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto10_contrato" name="texto10_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto10_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>         <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA XI:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl11titulo_contrato" name="cl11titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl11titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao11_contrato" class="ts-label">Ativado</label>
                                                <input id="botao11_contrato" name="botao11_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao11_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA XI:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto11_contrato" name="texto11_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto11_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>         <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA XII:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl12titulo_contrato" name="cl12titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl12titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao12_contrato" class="ts-label">Ativado</label>
                                                <input id="botao12_contrato" name="botao12_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao12_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA XII:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto12_contrato" name="texto12_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto12_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>         <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA XIII:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl13titulo_contrato" name="cl13titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl13titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao13_contrato" class="ts-label">Ativado</label>
                                                <input id="botao13_contrato" name="botao13_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao13_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA XIII:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto13_contrato" name="texto13_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto13_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>         <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA XIV:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl14titulo_contrato" name="cl14titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl14titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao14_contrato" class="ts-label">Ativado</label>
                                                <input id="botao14_contrato" name="botao14_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao14_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA XIV:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto14_contrato" name="texto14_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto14_contrato; ?> </textarea>
 
                                    </div>

                                </div>
                    
  <br><BR>         <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA CLÁUSULA XV:</label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="cl15titulo_contrato" name="cl15titulo_contrato"  required placeholder="Escreva como deve vir escrito no título da cláusula" value="<?php echo $cl15titulo_contrato; ?>">
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-6 col-xs-12">
                                        <div class="toggle-select-act mg-t-30">
                                            <div class="nk-toggle-switch" data-ts-color="cyan">
                                                <label for="botao15_contrato" class="ts-label">Ativado</label>
                                                <input id="botao15_contrato" name="botao15_contrato" type="checkbox" hidden="hidden" checked>
                                                <label for="botao15_contrato" class="ts-helper"></label>
                                           
                                        </div>
                                    </div>
                                    </div><BR><BR>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEXTO DA CLÁUSULA XV:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="texto15_contrato" name="texto15_contrato" rows="6"  required placeholder="Descrever o texto que deve vir escrito na cláusula"><?PHP echo $texto15_contrato; ?> </textarea>
                                    <br><br>
                                         
                           
                                      
                                       <a href="gravar_contrato.php"><button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home()">
       
      <i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button></a>
                                      <a href="contrato.php"> <button class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home1()">
        <i class="notika-icon notika-close"><font face="arial" size="2">  Cancelar  </font></i></button></a>
                


      </form>
                                    </div>

                                </div>
                    
  <br><BR>
                

   			    	

                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
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