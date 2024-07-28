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
				<a href="index.php">MOTORIZE</a>
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
            <a href="index.php"><i class="fa-solid fa-reply-all"></i>Voltar</a>
            <a href="consultar.php"><i class="fa-solid fa-rotate-right"></i>Atualizar</a>
        </div>
    </div>	
	<div class="container">
		<p class="subtitulo" >BUSCA DAS MOTOS</p>
		<h1 class="titulo">Catálogo das motos</h1>
	</div>
	<section class="busca">
        <div class="marca">
			<h1>Marca</h1>
			<form method="post" action="consultar.php">
                <select name="filtromarca">
                    <option value="" disabled selected>Selecione uma marca</option>
                    <option value="Honda">Honda</option>
                    <option value="Yamaha">Yamaha</option>
                    <option value="Kawasaki">Kawasaki</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Harley-Davidson">Harley-Davidson</option>
                    <option value="BMW">BMW</option>
                    <option value="Ducati">Ducati</option>
                </select>
				<button type="submit" class="buscabotao"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
		</div>
		<div class="modelo">
			<h1>Modelo</h1>
			<form method="post" action="consultar.php">
                <input type="text" id="busca" placeholder="Buscar motos..." onkeyup="buscarMotos()">
                <ul id="resultado"></ul>
            </form>
		</div>
		<div class="valor">
			<h1>Valor</h1>
			<form method="post" action="consultar.php">
                <input type="number" name="filtrovalor" step="500" min="0" placeholder="Qual o valor?">
				<button type="submit" class="buscabotao"><i class="fa-solid fa-magnifying-glass"></i></button>
                <ul id="resultado"></ul>
            </form>
		</div>
	</section>
    
	<?php
		include("conexao.php");

		$sql = "SELECT * FROM catalogomotorize";

		$filtros = [];

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (!empty($_POST["filtromarca"])) {
				$filtromarca = $_POST["filtromarca"];
				$filtros[] = "marca LIKE '%$filtromarca%'";
			}
			if (!empty($_POST["filtromodelo"])) {
				$filtromodelo = $_POST["filtromodelo"];
				$filtros[] = "modelo LIKE '%$filtromodelo%'";
			}
			if (!empty($_POST["filtrovalor"])) {
				$filtrovalor = $_POST["filtrovalor"];
				$filtros[] = "valor <= $filtrovalor";
			}

			if (!empty($filtros)) {
				$sql .= " WHERE " . implode(" AND ", $filtros);
			}
		}

		$sql .= " ORDER BY id";

		$query = mysqli_query($conexao, $sql);
		if (!$query) {
			exit("<h4>Query Inválida: " . mysqli_error($conexao) . "</h4>\n");
		}
	?>	
	<div class="card_container">
		<?php
			while ($dados = mysqli_fetch_array($query)) {
				$imagem = empty($dados["img"]) ? "SemImagem.png" : $dados['img'];
				$id = base64_encode($dados['id']); // Codifique o ID se necessário

				echo "<a href=\"editar.php?id=$id\" class=\"card\">";
					echo "<img src=\"imgs/$imagem\">";
					echo "<h4 class=\"marca\">" . $dados['marca'] . "</h4>";
					echo "<h1>" . $dados['modelo'] . "</h1>";
					echo $dados['ano'];
					echo "<div class=\"rskm\">";
						echo "<div>";
							echo 'R$ ' . number_format($dados['valor'], 2, ',', '.');
						echo "</div>";
						echo "<div>";
							echo 'Km ' . number_format($dados['kmrodado'], 0, ',', '.');   
						echo "</div>";
					echo "</div>";	
				echo "</a>";
			}
		?>
    </div>
    <?php mysqli_close($conexao); ?>
    <script src="js/navbar.js"></script> 
    <script src="js/busca.js"></script>  
</body>
</html>