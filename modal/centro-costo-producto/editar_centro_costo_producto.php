	<?php
	if (isset($con)) {
	?>
		<!-- Modal -->
		<div class="modal fade" id="modCentroCostoProducto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel"><i class='glyphicon glyphicon-edit'></i> Editar asignación Producto a Centro de Costo</h4>
					</div>
					<div class="modal-body">
						<form class="form-horizontal" method="post" id="editar_centro_costo_producto" name="editar_centro_costo_producto">
							<div id="resultados_ajax2"></div>
							<input type="hidden" name="mod_id" id="mod_id">

							<div class="form-group">
								<label for="mod_id_producto" class="col-sm-3 control-label">Producto</label>
								<div class="col-sm-8">
									<select class="form-control  select2-primary" id="mod_id_producto" name="mod_id_producto" required>
										<?php
										try {
											$sql = " SELECT * FROM productos";

											$resultado = $con->query($sql);
											while ($producto = $resultado->fetch_assoc()) { ?>
												<option value="<?php echo $producto['id_producto']; ?>">
													<?php echo $producto['codigo_producto'] . " - " . $producto['producto']; ?></option>
										<?php }
										} catch (Exception $e) {
											echo "Error: " . $e->getMessage();
										}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label for="mod_id_centroCosto" class="col-sm-3 control-label">Centro de costo</label>
								<div class="col-sm-8">
									<select class="form-control  select2-primary" id="mod_id_centroCosto" name="mod_id_centroCosto" required>
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