<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include 'dynamics/conexion.php';
include 'dynamics/validaciones.php';
// Aquí va la validación del rol del usuario

//$_SESSION["usuario"] = 'ALEXANDER';
$usuario = $_SESSION["usuario"];

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario']) && isset($_POST['password'])){
    $usuarioLimpio = sanitizarEntrada(connect(), $_POST['usuario']);
    $password = $_POST['password'];

    if(!esPasswordSegura($password))
        $error = "Contraseña débil. Debe tener mínimo 6 caracteres, una mayúscula y un número.";
    else{
        $passwordSegura = hasheaPassword($password);

        $actualizaUsuario = "UPDATE usuarios SET password = '$passwordSegura' where nombre = '$usuario' ";

        if(mysqli_query(connect(), $actualizaUsuario)){
            $exito = "¡Datos actualizados con éxito y total seguridad!";
            $_SESSION["usuario"] = $usuarioLimpio;
            $usuario = $usuarioLimpio;
        } else
            $error = "Error al actualizar en la base de datos.";
    }
}   

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
            
            <?php
                if (isset($error)) 
                    echo '<p style="color: #ef4444; font-weight: bold; margin-bottom: 15px;">' . $error . '</p>';
                

                if (isset($exito)) 
                    echo '<p style="color: #22c55e; font-weight: bold; margin-bottom: 15px;">' . $exito . '</p>';
                
            ?>

            <form action="#" method="post">
                <div>
                    <label for="usuario">Nombre de usuario:</label>
                    <input id="usuario" readonly name="usuario" type="text" placeholder="" value="<?php echo $usuario ?> ">
                </div>
                <div>
                    <label for="password">Nueva contraseña:</label>
                    <input id="password" name="password" type="password" placeholder="">
                </div>
                <div>
                    <input type="submit" value="Actualizar Datos">
                </div>
            </form>
        </div>
    </main>
</div>
</body>
</html>


