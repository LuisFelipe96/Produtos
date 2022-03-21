<?php
 $mysqli = new mysqli('localhost', 'root', 'tt333', 'Produtos');	
	if ($mysqli->connect_errno) {
		echo 'Erro ao selecionar o banco: '.$mysqli->connect_error;
		}
	else {
		/*echo 'Selecionou o banco com sucesso';*/
	}
?>