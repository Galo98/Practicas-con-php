<?php
    /* ****---- SESIONES ----**** */
    session_start();
    if(isset($_SESSION['rol'])){
    $sid = $_SESSION['id'];
    $snom = $_SESSION['nombre'];
    $srol = $_SESSION['rol'];
    }

    if(!isset($srol) || $srol != 1){
        die("No tenes permisos para acceder aqui <br> <a href='../index.php'>Volver a la pagina principal</a>");
    }

    /* ****---- Codigo ----**** */
    require "../conexion.php";
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
<link rel="stylesheet" href="../css/eliminar.css">
    <title>Guia 2 | Admin</title>
</head>
<body>
    <header class="cabecera">
            <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
            <nav class="cabecera__nav">
                <ul class="cabecera__nav-lista">
                    <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="admin.php">Home</a></li>
                    <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="busqueda.php">Buscar Productos</a></li>
                    <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="../cerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            </nav>
            <span class="cabecera__span"><p>Sesion de <?php echo $snom;?></p></span>
    </header>

    <main class="eliminar__main">

        <section class="eliminar">
            <?php switch($mensaje){
                case 0:
                    break;
                    case 1:
            ?>
            <?php $dato = mysqli_fetch_assoc($consulta); ?>
                <article class="eliminar__contenedor">
                    <p class="eliminar-titulo"> ¡Cuidado <?php echo $snom; ?>, estás apunto de <b class="rojo">eliminar</b> el siguiente producto!</p>
                    <div class="eliminar-contenido">
                        <p class="eliminar__contenido-texto">Producto N° <b class="resaltado"><?php echo $dato['pid']; ?></b></p>
                        <p class="eliminar__contenido-texto">Nombre <b class="resaltado"><?php echo $dato['pdesc']; ?></b></p>
                        <p class="eliminar__contenido-texto">Precio <b class="resaltado">$<?php echo $dato['pprecio']; ?></b></p>
                    </div>
                    <div>
                        <form class="eliminar__contenido-formulario" action="eliminar.php" method="POST">
                            <input type="number" class="oculto" name="id" value=<?php echo $dato['pid']; ?> >
                            <label class="eliminar-check" for="elim"><input type="checkbox" name="verifElim" required id="elim">Marque la casilla si realmente desea eliminar este producto</label>
                            <button class="eliminar-btn">Eliminar</button>
                        </form>
                    </div>
                </article>
                <?php break;
                case 2: ?>
                    <article class="resultados">
                        <p class="eliminar-titulo">El producto N° <?php echo $idElim; ?> fue eliminado completamente.</p>
                        <a class="eliminar-link" href="busqueda.php">Volver a la busqueda de productos</a>
                    </article>
                <?php break;
                case 3: ?>
                    <article class="resultados">
                        <p class="eliminar-titulo">El producto N° <?php echo $idElim; ?> no fue eliminado, vuelva a intentarlo nuevamente.</p>
                        <a class="eliminar-link" href="busqueda.php">Volver a la busqueda de productos</a>
                    </article>
        </section>
        <?php break;
        } ?>
    </main>
</body>
</html>