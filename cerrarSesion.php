<?php
    session_start();
    $sid = $_SESSION['id'];
    $snom = $_SESSION['nombre'];
    $srol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="en">
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
            <a class="titulo-enlace" href="index.php">Home</a>
            <a class="titulo-enlace" href="login.php">Iniciar Session</a>
        </nav>
        <span class="cabecera__span"></span>
</header>

    <section>
        <article>
            <h1>¡ Hasta luego <?php echo $snom; ?> !</h1>
        </article>
    </section>
</body>
</html>

<?php 
session_destroy();
?>