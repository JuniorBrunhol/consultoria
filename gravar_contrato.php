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
$EmpresaID =  $_SESSION['EmpresaID'];
$plano = $_SESSION['Plano'];
$consultoria_usuarios = $_SESSION['Consultoria'];

$titulopagina_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulopagina_contrato'])));
$titulotopo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['titulotopo_contrato'])));
$modelo_contrato = $_POST['modelo_contrato'];
$data_contrato = date('Y-m-d H:i:s');
$status_contrato = 'pendente';
$textoinicial_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['textoinicial_contrato'])));
$cl1titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl1titulo_contrato'])));
$texto1_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto1_contrato'])));
$cl2titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl2titulo_contrato'])));
$texto2_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto2_contrato'])));
$cl3titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl3titulo_contrato'])));
$texto3_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto3_contrato'])));
$cl4titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl4titulo_contrato'])));
$texto4_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto4_contrato'])));
$cl5titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl5titulo_contrato'])));
$texto5_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto5_contrato'])));
$cl6titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl6titulo_contrato'])));
$texto6_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto6_contrato'])));
$cl7titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl7titulo_contrato'])));
$texto7_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto7_contrato'])));
$cl8titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl8titulo_contrato'])));
$texto8_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto8_contrato'])));
$cl9titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl9titulo_contrato'])));
$texto9_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto9_contrato'])));
$cl10titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl10titulo_contrato'])));
$texto10_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto10_contrato'])));
$cl11titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl11titulo_contrato'])));
$texto11_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto11_contrato'])));
$cl12titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl12titulo_contrato'])));
$texto12_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto12_contrato'])));
$cl13titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl13titulo_contrato'])));
$texto13_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto13_contrato'])));
$cl14titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl14titulo_contrato'])));
$texto14_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto14_contrato'])));
$cl15titulo_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['cl15titulo_contrato'])));
$texto15_contrato = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto15_contrato'])));
$anexo_contrato = 'pendente';
$botao1_contrato = $_POST['botao1_contrato'];
$botao2_contrato = $_POST['botao2_contrato'];
$botao3_contrato = $_POST['botao3_contrato'];
$botao4_contrato = $_POST['botao4_contrato'];
$botao5_contrato = $_POST['botao5_contrato'];
$botao6_contrato = $_POST['botao6_contrato'];
$botao7_contrato = $_POST['botao7_contrato'];
$botao8_contrato = $_POST['botao8_contrato'];
$botao9_contrato = $_POST['botao9_contrato'];
$botao10_contrato = $_POST['botao10_contrato'];
$botao11_contrato = $_POST['botao11_contrato'];
$botao12_contrato = $_POST['botao12_contrato'];
$botao13_contrato = $_POST['botao13_contrato'];
$botao14_contrato = $_POST['botao14_contrato'];
$botao15_contrato = $_POST['botao15_contrato'];




    $sql3 = "SELECT * FROM `contrato` WHERE (`empresa_contrato` = '".$EmpresaID."') AND  (`modelo_contrato` = 'on') "; 
    $retorno3 = mysqli_query ($mysqli , $sql3) or die (mysql_error());
    while($dados3 = mysqli_fetch_array($retorno3)){
    $ultimo_idcontrato = $dados3['id_contrato'];
    echo $ultimo_idcontrato;
    }
    if(@mysqli_num_rows($retorno3) > 0){ //faça algo se não houver dados }else{/ /faça algo se houver dados }
   
        echo $ultimo_idcontrato;
            $sql1 = "UPDATE contrato SET 
            titulopagina_contrato = '".$titulopagina_contrato."',
titulotopo_contrato = '".$titulotopo_contrato."',
modelo_contrato = '".$modelo_contrato."',

status_contrato = '".$status_contrato."',
consultoria_contrato = '".$consultoria_usuarios."',
empresa_contrato = '".$EmpresaID."',
usuario_contrato = '".$idconsultor."',
textoinicial_contrato = '".$textoinicial_contrato."',
cl1titulo_contrato = '".$cl1titulo_contrato."',
texto1_contrato = '".$texto1_contrato."',
cl2titulo_contrato = '".$cl2titulo_contrato."',
texto2_contrato = '".$texto2_contrato."',
cl3titulo_contrato = '".$cl3titulo_contrato."',
texto3_contrato = '".$texto3_contrato."',
cl4titulo_contrato = '".$cl4titulo_contrato."',
texto4_contrato = '".$texto4_contrato."',
cl5titulo_contrato = '".$cl5titulo_contrato."',
texto5_contrato = '".$texto5_contrato."',
cl6titulo_contrato = '".$cl6titulo_contrato."',
texto6_contrato = '".$texto6_contrato."',
cl7titulo_contrato = '".$cl7titulo_contrato."',
texto7_contrato = '".$texto7_contrato."',
cl8titulo_contrato = '".$cl8titulo_contrato."',
texto8_contrato = '".$texto8_contrato."',
cl9titulo_contrato = '".$cl9titulo_contrato."',
texto9_contrato = '".$texto9_contrato."',
cl10titulo_contrato = '".$cl10titulo_contrato."',
texto10_contrato = '".$texto10_contrato."',
cl11titulo_contrato = '".$cl11titulo_contrato."',
texto11_contrato = '".$texto11_contrato."',
cl12titulo_contrato = '".$cl12titulo_contrato."',
texto12_contrato = '".$texto12_contrato."',
cl13titulo_contrato = '".$cl13titulo_contrato."',
texto13_contrato = '".$texto13_contrato."',
cl14titulo_contrato = '".$cl14titulo_contrato."',
texto14_contrato = '".$texto14_contrato."',
cl15titulo_contrato = '".$cl15titulo_contrato."',
texto15_contrato = '".$texto15_contrato."',
anexo_contrato = '".$anexo_contrato."',
botao1_contrato = '.$botao1_contrato.',
botao2_contrato = '.$botao2_contrato.',
botao3_contrato = '.$botao3_contrato.',
botao4_contrato = '.$botao4_contrato.',
botao5_contrato = '.$botao5_contrato.',
botao6_contrato = '.$botao6_contrato.',
botao7_contrato = '.$botao7_contrato.',
botao8_contrato = '.$botao8_contrato.',
botao9_contrato = '.$botao9_contrato.',
botao10_contrato = '.$botao10_contrato.',
botao11_contrato = '.$botao11_contrato.',
botao12_contrato = '.$botao12_contrato.',
botao13_contrato = '.$botao13_contrato.',
botao14_contrato = '.$botao14_contrato.',
botao15_contrato = '.$botao15_contrato.'
            WHERE id_contrato='$ultimo_idcontrato'"; 
            $resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));
            header("Location: visualiza_contrato.php?id=<?php echo $ultimo_idproposta; ?>"); exit;
           
           


}else{
$sql = "INSERT INTO contrato (
     titulopagina_contrato,
titulotopo_contrato,
modelo_contrato,
data_contrato,
status_contrato,
consultoria_contrato,
empresa_contrato,
usuario_contrato,
textoinicial_contrato,
cl1titulo_contrato,
texto1_contrato,
cl2titulo_contrato,
texto2_contrato,
cl3titulo_contrato,
texto3_contrato,
cl4titulo_contrato,
texto4_contrato,
cl5titulo_contrato,
texto5_contrato,
cl6titulo_contrato,
texto6_contrato,
cl7titulo_contrato,
texto7_contrato,
cl8titulo_contrato,
texto8_contrato,
cl9titulo_contrato,
texto9_contrato,
cl10titulo_contrato,
texto10_contrato,
cl11titulo_contrato,
texto11_contrato,
cl12titulo_contrato,
texto12_contrato,
cl13titulo_contrato,
texto13_contrato,
cl14titulo_contrato,
texto14_contrato,
cl15titulo_contrato,
texto15_contrato,
anexo_contrato,
botao1_contrato,
botao2_contrato,
botao3_contrato,
botao4_contrato,
botao5_contrato,
botao6_contrato,
botao7_contrato,
botao8_contrato,
botao9_contrato,
botao10_contrato,
botao11_contrato,
botao12_contrato,
botao13_contrato,
botao14_contrato,
botao15_contrato) VALUES (
    '$titulopagina_contrato',
'$titulotopo_contrato',
'$modelo_contrato',
'$data_contrato',
'$status_contrato',
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$textoinicial_contrato',
'$cl1titulo_contrato',
'$texto1_contrato',
'$cl2titulo_contrato',
'$texto2_contrato',
'$cl3titulo_contrato',
'$texto3_contrato',
'$cl4titulo_contrato',
'$texto4_contrato',
'$cl5titulo_contrato',
'$texto5_contrato',
'$cl6titulo_contrato',
'$texto6_contrato',
'$cl7titulo_contrato',
'$texto7_contrato',
'$cl8titulo_contrato',
'$texto8_contrato',
'$cl9titulo_contrato',
'$texto9_contrato',
'$cl10titulo_contrato',
'$texto10_contrato',
'$cl11titulo_contrato',
'$texto11_contrato',
'$cl12titulo_contrato',
'$texto12_contrato',
'$cl13titulo_contrato',
'$texto13_contrato',
'$cl14titulo_contrato',
'$texto14_contrato',
'$cl15titulo_contrato',
'$texto15_contrato',
'$anexo_contrato',
'$botao1_contrato',
'$botao2_contrato',
'$botao3_contrato',
'$botao4_contrato',
'$botao5_contrato',
'$botao6_contrato',
'$botao7_contrato',
'$botao8_contrato',
'$botao9_contrato',
'$botao10_contrato',
'$botao11_contrato',
'$botao12_contrato',
'$botao13_contrato',
'$botao14_contrato',
'$botao15_contrato'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_contrato) AS id_contrato FROM `contrato` WHERE (`empresa_contrato` = '".$EmpresaID."') AND  (`consultoria_contrato` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_contrato'];
    header("Location:visualiza_contrato.php?id=<?php echo $id; ?>"); exit;
 


      }
}
?>