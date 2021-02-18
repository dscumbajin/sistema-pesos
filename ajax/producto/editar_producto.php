<?php
include('../is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['mod_id'])) {
	$errors[] = "Id producto vacío";
} else if (empty($_POST['mod_codigo'])) {
	$errors[] = "Código producto vacío";
} else if (empty($_POST['mod_nombre'])) {
	$errors[] = "Nombre producto vacío";
}   else if (
	!empty($_POST['mod_id']) &&
	!empty($_POST['mod_codigo']) &&
	!empty($_POST['mod_nombre']) 
) {
	/* Connect To Database*/
	require_once("../../config/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
	require_once("../../config/conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code
	
	$id_producto = intval($_POST['mod_id']);
	$codigo = mysqli_real_escape_string($con, (strip_tags($_POST["mod_codigo"], ENT_QUOTES)));
	$producto = mysqli_real_escape_string($con, (strip_tags($_POST["mod_nombre"], ENT_QUOTES)));
	$peso_estimado = floatval($_POST['mod_estimado']);
	$peso_minimo = floatval($_POST['mod_minimo']);
	$peso_maximo = floatval($_POST['mod_maximo']);
	$activo = intval($_POST['mod_estado']);
	$grupo = intval($_POST["mod_grupo"]);
	$subgrupo = intval($_POST["mod_subgrupo"]);
	$tolerancia = floatval($_POST['mod_tolerancia']);
	$tiempo = intval($_POST['mod_tiempo']);

	$sql = "UPDATE productos SET codigo_producto='" . $codigo . "', producto='" . $producto . "', peso_estimado='" . $peso_estimado . "', peso_minimo='" . $peso_minimo . "', peso_maximo='" . $peso_maximo . "' , activo='" . $activo . "', grupo='" . $grupo . "', subgrupo='" . $subgrupo . "', tolerancia='" . $tolerancia . "', tiempo='" . $tiempo . "' WHERE id_producto='" . $id_producto . "'";
	$query_update = mysqli_query($con, $sql);
	if ($query_update) {
		$messages[] = "Producto actualizado satisfactoriamente.";
	} else {
		$errors[] = "Lo siento algo ha salido mal intenta nuevamente." . mysqli_error($con);
	}
} else {
	$errors[] = "Error desconocido.";
}

if (isset($errors)) {

?>
	<div class="alert alert-danger" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>Error!</strong>
		<?php
		foreach ($errors as $error) {
			echo $error;
		}
		?>
	</div>
<?php
}
if (isset($messages)) {

?>
	<div class="alert alert-success" role="alert">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong>¡Bien hecho!</strong>
		<?php
		foreach ($messages as $message) {
			echo $message;
		}
		?>
	</div>
<?php
}

?>