<?php
include('../is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['centroCosto'])) {
	$errors[] = "Centro de costo vacío";
} elseif (empty($_POST['producto'])) {
	$errors[] = "Producto vacío";
} else if (!empty($_POST['centroCosto']) && !empty($_POST['producto'])) {
	/* Connect To Database*/
	require_once("../../config/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
	require_once("../../config/conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code

	$centroCosto = intval($_POST['centroCosto']);
	$producto = intval($_POST['producto']);
	

	$sql = "INSERT INTO centrocostosproducto (id_centroCosto , id_producto) VALUES ('$centroCosto','$producto')";
	$query_new_insert = mysqli_query($con, $sql);
	if ($query_new_insert) {
		$messages[] = "Producto registrado satisfactoriamente en Centro de costo.";
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