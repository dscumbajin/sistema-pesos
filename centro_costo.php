<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_clientes="active";

	$title="Centro de Costo | Baterias Ecuador";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("head.php");?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</head>

<body>
    <?php
	include("navbar.php");
	?>

    <div class="container">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                    <button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoCentroCosto"><span
                            class="glyphicon glyphicon-plus"></span> Nuevo Centro de Costo</button>
                </div>
                <h4><i class='glyphicon glyphicon-search'></i> Buscar Centro de Costo</h4>
            </div>
            <div class="panel-body">

                <?php
				include("modal/centro-costo/registro_centro_costo.php");
				include("modal/centro-costo/editar_centro_costo.php");
			?>
                <form class="form-horizontal" role="form" id="datos_cotizacion">

                    <div class="form-group row">
                        <label for="q" class="col-md-2 control-label">Centro de Costo</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="q" placeholder="Centro de Costo "
                                onkeyup='load(1);'>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-default" onclick='load(1);'>
                                <span class="glyphicon glyphicon-search"></span> Buscar</button>
                            <span id="loader"></span>
                        </div>

                    </div>

                </form>
                <div id="resultados"></div><!-- Carga los datos ajax -->
                <div class='outer_div'></div><!-- Carga los datos ajax -->

            </div>
        </div>

    </div>
    <hr>
    <?php
	include("footer.php");
	?>
    <script>
    if($('#usuarios').hasClass('activarnav')){
		$('#usuarios').removeClass('activarnav');
		$('#centro_costo').addClass('activarnav');
        $('#productos').removeClass('activarnav');
	}
    </script>
    <script type="text/javascript" src="js/centro-costo/centro_costos.js"></script>
</body>

</html>