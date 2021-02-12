<?php
     session_start();
     if (!isset($_SESSION['usuario'])) {
         header('location: php/login.php');
         exit();
     }
     $id_pokemon = (int) $_GET['id'];
     $id_usuario = $_SESSION['id_usuario'];
     require 'conexaoPDO.php';

    //Busca todos os pokemons que possuem o id passado no link
     $stmt = $pdo->prepare("SELECT * FROM pokemon WHERE id = ?");
     $stmt->execute([$id_pokemon]);
     
     //Verifica se o campo usuario_id é igual ao usuario da sessão
     if ($stmt->rowCount() > 0 && $stmt->fetch()['id_usuario'] == $id_usuario) {
         $stmt = $pdo->prepare("DELETE FROM pokemon WHERE id = ?");
         $stmt->execute([$id_pokemon]);
     }
     header('location: tabelaPokemon.php');
    ?>
   
