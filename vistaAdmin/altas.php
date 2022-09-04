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

    if(isset($_POST['pdesc'])){
        $pdesc = $_POST['pdesc'];
        $pprecio = $_POST['pprecio'];

        $query = "insert into producto (pdesc,pprecio) values ('$pdesc',$pprecio);";
        mysqli_query($conn,$query);
        if(mysqli_affected_rows($conn) > 0){
            $mensaje = 1;
        }else{
            $mensaje = 2;
        }
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
                    <li><a href="admin.php">home</a></li>
                    <li><a href="busqueda.php">Buscar Productos</a></li>
                </ul>
            </nav>
            <span class="cabecera__span"><a class="titulo-enlace" href="login.php">Hola <?php echo $snom;?></a></span>
    </header>
    <section>
        <article>
            <h1>Ingrese un nuevo prooducto</h1>
            <form action="altas.php" method="POST">
                <label for="nombre">Ingrese el nombre del producto</label>
                <input type="text" name="pdesc" id="nombre">
                <label for="precio">Ingrese el precio del producto</label>
                <input type="number" name="pprecio" id="precio">
                <button>Guardar Producto</button>
            </form>
            <div>
                <?php switch($mensaje){
                    case 0:
                        break;
                    case 1:?>
                    <h2>Se ha ingresado el producto con los siguientes valores</h2>
                    <h3>Nombre del producto : <?php echo $pdesc;?></h3>
                    <h3>Precio del producto : $<?php echo $pprecio;?></h3>
                    <?php 
                        break;
                    case 2:?>
                    <h2>No se ha podido ingresar el producto. Intentelo nuevamente.</h2>
                <?php } ?>
            </div>
        </article>
    </section>
</body>
</html>