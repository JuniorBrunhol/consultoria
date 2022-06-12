<?php
session_start();
include_once("../../conexao/conexao.php");

$GetPost = filter_input_array (INPUT_POST, FILTER_DEFAULT);
$titulo = preg_replace('/[^[:alnum:]_][s]/', '',$GetPost ["titulo"]);
$obs = preg_replace('/[^[:alnum:]_][s]/', '',$GetPost ["obs"]);
$produto = preg_replace('/[^[:alnum:]_][s]/', '',$GetPost ["produto"]);
$preco = preg_replace('/[^[:alnum:]_][s]/', '',$GetPost ["preco"]);
$praca = preg_replace('/[^[:alnum:]_][s]/', '',$GetPost ["praca"]);
$promocao = preg_replace('/[^[:alnum:]_][s]/', '',$GetPost ["promocao"]);

$id = 1;

$query = "INSERT INTO 4ps (titulo_4ps, obs_4ps, data_4ps, usuario_4ps, usuarioempresa_4ps, empresa_4ps) VALUES  ('$titulo','$obs','2020-06-28','1','1','1')";
if (mysqli_query($mysqli, $query)) {

    $pesquisa = "SELECT MAX(id_4ps) as id_4ps FROM 4ps WHERE usuario_4ps = $id";
    $pesquisa = $mysqli->query($pesquisa);
    $row = $pesquisa->fetch_assoc();
    $ultimo_id = $row['id_4ps'];

}
 
    $sql = "INSERT INTO dados4ps (id4ps_dados4ps, produto_dados4ps, preco_dados4ps,praca_dados4ps,promocao_dados4ps)
          VALUES 
              ('$ultimo_id','$produto','$preco','$praca','$promocao')";

              $queryExec = mysqli_query($mysqli, $sql) or die('ERRO ao inserir registro no Banco');

   if ( $queryExec) {
      echo "<script>
      alert ('Registro de Presença efetuado com sucesso!');
 window.location.href='visualiza_4ps.php?id=<?php $ultimo_id; ?>';
 </script>";     
  } else {        
      echo "ERRO NA GRAVAÇÃO NO BANCO DE DADOS";
  } 
