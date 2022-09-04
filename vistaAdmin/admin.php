<?php
    /* ****---- SESIONES ----**** */
    session_start();
    $sid = $_SESSION['id'];
    $snom = $_SESSION['nombre'];
    $srol = $_SESSION['rol'];
    
    require "../conexion.php";
    $conn = conectar();

    if($srol != 1){
        die("No tenes permisos para acceder aqui <br> <a href='../index.php'>Volver a la pagina principal</a>");
    }

    /* ****---- Codigo ----**** */

    $paginaActual = $_SERVER['PHP_SELF'];

    $query = "select * from mensajes;";
    $consulta = mysqli_query($conn,$query);

    if(isset($_POST['selector'])){
        $eliminar = $_POST['selector'];

        $query1 = "delete from mensajes where menid = $eliminar";
        mysqli_query($conn,$query1);

        header("refresh:1; url='$paginaActual'");
    }

    function buscarEmpleado($valor){
        $conn = conectar();
        $sql = "select * from usuario where usuid = $valor";
        $info = mysqli_query($conn,$sql);
        $dato = mysqli_fetch_assoc($info);
        echo $dato['usunom'];
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
    <title>Guia 2 | Admin</title>
</head>
<body>
    <header class="cabecera">
            <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
            <nav class="cabecera__nav">
                <ul>
                    <li><a href="altas.php">Ingresar Productos</a></li>
                    <li><a href="busqueda.php">Buscar Productos</a></li>
                </ul>
            </nav>
            <span class="cabecera__span"><a class="titulo-enlace" href="login.php">Hola <?php echo $snom;?></a></span>
    </header>
    <section class="Mensajes">
        <div>
            <?php while($dato = mysqli_fetch_assoc($consulta)){?>
                <article>
                    <div><p><?php echo $dato['menasunto']; ?></p></div>
                    <div><p><?php echo $dato['mentexto']; ?></p></div>
                    <div><p>Enviado por <p class="mensaje-nombre"><?php buscarEmpleado($dato['menemisor']); ?></p></p></div>
                    <div><p><?php echo $dato['menfecha'] ." " .$dato['menhora']; ?></p></div>
                    <div>
                        <form action="admin.php" method="POST">
                            <input type="radio" name="selector" value=<?php echo $dato['menid']; ?>>
                            <button>Eliminar</button>
                        </form>
                    </div>
                </article>
            <?php } ?>
        </div>
    </section>
</body>
</html>