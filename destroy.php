<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Remover</title>
</head>
<body>
<CENTER>
<br>
<h4><?php 
	// validação do tipo da requisição
	if($_SERVER['REQUEST_METHOD'] == 'GET'){

		// recuperar os dados da requisição
		$produto_id = '';

		// validando campo aluno_id
		if(isset($_GET['produto_id'])){
			$produto_id = $_GET['produto_id'];
		}

		// conexão com o banco
		if(empty($produto_id)){
			echo("Dados invalidos....");
			exit();
		}

		// conectando no banco de dados
		$usuario = "root";
		$senha = "";
		$pdo = new PDO(
			"mysql:host=localhost;dbname=ed2",
			$usuario,
			$senha
		);

		$removeproduto = $pdo->prepare(
			"DELETE FROM `produto` where id=?"
		);

		$removeproduto->execute([
			$produto_id
		]);


		echo "Produto removido com sucesso..";
	}
?>
</h4>
<BR>
<a href="index.php" class="animated-button4">
<span></span>
<span></span>
<span></span>
<span></span>	
Voltar</a>
</CENTER>
</body>
</html>