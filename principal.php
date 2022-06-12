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


     // Validação do usuário com empresas que atende
  $sql = "SELECT * FROM `acesso_empresa` WHERE (`usuarios_acesso_empresa` = '".$idconsultor."')"; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
  while ($lista = mysqli_fetch_assoc ($retorno)) {
        $empresaatendida = $lista['empresa_acesso_empresa'];
  
        $sql2 = "SELECT * FROM `empresa` WHERE (`id_empresa` = '".$EmpresaID."')"; 
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
        } }

        if ($proposta == 'notika-icon notika-close'){
            $nota_proposta = 0;
          }else{
            $nota_proposta = 15;
          }
  
          if ($contrato == 'notika-icon notika-close') {
            $nota_contrato = 0;
          }else{
            $nota_contrato = 15;
          }
  
          if ($planodetrabalho == "notika-icon notika-close") {
            $nota_planodetrabalho = 0;
          }else{
            $nota_planodetrabalho = 10;
          }
  
          if ($apreciacao == "notika-icon notika-close") {
            $nota_apreciacao = 0;
          }else{
            $nota_apreciacao = 10;
          }
  
          if ($diagnosticosituacional== "notika-icon notika-close") {
            $nota_diagnosticosituacional = 0;
          }else{
            $nota_diagnosticosituacional = 20;
          }
  
          if ($cronograma == "notika-icon notika-close") {
            $nota_cronograma = 0;
          }else{
            $nota_cronograma = 15;
          }
  
          if ($diagnosticoprevio == "notika-icon notika-close") {
            $nota_diagnostico = 0;
          }else{
            $nota_diagnostico = 15;
          }
   
          $checked = $nota_diagnostico + $nota_proposta + $nota_contrato + $nota_planodetrabalho + $nota_apreciacao + $nota_diagnosticosituacional + $nota_cronograma;
  


?>
<!doctype html>
<html class="no-js" lang="pt-br">

<head>
  
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
   
<style type="text/css">
			.carregando{
				color:#ff0000;
				display:none;
			}
		</style>
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
    <!-- Start Status area -->
    <div class="notika-status-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter"><?php 

$sql19 = "SELECT count(empresa_reuniao) AS total19 FROM reuniao WHERE (`empresa_reuniao` = '".$idempresa."')";
            $retorno19 = mysqli_query($mysqli,$sql19);
            $values19 = mysqli_fetch_assoc($retorno19);
            $num_rows19=$values19['total19'];
                               
                                  
                                  echo $num_rows19;  
                                ?></span></h2>
                            <p>Visitas ao cliente</p>
                        </div>
                         </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">
                                <?php 

$resultado = mysqli_query($mysqli, "SELECT sum(temporeuniao_reuniao) FROM reuniao WHERE (`empresa_reuniao` = '".$idempresa."')");
    $linhas = mysqli_num_rows($resultado);
 
 
    while($linhas = mysqli_fetch_array($resultado)){
         $tempo = $linhas['sum(temporeuniao_reuniao)']/60;
         echo $tempo;
        }
            ?></span> Horas</h2>
                            <p>Horas de Atendimento</p>
                        </div>
                         </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">  <?php 

$resultado2 = mysqli_query($mysqli, "SELECT sum(temporeuniao_rafc) FROM rafc WHERE (`empresa_rafc` = '".$idempresa."')");
    $linhas2 = mysqli_num_rows($resultado2);
 
 
    while($linhas2 = mysqli_fetch_array($resultado2)){
         $tempo2 = $linhas2['sum(temporeuniao_rafc)']/60;
         echo $tempo2;
        }
            ?></span> Horas</h2>
                            <p>Horas em reunião RAFC</p>
                        </div>
                     </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30">
                        <div class="website-traffic-ctn">
                            <h2><span class="counter">

                            <?php 


