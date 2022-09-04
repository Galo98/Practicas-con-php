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
    <title>Guia 2 | Admin</title>
</head>
<body>
    <header class="cabecera">
            <h2 class="cabecera-titulo"><a class="titulo-enlace" href="index.php">Guia N°2 PHP</a></h2>
            <div>
                <form action="empleado.php" method="POST">
                    <input type="text" name="valor" id="buscador" required><label for="buscador" class="oculto">Ingresar Texto para Buscar</label>
                    <button>Buscar</button>
                    <div>
                        <input type="radio" name="opcion" value=1 id="id" required><label for="id">Buscar por ID</label>
                        <input type="radio" name="opcion" value=2 id="nombre" required><label for="nombre">Buscar por Nombre</label>
                        <input type="radio" name="opcion" value=3 id="precio" required><label for="precio">Buscar or Precio</label>
                    </div>
                </form>
            </div>
            <nav class="cabecera__nav">
                <ul>
                    <li><a href="mensajes.php">Enviar Mensajes</a></li>
                </ul>
            </nav>
            <span class="cabecera__span"><a class="titulo-enlace" href="login.php">Hola <?php echo $snom;?></a></span>
    </header>

    <main>

        <section class="productos">
            <?php switch($mensaje){
                case 0:?>
                    <h1>Lista de todos los productos actuales</h1>
                <?php break;
                case 1:?>
                    <h1>Productos encontrados tras buscar <?php echo $buscar; ?></h1>
                <?php break;
                case 2:?>
                    <h1>No se encontraron resultados en la busqueda de <?php echo $buscar; ?></h1>
                <?php break;
                } ?>
            <?php while($dato = mysqli_fetch_assoc($consulta)){ ?>
                <article>
                    <h2><?php echo $dato['pdesc']; ?></h2>
                    <h3>Producto N° <?php echo $dato['pid']; ?></h3>
                    <h3>Precio $<?php echo $dato['pprecio']; ?></h3>
                </article>
            <?php } ?>
        </section>
    </main>
</body>
</html>