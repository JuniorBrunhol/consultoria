<?php
include_once 'conexao/conexao.php';

	$id_categoria = $_REQUEST['id_categoria'];
	
	$result_sub_cat = "SELECT * FROM acaocronograma WHERE idcronograma_acaocronograma=$id_categoria ORDER BY tarefa_acaocronograma";
	$resultado_sub_cat = mysqli_query($mysqli, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'id'	=> $row_sub_cat['id_acaocronograma'],
			'nome_sub_categoria' => utf8_encode($row_sub_cat['tarefa_acaocronograma']),
		);
	}
	
	echo(json_encode($sub_categorias_post));
