<?php

/* 
        ----**** CONSIGNA ****-----

    Crear un programa que me permita
    - Ingresar día, mes y año.
    - Validar si la fecha ingresada es correcta, sino que me pida reingresar (ej; 21/2/2022)
    - Calcule cuantos dias faltan para llegar a la fecha actual
    - Cuantos dias pasandoron desde la fecha actual
    - Mostrarlo debajo del formulario de ingreso
 */

    if(!isset($_POST['dia'])){
        $_POST['dia'] = 0;
        $_POST['mes'] = 0;
        $_POST['anio'] = 0;
    }


?>

<article class="contenedor__fechas">
    <h1>Cuanto tiempo falta o cuanto tiempo paso</h1>
    <form action="index.php" method="POST">
        <label>Ingrese una fecha
            <input type="number" name="dia" placeholder="día" min=1 max= 31>
            <input type="number" name="mes" placeholder="mes" min= 1 max= 12>
            <input type="number" name="anio" placeholder="año">
        </label>
        <button> Enviar </button>
    </form>
</article>