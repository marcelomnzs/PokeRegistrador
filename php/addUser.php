<?php

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirma = $_POST['confirma'];

    if ($confirma != $senha) {
        header('location: cadastro.php?error=Senhas não conferem&email=' . $email);
        exit();
    }

    $fp = fopen('dados.csv', 'a'); 
    $usuario = $email . ";" . sha1($senha) . "\n";
	fwrite($fp, $usuario);
    fclose($fp);
    
    header('Location: login.php')
?>