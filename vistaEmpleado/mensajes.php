<?php
    session_start();

    $sid = $_SESSION['id'];
    $snom = $_SESSION['nombre'];
    $srol = $_SESSION['rol'];

    require "../conexion.php";
    $conn = conectar();

    $mensaje = 0;

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/variables.css">
<link rel="stylesheet" href="../css/header.css">
    <title>Guia 2 | Empleado-Mensajeria</title>
</head>
<body>
    <header class="cabecera">
            <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
            <nav class="cabecera__nav">
                <ul>
                    <li><a href="empleado.php">Home</a></li>
                </ul>
            </nav>
            <span class="cabecera__span"><a class="titulo-enlace" href="login.php">Hola <?php echo $snom;?></a></span>
    </header>

    <main>
        <section>
            <h1>Enviar mensajes al administrador</h1>
            <article>
                <form action="mensajes.php" method="POST">
                <input type="text" name="asunto" placeholder="Ingrese el Asunto">
                <textarea name="texto" cols="30" rows="10" placeholder="Ingrese el texto"></textarea>
                <button>Enviar Mensaje</button>
                </form>
            </article>
        </section>
    </main>
</body>
</html>