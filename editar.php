<?php
include('conectaBanco.php');
error_reporting(E_ALL & ~E_NOTICE);
$SKU=$_REQUEST['SKU'];
$Nome=$_REQUEST['Nome_Produto'];
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

$Variacao_aux=0;
$Desc_Variacao_aux = '';
$sql="SELECT * FROM Variacao_Desc WHERE SKU = ?";
			//echo "</br>";
			//echo "$sql";
			$comando = $mysqli->prepare($sql);
			$comando->bind_param('s',$SKU);
			$comando->execute();
			$resultado = $comando->get_result();
			while ($linha = $resultado->fetch_assoc()){
				//print_r($linha);
				$Variacao_aux=$linha['Variacao'];
				$Desc_Variacao_aux=$linha['Desc_Variacao'];	
			}
$sql="UPDATE Produtos SET Nome = ?, Descricao = ?, Estoque = ?, Preco = ? WHERE SKU = ?;";

echo "</br>";
echo "$sql";
$comando = $mysqli->prepare($sql);
if($comando){
	 echo "ok";
 }
else{
	 echo "erro";
}
		$valores = array($SKU);
	echo "<pre>";
		print_r($valores);	
	echo "</pre>";
		$comando->bind_param('ssids',$Nome, $Descricao, $Estoque, $Preco,$SKU);
		$comando->execute();
		
if($Variacao_aux == 0 and $Variacao <> 0){
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
}elseif ($Variacao_aux <> 0 and $Variacao <> 0){
	$sql="UPDATE Variacao_Desc SET Variacao = ?, Desc_Variacao = ? WHERE SKU = ?;";
	echo "</br>";
	echo "$sql";
	$comando = $mysqli->prepare($sql);
	if($comando){
		 echo "ok";
	 }
	else{
		 echo "erro";
	}
			$valores = array($SKU);
		echo "<pre>";
			print_r($valores);	
		echo "</pre>";
			$comando->bind_param('iss',$Variacao, $Desc_Variacao,$SKU);
			$comando->execute();
}elseif ($Variacao_aux <> 0 and $Variacao == 0){
	$sql="DELETE FROM Variacao_Desc WHERE SKU = ?";
	echo "</br>";
	echo "$sql";
	$comando = $mysqli->prepare($sql);
	if($comando){
		 echo "ok";
	 }
	else{
		 echo "erro";
	}
	$comando->bind_param('s',$SKU);
	$comando->execute();
}
		
		header('location: editarProduto.php');
?>