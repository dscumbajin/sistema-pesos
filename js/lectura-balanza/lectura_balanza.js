$(function() {

    $('#fecha_fin').attr("disabled", true);

    $('#fecha_inicio').on('change', function() {
        var desde = $('#fecha_inicio').val();
        var conDesde = desde + ' 00:00:01';
        var hasta = $('#fecha_fin').val();
        var conHasta = hasta + ' 23:59:59';
        console.log(conDesde);
        console.log(conHasta);
        var url = './ajax/lectura-balanza/buscar_lectura.php';

        $.ajax({
            tyoe: 'POST',
            url: url,
            data: 'desde=' + conDesde + '&hasta=' + conHasta,
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
        var conDesde = desde + ' 00:00:01';
        var hasta = $('#fecha_fin').val();
        var conHasta = hasta + ' 23:59:59';
        console.log(conDesde);
        console.log(conHasta);
        var url = './ajax/lectura-balanza/buscar_lectura.php';
        $.ajax({
            tyoe: 'POST',
            url: url,
            data: 'desde=' + conDesde + '&hasta=' + conHasta,
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