<?php
/* ****---- SESIONES ----**** */
    session_start();
    $sid = $_SESSION['id'];
    $snom = $_SESSION['nombre'];
    $srol = $_SESSION['rol'];

    if($srol != 3){
        die("No tenes permisos para acceder aqui <br> <a href='../index.php'>Volver a la pagina principal</a>");
    }

    /* ****---- Codigo ----**** */
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title> Guia N°2 | Profesor </title>
    <?php include "partesProfesor/head.php" ?>
</head>
<body>

        <?php include "partesProfesor/header.php" ?>
    
<main class="contenedor_ejercicios" >
    
    <section class="punto2">
        <?php include "punto2.php" ?>
    </section>

    <section class="punto3" >
        <?php include "punto3.php" ?>
    </section>
    
</main>

</body>
</html>