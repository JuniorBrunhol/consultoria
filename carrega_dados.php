<?php
include_once 'conexao/conexao.php';

if (isset($_POST["tipo"])) {
    if ($_POST["tipo"] == "estados") {
        $sql = "
                SELECT * FROM cronograma
                ORDER BY id_cronograma ASC
                ";
        $estados = mysqli_query($mysqli, $sql);
        while ($row = mysqli_fetch_array($estados)) {
            $saida[] = array(
                'id' => $row["id_cronograma"],
                'nome' => $row["titulo_cronograma"]
            );
        }
        echo json_encode($saida);
    } else {
        $cat_id = $_POST["cat_id"];
        $sql = "
                SELECT * FROM acaocronograma 
                WHERE idcronograma_acaocronograma = '" . $cat_id . "' 
                ORDER BY tarefa_acaocronograma ASC
                ";
        $cidades = mysqli_query($mysqli, $sql);

        while ($row = mysqli_fetch_array($cidades)) {
            $saida[] = array(
                'id' => $row["id_acaocronograma"],
                'nome' => $row["tarefa_acaocronograma"]
            );
        }
        echo json_encode($saida);
    }
}
?>