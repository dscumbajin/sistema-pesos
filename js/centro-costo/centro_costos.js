		$(document).ready(function() {
		    load(1);
		});

		function load(page) {
		    var q = $("#q").val();
		    $("#loader").fadeIn('slow');
		    $.ajax({
		        url: './ajax/centro-costo/buscar_centro_costos.php?action=ajax&page=' + page + '&q=' + q,
		        beforeSend: function(objeto) {
		            $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
		        },
		        success: function(data) {
		            $(".outer_div").html(data).fadeIn('slow');
		            $('#loader').html('');

		        }
		    })
		}

		function eliminar(id) {
		    var q = $("#q").val();
		    if (confirm("Realmente deseas eliminar el centro de costo")) {
		        $.ajax({
		            type: "GET",
		            url: "./ajax/centro-costo/buscar_centro_costos.php",
		            data: "id=" + id,
		            "q": q,
		            beforeSend: function(objeto) {
		                $("#resultados").html("Mensaje: Cargando...");
		            },
		            success: function(datos) {
		                $("#resultados").html(datos);
		                load(1);
		            }
		        });
		    }
		}

		$("#guardar_centro_costo").submit(function(event) {
		    $('#guardar_datos').attr("disabled", true);

		    var parametros = $(this).serialize();
		    $.ajax({
		        type: "POST",
		        url: "ajax/centro-costo/nuevo_centro_costo.php",
		        data: parametros,
		        beforeSend: function(objeto) {
		            $("#resultados_ajax").html("Mensaje: Cargando...");
		        },
		        success: function(datos) {
		            $("#resultados_ajax").html(datos);
		            $('#guardar_datos').attr("disabled", false);
		            load(1);
		        }
		    });
		    event.preventDefault();
		})

		$("#editar_centro_costo").submit(function(event) {
		    $('#actualizar_datos').attr("disabled", true);

		    var parametros = $(this).serialize();
		    $.ajax({
		        type: "POST",
		        url: "ajax/centro-costo/editar_centro_costo.php",
		        data: parametros,
		        beforeSend: function(objeto) {
		            $("#resultados_ajax2").html("Mensaje: Cargando...");
		        },
		        success: function(datos) {
		            $("#resultados_ajax2").html(datos);
		            $('#actualizar_datos').attr("disabled", false);
		            load(1);
		        }
		    });
		    event.preventDefault();
		})

		function obtener_datos(id) {
		    var centroCosto = $("#centroCosto" + id).val();
		    var subcentro_costo = $("#subcentro_costo" + id).val();
		    var etiqueta_ingreso = $("#etiqueta_ingreso" + id).val();
		    var secuencial_ingreso = $("#secuencial_ingreso" + id).val();
		    var etiqueta_egreso = $("#etiqueta_egreso" + id).val();
		    var secuencial_egreso = $("#secuencial_egreso" + id).val();
		    var activo = $("#activo" + id).val();
		    $("#mod_activo").val(activo);
		    $("#mod_secuencial_egreso").val(secuencial_egreso);
		    $("#mod_etiqueta_egreso").val(etiqueta_egreso);
		    $("#mod_secuencial_ingreso").val(secuencial_ingreso);
		    $("#mod_etiqueta_ingreso").val(etiqueta_ingreso);
		    $("#mod_subcentro_costo").val(subcentro_costo);
		    $("#mod_centroCosto").val(centroCosto);
		    $("#mod_id").val(id);

		}