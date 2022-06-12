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
  $consulta = $_SESSION['numero_contrato'];
  $consulta2 = $_GET['id'];

  $sql = "SELECT * FROM `contrato` WHERE (`id_contrato` = '".$consulta2."') "; 
  $retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
  while($lista = mysqli_fetch_assoc($retorno)){
    $id_contrato = $lista['id_contrato'];
    $titulopagina_contrato = $lista['titulopagina_contrato'];
    $titulotopo_contrato = $lista['titulotopo_contrato'];
    $modelo_contrato = $lista['modelo_contrato'];
    $datacricao_contrato = $lista['data_contrato'];
    $status_contrato = $lista['status_contrato'];
    $consultoria_contrato = $lista['consultoria_contrato'];
    $empresa_contrato = $lista['empresa_contrato'];
    $usuario_contrato = $lista['usuario_contrato'];
    $textoinicial_contrato = $lista['textoinicial_contrato'];
    $cl1titulo_contrato = $lista['cl1titulo_contrato'];
    $texto1_contrato = $lista['texto1_contrato'];
    $cl2titulo_contrato = $lista['cl2titulo_contrato'];
    $texto2_contrato = $lista['texto2_contrato'];
    $cl3titulo_contrato = $lista['cl3titulo_contrato'];
    $texto3_contrato = $lista['texto3_contrato'];
    $cl4titulo_contrato = $lista['cl4titulo_contrato'];
    $texto4_contrato = $lista['texto4_contrato'];
    $cl5titulo_contrato = $lista['cl5titulo_contrato'];
    $texto5_contrato = $lista['texto5_contrato'];
    $cl6titulo_contrato = $lista['cl6titulo_contrato'];
    $texto6_contrato = $lista['texto6_contrato'];
    $cl7titulo_contrato = $lista['cl7titulo_contrato'];
    $texto7_contrato = $lista['texto7_contrato'];
    $cl8titulo_contrato = $lista['cl8titulo_contrato'];
    $texto8_contrato = $lista['texto8_contrato'];
    $cl9titulo_contrato = $lista['cl9titulo_contrato'];
    $texto9_contrato = $lista['texto9_contrato'];
    $cl10titulo_contrato = $lista['cl10titulo_contrato'];
    $texto10_contrato = $lista['texto10_contrato'];
    $cl11titulo_contrato = $lista['cl11titulo_contrato'];
    $texto11_contrato = $lista['texto11_contrato'];
    $cl12titulo_contrato = $lista['cl12titulo_contrato'];
    $texto12_contrato = $lista['texto12_contrato'];
    $cl13titulo_contrato = $lista['cl13titulo_contrato'];
    $texto13_contrato = $lista['texto13_contrato'];
    $cl14titulo_contrato = $lista['cl14titulo_contrato'];
    $texto14_contrato = $lista['texto14_contrato'];
    $cl15titulo_contrato = $lista['cl15titulo_contrato'];
    $texto15_contrato = $lista['texto15_contrato'];
    $anexo_contrato = $lista['anexo_contrato'];
    $botao1_contrato = $lista['botao1_contrato'];    
    $botao2_contrato = $lista['botao2_contrato'];    
    $botao3_contrato = $lista['botao3_contrato'];    
    $botao4_contrato = $lista['botao4_contrato'];    
    $botao5_contrato = $lista['botao5_contrato'];    
    $botao6_contrato = $lista['botao6_contrato'];    
    $botao7_contrato = $lista['botao7_contrato'];    
    $botao8_contrato = $lista['botao8_contrato'];    
    $botao9_contrato = $lista['botao9_contrato'];    
    $botao10_contrato = $lista['botao10_contrato'];    
    $botao11_contrato = $lista['botao11_contrato'];    
    $botao12_contrato = $lista['botao12_contrato'];    
    $botao13_contrato = $lista['botao13_contrato'];    
    $botao14_contrato = $lista['botao14_contrato'];    
    $botao15_contrato = $lista['botao15_contrato'];    
    $modelo_contrato = $lista['modelo_contrato'];    
        $status = 'pendente';
   }




  $html  = '<body>';
 
 

  $html .= '<h2  align=center><strong>'.$titulotopo_contrato. "</strong></h2>";
  if ($botao1_contrato == '.on.') { 
  $html .= '<p align=left><br><strong><font size=5>'.$cl1titulo_contrato. "</font></strong><br>";
  $html .= '<p align=justify><font size=3>'.$texto1_contrato. "</font>";
  }
  if ($botao2_contrato == '.on.') { 
    $html .= '<p align=left><br><strong><font size=5>'.$cl2titulo_contrato. "</font></strong><br>";
    $html .= '<p align=justify><font size=3>'.$texto2_contrato. "</font>";
    }
    if ($botao3_contrato == '.on.') { 
      $html .= '<p align=left><br><strong><font size=5>'.$cl3titulo_contrato. "</font></strong><br>";
      $html .= '<p align=justify><font size=3>'.$texto3_contrato. "</font>";
      }
      if ($botao4_contrato == '.on.') { 
        $html .= '<p align=left><br><strong><font size=5>'.$cl4titulo_contrato. "</font></strong><br>";
        $html .= '<p align=justify><font size=3>'.$texto4_contrato. "</font>";
        }
        if ($botao5_contrato == '.on.') { 
          $html .= '<p align=left><br><strong><font size=5>'.$cl5titulo_contrato. "</font></strong><br>";
          $html .= '<p align=justify><font size=3>'.$texto5_contrato. "</font>";
          }
          if ($botao6_contrato == '.on.') { 
            $html .= '<p align=left><br><strong><font size=5>'.$cl6titulo_contrato. "</font></strong><br>";
            $html .= '<p align=justify><font size=3>'.$texto6_contrato. "</font>";
            }
            if ($botao7_contrato == '.on.') { 
              $html .= '<p align=left><br><strong><font size=5>'.$cl7titulo_contrato. "</font></strong><br>";
              $html .= '<p align=justify><font size=3>'.$texto7_contrato. "</font>";
              }
              if ($botao8_contrato == '.on.') { 
                $html .= '<p align=left><br><strong><font size=5>'.$cl8titulo_contrato. "</font></strong><br>";
                $html .= '<p align=justify><font size=3>'.$texto8_contrato. "</font>";
                }
                if ($botao9_contrato == '.on.') { 
                  $html .= '<p align=left><br><strong><font size=5>'.$cl9titulo_contrato. "</font></strong><br>";
                  $html .= '<p align=justify><font size=3>'.$texto9_contrato. "</font>";
                  }
                  if ($botao10_contrato == '.on.') { 
                    $html .= '<p align=left><br><strong><font size=5>'.$cl10titulo_contrato. "</font></strong><br>";
                    $html .= '<p align=justify><font size=3>'.$texto10_contrato. "</font>";
                    }
                    if ($botao11_contrato == '.on.') { 
                      $html .= '<p align=left><br><strong><font size=5>'.$cl11titulo_contrato. "</font></strong><br>";
                      $html .= '<p align=justify><font size=3>'.$texto11_contrato. "</font>";
                      }
                      if ($botao12_contrato == '.on.') { 
                        $html .= '<p align=left><br><strong><font size=5>'.$cl12titulo_contrato. "</font></strong><br>";
                        $html .= '<p align=justify><font size=3>'.$texto12_contrato. "</font>";
                        }
                        if ($botao13_contrato == '.on.') { 
                          $html .= '<p align=left><br><strong><font size=5>'.$cl13titulo_contrato. "</font></strong><br>";
                          $html .= '<p align=justify><font size=3>'.$texto13_contrato. "</font>";
                          }
                          if ($botao14_contrato == '.on.') { 
                            $html .= '<p align=left><br><strong><font size=5>'.$cl14titulo_contrato. "</font></strong><br>";
                            $html .= '<p align=justify><font size=3>'.$texto14_contrato. "</font>";
                            }
                            if ($botao15_contrato == '.on.') { 
                              $html .= '<p align=left><br><strong><font size=5>'.$cl15titulo_contrato. "</font></strong><br>";
                              $html .= '<p align=justify><font size=3>'.$texto15_contrato. "</font></p>";
                              }
                                                                                                                                                              
  
  




  
  $html .= '</body>';




//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();

// Carrega seu HTML
$dompdf->load_html('

'. $html .'
');

//Renderizar o html

$dompdf->set_paper("A4", "portrail");
$dompdf->render();
//Exibibir a página
$dompdf->stream(
"contrato.pdf", 
array(
"Attachment" => false //Para realizar o download somente alterar para true
)
);

?>