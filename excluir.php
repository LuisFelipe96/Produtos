<?php
include('conectaBanco.php');
error_reporting(E_ALL & ~E_NOTICE);
$SKU=$_REQUEST['SKU'];
echo "$SKU";
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
		$valores = array($SKU);
	echo "<pre>";
		print_r($valores);	
	echo "</pre>";
		$comando->bind_param('s',$SKU);
		$comando->execute();

$sql="DELETE FROM Produtos WHERE SKU = ?";

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
		$comando->bind_param('s',$SKU);
		$comando->execute();
		$dir = './'.$SKU.'/'; 
		$files = array_diff(scandir($dir), array('.','..')); 
		foreach ($files as $file) { 
			(is_dir("$dir/$file")) ? delTree("$dir/$file") : unlink("$dir/$file"); 
		} 		
		rmdir($dir);
		header('location: excluiProduto.php');
?>