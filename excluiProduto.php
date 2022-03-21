<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistema de Cadastro de Produtos</title>
  <style>
	body{
    	font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }
	a{
      text-decoration:none;
      color: black;
      margin:1%;
	  border-style: solid;
      border-color: Gainsboro;
      border-radius: 13%;
	  background-color:Gainsboro;  
      padding: 0.5% 1% 0.6% 1%;
      font-weight: normal;
    }
    .Botao{
      font-family: Arial, Helvetica, sans-serif;
      color: white;
      margin:1%;
	  border-style: solid;
      border-color: DarkRed;
      border-radius: 13%;
	  background-color:DarkRed;
      padding: 1.2% 1% 0.8% 1%;
	  font-weight: normal;
    }
    fieldset{
    	border: none;
    }
	img{
    	position: absolute;
 		left: 43%;
        top: 130px;
    }
  </style>
</head>
<body>
 <?php
include('conectaBanco.php');
error_reporting(E_ALL & ~E_NOTICE);
$SKU=0;
$SKU=@$_REQUEST['SKU'];
$Nome="";
$Foto="";
$Descricao="";
$Estoque=0;
$Preco=0.0;
$Variacao=0;
$Desc_Variacao="";	
//echo "$SKU";

$sql="SELECT * FROM Produtos WHERE SKU = ?";

//echo "</br>";
//echo "$sql";
$comando = $mysqli->prepare($sql);
if($comando){
	 //echo "ok";
 }
else{
	 //echo "erro";
}
		$comando->bind_param('s',$SKU);
		$comando->execute();
		$resultado = $comando->get_result();
		$dir = './'.$SKU.'/'; 
		while ($linha =$resultado->fetch_assoc()){
			//print_r($linha);
			$Nome=$linha['Nome'];
			$SKU=$linha['SKU'];
			$Foto=$linha['Foto'];
			$Descricao=$linha['Descricao'];
			$Estoque=$linha['Estoque'];
			$Preco=$linha['Preco'];
		}
			$sql="SELECT * FROM Variacao_Desc WHERE SKU = ?";
			//echo "</br>";
			//echo "$sql";
			$comando = $mysqli->prepare($sql);
			$comando->bind_param('s',$SKU);
			$comando->execute();
			$resultado = $comando->get_result();
			while ($linha = $resultado->fetch_assoc()){
				//print_r($linha);
				$Variacao=$linha['Variacao'];
				$Desc_Variacao=$linha['Desc_Variacao'];	
			}

?>
<form method="POST" action="excluiProduto.php" enctype="multipart/form-data">
<fieldset><legend>Pesquisa</legend>
<table>
<tr><td>SKU:       <input type="text" name="SKU"  size = "50">
<input type="submit" Value="Pesquisar">
</table>
</fieldset>
</form>
<img src="<?php echo $SKU."/".$Foto; ?>" height="100">
<form method="POST" action="excluir.php" enctype="multipart/form-data">
<table><tr>
   <th colspan="2">Produto:</th>
 </tr>
<tr><td>Nome do produto</td><td><input type="text" name="Nome_Produto" size = "50" value="<?php echo $Nome; ?>"></td></tr>
<tr><td>SKU</td><td><input type="text" name="SKU"  size = "50" value="<?php echo $SKU; ?>" readonly></td></tr>
<tr><td>Decrição</td><td><textarea id="descricao" name="Descricao" rows="4" cols="50"><?php echo $Descricao; ?></textarea></td></tr>
<tr><td>Estoque</td><td> <input type="number" name="Estoque" size = "50" value="<?php echo $Estoque; ?>"></td></tr>
<tr><td>Preço</td><td> <input type="number" step="0.01" name="Preco" size = "50" value="<?php echo $Preco; ?>"></td></tr>
<tr><td>Tipo de variação</td><td><select name="Variacao"><?php
				   switch ($Variacao) {
						case 0:
							echo '<option value="0">Nenhum</option>';
							break;
						case 1:
							echo '<option value="1">Cor</option>';
							break;
						case 2:
							echo '<option value="Tamanho">Tamanho</option>';
							break;
						case 3:
							echo '<option value="Cor_Tamanho">Cor e Tamanho</option>';
							break;
				   }
				   ?>
                  </select><br><br></td></tr>
<tr><td>Descrição da Variação</td><td> <textarea id="Desc_Variacao" name="Desc_Variacao" rows="4" cols="50"><?php echo $Desc_Variacao; ?></textarea></td></tr>
  <br><br>
  	<tr><td></td><td>
		<input type="submit" Value="Excluir" class="Botao">
		<a href="index.php">Voltar</a>
		</td></tr>
	</table>
</fieldset>
</form>
</body>