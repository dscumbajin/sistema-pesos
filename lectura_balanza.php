<?php

session_start();
if (!isset($_SESSION['user_login_status']) and $_SESSION['user_login_status'] != 1) {
    header("location: login.php");
    exit;
}

/* Connect To Database*/
require_once("config/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
require_once("config/conexion.php"); //Contiene funcion que conecta a la base de datos

$active_clientes = "active";

$title = "Lectura Balanza | Baterias Ecuador";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>

<body>
    <?php
    include("navbar.php");
    ?>

    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">

                <h4><i class='glyphicon glyphicon-search'></i> Buscar Lecturas Balanza</h4>
            </div>
            <div class="panel-body">


                <div class="form-group row">
                    <label for="q" class="col-md-2 control-label">Lecturas Balanza</label>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha inicio ">
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha fin">
                    </div>
                    <div class="col-md-3">
                        <span id="loader"></span>
                    </div>
                    <div class="col-md-3">

                        <button id="limpiar" type="button" class="btn btn-default">
                            <span style="color: red;" class="glyphicon glyphicon-trash"></span> Limpiar</button>
                    </div>

                </div>

                <section id="tabla_resultados">

                </section>

            </div>
        </div>

    </div>
    <hr>
    <?php
    include("footer.php");
    ?>
    <script>
        if ($('#home').hasClass('activarnav')) {
            $('#home').removeClass('activarnav');
            $('#productos').removeClass('activarnav');
            $('#centro_costo_producto').removeClass('activarnav');
            $('#centro_costo').removeClass('activarnav');
            $('#usuarios').removeClass('activarnav');
            $('#lectura_balanza').addClass('activarnav');
            
        }
    </script>
    <script type="text/javascript" src="js/lectura-balanza/lectura_balanza.js"></script>

</body>

</html>