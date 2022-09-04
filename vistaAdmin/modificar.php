<?php
    /* ****---- SESIONES ----**** */
    session_start();
    $sid = $_SESSION['id'];
    $snom = $_SESSION['nombre'];
    $srol = $_SESSION['rol'];

    if($srol != 1){
        die("No tenes permisos para acceder aqui <br> <a href='../index.php'>Volver a la pagina principal</a>");
    }

    /* ****---- Codigo ----**** */

    require "../conexion.php";
    $conn = conectar();
    
    $msg = 0;

    if(isset($_POST['validar'])){
        $idmodificar = $_POST['idmodificar'];
        $nuevoNombre = $_POST['desc'];
        $nuevoPrecio = $_POST['precio'];
        $sql = "update producto set pdesc = '$nuevoNombre',pprecio = '$nuevoPrecio' where pid = $idmodificar;";
        mysqli_query($conn,$sql);
        if(mysqli_affected_rows($conn) > 0){
            $msg = 1;
            $query = "select * from producto where pid = $idmodificar;";
            $consulta = mysqli_query($conn,$query);
        }else{
            $msg = 2;
        }
    }else {
    $id = $_POST['id'];
    $query = "select * from producto where pid = $id;";
    $consulta = mysqli_query($conn,$query);
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
    <title>Guia 2 | Modificar</title>
</head>
<body>
    <header class="cabecera">
            <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
            <nav class="cabecera__nav">
                <ul>
                    <li><a href="admin.php">Home</a></li>
                    <li><a href="altas.php">Ingresar Productos</a></li>
                    <li><a href="busqueda.php">Buscar Productos</a></li>
                </ul>
            </nav>
            <span class="cabecera__span"><a class="titulo-enlace">Hola <?php echo $snom;?></a></span>
    </header>

    <main>

        <section class="productos">
            <?php switch($msg){ 
                case 0:?>
                <?php while($dato = mysqli_fetch_assoc($consulta)){ ?>
                    <article>
                        <form action="modificar.php" method="POST">
                        <label for="pnombre">Nombre del producto</label>
                        <input type="text" name="desc" id="pnombre" value=<?php echo $dato['pdesc']; ?>>
                        <label for="pprecio">Precio del Producto</label>
                        <input type="number" name="precio" id="pprecio" value=<?php echo $dato['pprecio']; ?>>
                        <div>
                                <input type="number" class="oculto" name="idmodificar" value=<?php echo $dato['pid']; ?> >
                                <input type="checkbox" name="validar" id="verif" required><label for="verif">Marque la casilla para confirmar que desea guardar los cambios</label>
                                <button>Guardar cambios</button>
                        </div>
                        </form>
                </article>
            <?php } ?>
            <?php break;
                    case 1:
                        ?>
                            <?php $dato = mysqli_fetch_assoc($consulta) ?>
                            <article>
                            <p>Se han guardado los siguientes cambios</p>
                            <h3>Producto N° <?php echo $dato['pid']; ?></h3>
                            <h2><?php echo $dato['pdesc']; ?></h2>
                            <h3>Precio $<?php echo $dato['pprecio']; ?></h3>
                            <div>
                                <a href="busqueda.php">Volver al Listado de Productos</a>
                            </div>
                            </article>
                        <?php break;
                    case 2:?>
                        <article>
                            <p>No se han guardado los cambios</p>
                        </article>
                        <?php break;
                        ?>
            <?php }?>
        </section>

    </main>
</body>
</html>