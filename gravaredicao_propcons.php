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


$id = $_POST['id'];
$status = 'pendente';

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
            WHERE id_proposta='$id'"; 
            $resultado_usuario1 = mysqli_query($mysqli, $sql1)or die(mysqli_error($mysqli));
            
            header("Location:visualiza_propcons.php?id=$id"); exit;
             
          
           
           
  
?>