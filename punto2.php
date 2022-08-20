
<?php 

    if(!isset($_POST['fecha']) || $_POST['fecha'] == "" || $_POST['fecha'] == " "){
        $_POST['fecha'] = "";
        ?>
        <article class="estacion__contenedor inicio">
            <form action="index.php" method="POST">
                <h2 class="estacion__titulo">¿Querés saber en que estación del año estas ?</h2>
                <label class="estacion__label" for="tiempo">Ingrese la fecha</label>
                <input class="estacion__calendario" type="date" name="fecha" id="tiempo">
                <button class="estacion__boton">Enviar</button>
            </form>
        </article>
    <?php }else{ ?>
        
    <?php
        $fechaIngresada = $_POST['fecha'];
        
        $fdia = $fechaIngresada[8] .$fechaIngresada[9];

        $fmes = $fechaIngresada[5] .$fechaIngresada[6];

        $faño = $fechaIngresada[0] .$fechaIngresada[1] .$fechaIngresada[2] .$fechaIngresada[3]; 

        $media = $fmes .$fdia;

        if($media >= 321 && $media <=620){
            $estacion = "Otoño";
            $fondo = 'otonio';
        }else if($media >= 621 && $media <= 920){
            $estacion = "Invierno";
            $fondo = 'invierno';
        }else if($media >= 921 && $media <= 1220){
            $estacion = "Primavera";
            $fondo = 'primavera';
        }else if($media >= 1221 || $media <= 320){
            $estacion = "Verano";
            $fondo = 'verano';
        }
        ?>
    <article class="estacion__contenedor <?php echo $fondo; ?>">
        <form class="transparecia" action="index.php" method="POST">
            <h2 class="estacion__titulo"> En la fecha <?php echo $fdia ." / " .$fmes ." / " .$faño ." "; ?> la estación es <?php echo $estacion; ?></h2>
            <label class="estacion__label" for="tiempo">Ingrese una nueva fecha</label>
            <input class="estacion__calendario" type="date" name="fecha" id="tiempo" value="<?php $fechaIngresada ?>">
            <button class="estacion__boton">Recargar</button>
        </form>
    </article>
<?php } 
/* 
Verano (21 de diciembre a 20 de marzo).
Otoño (21 de marzo a 20 de junio).
Invierno (21 de junio a 20 de septiembre).
Primavera (21 de septiembre a 20 de diciembre). 
*/


?>




