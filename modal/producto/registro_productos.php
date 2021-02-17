	<?php
		if (isset($con))
		{
	?>
	<!-- Modal -->
	<div class="modal fade" id="nuevoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
	                        aria-hidden="true">&times;</span></button>
	                <h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar producto</h4>
	            </div>
	            <div class="modal-body">
	                <form  class="form-horizontal" method="post" id="guardar_producto" name="guardar_producto">
	                    <div id="resultados_ajax"></div>

	                     <div class="form-group">
	                        <label for="codigo" class="col-sm-3 control-label">Código</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="codigo" name="codigo" required>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="producto" class="col-sm-3 control-label">Producto</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="producto" name="producto" required>
	                        </div>
	                    </div>

						<div class="form-group">
	                        <label for="peso_estimado" class="col-sm-3 control-label">Peso estimado</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="peso_estimado" name="peso_estimado" required>
	                        </div>
	                    </div>

						<div class="form-group">
	                        <label for="peso_minimo" class="col-sm-3 control-label">Peso mínimo</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="peso_minimo" name="peso_minimo" required>
	                        </div>
	                    </div>

						<div class="form-group">
	                        <label for="peso_maximo" class="col-sm-3 control-label">Peso máximo</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="peso_maximo" name="peso_maximo" required>
	                        </div>
	                    </div>


	                    <div class="form-group">
	                        <label for="activo" class="col-sm-3 control-label">Activo</label>
	                        <div class="col-sm-8">
	                            <select class="form-control" id="activo" name="activo" required>
	                                <option value="">-- Selecciona estado --</option>
	                                <option value="1" selected>Si</option>
	                                <option value="0">No</option>
	                            </select>
	                        </div>
	                    </div> 

						<div class="form-group">
	                        <label for="grupo" class="col-sm-3 control-label">Grupo</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="grupo" name="grupo" placeholder="25" >
	                        </div>
	                    </div>

						<div class="form-group">
	                        <label for="subgrupo" class="col-sm-3 control-label">Subgrupo</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="subgrupo" name="subgrupo" placeholder="4" >
	                        </div>
	                    </div>

						<div class="form-group">
	                        <label for="tolerancia" class="col-sm-3 control-label">Tolerancia</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="tolerancia" name="tolerancia" placeholder="30.00" >
	                        </div>
	                    </div>

						<div class="form-group">
	                        <label for="tiempo" class="col-sm-3 control-label">Tiempo</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="tiempo" name="tiempo" placeholder="10000">
	                        </div>
	                    </div>

	            </div>
	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	                <button type="submit" class="btn btn-primary" id="guardar_datos">Guardar datos</button>
	            </div>
	            </form>
	        </div>
	    </div>
	</div>
	<?php
		}
	?>