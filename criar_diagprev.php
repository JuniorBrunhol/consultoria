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
                            <li><a href="index.php">Home </a>/  Clientes / <a href="diagprev.php">Diagnóstico Empresarial </a>/ Novo</li>
                            
                        </ul>      
                        
                </div>
                   
                </div>
            </div>
        </div>
    </div>
  
         <!-- Data Table area Start-->
         <form id="form" name="form" method="post" action="gravar_diagprev.php">  
         <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                        <h1>Diagnóstico Empresarial</h1><br>    
                        <h2>Coloque um título em seu Diagnóstico Empresarial: 
                            </h2><br>
                            
               
                    <input type="text" class="form-control" id="titulo_diagprev" name="titulo_diagprev"  required placeholder="Preencha o seu título">
            
            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>



         <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>DADOS GERAIS
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  


              
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CONTATO NA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12">
                                        
                                    <input type="text" class="form-control" id="contato_diagprev" name="contato_diagprev"  required  placeholder="Quem te deu as informações?"> 
                                 
                                    </div>
                                    <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CARGO:</label>
                                    </div>
                                    <div class="col-lg-5 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <input type="text" class="form-control" id="cargo_diagprev" name="cargo_diagprev"  required  placeholder="Qual o cargo desta pessoa?">  <br>
                         
                                    </div>
                                </div>
                                
                      
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">SEGMENTO DA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="segmento_diagprev" name="segmento_diagprev"  required placeholder="Qual o segmento de atuação da empresa?">
                      
                                    </div>
                                </div>
                     <br>
                                 
 
 

<div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PORTE DA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12">
                                        
                                    <input type="text" class="form-control" id="porte_diagprev" name="porte_diagprev"  required  placeholder="Pequena, Média ou Grande?"> 
                                 
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">ÁREA CONSTRUÍDA:</label>
                                    </div>
                                    <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12">
                                        
                                    <input type="text" class="form-control" id="areaconstruida_diagprev" name="areaconstruida_diagprev"  required  placeholder="Área construída em M²"> 
                                 
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">MARCA REGISTRADA?:</label>
                                    </div>
                                    <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <input type="text" class="form-control" id="marca_diagprev" name="marca_diagprev"  required  placeholder="A Marca está registrada?">  <br>
                         
                                    </div>
                                </div>
<br>
<div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TIPO DE OPERAÇÃO DA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-9 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12">          <label><input type="checkbox" checked="" id= "comercio_diagprev" name="comercio_diagprev" > <i></i> Comércio</label></div>
                                    <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12"> <label><input type="checkbox" checked="" id= "industria_diagprev" name="industria_diagprev" > <i></i> Indústria</label></div>
                                    <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12"><label><input type="checkbox" checked="" id= "servico_diagprev" name="servico_diagprev" > <i></i> Serviços</label></div>
              
                                    </div>
                                </div>
                                


                    </div>
            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
   

    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>FINANÇAS 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">FONTES DE RECEITA:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="origemreceita_diagprev" name="origemreceita_diagprev" rows="4"   placeholder="Qual a origem das receitas da empresa?"></textarea>
               
                                    </div>
                                </div><BR>

                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CUSTOS FIXOS DA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="custosfixos_diagprev" name="custosfixos_diagprev" rows="4"   placeholder="Quais são os custos fixos da empresa?"></textarea>
               
                                    </div>
                                </div>
                             

                                <BR>
 
 
<div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CUSTOS VARIÁVEIS DA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="custosvariaveis_diagprev" name="custosvariaveis_diagprev" rows="4"   placeholder="Quais são os custos variáveis da empresa?"></textarea>
               
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">MARGEM DE CONTRIBUIÇÃO DA EMPRESA:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="margemlucro_diagprev" name="margemlucro_diagprev" rows="4"   placeholder="Qual a margem de contribuição da empresa?"></textarea>
               
                                    </div></div> <br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">INDIVIDAMENTO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="individamento_diagprev" name="individamento_diagprev" rows="4"   placeholder="A empresa possui dívidas? Qual o percentual de individamento da empresa?"></textarea>
               
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">FATURAMENTO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="faturamento_diagprev" name="faturamento_diagprev" rows="4"   placeholder="Qual o faturamento mensal e anual da empresa?"></textarea>
               
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">SAZONALIDADE:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="sazonalidade_diagprev" name="sazonalidade_diagprev" rows="4"   placeholder="O negócio possui sazonalidades naturais? Existe época do ano de alto e baixo faturamento?"></textarea>
               
                                    </div>
                                </div>
                                </div>
            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>








