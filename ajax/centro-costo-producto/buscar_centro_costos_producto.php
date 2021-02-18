<?php

include('../is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database*/
require_once("../../config/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
require_once("../../config/conexion.php"); //Contiene funcion que conecta a la base de datos

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if (isset($_GET['id'])) {
	$id_centroCosto = $_GET['id'];

	if ($delete1 = mysqli_query($con, "DELETE FROM centrocostos WHERE id_centroCosto='" . $id_centroCosto . "'")) {
?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Aviso!</strong> Datos eliminados exitosamente.
		</div>
	<?php
	} else {
	?>
		<div class="alert alert-danger alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong>Error!</strong> Lo siento algo ha salido mal intenta nuevamente.
		</div>
	<?php

	}
}

if ($action == 'ajax') {
	// escaping, additionally removing everything that could be (html/javascript-) code
	// idUsu, usuario, nombreUsu, password, mail, idPerfil
	$q = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
	$aColumns = array('centroCosto', 'producto'); //Columnas de busqueda
	$sTable = "centrocostosproducto, centrocostos, productos";
	$sWhere = "WHERE centrocostosproducto.id_centroCosto = centrocostos.id_centroCosto 
	AND centrocostosproducto.id_producto = productos.id_producto";
	if ($_GET['q'] != "") {
		$sWhere = "WHERE centrocostosproducto.id_centroCosto = centrocostos.id_centroCosto 
		AND centrocostosproducto.id_producto = productos.id_producto AND (";
		for ($i = 0; $i < count($aColumns); $i++) {
			$sWhere .= $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
		}
		$sWhere = substr_replace($sWhere, "", -3);
		$sWhere .= ')';
	}
	$sWhere .= " order by id_centroCostoProducto DESC";
	include '../pagination.php'; //include pagination file

	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
	$per_page = 10; //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
	$row = mysqli_fetch_array($count_query);
	$numrows = $row['numrows'];
	$total_pages = ceil($numrows / $per_page);
	$reload = '../../centro_costo_producto.php';
	//main query to fetch the data
	$sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
	$query = mysqli_query($con, $sql);
	//loop through fetched data


	if ($numrows > 0) {

	?>
		<div class="table-responsive">
			<table id="registrosTable" class="table ">
				<tr class="info">

					<th>Código Producto</th>
					<th>Producto</th>
					<th>Centro costo</th>
					<th>Subcentro costo</th>
					<th>Etiqueta ingreso</th>
					<th>Secuencial ingreso</th>
					<th>Etiqueta egreso</th>
					<th>Secuencial egreso</th>
					<th>Activo</th>
					<th>Acciones</th>

				</tr>
				<?php
				while ($row = mysqli_fetch_array($query)) {

					//ID centro de costo, productos, centrocostoproducto
					$id_centroCostoProducto = $row['id_centroCostoProducto'];
					$id_centroCosto = $row['id_centroCosto'];
					$id_producto = $row['id_producto'];
					
					// Variables Centro de costo y productos
					$codigo_producto = $row['codigo_producto'];
					$producto = $row['producto'];
					$centroCosto = $row['centroCosto'];
					$subcentro_costo = $row['subcentro_costo'];
					$etiqueta_ingreso = $row['etiqueta_ingreso'];
					$secuencial_ingreso = $row['secuencial_ingreso'];
					$etiqueta_egreso = $row['etiqueta_egreso'];
					$secuencial_egreso = $row['secuencial_egreso'];
					$activo = $row['activo'];
					if ($activo == 0) {
						$activo_cc = "NO";
					} else {
						$activo_cc = "SI";
					}

				?>

					<input type="hidden" value="<?php echo $id_centroCosto; ?>" id="id_centroCosto<?php echo $id_centroCostoProducto; ?>">
					<input type="hidden" value="<?php echo $id_producto; ?>" id="id_producto<?php echo $id_centroCostoProducto; ?>">
					
					<tr>
						<td><?php echo $codigo_producto; ?></td>
						<td><?php echo $producto; ?></td>
						<td><?php echo $centroCosto; ?></td>
						<td><?php echo $subcentro_costo; ?></td>
						<td><?php echo $etiqueta_ingreso; ?></td>
						<td><?php echo $secuencial_ingreso; ?></td>
						<td><?php echo $etiqueta_egreso; ?></td>
						<td><?php echo $secuencial_egreso; ?></td>
						<td><?php echo $activo_cc; ?></td>
						<td><span>
								<a href="#" title='Editar Centro Costo/Producto' onclick="obtener_datos('<?php echo $id_centroCostoProducto; ?>');" data-toggle="modal" data-target="#modCentroCostoProducto"><i class="glyphicon glyphicon-edit"></i></a>
								<?php if ($_SESSION['user_admin'] == '1') { ?>
									<a href="#" title='Borrar Centro Costo/Producto' onclick="eliminar('<?php echo $id_centroCostoProducto; ?>')"><i class="glyphicon glyphicon-trash" style="color: red;"></i> </a>
								<?php } ?>
							</span>
						</td>

					</tr>
				<?php
				}
				?>

			</table>
			<div class="paginacion">

				<?php
				echo paginate($reload, $page, $total_pages, $adjacents);
				?>

			</div>
		</div>
		<?php
	} else {
		if ($_GET['q'] != "") {
		?>
			<div class="alert alert-danger text-center" role="alert">
				No existen el producto almacenado en el centro de costo con el dato: <?php echo $_GET['q']; ?>
			</div>
<?php
		}
	}
}
?>
<script>
	function crearCookie(nombre, valor, dias) {
		var expira;
		if (dias) {
			var date = new Date();
			date.setTime(date.getTime() + (dias * 24 * 60 * 60 * 1000));
			expira = "; expires=" + date.toGMTString();
		} else {
			expira = "";
		}
		document.cookie = escape(nombre) + "=" + escape(valor) + expira + "; path=/";
	}
</script>