<?php
    session_start();
    $nome = $_POST['pokemon'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $genero = $_POST['genero'];
    $tipo = $_POST['tipo'];

    $pokemons = file('pokemons.csv');

    foreach($pokemons as $pokemon) {
        if($pokemon['pokemon'] == $nome && $pokemon['altura'] == $altura && $pokemon['peso'] == $peso){
            header('location: index.php?error=Pokémon já cadastrado');
            exit();
        }
    }


    $fp = fopen('pokemons.csv', 'a'); 
	fwrite($fp, $_POST['pokemon'] . ';' . $_POST['altura'] . ';' . $_POST['peso'] . ';' . $_POST['genero'] . ';' .  $_POST['tipo'] . ';' .  $_SESSION['user'] . ";\n");
    fclose($fp);
    
    header('Location: tabelaPokemon.php')
?>


