	<?php
	if (isset($con)) {
	?>
		<!-- Modal -->
		<div class="modal fade" id="nuevoCentroCosto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar Centro de Costo</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" id="guardar_centro_costo" name="guardar_centro_costo">
							<div id="resultados_ajax"></div>

							<div class="form-group">
								<label for="centroCosto" class="col-sm-3 control-label">Centro de Costo</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="centroCosto" name="centroCosto" required style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
								</div>
							</div>

							<div class="form-group">
								<label for="subcentro" class="col-sm-3 control-label">Subcentro</label>
								<div class="col-sm-8">
									<input type="number" min="0" class="form-control" id="subcentro" name="subcentro" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="etiqueta_ingreso" class="col-sm-3 control-label">Etiqueta Ingreso</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="etiqueta_ingreso" name="etiqueta_ingreso" required style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
								</div>
							</div>

							<div class="form-group">
								<label for="secuencial_ingreso" class="col-sm-3 control-label">Secuencial Ingreso</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" id="secuencial_ingreso" name="secuencial_ingreso" required>
								</div>
							</div>

							<div class="form-group">
								<label for="etiqueta_egreso" class="col-sm-3 control-label">Etiqueta Egreso</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="etiqueta_egreso" name="etiqueta_egreso" required style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
								</div>
							</div>

							<div class="form-group">
								<label for="secuencial_egreso" class="col-sm-3 control-label">Secuencial Egreso</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" id="secuencial_egreso" name="secuencial_egreso" required>
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