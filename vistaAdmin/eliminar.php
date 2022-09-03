<?php

    require "../conexion.php";

    session_start();
    $sid = $_SESSION['id'];
    $snom = $_SESSION['nombre'];
    $srol = $_SESSION['rol'];

    $query = "select * from producto;";
    $consulta = mysqli_query(conectar(),$query);

?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/variables.css">
<link rel="stylesheet" href="../css/header.css">
    <title>Guia 2 | Admin</title>
</head>
<body>
    <header class="cabecera">
            <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
            <nav class="cabecera__nav">
                <ul>
                    <li><a href="admin.php">Home</a></li>
                    <li><a href="altas.php">Ingresar Productos</a></li>
                </ul>
            </nav>
            <span class="cabecera__span"><a class="titulo-enlace" href="login.php">Hola <?php echo $snom;?></a></span>
    </header>

    <main>

        <section class="productos">
            <?php while($dato = mysqli_fetch_assoc($consulta)){ ?>
                <article>
                    <h2><?php echo $dato['pdesc']; ?></h2>
                    <h3>Producto N° <?php echo $dato['pid']; ?></h3>
                    <h3>Precio $<?php echo $dato['pprecio']; ?></h3>
                    <div>
                        <form action="modificar.php" method="POST">
                            <input type="number" class="oculto" name="id" value=<?php echo $dato['pid']; ?> >
                            <button>Modificar</button>
                        </form>
                        <form action="eliminar.php" method="POST">
                            <input type="number" class="oculto" name="id" value=<?php echo $dato['pid']; ?> >
                            <button>Eliminar</button>
                        </form>
                    </div>
                </article>
            <?php } ?>
        </section>

    </main>
</body>
</html>