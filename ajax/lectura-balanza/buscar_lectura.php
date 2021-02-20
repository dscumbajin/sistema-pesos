<?php
include('../is_logged.php'); //Archivo verifica que el usario que intenta acceder a la URL esta logueado
/* Connect To Database*/
require_once("../../config/db.php"); //Contiene las variables de configuracion para conectar a la base de datos
require_once("../../config/conexion.php"); //Contiene funcion que conecta a la base de datos
$desde = mysqli_real_escape_string($con, (strip_tags($_REQUEST['desde'], ENT_QUOTES)));
$hasta = mysqli_real_escape_string($con, (strip_tags($_REQUEST['hasta'], ENT_QUOTES)));

// Comprobamos que las fechas existan

if (isset($desde) == false) {

    $desde = $hasta;
}

if (isset($hasta) == false) {

    $hasta = $desde;
}

// Ejecutamos la consulta de busqueda
?>
<div class="table-responsive">
    <table id="registros" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Centro Costo</th>
                <th>Código producto</th>
                <th>Producto</th>
                <th>Peso</th>
                <th>Comprobante</th>
                <th>Lote</th>
                <th>Tipo</th>
                <th>Fecha</th>
                <th>Obs</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                $sql = " SELECT usuario, centroCosto, codigo_producto, producto, peso, comprobante, observacion, lote, tipo, fecha ";
                $sql .= " FROM lecturasbalanza, productos, usuarios, centrocostos ";
                $sql .= " WHERE lecturasbalanza.id_producto = productos.id_producto ";
                $sql .= " AND lecturasbalanza.id_usuario = usuarios.id_usuario ";
                $sql .= " AND usuarios.id_centroCosto = centrocostos.id_centroCosto ";
                $sql .= " AND fecha BETWEEN '$desde' AND '$hasta' ";
                $resultado = $con->query($sql);
            } catch (Exception $e) {
                $error = $e->getMessage();
                echo $error;
            }
            while ($balanza = $resultado->fetch_assoc()) { ?>
                <tr>

                    <td><?php echo $balanza['usuario']; ?></td>
                    <td><?php echo $balanza['centroCosto']; ?></td>
                    <td><?php echo $balanza['codigo_producto']; ?></td>
                    <td><?php echo $balanza['producto']; ?></td>
                    <td><?php echo $balanza['peso']; ?></td>
                    <td><?php echo $balanza['comprobante']; ?></td>
                    <td><?php echo $balanza['lote']; ?></td>
                    <td><?php echo $balanza['tipo']; ?></td>
                    <td><?php
                        $fecha =  $balanza['fecha'];
                        $date = new DateTime($fecha);
                        echo $date->format('d-m-Y');
                        ?></td>
                    <td><?php echo $balanza['observacion']; ?></td>

                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>
<script>
    $(function() {


        $("#registros").DataTable({
            "responsive": true,
            "autoWidth": true,
            "pageLength": 10,
            "language": {
                paginate: {
                    next: 'Siguiente',
                    previous: 'Anterior',
                    last: 'Último',
                    firts: 'Primero'
                },
                info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
                emptyTable: 'No hay registros',
                infoEmpty: 'Mostrando 0 to 0 of 0 Entradas',
                search: 'Buscar: ',
                lengthMenu: "Mostrar _MENU_ Entradas ",
                infoFiltered: " (Filtrado de un total de _MAX_  entradas)"
            },
            "buttons": ["excel"]
        }).buttons().container().appendTo('#registros_wrapper .col-md-6:eq(0)');
    });
</script>