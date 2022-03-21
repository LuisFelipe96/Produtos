<?php
include('conectaBanco.php');
error_reporting(E_ALL & ~E_NOTICE);
$Nome=$_REQUEST['Nome_Produto'];
$SKU=$_REQUEST['SKU'];
//$Foto=$_REQUEST['Foto'];
$Descricao=$_REQUEST['Descricao'];
$Estoque=$_REQUEST['Estoque'];
$Preco=$_REQUEST['Preco'];
$Variacao=$_REQUEST['Variacao'];
$Desc_Variacao=$_REQUEST['Desc_Variacao'];
echo "$Nome";
echo "$SKU";
//echo "$Foto";
echo "$Descricao";
echo "$Estoque";
echo "$Preco";
echo "$Variacao";
echo "$Desc_Variacao";
	// salvar imagem no servidor
		$dir = './'.$SKU.'/';
		mkdir($dir, 0777, true); 
		 if(isset($_FILES['Foto']))
		 {
			$ext = strtolower(substr($_FILES['Foto']['name'],-4)); //Pegando extensão do arquivo
			$FotoDB= $SKU. $ext; //Definindo um novo nome para o arquivo
			move_uploaded_file($_FILES['Foto']['tmp_name'], $dir.$FotoDB); //Fazer upload do arquivo
			echo("Imagen enviada com sucesso!");
		 } 

$sql="insert into Produtos (SKU, Nome, Foto, Descricao, Estoque, Preco) VALUES (?,?,?,?,?,?)";

echo "</br>";
echo "$sql";
$comando = $mysqli->prepare($sql);
if($comando){
	 echo "ok";
 }
else{
	 echo "erro";
}
		$valores = array($SKU,$Nome, $FotoDB, $Descricao, $Estoque, $Preco, $Desc_Variacao);
	echo "<pre>";
		print_r($valores);	
	echo "</pre>";
		$comando->bind_param('ssssid',$SKU,$Nome, $FotoDB, $Descricao, $Estoque, $Preco);
		$comando->execute();
if ($Variacao > 0) {
	$sql="insert into Variacao_Desc (SKU, Variacao, Desc_Variacao) VALUES (?,?,?)";
	$comando = $mysqli->prepare($sql);
	if($comando){
		 echo "ok";
	 }
	else{
		 echo "erro";
	}
	echo "$sql";
	echo "$SKU";
	$comando->bind_param('sis',$SKU,$Variacao,$Desc_Variacao);
	$comando->execute();
}

header('location: novoProduto.php');		
?>