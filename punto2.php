    <?php 

    if(!isset($_POST['fecha'])){
        $_POST['fecha'] = "";
    }else{
        $fechaIngresada = $_POST['fecha'];

        echo "se ingreso la siguiente fecha" .$fechaIngresada;
    }

    ?>

        <form action="index.php" method="POST">
            <h2>¿Querés saber en que estación del año estas ?</h2>
            <label for="tiempo">Ingrese la fecha</label>
            <input type="date" name="fecha" id="tiempo">

            <button>
                Enviar
            </button>
        </form>