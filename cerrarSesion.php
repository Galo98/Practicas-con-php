<?php
    setlocale(LC_ALL,'es_es.UTF-8'); //cambia la constante del tiempo a español
    date_default_timezone_set("America/Argentina/Buenos_Aires"); //Setea la zona horaria
    session_start();
    $sid = $_SESSION['id'];
    $snom = $_SESSION['nombre'];
    $srol = $_SESSION['rol'];
    $_SESSION['fecha'];
    $_SESSION['fechaInicio'];

    $fechaCierre = date("Y-m-d H:i:s");

    $tiempoActivo = tiempoTotal($_SESSION['fechaInicio'], $fechaCierre);

    if($tiempoActivo == "0:00"){
        $tiempoActivo = "menos de 1 minuto";
    }

    $archivo = fopen('accesos.txt', 'a+') or die();
    fwrite($archivo,"-------------------------------------------");
    fwrite($archivo,"\n");
    fwrite($archivo,"Nuevo ingreso");
    fwrite($archivo,"\n");
    fwrite($archivo,"Id : " .$sid);
    fwrite($archivo,"\n");
    fwrite($archivo,"Usuario : ".$snom);
    fwrite($archivo,"\n");
    fwrite($archivo,"Rol : ".$srol);
    fwrite($archivo,"\n");
    fwrite($archivo,"Fecha : ".$_SESSION['fecha']);
    fwrite($archivo,"\n");
    fwrite($archivo,"Tiempo en sesion : " .$tiempoActivo);
    fwrite($archivo,"\n");

    function tiempoTotal($valor1,$valor2){
        $valor1 = strtotime($valor1);
        $valor2 = strtotime($valor2);
    $tiempoTotal = ($valor2 - $valor1) / 60 / 60;
    $tiempoTotal = number_format((float)$tiempoTotal,2,':','');
    return $tiempoTotal;
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
    <title>Guia 2 | Cerrar Sesion</title>
</head>
<body>
<header class="cabecera">
    <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
    <nav class="cabecera__nav">
        <ul class="cabecera__nav-lista">
            <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="index.php">Home</a></li>
            <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="login.php">Acceder</a></li>
        </ul>
    </nav>
    <span class="cabecera__span"></span>
</header>

    <section class="contenedor__cierre">
        <article class="cierre__contenido">
            <p class="cierre__texto">¡ Hasta luego <b class="cierre_nombre"><?php echo $snom; ?></b> !</p>
        </article>
    </section>
</body>
</html>

<?php 
session_destroy();
?>