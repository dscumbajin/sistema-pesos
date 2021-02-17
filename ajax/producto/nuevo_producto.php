<?php
include('../is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/*Inicia validacion del lado del servidor*/
if (empty($_POST['codigo'])) {
	$errors[] = "Código de producto vacío";
} elseif (empty($_POST['producto'])) {
	$errors[] = "Nombre producto vacío";
} else if (!empty($_POST['codigo']) && !empty($_POST['producto'])) {
	/* Connect To Database*/
	require_once("../../config/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
	require_once("../../config/conexion.php"); //Contiene funcion que conecta a la base de datos
	// escaping, additionally removing everything that could be (html/javascript-) code

	$codigo = mysqli_real_escape_string($con, (strip_tags($_POST["codigo"], ENT_QUOTES)));
	$producto = mysqli_real_escape_string($con, (strip_tags($_POST["producto"], ENT_QUOTES)));
	$peso_estimado = floatval($_POST['peso_estimado']);
	$peso_minimo = floatval($_POST['peso_minimo']);
	$peso_maximo = floatval($_POST['peso_maximo']);
	$activo = intval($_POST['activo']);
	$grupo = intval($_POST["grupo"]);
	$subgrupo = intval($_POST["subgrupo"]);
	$tolerancia = floatval($_POST['tolerancia']);
	$tiempo = intval($_POST['tiempo']);

	$sql = "INSERT INTO productos (codigo_producto, producto, peso_estimado, peso_minimo, peso_maximo, activo, grupo, subgrupo, tolerancia, tiempo) 
	VALUES ('$codigo','$producto','$peso_estimado','$peso_minimo','$peso_maximo','$activo','$grupo','$subgrupo','$tolerancia', '$tiempo')";
	$query_new_insert = mysqli_query($con, $sql);
	if ($query_new_insert) {
		$messages[] = "Producto ingresado satisfactoriamente.";
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