echo $checked;

   ?>
                            </span></h2>
                            <p>Pontuação CheckList</p>
                        </div>
                          </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <form id="form" name="form" method="post" action="gravar_tarefa.php">
    <div class="container">
         <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <div class="data-table-list">
           <h5>PLANO DE AÇÃO 5W2H</h5><BR>
           <div class="input-group">
           
           <span class="input-group-addon nk-ic-st-pro">TAREFA:</span> 
                    <div class="nk-int-st">
           <input type="text" class="form-control" id="tarefa_tarefa"  name="tarefa_tarefa"  required placeholder="Preencha o texto da tarefa">
    </DIV>
    <span class="input-group-addon nk-ic-st-pro">NÍVEL TAREFA:</span> 
                    <div class="nk-int-st">
                    
                                    <select id="nivel_tarefa" class="form-control" name="nivel_tarefa"> 
                                        <option value="1">Fácil - Rápido</option>
                                        <option value="2">Fácil - Demorado</option>
                                        <option value="3">Díficil - Demorado</option>
                                       
                                    </select>
                                   
                                      </div>
    </DIV>
          

            <BR>
            <div class="input-group">
           <span class="input-group-addon nk-ic-st-pro">PLANO DE TRABALHO:</span>  
           <div class="nk-int-st">
               
           <select name="id_categoria" id="id_categoria" class="form-control">
        <option value="0">Não vincular a nenhum cronograma</option>
				<?php
					$result_cat_post = "SELECT * FROM cronograma WHERE (`consultoria_cronograma` = '".$consultoria_usuarios."') AND (`empresa_cronograma` = '".$EmpresaID."')  ORDER BY titulo_cronograma";
					$resultado_cat_post = mysqli_query($mysqli, $result_cat_post);
					while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
						echo '<option value="'.$row_cat_post['id_cronograma'].'">'.$row_cat_post['titulo_cronograma'].'</option>';
					}
				?>
			</select>
    </DIV>        

           <span class="input-group-addon nk-ic-st-pro">ETAPA:</span> 
           <div class="nk-int-st">
           <span class="carregando">Aguarde, carregando...</span>
			<select name="id_sub_categoria" id="id_sub_categoria" class="form-control">
				<option value="0">Escolha a Subcategoria</option>
			</select>
  
        </DIV>
 </DIV>
 <BR><div class="input-group">
    <span class="input-group-addon nk-ic-st-pro">RESPONSÁVEL:</span> 
                    <div class="nk-int-st">
           <input type="text" class="form-control" id="dono_tarefa"  name="dono_tarefa"  required placeholder="Preencha o nome do Responsável" style="width:400px;">
    </DIV>
    <span class="input-group-addon nk-ic-st-pro">DATA VENCIMENTO:</span> 
                    <div class="nk-int-st">
           <input type="text" class="form-control" id="vencimento_tarefa"  oninput="mascara(this, 'nascimento')"  name="vencimento_tarefa" style="width:250px;margin-right:20px">
         
           <a href="gravar_tarefa.php"><button class="btn btn-success success-icon-notika btn-reco-mg btn-button-mg"><i class="notika-icon notika-checked"><font face="arial" size="2">  ADICIONAR  </font></i></button></a>


