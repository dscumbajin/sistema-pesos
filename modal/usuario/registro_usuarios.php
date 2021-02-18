	<?php
	if (isset($con)) {
	?>
		<!-- Modal -->
		<div class="modal fade" id="nuevoUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Agregar usuario</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" id="guardar_usuario" name="guardar_usuario">
							<div id="resultados_ajax"></div>

							<div class="form-group">
								<label for="usuario" class="col-sm-3 control-label">Usuario</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="usuario" name="usuario" required>
								</div>
							</div>

							<div class="form-group">
								<label for="password" class="col-sm-3 control-label">Password</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" id="password" name="password" required>
								</div>
							</div>

							<div class="form-group">
								<label for="centroCosto" class="col-sm-3 control-label">Centro de costo</label>
								<div class="col-sm-8">
									<select class="form-control" id="centroCosto" name="centroCosto" required>
										<?php
										try {
											$sql = " SELECT * FROM centrocostos";

											$resultado = $con->query($sql);
											while ($centro_costo = $resultado->fetch_assoc()) { ?>
												<option value="<?php echo $centro_costo['id_centroCosto']; ?>">
													<?php echo $centro_costo['centroCosto'] . " - " . $centro_costo['subcentro_costo']; ?></option>
										<?php }
										} catch (Exception $e) {
											echo "Error: " . $e->getMessage();
										}
										?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="admin" class="col-sm-3 control-label">Administrador</label>
								<div class="col-sm-8">
									<select class="form-control" id="admin" name="admin" required>
										<option value="">-- Selecciona perfil --</option>
										<option value="0" selected>No</option>
										<option value="1" >Si</option>			
									</select>
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