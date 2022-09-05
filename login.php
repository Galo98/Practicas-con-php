<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/variables.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/login.css">
    <title>Guia 2 | Loggin</title>
</head>
<body>
<header class="cabecera">
    <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
    <nav class="cabecera__nav">
        <ul class="cabecera__nav-lista">
            <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="index.php">Home</a></li>
        </ul>
    </nav>
    <span class="cabecera__span"></span>
</header>

    <section class="loggin">
        <article class="loggin__contenedor">
            <h1 class="loggin__contenedor-titulo">Bienvenido, Inicie sesión para acceder al sistema</h1>
            <form class="loggin__contenedor-form" action="validarlog.php" method="POST">
                <label class="loggin__contenedor__form-label" for="usu">Nombre o Usuario
                <input class="loggin__contenedor__form-input" type="text" name="usuario" id="usu">
                </label>
                <label class="loggin__contenedor__form-label" for="contraseña">Contraseña
                <input class="loggin__contenedor__form-input" type="password" name="contra" id="contraseña">
                </label>
                <button class="loggin__contenedor__form-boton">Acceder</button>
            </form>
            <div class="loggin__contenedor-Mensajes">
                <?php
                    if(isset($_GET['error1'])){
                        echo "No existe el usuario " .$_GET['error1'];
                    }
                    if(isset($_GET['error2'])){
                        echo "Contraseña Incorrecta";
                    }
                ?>
            </div>
        </article>
    </section>
</body>
</html>