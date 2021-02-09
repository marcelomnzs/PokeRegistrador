<?php
    session_start();
    include'linksBootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemons Capturados</title>
    <?php
    $pokemons = file('pokemons.csv');
    for ($i = 0; $i < sizeof($pokemons); $i++) {
        $pokemons[$i] = explode(";", $pokemons[$i]);
    }
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
                <span class="nav-link waves-effect waves-light"><?= $_SESSION['user']?></span>
            </li>
            <li class="nav-item">
                <a class="nav-link waves-effect waves-light" href="logout.php">Sair</a>
            </li>
        </ul>
    </div>
</nav>
    <div class="container justify-content-center">
        <h1 style="margin-left: 15px">Pokemons</h1>
        <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <th>Pokemon</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Gênero</th>
            <th>Tipo</th>
            <th></th>
        </thead>
            <?php foreach ($pokemons as $pokemon =>$poke) : ?>
                <tr>
                    <td><?= $poke[0] ?> </td>
                    <td><?= $poke[1] ?></td>
                    <td><?= $poke[2] ?></td>
                    <td><?= $poke[3] ?></td>
                    <td><?= $poke[4] ?></td>
                    <td><a href="deletpokemon.php?pokemon=<?= $pokemon ?>" class="excluir">Deletar pokémon</a></td>
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
				if (!confirm('Apagar Livro?')) {
					e.preventDefault();
				}
			});
		}
	</script>

</body>

</html>