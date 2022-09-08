<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/variables.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/index.css">
    <title>Guia 2 | Home</title>
</head>
<body>
    <header class="cabecera">
        <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
        <nav class="cabecera__nav">
            <ul class="cabecera__nav-lista">
                <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="login.php">Acceder</a></li>
            </ul>
        </nav>
        <span class="cabecera__span"></span>
    </header>
    <section class="index">
        <p class="index_titulo"> ¡ Bienvenid@ al sistema ! </p>
        <article class="index__contenedor">
            <p class="index_texto">
                El sistema cuenta con diferentes usuarios, cada usuario tiene un rol diferente, segun su rol los usuarios pueden interactuar de diferentes formas con el sistema. A continuacion se detallan los usuarios.
            </p>
            <div class="index__listas-contenedor">
                <ul class="index_lista">
                    <li><p class="index_texto">Usuario : <b class="datos"> Alfa </b></p></li>
                    <li><p class="index_texto">Contraseña : <b class="datos"> 1234 </b></p></li>
                    <li><p class="index_texto">Rol : <b class="datos"> Admin </b></p></li>
                </ul>
                <ul class="index_lista">
                    <li><p class="index_texto">Usuario : <b class="datos"> Beta </b></p></li>
                    <li><p class="index_texto">Contraseña : <b class="datos"> 1234 </b></p></li>
                    <li><p class="index_texto">Rol : <b class="datos"> Empleado </b></p></li>
                        
                </ul>
                <ul class="index_lista">
                    
                    <li><p class="index_texto">Usuario : <b class="datos"> Gama </b></p></li>
                    <li><p class="index_texto">Contraseña : <b class="datos"> 1234 </b></p></li>
                    <li><p class="index_texto">Rol : <b class="datos"> Profesor </b></p></li>
                </ul>
            </div>
        </article>
    </section>
</body>
</html>