<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>COMERCIAL 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PÚBLICO ALVO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="publicoalvo_diagprev" name="publicoalvo_diagprev" rows="4"   placeholder="Qual o público alvo da empresa?"></textarea>
               
                                    </div>
                                </div><BR>

                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CONCORRENTES:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="concorrentes_diagprev" name="concorrentes_diagprev" rows="4"   placeholder="Quais são os concorrentes da empresa?"></textarea>
               
                                    </div>
                                </div><br>
<div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">RIVALIDADE COM CONCORRENTES:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="rivalidadeconcorrentes_diagprev" name="rivalidadeconcorrentes_diagprev" rows="4"   placeholder="Qual o nível de rivalidade com seus concorrentes?"></textarea>
               
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CORE BUSINESS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="corebusiness_diagprev" name="corebusiness_diagprev" rows="4"   placeholder="Qual o CORE BUSINESS da empresa?"></textarea>
               
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PUBLICIDADE:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="publicidade_diagprev" name="publicidade_diagprev" rows="4"   placeholder="Como é feito a publicidade da empresa?"></textarea>
               
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">MÍDIAS SOCIAIS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="midiassociais_diagprev" name="midiassociais_diagprev" rows="4"   placeholder="Como são criadas as mídias sociais da empresa?"></textarea>
               
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">E-COMMERCE:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="ecommerce_diagprev" name="ecommerce_diagprev" rows="4"   placeholder="A empresa já vende pela internet? Como isso é feito?"></textarea>
               
                                    </div>
                                </div><br>
                                 
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">SAC:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="sac_diagprev" name="sac_diagprev" rows="4"   placeholder="A empresa possui canais diretos para atendimento ao cliente?"></textarea>
               
                                    </div>
                                </div>




           </div>
            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    





<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>RECURSOS HUMANOS 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">COLABORADORES:</label>
                                    </div>
                                    <div class="col-lg-4 col-md-7 col-sm-7 col-xs-12">
                                        
                                    <input type="text" class="form-control" id="qtdefuncionariosatual_diagprev" name="qtdefuncionariosatual_diagprev"    placeholder="Quantos funcionários a empresa têm?"> 
                                 
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">QTDE COLABORADORES (PICO):</label>
                                    </div>
                                    <div class="col-lg-3 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <input type="text" class="form-control" id="qtdefuncionariospico_diagprev" name="qtdefuncionariospico_diagprev"    placeholder="Qual o máximo de funcionários a empresa teve?">  <br>
                         
                                    </div>
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TERCEIRIZAÇÃO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="terceirizados_diagprev" name=" terceirizados_diagprev" rows="4"   placeholder="A empresa possui profissionais terceirizados?"></textarea>
               
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">FOLHA DE PAGAMENTO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="folhapagamento_diagprev" name="folhapagamento_diagprev" rows="4"   placeholder="Qual o valor da folha de pagamentos da empresa?"></textarea>
               
                                    </div>
                                </div>
                                <br>                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">% DE SALÁRIO BASE X LIDERANÇA:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="liderancacomum_diagprev" name="liderancacomum_diagprev" rows="4"   placeholder="Qual o percentual da Folha de Pagamento é gasto com salário Base x Liderança? Qual o menor e o maior salário?"></textarea>
               
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEMPO MÉDIO DE CASA:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="tempomedio_diagprev" name="tempomedio_diagprev" rows="4"   placeholder="Qual o tempo médio de casa dos colaboradores?"></textarea>
               
                                    </div>
                                </div>
                                <br>                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TURNOVER:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="turnover_diagprev" name="turnover_diagprev" rows="4"   placeholder="Qual o percentual do Turnover no último ano? Para calcular, some todo os colaboradores que saíram e divida pelo número de funcionários atual."></textarea>
               
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CLIMA ORGANIZACIONAL:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="clima_diagprev" name="clima_diagprev" rows="4"   placeholder="Como é o clima atual da empresa? Leve ou Tenso? As pessoas gostam de trabalhar aqui?"></textarea>
               
                                    </div>
                                </div>
                                <br><div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">RECRUTAMENTO E SELEÇÃO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="recrutamento_diagprev" name="recrutamento_diagprev" rows="4"   placeholder="Como é realizado o recrutamento e Seleção da empresa? Existe banco de candidatos?"></textarea>
               
                                    </div>
                                </div>
                                <br><div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">HORAS EXTRAS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="horasextras_diagprev" name="horasextras_diagprev" rows="4"   placeholder="As horas extras são pagas? Existe banco de horas? Qual foi o valor do último mês?"></textarea>
               
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">LEGALIZAÇÃO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="legalizacao_diagprev" name="legalizacao_diagprev" rows="4"   placeholder="Todos os colaboradores estão devidamente registrados?"></textarea>
               
                                    </div>
                                </div>
                                </div>
            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
    







