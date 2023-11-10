<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Removendo produto</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<center>
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
	<p>Tem certeza que deseja remover este produto?</p>
	<form action="destroy.php" action="GET">
		<input 
			type="hidden" 
			name="produto_id" 
			value="<?php echo($produto['id']) ?>">
			<a href="index.php" class="animated-button2">
					<span></span>
  					<span></span>
  					<span></span>
  					<span></span>
						Não
						</a>
			<br>
			<button type="submit"class="animated-button4">
  			<span></span>
  			<span></span>
  			<span></span>
  			<span></span>
				Sim
			</button>
	</form>
		</center>
</body>
</html>