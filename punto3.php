
<?php 

if(!isset($_POST['dia'])){
$_POST['dia'] = 0;
$_POST['mes'] = 0;
$_POST['anio'] = 0;
$mostrar = false;
}else{
    

    $fechaActual = date("Y-m-d");
    
    $fechaIngresada = $_POST['anio'] ."-" .$_POST['mes'] ."-" .$_POST['dia'];
    
    $mostrar = true;

    $datos = diferenciasFechas($fechaIngresada, $fechaActual);
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
    <h1>Cuanto tiempo falta o cuanto tiempo paso</h1>
    <form action="index.php" method="POST">
        <label>Ingrese una fecha
            <input type="number" name="dia" placeholder="día" min=1 max= 31 >
            <input type="number" name="mes" placeholder="mes" min= 1 max= 12 >
            <input type="number" name="anio" placeholder="año" >
        </label>
        <button> Enviar </button>
    </form>
    <div class="mensajes">
        <?php
            if($mostrar){
                echo "Fecha actual" . $fechaActual;
                echo "Fecha ingresada" .$fechaIngresada;

                echo "Años que pasaron = " .$datos[0];
                echo "Meses que pasaron = " .$datos[1];
                echo "Total Dias = " .$datos[11];
            }
        ?>
    </div>
</article>