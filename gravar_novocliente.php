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
$consultoria_usuarios = $_SESSION['Consultoria'];


$imagem = $_FILES["imagem"];
$razaosocial = $_POST["razaosocial"];
$cnpj = $_POST["cnpj"];
$ie = $_POST["ie"];
$endereco = $_POST["endereco"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$uf = $_POST["uf"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];
$fantasia = $_POST["fantasia"];
$objetivo = $_POST["objetivo"];

$diagnosticoprevio = 'notika-icon notika-close';
$proposta = 'notika-icon notika-close';
$contrato = 'notika-icon notika-close';
$planodetrabalho = 'notika-icon notika-close';
$apreciacao = 'notika-icon notika-close';
$diagnosticosituacional = 'notika-icon notika-close';
$cronograma = 'notika-icon notika-close';
$status = 'notika-icon notika-close';






if(isset($_FILES['imagem']))
 {
    $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
    $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
    $dir = './img/clientes/'; //Diretório para uploads 
    move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
    
    $sql = "INSERT INTO empresa ( razaosocial_empresa, nomefantasia_empresa, imagem_empresa, cnpj_empresa, ie_empresa, telefone_empresa, endereco_empresa, bairro_empresa, cidade_empresa, uf_empresa, email_empresa, idconsultor_empresa, objetivo_empresa,diagnosticoprevio_empresa, proposta_empresa, contrato_empresa, planodetrabalho_empresa, apreciacao_empresa, diagnosticosituacional_empresa, cronograma_empresa, status_empresa
    ) VALUES ('$razaosocial','$fantasia','$new_name','$cnpj','$ie','$telefone','$endereco','$bairro','$cidade','$uf','$email','$idconsultor','$objetivo'
,'$diagnosticoprevio','$proposta','$contrato','$planodetrabalho','$apreciacao','$diagnosticosituacional','$cronograma','$status')";
    if (mysqli_query($mysqli, $sql)) {
        $query = "SELECT MAX(id_empresa) as id_empresa FROM empresa WHERE idconsultor_empresa = $idconsultor";
        $query = $mysqli->query($query);
        $row = $query->fetch_assoc();
        $ultimo_id = $row['id_empresa'];

        $sql2 = "INSERT INTO acesso_empresa ( empresa_acesso_empresa, consultoria_acesso_empresa, usuarios_acesso_empresa ) VALUES ('$ultimo_id','$consultoria_usuarios','$idconsultor')";
        if (mysqli_query($mysqli, $sql2)) {
        header("Location: restrito.php"); exit;
        } else {
        echo "Error: " . $sql2 . "<br>" . mysqli_error($mysqli);
        }


} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}  

}



?>