		$(document).ready(function() {
		    load(1);
		});

		function load(page) {
		    var q = $("#q").val();
		    $("#loader").fadeIn('slow');
		    $.ajax({
		        url: './ajax/producto/buscar_productos.php?action=ajax&page=' + page + '&q=' + q,
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
		    if (confirm("Realmente deseas eliminar el producto")) {
		        $.ajax({
		            type: "GET",
		            url: "./ajax/producto/buscar_productos.php",
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

		$("#guardar_producto").submit(function(event) {
		    $('#guardar_datos').attr("disabled", true);

		    var parametros = $(this).serialize();
		    $.ajax({
		        type: "POST",
		        url: "ajax/producto/nuevo_producto.php",
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

		$("#editar_producto").submit(function(event) {
		    $('#actualizar_datos').attr("disabled", true);

		    var parametros = $(this).serialize();
		    $.ajax({
		        type: "POST",
		        url: "ajax/producto/editar_producto.php",
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
		    var codigo_producto = $("#codigo_producto" + id).val();
		    var nombre_producto = $("#nombre_producto" + id).val();
		    var estimado_producto = $("#estimado_producto" + id).val();
		    var minimo_producto = $("#minimo_producto" + id).val();
		    var maximo_producto = $("#maximo_producto" + id).val();
		    var estado_producto = $("#estado_producto" + id).val();
		    var grupo_producto = $("#grupo_producto" + id).val();
		    var subgrupo_producto = $("#subgrupo_producto" + id).val();
		    var tolerancia_producto = $("#tolerancia_producto" + id).val();
		    var tiempo_producto = $("#tiempo_producto" + id).val();

		    $("#mod_codigo").val(codigo_producto);
		    $("#mod_nombre").val(nombre_producto);
		    $("#mod_estimado").val(estimado_producto);
		    $("#mod_minimo").val(minimo_producto);
		    $("#mod_maximo").val(maximo_producto);
		    $("#mod_estado").val(estado_producto);
		    $("#mod_grupo").val(grupo_producto);
		    $("#mod_subgrupo").val(subgrupo_producto);
		    $("#mod_tolerancia").val(tolerancia_producto);
		    $("#mod_tiempo").val(tiempo_producto);
		    $("#mod_id").val(id);

		}