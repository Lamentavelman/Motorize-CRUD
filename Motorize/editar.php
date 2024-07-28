<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Motorize</title>
	<meta charset="UTF-8">
	<meta name="description" content="Motorize Crud">
	<meta name="keywords" content="CRUD">
	<meta name="author" content="Gabriel Rodrigues (Lamentavelman)">
    <link rel="shortcut icon" href="./icon/logo.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/styles.css">
	<script src="https://kit.fontawesome.com/514787d6f4.js" crossorigin="anonymous"></script>
</head>
<body>
	<header>
		<nav>
			<div class="nav__header">
				<div class="nav__logo">
				<a href="#">MOTORIZE</a>
				</div>
				<div class="nav__menu__btn" id="menu-btn">
				<i class="fa-solid fa-bars"></i>
				</div>
			</div>
			<ul class="nav__links" id="nav-links">
				<li><a href="index.php">Quem somos</a></li>
				<li><a href="index.php">O que fazemos</a></li>
				<li><a href="consultar.php">Comprar</a></li>
				<li><a href="adicionar.php">Vender</a></li>
			</ul>
		</nav>
	</header>
	<div class="containerupdate">
        <div class="update">
            <a href="consultar.php"><i class="fa-solid fa-reply-all"></i>Voltar</a>
            <a href="editar.php"><i class="fa-solid fa-rotate-right"></i>Resetar</a>
        </div>
    </div>	
	<div class="container">
		<p class="subtitulo">EDITE AS MOTOS CADASTRADAS</p>
		<h1 class="titulo">Manipule as informações das motos</h1>
	</div>
	<?php
	include("conexao.php");

	if (isset($_GET['id'])) {
		$id = base64_decode($_GET['id']); // Descodifique o ID
		$sql = "SELECT * FROM catalogomotorize WHERE id = $id";
		$query = mysqli_query($conexao, $sql);

		if ($query && mysqli_num_rows($query) > 0) {
			$dados = mysqli_fetch_array($query);
		} else {
			echo "<h3 class=\"container\">Moto não encontrada.</h3>";
			exit;
		}
	} else {
		echo "<h3 class=\"container\">ID da moto não fornecido.</h3>";
		exit;
	}
	?>
	<section class="containereditar">
        <?php if (isset($dados)): ?>
			<a href="excluir.php?id=<?php echo base64_encode($dados['id']); ?>" onclick="return confirm('Tem certeza que deseja excluir esta moto?');" class="excluir">
				<i class="fa-regular fa-trash-can"></i>Excluir
			</a>
			
			<form action="atualizar.php" method="post" enctype="multipart/form-data" class="editar">
				<input type="hidden" name="id" value="<?php echo base64_encode($dados['id']); ?>">
				<input type="hidden" name="img_atual" value="<?php echo $dados['img']; ?>">
				<div class="imagem">         
					<label for="img">Imagem Atual:</label>
					<div>
						<img src="imgs/<?php echo $dados['img']; ?>" alt="Imagem Atual" style="width: 250px; height: auto;">
					</div>
					<label for="img">Nova Imagem (opcional):</label>
					<input type="file" id="img" name="img">
				</div>
				<div class="marcaemodelo">
					<div>
						<label for="marca">Marca:</label>
							<select name="marca" id="marca">
								<option value="<?php echo $dados['marca']; ?>" disabled selected>Selecione uma nova Marca</option>
								<option value="Honda">Honda</option>
								<option value="Yamaha">Yamaha</option>
								<option value="Kawasaki">Kawasaki</option>
								<option value="Suzuki">Suzuki</option>
								<option value="Harley-Davidson">Harley-Davidson</option>
								<option value="BMW">BMW</option>
								<option value="Ducati">Ducati</option>
							</select>
					</div>
					<div>
						<label for="modelo">Modelo:</label>
						<input type="text" id="modelo" name="modelo" value="<?php echo $dados['modelo']; ?>" required>
					</div>

					<div>
						<label for="modelo">Ano:</label>
						<input type="number" id="ano" name="ano" step="1" max="2025" min="1980" value="<?php echo $dados['ano']; ?>" required>
					</div>
				</div>
				<div class="valorekmrodado">
					<div>
						<label for="valor">Valor:</label>
						<input type="number" id="valor" name="valor" step="1" min="0" value="<?php echo $dados['valor']; ?>" required>
					</div>

					<div>
						<label for="kmrodado">Quilometragem:</label>
						<input type="number" id="kmrodado" name="kmrodado" step="100" min="0" value="<?php echo $dados['kmrodado']; ?>" required>
					</div>
				</div>
				<button type="submit" class="atualizar">Atualizar</button>
			</form>
        <?php endif; ?>
	</section>
	<script src="./js/navbar.js"></script>  
	<script src="./js/script.js"></script>  
</body>
</html>
