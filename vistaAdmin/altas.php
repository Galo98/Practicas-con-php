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

    include "../conexion.php";
    $conn = conectar();
    
    $mensaje = 0;

    if(!isset($_POST['intento'])){
        $_POST['intento'] = 0;
    }

    $intento = $_POST['intento'];

    if(isset($_POST['pdesc']) && $_POST['pdesc'] != null && $_POST['pdesc'] != " "){
        $pdesc = $_POST['pdesc'];
        $pprecio = $_POST['pprecio'];

        $query = "insert into producto (pdesc,pprecio) values ('$pdesc',$pprecio);";
        mysqli_query($conn,$query);
        if(mysqli_affected_rows($conn) > 0){
            $mensaje = 1;
        }else{
            $mensaje = 2;
        }
    }else if($intento == 1){
        $mensaje = 2;
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
<link rel="stylesheet" href="../css/altas.css">
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

    <section class="ingreso">
        <article class="ingreso__caja">
            <h1 class="ingreso__caja-titulo">Ingrese un nuevo producto</h1>
            <form class="ingreso__caja-formulario" action="altas.php" method="POST">
                <label class="ingreso__caja-formulario-label" for="nombre">Ingrese el nombre del producto
                    <input class="ingreso__caja-formulario-input" type="text" name="pdesc" id="nombre">
                </label>
                <label class="ingreso__caja-formulario-label" for="precio">Ingrese el precio del producto
                    <input class="ingreso__caja-formulario-input" type="number" step="0.01" name="pprecio" id="precio">
                </label>
                <input type="checkbox" name="intento" value="1" checked hidden>
                <button class="ingreso__caja-formulario-btn">Guardar Producto</button>
            </form>
            
                <?php switch($mensaje){
                    case 0:
                        break;
                    case 1:?>
                    <div class="ingreso-mensajes">
                    <h2 class="ingreso-mensajes-titulo">Se ha ingresado el producto con los siguientes valores</h2>
                    <p class="ingreso-mensajes-texto">Nombre del producto : <?php echo $pdesc;?></p>
                    <p class="ingreso-mensajes-texto">Precio del producto : $<?php echo $pprecio;?></p>
                    </div>
                    <?php 
                        break;
                    case 2:?>
                    <div class="ingreso-mensajes">
                        <h2 class="ingreso-mensajes-titulo"> ¡ Ah ocurrido un error ! </h2>
                    <p class="ingreso-mensajes-texto">No se ha podido ingresar el producto. Intentelo nuevamente.</p>
                    </div>
                <?php } ?>
            
        </article>
    </section>
</body>
</html>