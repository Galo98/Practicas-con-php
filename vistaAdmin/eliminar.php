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

    $conn = conectar();
    $mensaje = 0;
    $idElim = $_POST['id'];

    if(isset($_POST['verifElim'])){
        $query = "delete from producto where pid = $idElim;";
        $consulta = mysqli_query($conn,$query);
        if(mysqli_affected_rows($conn)){
            $mensaje = 2;
        }else{
            $mensaje = 3;
        }
    }else{
        $query = "select * from producto where pid = $idElim;";
        $consulta = mysqli_query($conn,$query);
        $mensaje = 1;
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
                    <li><a href="admin.php">Home</a></li>
                    <li><a href="altas.php">Ingresar Productos</a></li>
                </ul>
            </nav>
            <span class="cabecera__span"><a class="titulo-enlace" href="login.php">Hola <?php echo $snom;?></a></span>
    </header>

    <main>

        <section class="productos">
            <?php switch($mensaje){
                case 0:
                    break;
                    case 1:
            ?>
            <?php $dato = mysqli_fetch_assoc($consulta); ?>
                <article>
                    <h1> ¡Cuidado <?php echo $snom; ?>, estás apunto de eliminar el siguiente producto!</h1>
                    <h2><?php echo $dato['pdesc']; ?></h2>
                    <h3>Producto N° <?php echo $dato['pid']; ?></h3>
                    <h3>Precio $<?php echo $dato['pprecio']; ?></h3>
                    <div>
                        <form action="eliminar.php" method="POST">
                            <input type="number" class="oculto" name="id" value=<?php echo $dato['pid']; ?> >
                            <input type="checkbox" name="verifElim" required id="elim"><label for="elim">Marque la casilla si realmente desea eliminar este producto</label>
                            <button>Eliminar</button>
                        </form>
                    </div>
                </article>
                <?php break;
                case 2: ?>
                    <article>
                        <h1>El producto N° <?php echo $idElim; ?> fue eliminado completamente.</h1>
                        <a href="busqueda.php">Volver a la busqueda de productos</a>
                    </article>
                <?php break;
                case 3: ?>
                    <article>
                        <h1>El producto N° <?php echo $idElim; ?> no fue eliminado, vuelva a intentarlo nuevamente.</h1>
                        <a href="busqueda.php">Volver a la busqueda de productos</a>
                    </article>
        </section>
        <?php break;
        } ?>
    </main>
</body>
</html>