<?php
    session_start();
    // Si inició sesión, tendrá un rol asignado
    if (isset($_SESSION['rol']) ){
        // Si es de tipo usuario el visitante, lo mandamos a su sesión para que no ande de chismoso
        if ($_SESSION['rol'] == "usuario"){
            header("Location: usuario.php");
        }
        // Si su rol es uno distinto a presidente, le cerramos la sesión
        if ($_SESSION['rol'] != "presidente"){
            header("Location: cerrar_sesion.php");
        }

    } else {
        // no tiene rol, pal login
        header("Location: login.php");
    }
    $usuario = $_SESSION["usuario"];
    $nombre = $_SESSION["nombre_completo"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/presidente.css">

    <title>Document</title>
</head>
<body>
    <?php
    include 'dynamics/header.php';
    ?>

    <div id="contenedor">
        <?php
        include "dynamics/sidebar.php";
        ?>
        <main id="contenido-principal">
            <h1>Saludos, presidente <?php echo $nombre; ?></h1>
            <h3>¿Qué haremos el día de hoy?</h3>
        </main>
    </div>
</body>
</html>
