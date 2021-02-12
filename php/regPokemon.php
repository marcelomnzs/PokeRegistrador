<?php
    session_start();
    require "conexaoPDO.php";

    $nome = $_POST['pokemon'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $genero = $_POST['genero'];
    $tipo = $_POST['tipo'];
    $id_treinador = $_SESSION['id_usuario'];

    //Verifica se há o pokémon a ser registrado já está na base de registros
    $stmt = $pdo->prepare("SELECT * FROM pokemon WHERE id_usuario = ?");
    $stmt->execute([$id_treinador]);
    $registrados = $stmt->fetchAll();

    foreach($registrados as $pokemon){
        if($pokemon['nome'] == $nome && $pokemon['altura'] == $altura && $pokemon['peso'] == $peso && $pokemon['genero'] == $generos){
            header('location: /?error=Pokémon já registrado!');
            exit();
        }
    }

    $stmt = $pdo->prepare("INSERT INTO pokemon (nome,altura,peso,genero,tipo,id_usuario) VALUES(?,?,?,?,?,?)");
    $stmt->bindParam(1,$nome);
    $stmt->bindParam(2,$altura);
    $stmt->bindParam(3,$peso);
    $stmt->bindParam(4,$genero);
    $stmt->bindParam(5,$tipo);
    $stmt->bindParam(6,$id_treinador);
    $stmt->execute();
    
    header('Location: tabelaPokemon.php');
?>


