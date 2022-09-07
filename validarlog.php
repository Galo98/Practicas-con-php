<?php
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

    require "conexion.php";
    $conn = conectar();

    setlocale(LC_ALL,'es_es.UTF-8'); //cambia la constante del tiempo a español
    date_default_timezone_set("America/Argentina/Buenos_Aires"); //Setea la zona horaria

    $query = "select * from usuario where usunom = '$usuario';";
    $consulta = mysqli_query($conn,$query);
    $valores = mysqli_fetch_assoc($consulta);

    if(mysqli_affected_rows($conn) > 0){
        if($valores['usucontra'] == $contra){
            session_start();
            $_SESSION['id'] = $valores['usuid'];
            $_SESSION['nombre'] = $usuario;
            $_SESSION['rol'] = $valores['usurol'];
            $_SESSION['fecha'] = date("j-n-Y");
            $_SESSION['fechaInicio'] = date("Y-m-d H:i:s");
            $snom = $_SESSION['nombre'];
        }else{
            header("location: login.php?error2");
        }
    }else{
        header("location: login.php?error1=$usuario");
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/variables.css">
<link rel="stylesheet" href="css/header.css">
    <title>Guia 2 | Sesion Iniciada</title>
</head>
<body>
    
<header class="cabecera">
    <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
    <nav class="cabecera__nav">
        <ul class="cabecera__nav-lista">
            <?php
            
            switch($_SESSION['rol']){
                case 1:?>
                    <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="/vistaAdmin/admin.php">Home</a></li>
                <?php
                    break;
                case 2: ?>
                    <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="/vistaEmpleado/empleado.php">Home</a></li>
                <?php
                    break;
                case 3:?>
                    <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="/vistaProfesor/profesor.php">Home</a></li>
                <?php
                    break;

            } ?>
            <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="cerrarSesion.php">Cerrar Sesion</a></li>
        </ul>
    </nav>
    <span class="cabecera__span"></span>
</header>

    <section class="contenedor__cierre">
        <article class="cierre__contenido">
            <p class="cierre__texto">¡ Hola <b class="cierre_nombre"><?php echo $snom; ?></b> !</p>
        </article>
    </section>
</body>
</html>