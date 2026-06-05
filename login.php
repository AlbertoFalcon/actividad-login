<?php
session_start();
$error = null;
if (isset($_POST["usuario"])){

    //Haremos la consulta en la base de datos
    require 'dynamics/conexion.php';
    $con = connect();

    $usuario = trim($_POST["usuario"]); // Quitamos espacios al inicio y al final del string recibido por formulario
    $password = trim($_POST["password"]);

    $query = "SELECT nocta, nombre, appat, apmat, password FROM usuarios WHERE nocta = '$usuario' AND password = '$password'";
    $result = mysqli_query( $con, $query);
    $registro = mysqli_fetch_assoc($result);
    //echo $query;
    //var_dump($registro);

    if ($registro){ // Verificamos que coincidan usu y pass
        $_SESSION['usuario'] = $registro["nocta"];
        $_SESSION["rol"] = "usuario";
        $_SESSION["nombre_completo"] = $registro["nombre"] . " " . $registro["appat"] . " " . $registro["apmat"];
        setcookie("usuario", $registro["nocta"], time() + (86400)); // 1 dia = 86400 segundos, expirará en un dia
        header("Location: usuario.php");
    } else {
        $error = "No coinciden usuario o contraseña";
    }


} else {
    require 'dynamics/conexion.php';
    $con = connect();
    // Verificamos que tenga la cookie
    if (isset($_COOKIE["usuario"])){
        $usuario = $_COOKIE["usuario"];
        $query = "SELECT nocta, nombre, appat, apmat, password FROM usuarios WHERE nocta = $usuario";
        $result = mysqli_query( $con, $query);
        $registro = mysqli_fetch_assoc($result);

        $_SESSION['usuario'] = $registro["nocta"];
        $_SESSION["rol"] = "usuario";
        $_SESSION["nombre_completo"] = $registro["nombre"] . " " . $registro["appat"] . " " . $registro["apmat"];
        setcookie("usuario", $registro["nocta"], time() + (86400)); // 1 dia = 86400 segundos, expirará en un dia
        header("Location: usuario.php");

    }
}

// Aquí habrá una consulta en la base de datos
?>
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