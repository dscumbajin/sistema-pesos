<?php

include('../is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database*/
require_once("../../config/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
require_once("../../config/conexion.php"); //Contiene funcion que conecta a la base de datos

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if (isset($_GET['id'])) {
	$id_producto = $_GET['id'];

	if ($delete1 = mysqli_query($con, "DELETE FROM productos WHERE id_producto='" . $id_producto . "'")) {
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
	$q = mysqli_real_escape_string($con, (strip_tags($_REQUEST['q'], ENT_QUOTES)));
	$aColumns = array('codigo_producto', 'producto'); //Columnas de busqueda
	$sTable = "productos";
	$sWhere = "";
	if ($_GET['q'] != "") {
		$sWhere = "WHERE (";
		for ($i = 0; $i < count($aColumns); $i++) {
			$sWhere .= $aColumns[$i] . " LIKE '%" . $q . "%' OR ";
		}
		$sWhere = substr_replace($sWhere, "", -3);
		$sWhere .= ')';
	}
	$sWhere .= " order by id_producto DESC";
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
	$reload = '../../productos.php';
	//main query to fetch the data
	$sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
	$query = mysqli_query($con, $sql);
	//loop through fetched data
	if ($numrows > 0) {

	?>
		<div class="table-responsive">
			<table id="registrosTable" class="table ">
				<tr class="info">

					<th>Código</th>
					<th>Producto</th>
					<th>Peso estimado</th>
					<th>Peso mínimo</th>
					<th>Peso máximo</th>
					<th>Activo</th>
					<th>Grupo</th>
					<th>Subgrupo</th>
					<th>Tolerancia</th>
					<th>Tiempo</th>
					<th>Acciones</th>

				</tr>
				<?php
				while ($row = mysqli_fetch_array($query)) {
					// idUsu, usuario, nombreUsu, password, mail, idPerfil
					$id_producto = $row['id_producto'];
					$codigo_producto = $row['codigo_producto'];
					$nombre_producto = $row['producto'];
					$estimado_producto = $row['peso_estimado'];
					$minimo_producto = $row['peso_minimo'];
					$maximo_producto = $row['peso_maximo'];
					$estado_producto = $row['activo'];
					if ($estado_producto == 1) {
						$estado = "Si";
					} else {
						$estado = "No";
					}
					$grupo_producto = $row['grupo'];
					$subgrupo_producto = $row['subgrupo'];
					$tolerancia_producto = $row['tolerancia'];
					$tiempo_producto = $row['tiempo'];
				?>

					<input type="hidden" value="<?php echo $codigo_producto; ?>" id="codigo_producto<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $nombre_producto; ?>" id="nombre_producto<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $estimado_producto; ?>" id="estimado_producto<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $minimo_producto; ?>" id="minimo_producto<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $maximo_producto; ?>" id="maximo_producto<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $estado_producto; ?>" id="estado_producto<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $grupo_producto; ?>" id="grupo_producto<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $subgrupo_producto; ?>" id="subgrupo_producto<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $tolerancia_producto; ?>" id="tolerancia_producto<?php echo $id_producto; ?>">
					<input type="hidden" value="<?php echo $tiempo_producto; ?>" id="tiempo_producto<?php echo $id_producto; ?>">
				
					<tr>
						<td><?php echo $codigo_producto; ?></td>
						<td><?php echo $nombre_producto; ?></td>
						<td><?php echo $estimado_producto; ?></td>
						<td><?php echo $minimo_producto; ?></td>
						<td><?php echo $maximo_producto; ?></td>
						<td><?php echo $estado; ?></td>
						<td><?php echo $grupo_producto; ?></td>
						<td><?php echo $subgrupo_producto; ?></td>
						<td><?php echo $tolerancia_producto; ?></td>
						<td><?php echo $tiempo_producto; ?></td>
						<td><span>
								<a href="#" title='Editar producto' onclick="obtener_datos('<?php echo $id_producto; ?>');" data-toggle="modal" data-target="#modProducto"><i class="glyphicon glyphicon-edit"></i></a>
								<?php if ($_SESSION['user_admin2'] == '1') { ?>
								<a href="#" title='Borrar producto' onclick="eliminar('<?php echo $id_producto; ?>')"><i class="glyphicon glyphicon-trash" style="color: red;"></i> </a>
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
				No existen productos filtrados con el dato: <?php echo $_GET['q']; ?>
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