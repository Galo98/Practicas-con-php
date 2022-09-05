
<?php 
$mostrar = 0;

    if(!isset($_POST['dia'])){
        $_POST['dia'] = 0;
        $_POST['mes'] = 0;
        $_POST['anio'] = 0;
        $mostrar = 1;

    }else if($_POST['dia'] <= 0 || $_POST['dia'] >= 31 || $_POST['mes'] <= 0 || $_POST['mes'] > 12 || $_POST['anio'] < 1){
        $mostrar = 2;
        } else{
            

            $fechaActual = date("Y-m-d");
            
            $fechaIngresada = $_POST['anio'] ."-" .$_POST['mes'] ."-" .$_POST['dia'];


            $datos = diferenciasFechas($fechaIngresada, $fechaActual);

            #region revision de fechas
            $fActual = date("Y") .date("m") .date("d");

            if($_POST['mes'] < 10){
                $m = 0 .$_POST['mes'];
            }else{
                $m = $_POST['mes'];
            }

            if($_POST['dia'] < 10){
                $d = 0 .$_POST['dia'];
            }else{
                $d = $_POST['dia'];
            }

            $fIngreso = $_POST['anio'] .$m .$d;
            if($fActual > $fIngreso){
                $mostrar = 3;
            }else if($fActual < $fIngreso){
                $mostrar = 4;
            } else{
                $mostrar = 5;
            }

            #endregion

            #region fechas para mostrar
            $diaIM = $_POST['dia'];
            $mesIM = $_POST['mes'];
            $añoIM = $_POST['anio'];

            $diaAM = date("d");
            $mesAM = date("m");
            $añoAM = date("Y");
            #endregion
        }



#region funcion de fechas
function diferenciasFechas($fechaInicio, $fechaFin){
    $fecha1 = date_create($fechaInicio);
    $fecha2 = date_create($fechaFin);
    $diferencia = date_diff($fecha1, $fecha2);

    $tiempo = array();
    foreach($diferencia as $valor){
        $tiempo[] = $valor;
    }
    return $tiempo;
}
#endregion

#region verificar mayores a 0
function verificar($valor, $valor1){

    $respuesta = " ";

    if($valor >= 1){
        $respuesta = $valor .$valor1;
    }

    return $respuesta;
}
#endregion
?>


<article class="contenedor__fechas">
    <div class = "transparencia">
        <h1 class="fechas-titulo">Cuanto tiempo falta o cuanto tiempo paso</h1>
        <form class="fechas-formulario" action="profesor.php" method="POST">
            <label class="fechas__label">Ingrese una fecha
                <div class="fechas__contenedor_campos">
                    <input class="fechas__campo" type="number" name="dia" placeholder="día" min=1 max= 31 >
                    <input class="fechas__campo" type="number" name="mes" placeholder="mes" min= 1 max= 12 >
                    <input class="fechas__campo" type="number" name="anio" placeholder="año" min=1500 max=2100>
                </div>
            </label>
            <button class="fechas__btn"> Enviar </button>
        </form>
        <div class="fechas__mensajes">
            <?php

                switch($mostrar){
                    case 1:
                        echo "<h2 class='fechas__mensajes-titulo'>No se ingreso ninguna fecha.</h2>";
                        break;
                    case 2:
                        echo "<h2 class='fechas__mensajes-titulo'>Hay un error en la fecha, por favor reingrese los valores.</h2>";
                        break;
                    case 3:
                        echo "<h2 class='fechas__mensajes-titulo'>Resultado</h2>";
                        echo "<p class='fechas__mensajes-texto'>Pasaron al rededor de  " .verificar($datos[0], " años, ") .verificar($datos[1], " meses o ") .$datos[11] ." días, desde el día " .$diaIM ." del mes " .$mesIM ." del año " .$añoIM .".</p>";
                        break;
                    case 4:
                        echo "<h2 class='fechas__mensajes-titulo'>Resultado</h2>";
                        echo "<p class='fechas__mensajes-texto'>Todavía falta  " .verificar($datos[0], " años, ") .$datos[1] ." meses o " .$datos[11] ." días, para llegar al día " .$diaIM ." del mes " .$mesIM ." del año " .$añoIM .".</p>";
                        break;
                    case 5;
                        echo "<h2 class='fechas__mensajes-titulo'>Resultado</h2>";
                        echo "<p class='fechas__mensajes-texto'>La fecha ingresada es la misma que la fecha actual.</p>";
                        break;
                    }
            ?>
        </div>
    </div>
</article>