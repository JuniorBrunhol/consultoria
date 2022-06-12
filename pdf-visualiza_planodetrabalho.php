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
  
 
   $sql1 = "SELECT * FROM `consultoria` WHERE (`id_consultoria` = '".$consultoria_usuarios."')  "; 
   $retorno1 = mysqli_query ($mysqli , $sql1) or die (mysql_error());
   while($dados1 = mysqli_fetch_array($retorno1)){
     $id_consultoria = $dados1['id_consultoria'];    
     $razaosocial_consultoria = $dados1['razaosocial_consultoria'];
     $responsavel_consultoria = $dados1['responsavel_consultoria'];
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
    
   }
 
   $sql2 = "SELECT * FROM `empresa` WHERE (`id_empresa` = '".$EmpresaID."') "; 
   $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
   while($dados2 = mysqli_fetch_array($retorno2)){
     $razaosocial_empresa = $dados2['razaosocial_empresa'];
     $nomefantasia_empresa = $dados2['nomefantasia_empresa'];
   
       }
       $sql3 = "SELECT * FROM `cronograma` WHERE (`id_cronograma` = '".$id."') "; 
       $retorno3 = mysqli_query ($mysqli , $sql3) or die (mysql_error());
       while($dados3 = mysqli_fetch_array($retorno3)){
       $id_cronograma = $dados3['id_cronograma'];
       $datainicial_cronograma = $dados3['datainicial_cronograma'];
       $previsaofim_cronograma = $dados3['previsaofim_cronograma'];
       $dataregistro_cronograma = $dados3['dataregistro_cronograma'];
       $titulo_cronograma = $dados3['titulo_cronograma'];
       $atingimento_cronograma = $dados3['atingimento_cronograma'];
       $objetivo_cronograma = $dados3['objetivo_cronograma'];
       }

       $sql39 = "SELECT count(cronograma_tarefa) AS total39 FROM tarefa WHERE (`cronograma_tarefa` = '".$id_cronograma."')";
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

  $html  = '<body>';
 
 
  $html .= '<table width=100%>';
         $html .= '<tr>
        <td align=right ><img height=70 src="img/logo/'.$logo.'"></td>
        <td bgcolor="#ffffff" colspan=3  align=left><font size=2><strong>'.$razaosocial_consultoria.'</strong><br>'.$endereco_consultoria.'<br><strong>E-mail:</strong>'.$email_consultoria.' - <strong>Telefone:</strong> '.$telefone_consultoria.'<br><strong>Responsável:</strong>'.$responsavel_consultoria.'</font></td>
       
     </tr>';  
 
     
     $html .= '<tr>
   
     <td bgcolor="#ffffff" colspan=4 align=center><STRONG><font size=5><BR>Plano de Trabalho<BR><BR></font></STRONG></td>
    
  </tr>';  
     $html .= '<tr>
     <td align=left ><strong><font size=3>Empresa:</font></strong></td>
     <td bgcolor="#ffffff" align=left colspan=3  ><font size=3>'.$razaosocial_empresa.'</font></td>
    
  </tr>';  
  $html .= '<tr>
  <td align=left ><strong><font size=3>Realizado em:</font></strong></td>
  <td bgcolor="#ffffff" colspan=3  align=justify><font size=3>'.date('d/m/Y',  strtotime($dataregistro_cronograma)).'</font></td>
 
</tr>';  

$html .= '</table><br>';


$html .= '<table border=0 bgcolor="#CCCCCC">';
$html .= '<tr>
  <td colspan=3 bgcolor="#ffffff" style="padding:10px;"><strong>TÍTULO DO PLANO DE TRABALHO: </strong>'.
$titulo_cronograma.'
  </td>
</tr>';
$html .= '<tr>
  <td width=33% bgcolor="#ffffff" align=center style="padding:10px;"><strong>PREVISÃO INÍCIO:</strong>'.
  date('d/m/Y',  strtotime($datainicial_cronograma)).'
  </td>

  <td width=33% bgcolor="#ffffff" align=center  style="padding:10px;"><strong>PREVISÃO TÉRMINO:</strong>'.
date('d/m/Y',  strtotime($previsaofim_cronograma)).'
  </td>

  <td width=34% bgcolor="#ffffff" align=center  style="padding:10px;"><strong>ATINGIMENTO:</strong><br>'.
  
             $percentual2.' %
  </td>
</tr>';
$html .= '<tr>
  <td colspan=3 bgcolor="#ffffff"  style="padding:10px;"><strong>OBJETIVO DO PROCESSO DE CONSULTORIA: </strong>'.$objetivo_cronograma.'
  </td>
</tr>';
$html .= '</table>';
                         
$html .= '<table width=100% border=0 bgcolor="#CCCCCC">';

$sql4 = "SELECT * FROM `acaocronograma` WHERE (`idcronograma_acaocronograma` = '".$id_cronograma."')"; 
$retorno4 = mysqli_query ($mysqli , $sql4) or die (mysql_error());
while($dados4 = mysqli_fetch_array($retorno4)){
$tarefa_acaocronograma = $dados4['tarefa_acaocronograma'];
$id_acaocronograma = $dados4['id_acaocronograma'];

  $html .= '<tr><td colspan=5 bgcolor="#ffffff"  style="padding:10px;"><strong>Etapa:</strong>'.$tarefa_acaocronograma.'</td>
</tr>';
$html .= '<tr>
<td width=3% bgcolor=#000000 style="padding:10px;"></td>
<td width=41% bgcolor="#ffffff" style="padding:10px;"><strong>Tarefa</strong></td>
<td width=22% bgcolor="#ffffff" align="center" style="padding:10px;"><strong>Vencimento</strong></td>
<td width=17% bgcolor="#ffffff" align="center" style="padding:10px;"><strong>Dono</strong></td>
<td width=17% bgcolor="#ffffff" align="center" style="padding:10px;"><strong>Status</strong></td>
</tr>';
    
                $sql = "SELECT * FROM `tarefa` WHERE (`bloco_tarefa` = '".$id_acaocronograma."') "; 
$retorno = mysqli_query ($mysqli , $sql) or die (mysql_error());
while($lista= mysqli_fetch_array($retorno)){
$tarefa_tarefa = str_replace('<br />', "\n", $lista['tarefa_tarefa']);
$id_tarefa = str_replace('<br />', "\n", $lista['id_tarefa']);
$vencimento_tarefa = str_replace('<br />', "\n", $lista['vencimento_tarefa']);
$dono_tarefa = str_replace('<br />', "\n", $lista['dono_tarefa']);



$status_tarefa = str_replace('<br />', "\n", $lista['status_tarefa']);

$html .= '<tr>
                            <td bgcolor=#000000></td>
                              <td bgcolor="#ffffff" style="padding:10px;"><div id="espaco"><Font size="2">'.$tarefa_tarefa.'</div></td>
                              <td bgcolor="#ffffff" align="center"><Font size="2">'.date('d/m/Y',  strtotime($vencimento_tarefa)).'</td>
                              
                              <td bgcolor="#ffffff" align="center"><Font size="2">'.$dono_tarefa.'
                          </td>
                        
                              <td bgcolor="#ffffff" align="center"><Font size="2">'.
                              $status_tarefa.'
                              
                           
                              
                                                           
                            </tr>';
                           } }


                           $html .= '</table>';

   
  
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
"Planodetrabalho.pdf", 
array(
"Attachment" => false //Para realizar o download somente alterar para true
)
);

?>