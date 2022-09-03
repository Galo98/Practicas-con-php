<?php
    $usuario = $_POST['usuario'];
    $contra = $_POST['contra'];

    require "conexion.php";

    $conn = conectar();

    $query = "select * from usuario where usunom = '$usuario';";
    $consulta = mysqli_query($conn,$query);
    $valores = mysqli_fetch_assoc($consulta);

    if(mysqli_affected_rows($conn) > 0){
        if($valores['usucontra'] == $contra){
            session_start();
            $_SESSION['id'] = $valores['usuid'];
            $_SESSION['nombre'] = $usuario;
            $_SESSION['rol'] = $valores['usurol'];

            switch($_SESSION['rol']){
                case 1:
                    header("location: ./vistaAdmin/admin.php");
                    break;
                case 2:
                    header("location: ./vistaEmpleado/empleado.php");
                    break;
                case 3:
                    header("location: ./vistaProfesor/profesor.php");
                    break;
            }
        }else{
            header("location: login.php?error2");
        }
    }else{
        header("location: login.php?error1=$usuario");
    }

?>