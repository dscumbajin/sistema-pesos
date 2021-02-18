<?php
include('../is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['mod_id'])) {
	$errors[] = "ID vacío";
} else if (empty($_POST['mod_centroCosto'])) {
	$errors[] = "Centro de Costo vacío";
} else if (empty($_POST['mod_subcentro_costo'])) {
	$errors[] = "Subcentro vacío";
} else if (empty($_POST['mod_etiqueta_ingreso'])) {
	$errors[] = "Etiqueta ingreso vacío";
} else if (empty($_POST['mod_secuencial_ingreso'])) {
	$errors[] = "Secuencial ingreso vacío";
} else if (empty($_POST['mod_etiqueta_egreso'])) {
	$errors[] = "Etiqueta egreso vacío";
} else if (empty($_POST['mod_secuencial_egreso'])) {
	$errors[] = "Secuencial egreso vacío";
} else if (
	!empty($_POST['mod_id']) &&
	!empty($_POST['mod_centroCosto']) &&
	!empty($_POST['mod_subcentro_costo']) &&
	!empty($_POST['mod_etiqueta_ingreso'])
) {
	/* Connect To Database*/
	require_once("../../config/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
	require_once("../../config/conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code

	$id_centroCosto = intval($_POST['mod_id']);
	$centroCosto = mysqli_real_escape_string($con, (strip_tags($_POST["mod_centroCosto"], ENT_QUOTES)));
	$subcentro = intval($_POST['mod_subcentro_costo']);
	$etiqueta_ingreso = mysqli_real_escape_string($con, (strip_tags($_POST["mod_etiqueta_ingreso"], ENT_QUOTES)));
	$secuencial_ingreso = intval($_POST['mod_secuencial_ingreso']);
	$etiqueta_egreso = mysqli_real_escape_string($con, (strip_tags($_POST["mod_etiqueta_egreso"], ENT_QUOTES)));
	$secuencial_egreso = intval($_POST['mod_secuencial_egreso']);
	$activo = intval($_POST['mod_activo']);

	$sql = "UPDATE centrocostos SET centroCosto='" . $centroCosto . "', subcentro_costo='" . $subcentro . "', etiqueta_ingreso='" . $etiqueta_ingreso . "', secuencial_ingreso='" . $secuencial_ingreso . "', etiqueta_egreso='" . $etiqueta_egreso . "', secuencial_egreso='" . $secuencial_egreso . "', activo='" . $activo . "'
	WHERE id_centroCosto='" . $id_centroCosto . "'";
	$query_update = mysqli_query($con, $sql);
	if ($query_update) {
		$messages[] = "Centro de costo actualizado satisfactoriamente.";
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