<?php
    require 'conexaoPDO.php';
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirma = $_POST['confirma'];

    if ($confirma != $senha) {
        header('location: cadastro.php?error=Senhas não conferem&email=' . $email);
        exit();
    }

    //Consulta feita para saber se o e-mail já está em uso
    $stmt = $pdo -> prepare("
        SELECT * FROM usuario WHERE email = ?
    ");
    $stmt->execute([$email]);

    //If que verifica se foi encontrado um e-mail que corresponde ao digitado pelo usuário
    if($stmt->rowCount() > 0){
        header('location:cadastro.php?error=E-mail em uso, tente se cadastrar com outro!');
        exit();
    }

    $stmt = $pdo->prepare("
        INSERT INTO usuario (email, senha) VALUES (?, ?)
    ");
    
    $stmt->execute([
        $email,
        sha1($senha)
    ]);

    header('Location: login.php?msg=Usuário Cadastrado com sucesso!');
    exit();
?>