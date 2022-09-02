<?php

    require "conexion.php";

    $mensaje = 0;

    $c = conectar();

    if(!isset($_POST['nombre'])){

    }else{
        $user = $_POST['nombre'];
        $pass = $_POST['pass'];
        
        $query = "select * from usuario where usunom = '$user' and usucontra = '$pass';";
        $consulta = mysqli_query($c,$query);
        $datos = mysqli_fetch_assoc($consulta);

        if( mysqli_affected_rows($c) > 0 ){
                session_start();
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;
                $_SESSION['rol'] = $datos['usurol'];
                $mensaje = 1;
        }else{
            
            $mensaje = 2;
        }
    }

?>

        <article>
            <div>
                <?php 
                    switch($mensaje){
                        case 0:?>
                        <h1> Inicie Sesion </h1>
                        <form method="POST" action="index.php">
                            <label for="nombre" required>Usuario</label>
                            <input type="text" name="nombre">
                            <label for="pass">Contraseña</label>
                            <input type="password" name="pass" required>
                            <button>Acceder</button>
                        </form>
                        <?php
                            break;
                        case 1:
                            echo "<h2> Bienvenido " .$_SESSION['rol'] ." " .$_SESSION['user'] ."</h2>";
                            break;
                        case 2:
                            echo "<h2> Datos incorrectos, vuelva a ingresar los datos</h2>";
                            ?>
                            <h1> Inicie Sesion </h1>
                            <form method="POST" action="index.php">
                                <label for="nombre" required>Usuario</label>
                                <input type="text" name="nombre">
                                <label for="pass">Contraseña</label>
                                <input type="password" name="pass" required>
                                <button>Acceder</button>
                            </form>
                        <?php
                            break;
                    }
                ?>
            </div>
        </article>