<?php
include('../is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['centroCosto'])) {
	$errors[] = "Centro de costo vacío";
} elseif (empty($_POST['subcentro'])) {
	$errors[] = "Subcentro vacío";
} else if (!empty($_POST['centroCosto']) && !empty($_POST['subcentro'])) {
	/* Connect To Database*/
	require_once("../../config/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
	require_once("../../config/conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code

	$centroCosto = mysqli_real_escape_string($con, (strip_tags($_POST["centroCosto"], ENT_QUOTES)));
	$subcentro = intval($_POST['subcentro']);
	$etiqueta_ingreso = mysqli_real_escape_string($con, (strip_tags($_POST["etiqueta_ingreso"], ENT_QUOTES)));
	$secuencial_ingreso = intval($_POST['secuencial_ingreso']);
	$etiqueta_egreso = mysqli_real_escape_string($con, (strip_tags($_POST["etiqueta_egreso"], ENT_QUOTES)));
	$secuencial_egreso = intval($_POST['secuencial_egreso']);
	$activo = intval($_POST['activo']);

	$sql = "INSERT INTO centrocostos (centroCosto , subcentro_costo , etiqueta_ingreso, secuencial_ingreso, etiqueta_egreso, secuencial_egreso, activo ) VALUES ('$centroCosto','$subcentro','$etiqueta_ingreso','$secuencial_ingreso','$etiqueta_egreso','$secuencial_egreso','$activo')";
	$query_new_insert = mysqli_query($con, $sql);
	if ($query_new_insert) {
		$messages[] = "Centro de costo registrado satisfactoriamente.";
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