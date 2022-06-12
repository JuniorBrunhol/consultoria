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

$pronome = $_POST['pronome'];
$contato = $_POST['contato'];
$titulo = $_POST['titulo'];
$titulotopo = $_POST['titulotopo'];
$objeto = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['objeto'])));
$objetivo = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['objetivo'])));
$metodologia = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['metodologia'])));
$equipe = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['equipetecnica'])));
$prazo = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['prazo'])));
$entregas = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['entregas'])));
$preco = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['preco'])));
$formapagamento = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['formapagamento'])));      
$validade = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['validade'])));      
$respcontratante = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['responsabilidadecontratante'])));      
$respproponente = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['responsabilidadeproponente'])));      
$confidencialidade = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['confidencialidade'])));     
$conclusao = str_replace("\n",'<br />', addslashes(htmlspecialchars($_POST['conclusao']))); 
$frase = $_POST['frase']; 
$modelo = $_POST['modelo']; 
$mostraremail = $_POST['mostraremail']; 
$mostrartelefone = $_POST['mostrartelefone']; 
$mostrarredesocial = $_POST['mostrarredesocial']; 
$mostrarcomentarios = $_POST['mostrarcomentarios'];
$status = 'pendente';


    $sql3 = "SELECT * FROM `proposta` WHERE (`empresa_proposta` = '".$EmpresaID."') AND  (`modelo_proposta` = 'Sim') "; 
    $retorno3 = mysqli_query ($mysqli , $sql3) or die (mysql_error());
    while($dados3 = mysqli_fetch_array($retorno3)){
    $ultimo_idproposta = $dados3['id_proposta'];
    echo $ultimo_idproposta;
    }
    if(@mysqli_num_rows($retorno3) > 0){ //faça algo se não houver dados }else{/ /faça algo se houver dados }
   
        echo $ultimo_idproposta;
            $sql1 = "UPDATE proposta SET 
            consultoria_proposta='".$consultoria_usuarios."', 
            empresa_proposta='".$EmpresaID."', 
            status_proposta='".$status."', 
            titulotopo_proposta='".$titulotopo."', 
            pronome_proposta='".$pronome."', 
            contato_proposta='".$contato."', 
            titulo_proposta='".$titulo."', 
            objeto_proposta='".$objeto."', 
            objetivoespecifico_proposta='".$objetivo."', 
            metodologia_proposta='".$metodologia."', 
            equipetecnica_proposta='".$equipe."', 
            prazo_proposta='".$prazo."', 
            entregas_proposta='".$entregas."', 
            preco_proposta='".$preco."' , 
            formapagamento_proposta='".$formapagamento."', 
            validade_proposta='".$validade."', 
            responsabilidadecontratante_proposta='".$respcontratante."', 
            responsabilidadeproponente_proposta='".$respcontratante."', 
            confidencialidade_proposta='".$confidencialidade."', 
            conclusao_proposta='".$conclusao."', 
            modelo_proposta='".$modelo."', 
            frase_proposta='".$frase."', 
            mostraremail_proposta='".$mostraremail."', 
            mostrartelefone_proposta='".$mostrartelefone."', 
            mostrarredesocial_proposta='".$mostrarredesocial."', 
            mostrarcomentarios_proposta='".$mostrarcomentarios."' 
            WHERE id_proposta='$ultimo_idproposta'"; 
            $resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));
            header("Location: visualiza_propcons.php?id=<?php echo $ultimo_idproposta; ?>"); exit;
           
           


}else{
$sql = "INSERT INTO proposta (
     consultoria_proposta, 
     empresa_proposta, 
     status_proposta, 
     titulotopo_proposta,
     pronome_proposta, 
     contato_proposta, 
     titulo_proposta, 
     objeto_proposta, 
     objetivoespecifico_proposta, 
     metodologia_proposta, 
     equipetecnica_proposta, 
     prazo_proposta, 
     entregas_proposta, 
     preco_proposta, 
     formapagamento_proposta, 
     validade_proposta, 
     responsabilidadecontratante_proposta, 
     responsabilidadeproponente_proposta, 
     confidencialidade_proposta, 
     conclusao_proposta, 
     modelo_proposta, 
     frase_proposta, 
     mostraremail_proposta, 
     mostrartelefone_proposta, 
     mostrarredesocial_proposta, 
     mostrarcomentarios_proposta) VALUES (
         '$consultoria_usuarios',
         '$EmpresaID',
         '$status',
         '$titulotopo',
         '$pronome',
         '$contato',
         '$titulo',
         '$objeto',
         '$objetivo',
         '$metodologia',
         '$equipe',
         '$prazo',
         '$entregas',
         '$preco',
         '$formapagamento',
         '$validade',
         '$respcontratante',
         '$respproponente',
         '$confidencialidade',
         '$conclusao',
         '$modelo',
         '$frase',
         '$mostraremail',
         '$mostrartelefone',
         '$mostrarredesocial',
         '$mostrarcomentarios')";
      $resultado_usuario = mysqli_query($mysqli, $sql)or die(mysqli_error($mysqli));

      $sql2 = "SELECT MAX(id_proposta) AS id_proposta FROM `proposta` WHERE (`empresa_proposta` = '".$EmpresaID."') AND  (`consultoria_proposta` = '".$consultoria_usuarios."') "; 
      $retorno2 = mysqli_query ($mysqli , $sql2) or die (mysql_error());
      while($dados2 = mysqli_fetch_array($retorno2)){
          $id = $dados2['id_proposta'];
    header("Location:visualiza_propcons.php?id=$id"); exit;
 


      }
}
?>