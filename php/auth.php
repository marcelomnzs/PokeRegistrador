<?php
    session_start();
    
    $email = $_POST['email'];
    $senha = sha1($_POST['senha']);

    $usuarios = file('dados.csv');

    foreach($usuarios as $user) {
        $usuario = $email . ';' . $senha;
        if (trim($user) == $usuario) {
            $_SESSION['user'] = explode(';', $user)[0];
            header('location: /');
            exit();
        }
    }
    header('location: login.php?error=Usuário ou senha incorreto');
?>