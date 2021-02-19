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
                $('#tabla_resultados').html('');
                $('#agrega-registros').html(datos);
            }
        });
        // $('#tabla_resultados').show();
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

                $('#tabla_resultados').html('');
                $('#tabla_resultados').html(datos);
            }
        });
        // $('#tabla_resultados').show();
    });

    $('#limpiar').on('click', function() {
        $('#fecha_fin').val('');
        $('#fecha_inicio').val('');
        $('#tabla_resultados').html('');
        //  $('#tabla_resultados').hide();
    });

});