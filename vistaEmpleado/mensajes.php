<?php
    /* ****---- SESIONES ----**** */
    session_start();
    if(isset($_SESSION['rol'])){
    $sid = $_SESSION['id'];
    $snom = $_SESSION['nombre'];
    $srol = $_SESSION['rol'];
    }

    if(!isset($srol) || $srol != 2){
        die("No tenes permisos para acceder aqui <br> <a href='../index.php'>Volver a la pagina principal</a>");
    }

    /* ****---- Codigo ----**** */

    require "../conexion.php";

    $conn = conectar();
    $mensaje = 0;

    setlocale(LC_ALL,'es_es.UTF-8'); //cambia la constante del tiempo a español
    date_default_timezone_set("America/Argentina/Buenos_Aires"); //Setea la zona horaria
    $fecha = date("j-n-Y");
    $hora = date("h:i:s");

    if(isset($_POST['asunto'])){

        $emisor = $sid;
        $asunto = $_POST['asunto'];
        $mensaje = $_POST['texto'];

        $query = "insert into mensajes (menemisor,menasunto,mentexto,menfecha,menhora) values ($emisor,'$asunto','$mensaje','$fecha','$hora');";
        mysqli_query($conn,$query);

        if(mysqli_affected_rows($conn) > 0){
            $mensaje = 1;
        }else{
            $mensaje = 2;
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/variables.css">
<link rel="stylesheet" href="../css/header.css">
<link rel="stylesheet" href="../css/mensajes.css">
    <title>Guia 2 | Empleado-Mensajeria</title>
</head>
<body>
    <header class="cabecera">
            <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
            <nav class="cabecera__nav">
                <ul class="cabecera__nav-lista">
                    <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="empleado.php">Home</a></li>
                    <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="../cerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            </nav>
            <span class="cabecera__span"><p>Sesion de <?php echo $snom;?></p></span>
    </header>
    <main class="mensajes">
        <section class="mensajes__contenedor">
            <p class="mensajes-titulo">Enviar mensajes al administrador</p>
            <article class="mensajes__contenido">
                <form class="mensajes__contenido-form" action="mensajes.php" method="POST">
                <input class="mensajes__contenido-form-asunto" type="text" name="asunto" placeholder="Ingrese el Asunto" required>
                <textarea class="mensajes__contenido-form-texto" name="texto" placeholder="Ingrese el texto" required></textarea>
                <button class="mensajes__contenido-form-btn">Enviar Mensaje</button>
                </form>
            </article>
            <?php switch($mensaje){
            case 0:
                break; 
            case 1: ?>
                    <div class="mensajes-resultados">
                        <p class="mensajes__resultados-texto">Mensaje enviado</p>
                    </div>
                    <?php break;
                    case 2: ?>
                    <div class="mensajes-resultados">
                    <p class="mensajes__resultados-texto">No se ha podido enviar el mensaje, por favor vuelva a intentarlo mas tarde</p>
                    </div>
                <?php break;
                } ?>
            
        </section>
    </main>
</body>
</html>