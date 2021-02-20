$(function() {

    $('#fecha_fin').attr("disabled", true);

    $('#fecha_inicio').on('change', function() {
        var desde = $('#fecha_inicio').val();
        var hasta = $('#fecha_fin').val();
        var url = './ajax/lectura-balanza/buscar_lectura.php';

        $.ajax({
            tyoe: 'POST',
            url: url,
            data: 'desde=' + desde + '&hasta=' + hasta,
            beforeSend: function(objeto) {
                $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
            },
            success: function(datos) {
                $('#tabla_resultados').html('');
                $('#tabla_resultados').html(datos);
                $('#fecha_fin').attr("disabled", false);
                $('#loader').html('');
            }
        });
        // $('#tabla_resultados').show();
    });

    $('#fecha_fin').on('change', function() {
        var desde = $('#fecha_inicio').val();
        var hasta = $('#fecha_fin').val();
        var url = './ajax/lectura-balanza/buscar_lectura.php';
        $.ajax({
            tyoe: 'POST',
            url: url,
            data: 'desde=' + desde + '&hasta=' + hasta,
            beforeSend: function(objeto) {
                $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
            },
            success: function(datos) {

                $('#tabla_resultados').html('');
                $('#tabla_resultados').html(datos);
                $('#loader').html('');
            }
        });
        // $('#tabla_resultados').show();
    });

    $('#limpiar').on('click', function() {
        $('#fecha_fin').val('');
        $('#fecha_inicio').val('');
        $('#tabla_resultados').html('');
        $('#fecha_fin').attr("disabled", true);
    });

});