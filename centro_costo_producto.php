<?php

	session_start();
	if (!isset($_SESSION['user_login_status2']) AND $_SESSION['user_login_status2'] != 1) {
        header("location: login.php");
		exit;
        }
	
	/* Connect To Database*/
	require_once ("config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("config/conexion.php");//Contiene funcion que conecta a la base de datos
	
	$active_clientes="active";

	$title="Centro de Costo -  Producto | Baterias Ecuador";
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
                    <button type='button' class="btn btn-info" data-toggle="modal" data-target="#nuevoCentroCostoProducto"><span
                            class="glyphicon glyphicon-plus"></span> Nuevo Centro de Costo/Productos</button>
                </div>
                <h4><i class='glyphicon glyphicon-search'></i> Buscar Centro de Costo/Producto</h4>
            </div>
            <div class="panel-body">

                <?php
				include("modal/centro-costo-producto/registro_centro_costo_producto.php");
				include("modal/centro-costo-producto/editar_centro_costo_producto.php");
			?>
                <form class="form-horizontal" role="form" id="datos_cotizacion">

                    <div class="form-group row">
                        <label for="q" class="col-md-2 control-label">Centro de Costo/Producto</label>
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
    if($('#home').hasClass('activarnav')){
        $('#home').removeClass('activarnav');
		$('#productos').removeClass('activarnav');
		$('#centro_costo_producto').addClass('activarnav');
        $('#centro_costo').removeClass('activarnav');
        $('#usuarios').removeClass('activarnav'); 
        $('#lectura_balanza').removeClass('activarnav');
	}
    </script>
    <script type="text/javascript" src="js/centro-costo-producto/centro_costos_producto.js"></script>
  

</body>

</html>