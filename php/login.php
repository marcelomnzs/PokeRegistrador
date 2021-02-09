<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemons</title>

    <!-- Links do bootstrap -->
    <?= include 'php/linksBootstrap.php'; ?>
    <!-- Link css -->
    <link rel="stylesheet" href="../css/login.css">
    <!-- Link JS -->
    <link src="../js/login.js">
    <script>
        <?php if (isset($_GET['error'])): ?>
            alert('<?= $_GET['error']?>');    
        <?php endif ?>
    </script>
</head>
<body>
    
    <form action="auth.php" method="POST">
        <label>
            <p class="label-txt">DIGITE SEU E-MAIL</p>
            <input type="text" class="input" name="email">
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>

        <label>
            <p class="label-txt">DIGITE SUA SENHA</p>
            <input type="Password" class="input" name="senha">
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <button type="submit">Entrar</button>
        <h6>Ainda não possui conta, cadastre-se <a href="cadastro.php">aqui!</a></h6>   
    </form>
    
</body>

</html>