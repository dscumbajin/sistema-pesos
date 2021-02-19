	<?php
	if (isset($con)) {
	?>
		<!-- Modal -->
		<div class="modal fade" id="modUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar usuario</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" id="editar_usuario" name="editar_usuario">
							<div id="resultados_ajax2"></div>

							<input type="hidden" name="mod_id" id="mod_id">
							
							<div class="form-group">
								<label for="mod_usuario" class="col-sm-3 control-label">Usuario</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="mod_usuario" name="mod_usuario" required>

								</div>
							</div>

							<div class="form-group">
								<label for="mod_password" class="col-sm-3 control-label">Password</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" id="mod_password" name="mod_password" required>
								</div>
							</div>

							<div class="form-group">
								<label for="mod_id_centro_costo" class="col-sm-3 control-label">Centro de costo</label>
								<div class="col-sm-8">
									<select class="form-control" id="mod_id_centro_costo" name="mod_id_centro_costo" required>
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
								<label for="mod_perfil" class="col-sm-3 control-label">Administrador</label>
								<div class="col-sm-8">
									<select class="form-control" id="mod_perfil" name="mod_perfil" required>
										<option value="">-- Selecciona perfil --</option>
										<option value="0" selected>No</option>
										<option value="1">Si</option>
									</select>
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