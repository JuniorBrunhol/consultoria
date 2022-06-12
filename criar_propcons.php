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

    $sql30 = "SELECT * FROM `proposta` WHERE (`consultoria_proposta` = '".$consultoria_usuarios."') AND  (`empresa_proposta` = '".$EmpresaID."') AND (`modelo_proposta` = 'Sim')"; 
    $retorno30 = mysqli_query ($mysqli , $sql30) or die (mysql_error());
    while($dados30 = mysqli_fetch_array($retorno30)){
    $ultimo_idproposta = $dados30['id_proposta'];

    }
    if(@mysqli_num_rows($retorno30) > 0){ //faça algo se não houver dados }else{/ /faça algo se houver dados }
    $sql = "SELECT * FROM `proposta` WHERE (`id_proposta` =  '".$ultimo_idproposta."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
   while ($lista = mysqli_fetch_assoc ($retorno)) {
    $titulotopo = $lista['titulotopo_proposta'];
    $pronome = $lista['pronome_proposta'];
    $contato = $lista['contato_proposta'];
    $titulo = $lista['titulo_proposta'];
    $objeto = $lista['objeto_proposta'];
    $objetivo = $lista['objetivoespecifico_proposta'];
    $metodologia = $lista['metodologia_proposta'];
    $equipe = $lista['equipetecnica_proposta'];
    $prazo = $lista['prazo_proposta'];
    $entregas = $lista['entregas_proposta'];
    $preco = $lista['preco_proposta'];
    $formapagamento = $lista['formapagamento_proposta'];      
    $validade = $lista['validade_proposta'];      
    $respcontratante = $lista['responsabilidadecontratante_proposta'];      
    $respproponente = $lista['responsabilidadeproponente_proposta'];      
    $confidencialidade = $lista['confidencialidade_proposta'];     
    $conclusao = $lista['conclusao_proposta']; 
    $frase = $lista['frase_proposta']; 
    $modelo = $lista['modelo_proposta']; 
    $mostraremail = $lista['mostraremail_proposta']; 
    $mostrartelefone = $lista['mostrartelefone_proposta']; 
    $mostrarredesocial = $lista['mostrarredesocial_proposta']; 
    $mostrarcomentarios = $lista['mostrarcomentarios_proposta'];
    $status = 'pendente';
   }}else{

  $sql = "SELECT * FROM `proposta` WHERE (`id_proposta` = 1) "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
   while ($lista = mysqli_fetch_assoc ($retorno)) {
    $titulotopo = $lista['titulotopo_proposta'];
    $pronome = $lista['pronome_proposta'];
    $contato = $lista['contato_proposta'];
    $titulo = $lista['titulo_proposta'];
    $objeto = $lista['objeto_proposta'];
    $objetivo = $lista['objetivoespecifico_proposta'];
    $metodologia = $lista['metodologia_proposta'];
    $equipe = $lista['equipetecnica_proposta'];
    $prazo = $lista['prazo_proposta'];
    $entregas = $lista['entregas_proposta'];
    $preco = $lista['preco_proposta'];
    $formapagamento = $lista['formapagamento_proposta'];      
    $validade = $lista['validade_proposta'];      
    $respcontratante = $lista['responsabilidadecontratante_proposta'];      
    $respproponente = $lista['responsabilidadeproponente_proposta'];      
    $confidencialidade = $lista['confidencialidade_proposta'];     
    $conclusao = $lista['conclusao_proposta']; 
    $frase = $lista['frase_proposta']; 
    $modelo = $lista['modelo_proposta']; 
    $mostraremail = $lista['mostraremail_proposta']; 
    $mostrartelefone = $lista['mostrartelefone_proposta']; 
    $mostrarredesocial = $lista['mostrarredesocial_proposta']; 
    $mostrarcomentarios = $lista['mostrarcomentarios_proposta'];
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
                            <li><a href="index.php">Home </a>/  Clientes / <a href="propcons.php">Proposta de Consultoria </a>/ Novo</li>
                            
                        </ul>      
                        
                </div>
                   
                </div>
            </div>
        </div>
    </div>
  
         <!-- Data Table area Start-->
         <form id="form" name="form" method="post" action="gravar_propcons.php">  
         <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                        <h1>Proposta de Consultoria</h1><br>    
                        <h2>Coloque um título na Proposta para identificá-la posteriormente: 
                            </h2><br>
                            
               
                    <input type="text" class="form-control" id="titulotopo" name="titulotopo"  required placeholder="Preencha o seu título" value="<?php echo $titulotopo; ?>"><br>
            
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
                            <h2>TOPO - Dados Gerais
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  

              
                                <div class="row">
                                    <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">PRONOME:</label>
                                    </div>
                                    <div class="col-lg-2 col-md-7 col-sm-7 col-xs-12">
                                        
                                    <input type="text" class="form-control" id="pronome" name="pronome"  required  placeholder="Qual o pronome que deseja Chamar o Cliente?" value="<?php echo $pronome; ?>"> 
                                 
                                    </div>
                                    <div class="col-lg-1 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">CONTATO:</label>
                                    </div>
                                    <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                     
                                    <input type="text" class="form-control" id="contato" name="contato"  required  placeholder="Qual o nome da pessoa a quem é dirigido a proposta?" value="<?php echo $contato; ?>">  <br>
                         
                                    </div>
                                </div>
                      
                                <div class="row">
                                    <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                                        <label class="hrzn-fm">TÍTULO DA PROPOSTA:</label>
                                    </div>
                                    <div class="col-lg-10 col-md-7 col-sm-7 col-xs-12">
                                    
                                    <input type="text" class="form-control" id="titulo" name="titulo"  required placeholder="Como deve vir escrito o título da Proposta?" value="<?php echo $titulo; ?>">
                      
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
                            <h2>OBJETO - PONTO CENTRAL DA CONTRATAÇÃO 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="objeto" name="objeto" rows="10"  required placeholder="Descrever de forma resumida e objetiva o ponto central da contratação."><?PHP echo $objeto; ?> </textarea>
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
                            <h2>OBJETIVO GERAL - O QUE SE ESPERA SER ALCANÇADO NO FINAL DO PROCESSO 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="objetivo" name="objetivo" rows="10"  required placeholder="Descrever o objetivo principal do trabalho, de forma objetiva "><?PHP echo $objetivo; ?> </textarea>
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
                            <h2>OBJETIVO ESPECÍFICO 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="objetivoespecifico" name="objetivoespecifico"  required rows="10" placeholder="Descrever os objetivos secundários do trabalho, prezando por esclarecer itens/informações que serão alcançadas para o atingimento do objetivo geral."><?PHP echo $objetivo; ?> </textarea>
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
                            <h2>METODOLOGIA DE TRABALHO:
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="metodologia" name="metodologia" rows="10"  required placeholder="Por tratar-se da proposta de serviços, não há necessidade de apresentação detalhada dos processos e/ou teorias gerenciais. Foco nos itens mais relevantes para compreensão do trabalho e formação de preço, tais como sequência lógica das ações, técnicas de possível utilização, dentre outras. "><?PHP echo $metodologia; ?> </textarea>
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
                            <h2>EQUIPE TÉCNICA QUE PARTICIPARÁ DO PROJETO 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="equipetecnica" name="equipetecnica" rows="10"  required placeholder="Descrição dos profissionais e funções assumidas para execução dos trabalhos. Em geral, divide-se em Consultor Principal, Consultores Parceiros e Assistentes de Consultoria. Se formada previamente, pode-se apresentar resumidamente um currículo dos profissionais escalados."><?PHP echo $equipe; ?> </textarea>
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
                            <h2>PRAZO / CRONOGRAMA DE ATUAÇÃO 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="prazo" name="prazo" rows="10"  required placeholder="Descrição do tempo/período de execução para cada frente e ação planejadas, de forma pontual. Utilizar como base o item “3.a”. Para pesquisas com período de até 30 dias, descrever atividades em cronograma diário. Para pesquisas com período entre 30 dias e 06 meses, descrever atividades em cronograma semanal. Para pesquisas com período superior a 06 meses, descrever atividades em cronograma quinzenal ou mensal."><?PHP echo $prazo; ?> </textarea>
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
                            <h2>PRODUTOS / ENTREGAS 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="entregas" name="entregas" rows="10" required  placeholder="Descrição de cada produto previsto para entrega, seja materializada ou em formato de apresentações. Cada cliente e/ou cada trabalho exige um conjunto de produtos conforme necessidade, mas em geral são planos de ações, relatórios de acompanhamento e relatório final. É importante descrever a estrutura prevista para cada produto, evitando equívocos ou incompatibilidades futuras."><?PHP echo $entregas; ?> </textarea>
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
                            <h2>PREÇO 
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="preco" name="preco" rows="10"  required placeholder="Descrever, com base nas ETAPAS e AÇÕES previstas no item “5”, as precificações do trabalho. Como forma de esclarecimento e transparência, indicar antecipadamente os valores e referências. A estrutura de preço deve conter as atividades, os profissionais integrantes da atividade, a quantidade de profissionais por classificação de sua função, a quantidade de horas técnicas previstas para cada profissional descrito, o valor da hora técnica e o valor total por item. Conforme as exigências do cliente, os itens MD e DA poderão ser simplificados, ou detalhados. Ainda conforme exigências do cliente, o valor de impostos e tributos deverá ser incorporado na hora técnica, ou apresentado em separado ao final da tabela, integrando-se ao preço final"><?PHP echo $preco; ?> </textarea>
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
                            <h2>PORMA DE PAGAMENTO
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="formapagamento" name="formapagamento"  required rows="10" placeholder="Descrever a forma de pagamento proposta, considerando especialmente as características de pagamento do cliente e o prazo da pesquisa. Torna-se imprescindível, conforme possibilidade do cliente, que a primeira parcela seja paga no ato de assinatura contratual, considerando os custos e mobilizações necessários para atividades de campo."><?PHP echo $formapagamento; ?> </textarea>
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
                            <h2>VALIDADE DA PROPOSTA
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="validade" name="validade" rows="10" required  placeholder="Descrever o prazo de validade da proposta, preferencialmente em “dias”. Deve-se considerar para esta definição a agenda do ofertante, bem como o teor da precificação que pode sofrer alternações de mercado."><?PHP echo $validade; ?> </textarea>
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
                            <h2>RESPONSABILIDADE DO CONTRATANTE
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="responsabilidadecontratante"  required name="responsabilidadecontratante" rows="10" placeholder="Descrever responsabilidades das partes em negociação, como forma de estabelecer critérios e condicionantes para a boa conduta dos serviços propostos. Tal descrição evita dissidências futuras."><?PHP echo $respcontratante; ?> </textarea>
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
                            <h2>RESPONSABILIDADE DO PROPONENTE:
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="responsabilidadeproponente"  required name="responsabilidadeproponente" rows="10" placeholder="Descrever responsabilidades das partes em negociação, como forma de estabelecer critérios e condicionantes para a boa conduta dos serviços propostos. Tal descrição evita dissidências futuras."><?PHP echo $respproponente; ?> </textarea>
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
                            <h2>CONFIDENCIALIDADE:
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="confidencialidade"  required name="confidencialidade" rows="10" placeholder="Descrever parâmetros de confidencialidade, considerando teor do trabalho e criticidade da proposta."><?PHP echo $confidencialidade; ?> </textarea>
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
                            <h2>CONCLUSÃO:
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                    <textarea type="text" class="form-control" id="conclusao" name="conclusao"  required rows="10" placeholder="Fechamento do texto da proposta."><?PHP echo $conclusao; ?> </textarea>
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
                            <h2>FRASE / SLOGAN DA PROPOSTA:
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                  
                <input type="hidden" class="form-control" id="prop" name="prop"  required placeholder="Deseja usar uma frase de efeito?" value="<?php echo $prop; ?>">
                        
                        <input type="text" class="form-control" id="frase" name="frase"  required placeholder="Deseja usar uma frase de efeito?" value="<?php echo $frase; ?>">
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
                            <h2>CONFIGURAÇÕES FINAIS:
                            </h2><br>
                            <div id="formulario">
                <div class="form-group">
                <label><input type="checkbox" checked="" id= "modelo" name="modelo"  checked> <i></i> Quero usar como proposta modelo</label><BR>
                <label><input type="checkbox" checked="" id= "mostraremail" name="mostraremail"  checked> <i></i> Quero mostrar meus contatos no final da proposta</label><BR>
                <label><input type="checkbox" checked="" id= "mostrartelefone" name="mostrartelefone"  checked> <i></i> Quero mostrar meu telefone no final da proposta</label><BR>
                <label><input type="checkbox" checked="" id= "mostrarredesocial" name="mostrarredesocial"  checked> <i></i> Quero minhas Redes Sociais no Final da Proposta</label><BR>
                <label><input type="checkbox" checked="" id= "mostrarcomentarios" name="mostrarcomentarios"  checked> <i></i> Quero mostrar comentários de clientes no final da proposta</label><BR>
     
    
  <br>
  			    	
   			    	
                                <button type="button" class="btn btn-warning warning-icon-notika btn-reco-mg btn-button-mg" data-container="body" data-toggle="popover" data-placement="bottom" data-content="Estas análises de cenário se dividem em: 
       Ambiente interno (Forças e Fraquezas) - Integração dos Processos, Padronização dos Processos, Eliminação de redundância, Foco na atividade principal. 
       Ambiente externo (Oportunidades e Ameaças) - Confiabilidade e Confiança nos dados, Informação imediata de apoio à Gestão e Decisão estratégica, Redução de erros.">  <i class="far fa-lightbulb"><font face="arial" size="2">  Ajuda  </font></i></button>
                                      
                           
                                      
                                       <button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home()">
       
       <script>
       function relocate_home()
       {
            location.href = "gravar_propcons.php";
       } 
       </script>  <i class="notika-icon notika-checked"><font face="arial" size="2">  Salvar  </font></i></button>
                                       <button class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg" value="Input Button" onclick=" relocate_home1()">
       
       <script>
       function relocate_home1()
       {
            location.href = "propcons.php";
       } 
       </script>  <i class="notika-icon notika-close"><font face="arial" size="2">  Cancelar  </font></i></button>
                


      </form>


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