<?php

setlocale(LC_TIME,"spanish"); //cambia la constante del tiempo a español

date_default_timezone_set("America/Argentina/Buenos_Aires"); //Setea la zona horaria

    $dia = strftime("%A");
    $diaN = strftime("%d");
    $mes = strftime("%B");
    $año = date("Y");
    $hora = date("h:i:s");

    echo "Hoy es " .$dia ." " .$diaN ." de " . $mes ." de " .$año .". <br> Hora : " .$hora;