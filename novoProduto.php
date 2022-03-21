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
      color: black;
      margin:1%;
	  border-style: solid;
      border-color: DodgerBlue;
      border-radius: 13%;
	  background-color:DodgerBlue;
      padding: 1.2% 1% 0.8% 1%;
	  font-weight: normal;
    }
    fieldset{
    	border: none;
    }
  </style>
</head>
<body>
<form method="POST" action="cadastro.php" enctype="multipart/form-data">
<fieldset><legend>Dados do Produto</legend>
<table><tr>
   <th colspan="2">Produto:</th>
 </tr>
<tr><td>Nome do produto</td><td><input type="text" name="Nome_Produto" size = "50" required></td></tr>
<tr><td>SKU</td><td><input type="text" name="SKU"  size = "50" required></td></tr>
<tr><td>Foto</td><td> <input type="file" name="Foto" accept="image"></td></tr>
<tr><td>Decrição</td><td><textarea id="descricao" name="Descricao" rows="4" cols="50"></textarea></td></tr>
<tr><td>Estoque</td><td> <input type="number" name="Estoque" size = "50"></td></tr>
<tr><td>Preço</td><td> <input type="number" step="0.01" name="Preco" size = "50"></td></tr>
<tr><td>Tipo de variação</td><td><select name="Variacao">
				   <option value="0">Nenhum</option>
                   <option value="1">Cor</option>
                   <option value="2">Tamanho</option>
                   <option value="3">Cor e Tamanho</option>
                  </select><br><br></td></tr>
<tr><td>Descrição da Variação</td><td> <textarea id="Desc_Variacao" name="Desc_Variacao" rows="4" cols="50"></textarea></td></tr>
  <br><br>
  	<tr><td></td><td>
		<input type="submit" Value="Cadastrar" class="Botao">
		<a href="index.php">Voltar</a>
	</td></tr>
	</table>
</fieldset>
</form>
</body>