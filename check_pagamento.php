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

  $var = $_GET["var"];








  $sql = "SELECT * FROM `acesso_empresa` WHERE (`usuarios_acesso_empresa` = '".$idconsultor."') and  (`empresa_acesso_empresa` = '".$var."')"; 
$retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
 while ($lista = mysqli_fetch_assoc ($retorno)) {
      $consultoria = $lista['consultoria_acesso_empresa'];
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
 <?php                       $sql2 = "SELECT * FROM `consultoria` WHERE (`id_consultoria` = '".$consultoria."') "; 
$retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
 while ($lista2 = mysqli_fetch_assoc ($retorno2)) {
      $licenca = date("Y-m-d",strtotime($lista2['licenca_consultoria']));
      $plano = $lista2['plano_consultoria'];
 }
 
 
 $today = date("Y-m-d"); 
?>
                   
  <p><?php 
  
  if($today>$licenca){

    echo "Licença de uso expirada! Contacte o suporte ao sistema: (22) 99215-7929.";
    header("refresh: 5;restrito.php");
  
  } else {
    // Salva os dados encontados na variável $resultado
              $_SESSION['EmpresaID'] = $var;
              $_SESSION['Plano'] = $plano;

          // Redireciona o visitante
          header("Location: principal.php"); exit;
  } ?></b></p>
 <br><p>Clique <a href="restrito.php">aqui</a> para voltar ou aguarde 5 segundos para ser redirecionado automaticamente.</p>
        
                    </div>
                </div>
            </div>
        </div>
    </div>

  