
	<div class="container" style="">
		<br><br>
		<h1 class="text-center">MIS COMPRAS</h1>
		<br>
				<table class="table table-light" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr class="text-center">
							<th>N° PEDIDO</th>
							<th>NOMBRE PRODUCTO</th>
							<th>CANTIDAD</th>
							<th>COSTO UNITARIO</th>
							<th>COSTO SUB-TOTAL</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$costo_total = 0;
						if ($detalles) { ?>
							<?php foreach ($detalles as $detalle) { ?>

								<tr class="text-center">
									<td> <?php echo $detalle['id_venta']; ?></td>
									<td> <?php echo $detalle['nombre_prod']; ?></td>
									<td> <?php echo $detalle['detalle_cantidad']; ?></td>
									<td> <?php echo $detalle['detalle_precio']; ?></td>
									<td> <?php
											$costo_total = $costo_total + $detalle['detalle_precio'] * $detalle['detalle_cantidad'];
											echo $detalle['detalle_precio'] * $detalle['detalle_cantidad'];
											?>
									</td>

								</tr>
						<?php }
						} ?>
					</tbody>
				</table>
				<div class="text-center">
					<h3 class="m-2 btn btn-primary">TOTAL GASTADO: $<?php echo $costo_total ?></h3>
				</div>
			</div>
