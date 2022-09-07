<?php
    /* ****---- SESIONES ----**** */
    session_start();
    if(isset($_SESSION['rol'])){
    $sid = $_SESSION['id'];
    $snom = $_SESSION['nombre'];
    $srol = $_SESSION['rol'];
    }

    if(!isset($srol) || $srol != 2){
        die("No tenes permisos para acceder aqui <br> <a href='../index.php'>Volver a la pagina principal</a>");
    }

    /* ****---- Codigo ----**** */

    require "../conexion.php";
    $conn = conectar();

    $mensaje = 0;

    if(isset($_POST['valor'])){
        $buscar = $_POST['valor'];
        $opcion = $_POST['opcion'];

        switch($opcion){
            case 1: 
                $query = "select * from producto where pid = $buscar;";
                $consulta = mysqli_query($conn,$query);
                break;
            case 2:
                $query = "select * from producto where pdesc = '$buscar';";
                $consulta = mysqli_query($conn,$query);
                break;
            case 3:
                $query = "select * from producto where pprecio = $buscar;";
                $consulta = mysqli_query($conn,$query);
                break;
        }
        if(mysqli_affected_rows($conn) >= 1){
            $mensaje = 1;
        }else{
            $mensaje = 2;
        }
    }else{
        $query = "select * from producto;";
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
<link rel="stylesheet" href="../css/busqueda.css">
<script src="https://kit.fontawesome.com/600e7f7446.js" crossorigin="anonymous"></script>
    <title>Guia 2 | Admin</title>
</head>
<body>
    <header class="cabecera">
            <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
            <nav class="cabecera__nav">
                <ul class="cabecera__nav-lista">
                    <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="mensajes.php">Enviar Mensajes</a></li>
                    <li class="cabecera__nav__lista-item"><a class="cabecera__nav__lista__item-link" href="../cerrarSesion.php">Cerrar Sesion</a></li>
                </ul>
            </nav>
            <span class="cabecera__span"><p>Sesion de <?php echo $snom;?></p></span>
    </header>
    <main class="contenedor__productos">

        <section class="productos">
            <?php switch($mensaje){
                case 0:?>
                    <h1 class="productos__titulo">Lista de todos los productos actuales</h1>
                <?php break;
                case 1:?>
                    <h1 class="productos__titulo">Productos encontrados tras buscar <?php echo $buscar; ?></h1>
                <?php break;
                case 2:?>
                    <h1 class="productos__titulo">No se encontraron resultados en la busqueda de <?php echo $buscar; ?></h1>
                <?php break;
                } ?>
            <div class="productos__contenedor-resultados">
                <div class="productos__busqueda">
                    <form class="productos__busqueda-form" action="empleado.php" method="POST">

                        <div class="productos__busqueda__buscador">
                            <input class="productos__busqueda-input" type="text" name="valor" id="buscador" required><label for="buscador" class="oculto">Ingresar Texto para Buscar</label>
                            <button class="productos__busqueda-boton"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>

                        <div class="productos__busqueda-Opciones">

                            <label class="productos__busqueda__opciones-label" for="id"><input class="productos__busqueda__opciones-check" type="radio" name="opcion" value=1 id="id" required>Buscar por ID</label>

                            <label class="productos__busqueda__opciones-label" for="nombre"><input class="productos__busqueda__opciones-check" type="radio" name="opcion" value=2 id="nombre" required>Buscar por Nombre</label>

                            <label class="productos__busqueda__opciones-label" for="precio"><input class="productos__busqueda__opciones-check" type="radio" name="opcion" value=3 id="precio" required>Buscar por Precio</label>
                        </div>
                    </form>
                </div>
                <div class="productos__contenedor-articulos">
                    <?php while($dato = mysqli_fetch_assoc($consulta)){ ?>
                        <article class="productos__articulo">
                            <p class="productos__articulo-texto">Nombre : <?php echo $dato['pdesc']; ?></p>
                            <p class="productos__articulo-texto">Producto N° <?php echo $dato['pid']; ?></p>
                            <p class="productos__articulo-texto">Precio $<?php echo $dato['pprecio']; ?></p>
                        </article>
                    <?php } ?>
                </div>
            </div>
        </section>
</body>
</html>