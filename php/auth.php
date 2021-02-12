<?php
    require "conexaoPDO.php";
    session_start();
    
    $email = $_POST['email'];
    $senha = sha1($_POST['senha']);

    //Faz a seleção no banco de dados do usuario que possui o email e senha correspondentes
    $stmt = $pdo->prepare("
        SELECT * FROM usuario WHERE email = ? AND senha = ?
    ");
    $stmt->execute([$email, $senha]);
    $usuarios = $stmt->fetchAll();

    //Verifica se foi achado algum usuário e se achado o programa define a sessão do usuário e redireciona para a index 
    if (sizeof($usuarios) > 0) {
        $usuario = $usuarios[0];
        
        $_SESSION['usuario'] = $usuario['email'];
        $_SESSION['id_usuario'] = $usuario['id'];
        
        header('location: /');
        exit();
     }
    
    header('location: login.php?error=Usuário ou senha incorreto');
?>