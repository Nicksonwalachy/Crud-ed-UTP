<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Atualizar os dados de um produto</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
ㅤ<a href="index.php"class="animated-button2">
  <span></span>
  <span></span>
  <span></span>
  <span></span>	
Voltar</a>
	<?php 
		// conexão com o banco
		$usuario = "root";
		$senha = "";
		$pdo = new PDO(
			"mysql:host=localhost;dbname=ed2",
			$usuario,
			$senha
		);

		# validando se não existe a chave aluno_id
		if(!isset($_GET['produto_id'])){
			echo("Produto invalido...");
			exit();
		}

		$produto_id = $_GET['produto_id'];
		$produto = $pdo->query(
			"SELECT * FROM `produto` WHERE id=$produto_id"
		)->fetch();
	?>
	<form action="update.php" method="POST">
		<input 
			type="hidden" 
			name="produto_id" 
			value="<?php echo($produto['id']) ?>"
			>
		ㅤNome:ㅤﾠﾠ<input 
				type="text" 
				name="nome" 
				placeholder="TV SAMSUNG 40'"
				value="<?php echo($produto['nome']) ?>"
				class="inputs"
				>
		<br>
		<br>
		ㅤvalor:ㅤㅤﾠ<input 
				type="text" 
				name="valor"
				placeholder="R$1900,00"
				value="<?php echo($produto['valor']) ?>"
				class="inputs"
				>
		<br>
		<br>
		ㅤdescrição:ﾠ<input 
				type="text" 
				name="descricao"
				
				value="<?php echo($produto['descricao']) ?>"
				class="inputs"
				>
		<br>
		ㅤ<button type="submit" class="animated-button1" 	
		>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
			Atualizar
		</button>
	</form>
	
</body>
</html>