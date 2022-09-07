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
<link rel="stylesheet" href="../css/modificar.css">
    <title>Guia 2 | Modificar</title>
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
    <main class="modificar_main">

        <section class="modificar">
            <?php switch($msg){ 
                case 0:?>
                <p class="modificar-titulo">Modificacion de productos</p>
                <?php while($dato = mysqli_fetch_assoc($consulta)){ ?>
                    <article class="modificar__contenedor">
                        <form class="modificar__contenedor-form" action="modificar.php" method="POST">
                        <label class="modificar__contenedor__form-texto" for="pnombre">Nombre del producto
                        <input class="modificar__contenedor__form-input" type="text" name="desc" id="pnombre" value=<?php echo $dato['pdesc']; ?>></label>
                        <label class="modificar__contenedor__form-texto" for="pprecio">Precio del Producto
                        <input class="modificar__contenedor__form-input" type="number" name="precio" id="pprecio" step="0.01" value=<?php echo $dato['pprecio']; ?>></label>
                        <div class="modificar__contenedor__form-guardado">
                                <input type="number" class="oculto" name="idmodificar" value=<?php echo $dato['pid']; ?> >
                                <label for="verif" class="modificar__contenedor__form__guardado-label"><input type="checkbox" name="validar" id="verif" required>Marque la casilla para confirmar que desea guardar los cambios</label>
                                <button class="modificar__contenedor__form__guardado-btn">Guardar cambios</button>
                        </div>
                        </form>
                </article>
            <?php } ?>
            <?php break;
                    case 1:
                        ?>
                            <?php $dato = mysqli_fetch_assoc($consulta) ?>
                            <article class="resultados">
                            <p class="resultados-titulo">Se han guardado los siguientes cambios</p>
                            <div class="resultados-seccion">
                                <p class="resultados-texto">Producto N° <?php echo $dato['pid']; ?></p>
                                <p class="resultados-texto">Nombre <?php echo $dato['pdesc']; ?></p>
                                <p class="resultados-texto">Precio $<?php echo $dato['pprecio']; ?></p>
                            </div>
                            <div class="resultados-redirect">
                                <a class="resultados__redirect-link" href="busqueda.php">Volver al listado de productos</a>
                            </div>
                            </article>
                        <?php break;
                    case 2:?>
                        <article class="resultados">
                            <p class="resultados-titulo">No se ha podido guardar los cambios</p>
                            <div class="resultados-redirect">
                                <a class="resultados__redirect-link" href="busqueda.php">Volver al listado de productos</a>
                            </div>
                        </article>
                        <?php break;
                        ?>
            <?php }?>
        </section>

    </main>
</body>
</html>