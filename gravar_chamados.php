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

$status2 = 'Pendente Resposta Cliente';
$status = 'Pendente Resposta Consultor';
$titulo_chamado = $_POST['titulo_chamado'];
$direcionamento = $_POST['direcionamento_chamado'];
$conteudo = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['texto_chamado'])));

if ($nivelacesso_consultor == 4) {
$sql = "INSERT INTO chamado (
consultoria_chamado,
empresa_chamado,
usuario_chamado,
direcionamento_chamado,
titulo_chamado,
status_chamado,
texto_chamado
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$direcionamento',
'$titulo_chamado',
'$status',
'$conteudo'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));
      $sql2 = "SELECT MAX(id_chamado) AS id_chamado FROM `chamado` WHERE (`empresa_chamado` = '".$EmpresaID."') AND  (`consultoria_chamado` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_chamado'];}?>
          <script>
alert( 'Ticket <?php echo $id; ?> criado com Sucesso' ); location = 'chamados.php';
</script>
<?php      
} else {
   $sql = "INSERT INTO chamado (
consultoria_chamado,
empresa_chamado,
usuario_chamado,
direcionamento_chamado,
titulo_chamado,
status_chamado,
texto_chamado
) VALUES (
'$consultoria_usuarios',
'$EmpresaID',
'$idconsultor',
'$direcionamento',
'$titulo_chamado',
'$status2',
'$conteudo'
)";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));
      $sql2 = "SELECT MAX(id_chamado) AS id_chamado FROM `chamado` WHERE (`empresa_chamado` = '".$EmpresaID."') AND  (`consultoria_chamado` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_chamado'];}?>
          <script>
alert( 'Ticket <?php echo $id; ?> criado com Sucesso' ); location = 'chamados.php';
</script>
<?php } ?>
      

 

