<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/variables.css">
<link rel="stylesheet" href="css/header.css">
    <title>Guia 2 | Loggin</title>
</head>
<body>
<header class="cabecera">
        <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
        <nav class="cabecera__nav"></nav>
        <span class="cabecera__span"><a class="titulo-enlace" href="login.php">Iniciar Session</a></span>
</header>

    <section>
        <article>
            <form action="validarlog.php" method="POST">
                <label for="usu">Nombre o Usuario</label>
                <input type="text" name="usuario" id="usu">
                <label for="contraseña">Contraseña</label>
                <input type="password" name="contra" id="contraseña">
                <button>Acceder</button>
            </form>
            <div>
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