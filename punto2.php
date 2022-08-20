<article class="estacion__contenedor">
<?php 

    if(!isset($_POST['fecha']) || $_POST['fecha'] == "" || $_POST['fecha'] == " "){
        $_POST['fecha'] = "";
        ?>
        
        <form action="index.php" method="POST">
            <h2>¿Querés saber en que estación del año estas ?</h2>
            <label for="tiempo">Ingrese la fecha</label>
            <input type="date" name="fecha" id="tiempo">
            <button>Enviar</button>
        </form>
        
    <?php }else{

        $fechaIngresada = $_POST['fecha'];
        
        $fdia = $fechaIngresada[8] .$fechaIngresada[9];

        $fmes = $fechaIngresada[5] .$fechaIngresada[6];

        $faño = $fechaIngresada[0] .$fechaIngresada[1] .$fechaIngresada[2] .$fechaIngresada[3]; 

        if($fmes >= 3 && $fmes <=6){
           echo " <h1> Estación de Otoño</h1> ";
        }else if($fmes >= 6 && $fmes <= 9){
            echo " <h1> Estación de Invierno</h1> ";
        }else if($fmes >= 9 && $fmes <= 12){
            echo " <h1> Estación de Primavera</h1> ";
        }else if($fmes == 12 || $fmes <= 3){
            echo " <h1> Estación de Invierno</h1> ";
        }

        echo "<h3> Fecha Ingresada: " .$fdia ." / " .$fmes ." / " .$faño ." </h3>";

        ?>
        <form action="index.php" method="POST">
            <label for="tiempo">Ingrese una nueva fecha</label>
            <input type="date" name="fecha" id="tiempo" value="<?php $fechaIngresada ?>">
            <button>Recargar</button>
        </form>

<?php } 

/* 
Verano (21 de diciembre a 20 de marzo).
Otoño (21 de marzo a 20 de junio).
Invierno (21 de junio a 20 de septiembre).
Primavera (21 de septiembre a 20 de diciembre). 
*/


?>

</article>


