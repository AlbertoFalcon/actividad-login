<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/login.css">
    <title>Document</title>
</head>
<body>
    <?php
    include 'dynamics/header.php';
    ?>
    <main>
        <div id="card-login">
            <div id="container-img-login">
                <img id="img-login" src="./img/EPF_Logout.png" alt="Login">
            </div>
            <div id="titulo-login">
                <h2>Iniciar Sesión</h2>
            </div>
            <form action="login.php" method="post">
                <div>
                    <label for="usuario">Nombre de usuario:</label>
                    <input id="usuario" name="usuario" type="text" placeholder="">
                </div>
                <div>
                    <label for="password">Contraseña:</label>
                    <input id="password" name="password" type="password" placeholder="">
                </div>
                <div>
                    <input type="submit" value="Iniciar Sesión">
                </div>
            </form>
        </div>
    </main>
</body>
</html>