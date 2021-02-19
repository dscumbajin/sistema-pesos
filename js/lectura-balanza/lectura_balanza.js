$(function() {
    $('#fecha_inicio').on('change', function() {
        var desde = $('#fecha_inicio').val();
        var hasta = $('#fecha_fin').val();
        var url = './ajax/lectura-balanza/buscar_lectura.php';

        console.log(desde);
        console.log(hasta);

        $.ajax({
            tyoe: 'POST',
            url: url,
            data: 'desde=' + desde + '&hasta=' + hasta,
            success: function(datos) {
                $('#agrega-registros').html(datos);
            }
        });
    });

    $('#fecha_fin').on('change', function() {
        var desde = $('#fecha_inicio').val();
        var hasta = $('#fecha_fin').val();
        var url = './ajax/lectura-balanza/buscar_lectura.php';

        console.log(desde);
        console.log(hasta);

        $.ajax({
            tyoe: 'POST',
            url: url,
            data: 'desde=' + desde + '&hasta=' + hasta,
            success: function(datos) {
                $('#tabla_resultados').html(datos);
            }
        });
    });

    $('#limpiar').on('click', function() {
        $('#fecha_fin').val('');
        $('#fecha_inicio').val('');
    });

});