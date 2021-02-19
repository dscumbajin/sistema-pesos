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

<table id="registros" class="table table-bordered table-striped">
    <thead>
        <tr>

            <th>id_usuario</th>
            <th>id_producto</th>
            <th>peso</th>
            <th>comprobante</th>
            <th>observacion</th>
            <th>lote</th>
            <th>tipo</th>
        </tr>
    </thead>
    <tbody>
        <?php
        try {
            $sql = "SELECT * FROM lecturasbalanza WHERE fecha BETWEEN '$desde' AND '$hasta' ";
            $resultado = $con->query($sql);
        } catch (Exception $e) {
            $error = $e->getMessage();
            echo $error;
        }
        while ($balanza = $resultado->fetch_assoc()) { ?>
            <tr>

                <td ><?php echo $balanza['id_usuario']; ?></td>
                <td ><?php echo $balanza['id_producto']; ?></td>
                <td ><?php echo $balanza['peso']; ?></td>
                <td ><?php echo $balanza['comprobante']; ?></td>
                <td ><?php echo $balanza['observacion']; ?></td>
                <td ><?php echo $balanza['lote']; ?></td>
                <td ><?php echo $balanza['tipo']; ?></td>
              
                
            </tr>
        <?php } ?>
    </tbody>

</table>

<script>
       $("#registros").DataTable({
        "responsive": true,
        "autoWidth": false,
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
        }
    });

</script>