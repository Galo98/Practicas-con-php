<?php

function conectar(){

    $serv="localhost";
    $usr="root";
    $pss="";
    $bd="guia2";

    $c=mysqli_connect($serv, $usr, $pss, $bd);
    return $c;
}

?>