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
            <a href="adicionar.php"><i class="fa-solid fa-rotate-right"></i>Atualizar</a>
        </div>
    </div>	
    <section class="adicionar">
        <img src="./imgs/venda.jpg" alt="Venda da moto">
        <form action="./adicionar.php" class="form_container" method="post" enctype="multipart/form-data">
            <p class="subtitulo">CADASTRE AGORA SUA MOTO</p>
            <h1 class="titulo">Cadastro de motos:</h1>
            <div class="campo">
                <label>Marca da moto</label>
                <select name="marca" id="marca">
                    <option value="" disabled selected>Selecione uma marca</option>
                    <option value="Honda">Honda</option>
                    <option value="Yamaha">Yamaha</option>
                    <option value="Kawasaki">Kawasaki</option>
                    <option value="Suzuki">Suzuki</option>
                    <option value="Harley-Davidson">Harley-Davidson</option>
                    <option value="BMW">BMW</option>
                    <option value="Ducati">Ducati</option>
                </select>
            </div>
            <div class="campo">
                <label>Modelo da moto</label>  
                <input type="text" id="modelo" name="modelo" value="" placeholder="Qual o modelo da moto?" maxlength="50" required>
            </div>
            <div class="campo">
                <label>Ano da moto</label>
                <input type="number" step="1" id="ano" name="ano" placeholder="Qual o ano da moto?" max="2025" min="1980" required>
            <div class="campo">
                <label>Valor da Moto</label>
                <input type="number" step="1" id="valor" name="valor" placeholder="Qual o valor da moto?" min="0" required>
            </div>
            <div class="campo">
                <label>Kilometragem da moto</label>
                <input type="number" step="100" id="kmrodado" name="kmrodado" placeholder="Qual a distância percorrida com a moto?" min="0" required>
            </div>
            <div class="campo">
                <label>Imagens da moto</label>
                <input type="file" accept="image/*" name="imagem" id="imagem" class="">
            </div>
            <div class="botoes">
                <input class="botao1" type="submit" id="enviar">
                <input class="b2" type="reset">
            </div>    
        </form>
    </section>
    <?php
        include("conexao.php");
        if(isset($_POST) && !empty($_POST)){

            $marca = $_POST["marca"];
            $modelo = $_POST["modelo"];
            $ano = $_POST["ano"];
            $valor = $_POST["valor"];
            $kmrodado = $_POST["kmrodado"];
            $imgs = "";
            $imagens = "imgs/";
            $arquivo = $imagens . basename($_FILES["imagem"]["name"]);
            $uploadOk = 1;
            $tipoarquivo = strtolower(pathinfo($arquivo,PATHINFO_EXTENSION));
            $foto = "";
                            
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["imagem"]["tmp_name"]);
                if($check !== false) {
                    echo "Arquivo com imagem " . $check["mime"] . ".";
                } else {
                    echo "Arquivo sem imagem ";
                    $uploadOk = 0;
                }
            }

            // Check file size
            if ($_FILES["imagem"]["size"] > 6000000) {
                $uploadOk = 0;
            }
            
            // Allow certain file formats
            if($tipoarquivo != "jpg" && $tipoarquivo != "png" && $tipoarquivo != "jpeg") {
                $uploadOk = 0;
            }
            
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $arquivo)) {
                    $foto = basename($arquivo);
                } else {
                    echo "Tivemos algum erro ao fazer o upload";
                }
            }

            // criando a linha de INSERT
            $sqlinsert = "insert into catalogomotorize (id, marca, modelo, ano, valor, kmrodado, img) values ('', '$marca', '$modelo', '$ano', '$valor', '$kmrodado', '$foto')";

            // executando instrução SQL
            $resultado = @mysqli_query($conexao, $sqlinsert);
            if (!$resultado) {
                ?>
                    <script>alert('Erro no Cadastro');</script>
                <?php
            } else {
                ?>
                    <script>alert('Sucesso no Cadastro');</script>
                <?php
            }
        }
    ?>
    <script src="js/navbar.js"></script>    
    <script src="js/script.js"></script>    
</body>
</html>