<?php
include 'php/linksBootstrap.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('location: php/login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Link CSS -->
    <link rel="stylesheet" href="css/index.css">
    <!-- Link CSS navbar -->
    <link rel="stylesheet" href="../css/navbar.css">
    <script>
        <?php if (isset($_GET['error'])): ?>
            alert('<?= $_GET['error']?>');    
        <?php endif ?>
        
    </script>
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
                <a class="nav-link waves-effect waves-light" href="php/logout.php">Sair</a>
            </li>
        </ul>
    </div>
</nav>

    <section class="login-block">
        <div class="container">
            <div class="row">
                <div class="col-md-5 login-sec">
                    <h2 class="text-center">Pokémon Capturado</h2>
                    <form class="login-form" action="php/regPokemon.php" method="POST">
                        <div class="form-group col-md-12">
                            <label for="pokemon" class="text-uppercase">Pokemon</label>
                            <input type="text" class="form-control" placeholder="Ex: Eevee" name="pokemon">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="altura" class="text-uppercase">Altura</label>
                            <input type="text" class="form-control" placeholder="Ex: 0.3m" name="altura">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="peso" class="text-uppercase">Peso</label>
                            <input type="text" class="form-control" placeholder="Ex: 6.5kg" name="peso">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="genero" class="text-uppercase">Gênero</label>
                            <select name="genero" required>
                                <option value="genero" selected disabled>Escolha uma opção...</option>
                                <option value="macho">Macho</option>
                                <option value="femea">Fêmea</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="tipo" class="text-uppercase">Tipo</label>
                            <select name="tipo" required>
                                <option value="tipo" selected disabled>Escolha uma opção...</option>
                                <option value="Planta">Planta</option>
                                <option value="Fogo">Fogo</option>
                                <option value="Água">Água</option>
                                <option value="Inseto">Inseto</option>
                                <option value="Normal">Normal</option>
                                <option value="Venenoso">Venenoso</option>
                                <option value="Elétrico">Elétrico</option>
                                <option value="Terra">Terra</option>
                                <option value="Lutador">Lutador</option>
                                <option value="Psíquico">Psíquico</option>
                                <option value="Pedra">Pedra</option>
                                <option value="Voador">Voador</option>
                                <option value="Fantasma">Fantasma</option>
                                <option value="Gelo">Gelo</option>
                                <option value="Dragao">Dragão</option>
                                <option value="Metálico">Metálico</option>
                                <option value="Noturno">Noturno</option>
                                <option value="Fada">Fada</option>
                            </select>
                        </div>

                        <div class="form-check">
                            <button type="submit" class="btn btn-login col-md-12">Registrar Captura!</button>
                        </div>

                    </form>
                </div>
                <div class="col-md-7 banner-sec">
                    <img src="" alt="">
            </div>
    </section>
</body>

</html>