</DIV>
</DIV>
    </form>

    </div>
    </div>
    </div>
    </div>
    <br>




     <!-- Data Table area Start-->
     <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h2>Tarefas Cadastradas</h2>
                         </div>
                     
                
                            <table id="data-table-basic" class="table table-striped" width=100%>
                                <thead>
   
                               
          

                                    <tr><th width=47%><Font size="1">Tarefa</font></th>
                                        <th width=8% align="center"><Font size="2">Vencimento</font></th>
                                        <th width=15% align="center"><Font size="2">Dono</font></th>
                                        <th width=10% align="center"><Font size="2">Mais informações</font></th>
                                        <th width=12% align="center"><Font size="2">Status Atual</font></th>
                                        <th width=8% align="center"><Font size="2">Editar</font></th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                <?php      
                          $sql = "SELECT * FROM `tarefa` WHERE (`consultoria_tarefa` = '".$consultoria_usuarios."') AND (`empresa_tarefa` = '".$EmpresaID."') "; 
    $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
    while($lista= mysqli_fetch_array($retorno)){
        $tarefa_tarefa = str_replace('<br />', "\n", $lista['tarefa_tarefa']);
        $id_tarefa = str_replace('<br />', "\n", $lista['id_tarefa']);
        $vencimento_tarefa = str_replace('<br />', "\n", $lista['vencimento_tarefa']);
        $dono_tarefa = str_replace('<br />', "\n", $lista['dono_tarefa']);
        $consultoria_tarefa = str_replace('<br />', "\n", $lista['consultoria_tarefa']);
        $empresa_tarefa = str_replace('<br />', "\n", $lista['empresa_tarefa']);
        $usuario_tarefa = str_replace('<br />', "\n", $lista['usuario_tarefa']);
        $cronograma_tarefa = str_replace('<br />', "\n", $lista['cronograma_tarefa']);
        $bloco_tarefa = str_replace('<br />', "\n", $lista['bloco_tarefa']);
        $nivel_tarefa = str_replace('<br />', "\n", $lista['nivel_tarefa']);
        $status_tarefa = str_replace('<br />', "\n", $lista['status_tarefa']);
        
       

   
   
?>
                                    <tr>
                                        <td><div id="espaco"><Font size="2"><?php echo $tarefa_tarefa; ?></div></td>
                                        <td align="center"><Font size="2"><?php echo date('d/m/Y',  strtotime($vencimento_tarefa)); ?></td>
                                        
                                        <td align="center"><Font size="2"><?php echo $dono_tarefa; ?>
                                    </td>
                                  
                                        <td align="center"><Font size="3"><strong><i class="notika-icon notika-edit" style="margin-right:10px" title="Plano de Trabalho: <?php 
                                        
                                        $sql1 = "SELECT * FROM `cronograma` WHERE (`id_cronograma` = '".$cronograma_tarefa."')"; 
                                        $retorno1 = mysqli_query ($mysqli , $sql1) or die (mysql_error());
                                        while($lista1= mysqli_fetch_array($retorno1)){
                                          $titulo_cronograma = str_replace('<br />', "\n", $lista1['titulo_cronograma']);

                                        echo $titulo_cronograma; }?>"></i></strong></font>
                                        <Font size="3"><strong><i class="notika-icon notika-windows" style="margin-right:10px" title="Bloco: <?php 
                                           $sql5 = "SELECT * FROM `acaocronograma` WHERE (`id_acaocronograma` = '".$bloco_tarefa."')"; 
                                           $retorno5 = mysqli_query ($mysqli , $sql5) or die (mysql_error());
                                           while($lista5= mysqli_fetch_array($retorno5)){
                                             $tarefa_acaocronograma = str_replace('<br />', "\n", $lista5['tarefa_acaocronograma']);
                                        
                                        echo $tarefa_acaocronograma; }?>"></i></strong></font>
                                        <Font size="3"><strong><i class="notika-icon notika-bar-chart" title="Nível Tarefa: 
                                        <?php 
                                    if($nivel_tarefa == 1){
                                      echo 'Fácil - Rápido';
                                    }
                                    if($nivel_tarefa == 2){
                                      echo 'Fácil - Demorado';
                                    }
                                    if($nivel_tarefa == 3){
                                      echo 'Difícil - Demorado';
                                    } 
                                    
                                    ?>
                                        "></i></strong></font></td>
                                        <td align="center">
                                        <?php 
                                        
                                        if ($status_tarefa =='PENDENTE') { ?>
                                          <a href="aprovacao.php?id=<?php echo $id_tarefa; ?>&status=<?php echo $status_tarefa;?>"><button class="btn btn-danger danger-icon-notika btn-reco-mg btn-button-mg"><?php echo $status_tarefa;?></button></a>
                                        <?php }else{ ?>
                                          <a href="aprovacao.php?id=<?php echo $id_tarefa; ?>&status=<?php echo $status_tarefa;?>"><button class="btn btn-teal teal-icon-notika btn-reco-mg btn-button-mg"><?php echo $status_tarefa;?></button></a></td>
                                        <?php }
                                        ?>
                                       <td align="center"><Font size="3"><strong><i class="notika-icon notika-draft" title="Editar" style="margin-right:10px"></i></strong></font> 
                                        <A HREF="apagar_tarefa.php?id=<?php echo $id_tarefa; ?>"><Font size="3"><strong><i class="notika-icon notika-trash" title="Excluir"></i></strong></font></a></td>
                                        
                                                                     
                                      </tr>
                                     <?php } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th align="center">Tarefa</th>
                                    <th align="center">Vencimento</th>
                                        <th align="center">Dono</th>
                                        <th align="center">Mais informações</th>
                                        <th align="center">Status</th>
                                        <th align="center">Editar</th>
               
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



<br><br><br><br>    <!-- End Status area-->

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		
		<script type="text/javascript">
		$(function(){
			$('#id_categoria').change(function(){
				if( $(this).val() ) {
					$('#id_sub_categoria').hide();
					$('.carregando').show();
					$.getJSON('sub_categorias_post.php?search=',{id_categoria: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">Escolha Subcategoria</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome_sub_categoria + '</option>';
						}	
						$('#id_sub_categoria').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#id_sub_categoria').html('<option value="">– Escolha Subcategoria –</option>');
				}
			});
		});
		</script>
	
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
<script>
	$(document).ready(function(){
		carregar_json('Estado');
		function carregar_json(id, cidade_id){
			var html = '';

			$.getJSON('https://gist.githubusercontent.com/letanure/3012978/raw/36fc21d9e2fc45c078e0e0e07cce3c81965db8f9/estados-cidades.json', function(data){
				html += '<option>Selecionar '+ id +'</option>';
				console.log(data);
				if(id == 'Estado' && cidade_id == null){
					for(var i = 0; i < data.estados.length; i++){
						html += '<option value='+ data.estados[i].sigla +'>'+ data.estados[i].nome+'</option>';
					}
				}else{
					for(var i = 0; i < data.estados.length; i++){
						if(data.estados[i].sigla == cidade_id){
							for(var j = 0; j < data.estados[i].cidades.length; j++){
								html += '<option value='+ data.estados[i].sigla +'>'+data.estados[i].cidades[j]+ '</option>';
							}
						}
					}
				}

				$('#'+id).html(html);
			});
			
		}

		$(document).on('change', '#Estado', function(){
			var cidade_id = $(this).val();
			console.log(cidade_id);
			if(cidade_id != null){
				carregar_json('Cidade', cidade_id);
			}
		});

	});
</script>