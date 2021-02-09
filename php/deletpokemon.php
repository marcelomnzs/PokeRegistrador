<?php
     session_start();
     if (!isset($_SESSION['user'])) {
         header('location: php/login.php');
         exit();
     }

    $deletado= file('pokemons.csv');
    $pokemon = $_GET['pokemon'];
    unset($deletado[$pokemon]);
    $delet= implode('', $deletado);
    file_put_contents('pokemons.csv', $delet);
    header('Location: tabelaPokemon.php');
    ?>
   
