<?php
    require "conexaoPDO.php";
    session_start();
    include'linksBootstrap.php';
    $id = $_SESSION['id_usuario'];

    if (!isset($_SESSION['usuario'])) {
        header('location: php/login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemons Capturados</title>
    <?php
         $stmt = $pdo->prepare("SELECT * FROM pokemon WHERE id_usuario = ?");
         $stmt->execute([$id]);
         $pokemons = $stmt->fetchAll();
    ?>
    <!-- Link do CSS -->
    <link rel="stylesheet" href="../css/tabelaPokemon.css">
    <!-- Link CSS navbar -->
    <link rel="stylesheet" href="../css/navbar.css">
</head>

<body>

<nav class="mb-4 navbar navbar-expand-lg navbar-dark red darken-2">
    <a class="navbar-brand font-bold" href="../index.php">PokeRegistrador</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText1" aria-controls="navbarText1" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText1">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <span class="nav-link waves-effect waves-light"><?= $_SESSION['usuario']?></span>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="logout.php">Sair</a>
            </li>
        </ul>
    </div>
</nav>
<?php
    if($pokemons == NULL){
        echo"<h1 class='text-center mt-4'>Pokemons</h1>";
        echo"<h5 class='text-center mt-5'>Me parece que você ainda não registrou nenhum pokémon</h5>";
        echo"<div class='col-md-12 ' style='text-align: center;'><a class='btn btn-outline-info' href='../index.php' role='button'>Registrar mais capturas</a></div>";
        exit();
    }
?>
    <div class="container justify-content-center">
        <h1 class="text-center">Pokemons</h1>
        <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <th>Pokemon</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Gênero</th>
            <th>Tipo</th>
            <th>Código do treinador</th>
            <th></th>
        </thead>
            <?php foreach ($pokemons as $pokemon =>$poke) : ?>
                        <tr>
                            <td><?=$poke[1]?></td>
                            <td><?=$poke[2]?></td>
                            <td><?=$poke[3]?></td>
                            <td><?=$poke[4]?></td>
                            <td><?=$poke[5]?></td>
                            <td><?=$poke[6]?></td>
                            <td><a href="deletpokemon.php?id=<?= $poke['id'] ?>" class='excluir'>Deletar pokémon</a></td>
                        </tr>
            <?php endforeach ?>
        </table>
        <div class="col-md-12 " style="text-align: center;">
            <a class="btn btn-outline-info" href="../index.php" role="button">Registrar mais capturas</a>
        </div>
    </div>

    <script>
		var links = document.querySelectorAll('.excluir');
		for (link of links) { //foreach
			link.addEventListener('click', function(e) {
				if (!confirm('Excluir captura?')) {
					e.preventDefault();
				}
			});
		}
	</script>

</body>

</html>