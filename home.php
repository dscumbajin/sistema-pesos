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

$title = "Sistema Pesos | Baterias Ecuador";
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

    <div class="container" style="text-align:center;">

        <h1>SISTEMA CONTROL DE PESOS</h1>
        <img src="img/balanza.png" alt="balanza" style="width: 300px;" />

        <h2>Administración de información</h2>
    </div>
    <hr>
    <?php
    include("footer.php");
    ?>
    <script>
        if ($('#productos').hasClass('activarnav')) {
            $('#productos').removeClass('activarnav');
            $('#home').addClass('activarnav');
            $('#centro_costo_producto').removeClass('activarnav');
            $('#centro_costo').removeClass('activarnav');
            $('#usuarios').removeClass('activarnav');
            $('#home').removeClass('activarnav');
        }
    </script>


</body>

</html>