<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>LOGÍSTICA 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">FROTA:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                        
                                    <textarea type="text" class="form-control"  rows="4" id="frota_diagprev" name="frota_diagprev"    placeholder="A Frota é própria ou alugada? Quantos veículos têm no momento?"></textarea>
                                 
                                    </div></DIV><BR><div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PROCESSO LOGÍSTICO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="logistica_diagprev" name="logistica_diagprev"    placeholder="Como funciona o processo logístico desde a venda até a entrega no cliente?"></textarea>
                                    </div>
                                </div>
                                <br><div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEMPO MÉDIO ENTREGA CLIENTE:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4" id="tempomediocliente_diagprev" name="tempomediocliente_diagprev"    placeholder="Qual o tempo médio de entrega para um cliente atualmente?"></textarea>
                                    </div>
                                </div>
                                <br>
                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">ARMAZENAGEM:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="armazenagem_diagprev" name="armazenagem_diagprev" rows="4"   placeholder="Como funciona o processo de armazenagem da empresa?"></textarea>
               
                                    </div>
                                </div>
                                <br>                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">SEPARAÇÃO DE PRODUTOS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="processos_diagprev" name="processos_diagprev" rows="4"   placeholder="Como funciona o processo de separação de produtos?"></textarea>
               
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEMPO MÉDIO DE ESTOQUE:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="estoque_diagprev" name="estoque_diagprev" rows="4"   placeholder="Atualmente a empresa possui estoque para quanto tempo?"></textarea>
               
                                    </div>
                                </div><br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TEMPO MÉDIO ENTREGA FORNECEDOR:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="tempomediofornecedor_diagprev" name="tempomediofornecedor_diagprev" rows="4"   placeholder="Quanto tempo em média atualmente um fornecedor demora para entregar?"></textarea>
               
                                    </div>
                                </div>

                                </div>
            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>




 
 
 
 
 
<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>INFORMÁTICA E TI
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">EQUIPAMENTOS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                        
                                    <textarea type="text" class="form-control"  rows="4"  id="equipamentos_diagprev" name="equipamentos_diagprev"    placeholder="Qual o estado atual dos equipamentos de informática e telefonia da empresa?"></textarea>
                                    </div></div><br><div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">LICENÇAS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="licencas_diagprev" name="licencas_diagprev"    placeholder="Os softwares usados na empresa são originais?"></textarea>
                                    </div>
                                </div>
                                <br><div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">E.R.P.:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="erp_diagprev" name="erp_diagprev"    placeholder="A empresa usa algum ERP? Ele é específico para o segmento?"></textarea>
                                    </div>
                                </div>
                                <br>
                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">SENHAS DE USO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="nivelsenha_diagprev" name="nivelsenha_diagprev" rows="4"   placeholder="Existe compartilhamento de senhas na empresa?"></textarea>
               
                                    </div>
                                </div>
                                <br><div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">LGPD:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="lgpd_diagprev" name="lgpd_diagprev" rows="4"   placeholder="Os colaboradores receberam treinamento de LGPD? Existe tratativas na empresa quanto a isso?"></textarea>
               
                                    </div>
                                </div>
                                
                                <br>
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">OUTROS SISTEMAS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="sistemasuporte_diagprev" name="sistemasuporte_diagprev" rows="4"   placeholder="A empresa utiliza outros sistemas ou robôs?"></textarea>
               
                                    </div>
                                </div>
                                <br><div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">C.R.M.:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <textarea type="text" class="form-control" id="crm_diagprev" name="crm_diagprev" rows="4"   placeholder="A empresa utiliza CRM para controlar suas prospecções e vendas?"></textarea>
               
                                    </div>
                                </div>

                                </div>
            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>

 

 

 


 
