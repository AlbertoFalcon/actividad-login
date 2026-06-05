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
        <img src="./img/windowsxp.png" alt="">
    </main>
</div>
</body>
</html>

