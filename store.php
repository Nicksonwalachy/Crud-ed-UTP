<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>criar novo produto</title>
</head>
<body>
<center>
<h4><?php 
	// validação do tipo da requisição
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		// recupevalorr os dados da requisição
		$nome = '';
		$valor = '';
		$descricao = '';

		// validando campo nome
		if(isset($_POST['nome'])){
			$nome = $_POST['nome'];
		}

		// validando campo valor
		if(isset($_POST['valor'])){
			$valor = $_POST['valor'];
		}
		
		if(isset($_POST['descricao'])){
			$descricao = $_POST['descricao'];
		}

		// conexão com o banco
		if(empty($nome) && empty($valor) && empty($descricao)){
			echo("Os campos nome e valor não podem ser vazios");
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

		// criar o registro na tabela
		$novoproduto = $pdo->prepare(
			"INSERT INTO `produto`(nome, valor, descricao) VALUES(:nome,:valor,:descricao)"
		); // prepavalor a query

		// define as variaveis com os valores
		$novoproduto->bindParam(':nome', $nome);
		$novoproduto->bindParam(':valor', $valor);
		$novoproduto->bindParam(':descricao', $descricao);

		// executar a inserção
		$novoproduto->execute();

		echo("Novo produto criado com sucesso.");
	}
?></h4>

<br>
<a href="index.php" class="animated-button4" >
<span></span>
<span></span>
<span></span>
<span></span>
  Voltar</a>
  </center>
</body>
</html>