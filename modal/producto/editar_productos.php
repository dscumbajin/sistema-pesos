	<?php
	if (isset($con)) {
	?>
		<!-- Modal -->
		<div class="modal fade" id="modProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar producto</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" id="editar_producto" name="editar_producto">
							<div id="resultados_ajax2"></div>
							<input type="hidden" name="mod_id" id="mod_id">

					
							<div class="form-group">
	                        <label for="mod_codigo" class="col-sm-3 control-label">Código</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="mod_codigo" name="mod_codigo" required>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="mod_nombre" class="col-sm-3 control-label">Producto</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="mod_nombre" name="mod_nombre" required>
	                        </div>
	                    </div>

						<div class="form-group">
	                        <label for="mod_estimado" class="col-sm-3 control-label">Peso estimado</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="mod_estimado" name="mod_estimado" required>
	                        </div>
	                    </div>

						<div class="form-group">
	                        <label for="mod_minimo" class="col-sm-3 control-label">Peso mínimo</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="mod_minimo" name="mod_minimo" required>
	                        </div>
	                    </div>

						<div class="form-group">
	                        <label for="mod_maximo" class="col-sm-3 control-label">Peso máximo</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="mod_maximo" name="mod_maximo" required>
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="mod_estado" class="col-sm-3 control-label">Activo</label>
	                        <div class="col-sm-8">
	                            <select class="form-control" id="mod_estado" name="mod_estado" required>
	                                <option value="">-- Selecciona estado --</option>
	                                <option value="1" selected>Si</option>
	                                <option value="0">No</option>
	                            </select>
	                        </div>
	                    </div> 

						<div class="form-group">
	                        <label for="mod_grupo" class="col-sm-3 control-label">Grupo</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="mod_grupo" name="mod_grupo" required placeholder="25" >
	                        </div>
	                    </div>

						<div class="form-group">
	                        <label for="mod_subgrupo" class="col-sm-3 control-label">Subgrupo</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="mod_subgrupo" name="mod_subgrupo" required placeholder="4" >
	                        </div>
	                    </div>

						<div class="form-group">
	                        <label for="mod_tolerancia" class="col-sm-3 control-label">Tolerancia</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="mod_tolerancia" name="mod_tolerancia" required placeholder="30.00" >
	                        </div>
	                    </div>

						<div class="form-group">
	                        <label for="mod_tiempo" class="col-sm-3 control-label">Tiempo</label>
	                        <div class="col-sm-8">
	                            <input type="text" class="form-control" id="mod_tiempo" name="mod_tiempo" required placeholder="10000">
	                        </div>
	                    </div>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary" id="actualizar_datos">Actualizar datos</button>
					</div>
					</form>
				</div>
			</div>
		</div>
	<?php
	}
	?>