<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>PARCERIAS
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PARCERIAS COMERCIAIS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                        
                                    <textarea type="text" class="form-control"  rows="4" id="parceriascomerciais_diagprev" name="parceriascomerciais_diagprev"    placeholder="A empresa possui parceiros comerciais?"></textarea>
    </div></div><br>   <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">OUTRAS PARCERIAS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="parceriassociais_diagprev" name="parceriassociais_diagprev"    placeholder="A empresa possui parcerias com associações ou outras entidades sociais?"></textarea>
                                    </div>
                                </div>
                                <br>   <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PROGRAMAS SOCIAIS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="programassociais_diagprev" name="programassociais_diagprev"    placeholder="A empresa participa de algum programa social?"></textarea>
                                    </div>
                                </div>
      

                                </div>
            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div><br>
     
 



<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>GESTÃO
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">DESAFIOS INTERNOS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                        
                                    <textarea type="text" class="form-control"  rows="4" id="desafiosinternos_diagprev" name="desafiosinternos_diagprev"    placeholder="Quais são os maiores desafios internos da empresa hoje?"></textarea>
                                    </div></div><br>   <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">DESAFIOS EXTERNOS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="desafiosexternos_diagprev" name="desafiosexternos_diagprev"    placeholder="Quais são os maiores desafios externos da empresa hoje?"></textarea>
                                    </div>
                                </div>
                                <br>   <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PROCESSOS ESTABELECIDOS:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="processos2_diagprev" name="processos2_diagprev"    placeholder="Os processos de trabalho estão definidos e escritos?"></textarea>
                                    </div>
                                </div><br>
                                <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">ROTINAS DE FUNÇÃO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="rotinas_diagprev" name="rotinas_diagprev"    placeholder="Os colaboradores possuem rotinas estabelecidas, escritas e acompanhadas com frequência?"></textarea>
                                    </div>
                                </div><br>   <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">REUNIÕES DE ROTINA:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4" id="reunioes_diagprev" name="reunioes_diagprev"    placeholder="A empresa possui e executa um cronograma de reuniões?"></textarea>
                                    </div>
                                </div>

                                <br>   <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">INDICADORES (KPI):</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="kpisestabelecidos_diagprev" name="kpisestabelecidos_diagprev"    placeholder="A empresa possui KPIs e os acompanha?"></textarea>
                                    </div>
                                </div><br>   <div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">METAS CURTO PRAZO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="metascurto_diagprev" name="metascurto_diagprev"    placeholder="Quais são as metas de curto prazo da empresa?"></textarea>
                                    </div>
                                </div><br><div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">METAS DE MÉDIO PRAZO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="metasmedio_diagprev" name="metasmedio_diagprev"    placeholder="Quais são as metas de médio prazo da empresa?"></textarea>
                                    </div>
                                </div><br><div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">METAS DE LONGO PRAZO:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="metaslongo_diagprev" name="metaslongo_diagprev"    placeholder="Quais são as metas de longo prazo da empresa?"></textarea>
                                    </div>
                                </div><br><div class="row">
                                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">AVALIAÇÃO FINAL DO CONSULTOR:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <textarea type="text" class="form-control"  rows="4"  id="avaliacaoconsultor_diagprev" name="avaliacaoconsultor_diagprev"  required  placeholder="Avaliação final do consultor. Resumo de tudo o que foi visto."></textarea> <br>
                  <br><br>
                 <a href="gravar_diagprev.php"> <button type=submit class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg">
 <i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button></a>
 </form>    <a href="diagprev.php">    <button class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home1()">
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