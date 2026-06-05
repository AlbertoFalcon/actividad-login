<?php
session_start();
// Aquí va la validación del rol del usuario
$usuario = $_SESSION["usuario"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="./css/presidente.css">

    <title>Document</title>
</head>
<body>
<?php
include 'dynamics/header.php';
?>

<div id="contenedor">
    <?php
    include "dynamics/sidebar_usu.php";
    ?>
    <main id="contenido-principal">

        <div id="card-login">
            <div id="titulo-login">
                <h2>Actualizar datos</h2>
            </div>
            <form action="" method="post">
                <div>
                    <label for="usuario">Nombre de usuario:</label>
                    <input id="usuario" name="usuario" type="text" placeholder="" value="<?php echo $usuario ?>">
                </div>
                <div>
                    <label for="password">Nueva contraseña:</label>
                    <input id="password" name="password" type="password" placeholder="">
                </div>
                <div>
                    <input type="submit" value="Iniciar Sesión">
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>


