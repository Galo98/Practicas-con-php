<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "partesGeneral/head.php"; ?>
    <title>Guia 2 | Loggin</title>
</head>
<body>
    <?php include "partesGeneral/header.php"; ?>

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