
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
    
    $mostrar = 3;

    $datos = diferenciasFechas($fechaIngresada, $fechaActual);

    // revision de fechas

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


?>


<article class="contenedor__fechas">
    <div class = "transparencia">
        <h1 class="fechas-titulo">Cuanto tiempo falta o cuanto tiempo paso</h1>
        <form class="fechas-formulario" action="index.php" method="POST">
            <label class="fechas__label">Ingrese una fecha
                <div class="fechas__contenedor_campos">
                    <input class="fechas__campo" type="number" name="dia" placeholder="día" min=1 max= 31 >
                    <input class="fechas__campo" type="number" name="mes" placeholder="mes" min= 1 max= 12 >
                    <input class="fechas__campo" type="number" name="anio" placeholder="año" >
                </div>
            </label>
            <button class="fechas__btn"> Enviar </button>
        </form>
        <div class="fechas__mensajes">
            <?php

                switch($mostrar){
                    case 1:
                        echo "<h2 class='fechas__mensajes-titulo'>No se ingreso ninguna fecha</h2>";
                        break;
                    case 2:
                        echo "<h2 class='fechas__mensajes-titulo'>Hay un error en la fecha, por favor reingrese los valores</h2>";
                        break;
                    case 3:
                        echo "<h2 class='fechas__mensajes-titulo'>Resultados</h2>";
                        echo "<p class='fechas__mensajes-texto'>Fecha actual " . $fechaActual ."</p>";
                        echo "<p class='fechas__mensajes-texto'>Fecha ingresada " .$fechaIngresada ."</p>";
                        echo "<p class='fechas__mensajes-texto'>Diferencia en años = " .$datos[0] ."</p>";
                        echo "<p class='fechas__mensajes-texto'>Diferencia en meses = " .$datos[1] ."</p>";
                        echo "<p class='fechas__mensajes-texto'>Diferencia en días = " .$datos[11] ."</p>";
                        break;

                }
            ?>
        </div>
    </div>
</article>