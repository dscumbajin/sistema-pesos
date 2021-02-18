	<?php
	if (isset($con)) {
	?>
		<!-- Modal -->
		<div class="modal fade" id="modCentroCosto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar Centro de Costo</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" id="editar_centro_costo" name="editar_centro_costo">
							<div id="resultados_ajax2"></div>
							<input type="hidden" name="mod_id" id="mod_id">

							<div class="form-group">
								<label for="mod_centroCosto" class="col-sm-3 control-label">Centro de Costo</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mod_centroCosto" name="mod_centroCosto" required style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
								</div>
							</div>

							<div class="form-group">
								<label for="mod_subcentro_costo" class="col-sm-3 control-label">Subcentro</label>
								<div class="col-sm-8">
									<input type="number" min="0" class="form-control" id="mod_subcentro_costo" name="mod_subcentro_costo" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="mod_etiqueta_ingreso" class="col-sm-3 control-label">Etiqueta Ingreso</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mod_etiqueta_ingreso" name="mod_etiqueta_ingreso" required style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
								</div>
							</div>

							<div class="form-group">
								<label for="mod_secuencial_ingreso" class="col-sm-3 control-label">Secuencial Ingreso</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" id="mod_secuencial_ingreso" name="mod_secuencial_ingreso" required>
								</div>
							</div>

							<div class="form-group">
								<label for="mod_etiqueta_egreso" class="col-sm-3 control-label">Etiqueta Egreso</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mod_etiqueta_egreso" name="mod_etiqueta_egreso" required style="text-transform:uppercase;" value=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
								</div>
							</div>

							<div class="form-group">
								<label for="mod_secuencial_egreso" class="col-sm-3 control-label">Secuencial Egreso</label>
								<div class="col-sm-8">
									<input type="number" class="form-control" id="mod_secuencial_egreso" name="mod_secuencial_egreso" required>
								</div>
							</div>

							<div class="form-group">
								<label for="mod_activo" class="col-sm-3 control-label">Activo</label>
								<div class="col-sm-8">
									<select class="form-control" id="mod_activo" name="mod_activo" required>
										<option value="">-- Selecciona estado --</option>
										<option value="1" selected>Si</option>
										<option value="0">No</option>
									</select>
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