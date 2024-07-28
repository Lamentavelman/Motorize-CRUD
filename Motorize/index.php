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
				<li><a href="#nos">Quem somos</a></li>
				<li><a href="#servicos">O que fazemos</a></li>
				<li><a href="consultar.php">Comprar</a></li>
				<li><a href="adicionar.php">Vender</a></li>
			</ul>
		</nav>
		<div class="apresentacao" id="nos">
			<div class="conteudo">
				<h1>Somos a MOTORIZE, entregamos as melhores oportunidades do mercado para você</h1>
				<p>O nosso objetivo é muito simples é ligar um vendedor com um comprador, porém o nosso diferencial é que fazemos isso só com motos então fica muito mais para você</p>
				<div class="botoes">
					<a href="consultar.php" class="botao1">Quero Comprar</a>
					<a href="adicionar.php" class="b2">Quero Vender</a>
				</div>
			</div>
			<img src="./imgs/moto.png" alt="imagem de uma moto">
		</div>
	</header>
	<div class="container" id="servicos">
		<p class="subtitulo" >O QUE FAZEMOS</p>
		<h1 class="titulo">Compra e vendas de Motos</h1>
	</div>
	<section class="servicos">
		<div class="pontosfortes">
			<div class="icones">
				<span><i class="fa-solid fa-globe"></i></span>
				<h4>Conexão</h4>
				<p>Vendedores e compradores se conectam</p>
			</div>
			<div class="icones">
				<span><i class="fa-solid fa-bolt"></i></i></span>
				<h4>Velocidade</h4>
				<p>Venda e compre rápidamente</p>
			</div>
			<div class="icones">
				<span><i class="fa-regular fa-handshake"></i></span>
				<h4>Facilidade</h4>
				<p>Compre e venda de uma forma fácil</p>
			</div>
			<div class="icones">
				<span><i class="fa-solid fa-object-group"></i></span>
				<h4>Diversidade</h4>
				<p>Diversas opções em um só lugar</p>
			</div>
		</div>
		<img src="./imgs/apertodemaos.jpg" alt="Aperto de Maos">
		<div class="pontosfortes">
			<div class="icones">
				<span><i class="fa-solid fa-magnifying-glass-dollar"></i></span>
				<h4>Melhores valores</h4>
				<p>Preços abaixo da geralmente fipe</p>
			</div>
			<div class="icones">
				<span><i class="fa-solid fa-dolly"></i></span>
				<h4>Vitrine</h4>
				<p>Somos uma vitrine para as motos</p>
			</div>
			<div class="icones">
				<span><i class="fa-solid fa-user-check"></i></span>
				<h4>Proteção</h4>
				<p>Todos os vendedores são verificados</p>
			</div>
			<div class="icones">
				<span><i class="fa-solid fa-location-crosshairs"></i></span>
				<h4>Melhores oportunidades</h4>
				<p>Motos perto de você</p>
			</div>
		</div>
	</section>
	<div class="container">
		<p class="subtitulo" >PORQUE SÓ MOTOS</p>
		<h1 class="titulo">Quem foca vira referência</h1>
		<div class="centraldestaque">
			<div class="destaque">
				<div class="content">
					<h2 class="title">Exclusividade</h2>
					<p class="texto">Somos para quem gosta de moto</p>
				  </div>
				  <img src="./imgs/motoazul.jpg" alt="MotoAzul" />
			</div>	
			<div class="destaque">
				<div class="content">
					<h2 class="title">Lifestyle</h2>
					<p class="texto">Somos para os amantes</p>
				  </div>
				  <img src="./imgs/motocroos.jpg" alt="Motocroos" />
			</div>
			<div class="destaque">
				<div class="content">
				  <h2 class="title">História</h2>
				  <p class="texto">Queremos estar nas suas viagens</p>
				</div>
				<img src="./imgs/motodestaque.jpg" alt="Moto" />
			</div>
			<div class="destaque">
				<div class="content">
				  <h2 class="title">Personalidade</h2>
				  <p class="texto">Somos para os motoqueiros</p>
				</div>
				<img src="./imgs/motoviagem.jpg" alt="Moto" />
			</div>
		</div>
		<p class="subtitulo" >História de criação</p>
		<div class="historia">
			<img src="./imgs/motoevento.jpg" alt="">
			<p>A história da MOTORIZE começa em 2023, quando um grupo de amigos apaixonados por motociclismo percebeu uma lacuna no mercado de veículos online. Embora a Webmotors estivesse consolidada como a principal plataforma de compra e venda de carros, eles notaram que os motociclistas ainda enfrentavam dificuldades para encontrar e vender suas motos.
			Com isso em mente, decidiram criar a MOTORIZE, uma plataforma dedicada exclusivamente ao mundo das motos.</p>
		</div>

	</div>
	<script src="./js/navbar.js"></script>  
	<script src="./js/script.js"></script>  
</body>
</html>