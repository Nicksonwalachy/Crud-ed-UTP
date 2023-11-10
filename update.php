<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title>Atualizar produto</title>
</head>
<body>
<center>
<?php 
	// validação do tipo da requisição
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		// recuperar os dados da requisição
		$produto_id = '';
		$nome = '';
		$valor = '';
		$descricao = '';

		// validando campo nome
		if(isset($_POST['nome'])){
			$nome = $_POST['nome'];
		}

		// validando campo ra
		if(isset($_POST['valor'])){
			$valor = $_POST['valor'];
		}

		if(isset($_POST['descricao'])){
			$descricao = $_POST['descricao'];
		}

		// validando campo aluno_id
		if(isset($_POST['produto_id'])){
			$produto_id = $_POST['produto_id'];
		}

		// conexão com o banco
		if(empty($nome) && empty($valor) && empty($valor_id)){
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

		$atualizaproduto = $pdo->prepare(
			"UPDATE produto 
			SET nome=?, valor=?, descricao=? 
			WHERE id=?"
		);

		$atualizaproduto->execute([
			$nome,
			$valor,
			$descricao,
			$produto_id
		]);


		echo "Produto atualizado com sucesso..";
	}
?>
<br>
<a href="index.php"class="animated-button4" 	
		>
  <span></span>
  <span></span>
  <span></span>
  <span></span>
  Voltar</a>
</center>
</body>
</html>