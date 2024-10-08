<div class="conteiner">
	<div class="row">

		<div class="col-md-1"></div> <!-- COLUMNA IZDA. GRID -->

		<div class="col"> <!-- COLUMNA CENTRAL GRID -->
			<div class="row">
				<div class="col-md-12" id="carrito">

					<div class="cart">
						<br>
						<br>
						<div class="card-registro">
							<div class="d-flex justify-content-center">
								<img src="assets/img/logo_empresa.png">
							</div>
						<div class="heading">
							<h2 class="tit text-center" id="h2" align="center">PRODUCTOS EN EL CARRITO</h2>
						</div>

						<br>
						<div class="text ml-2" align="center">
							<?php
							$session = session();
							$cart = \Config\Services::cart();
							$cart = $cart->contents();

							// Si el carrito está vacio, mostrar el siguiente mensaje
							if (empty($cart)) {
								echo 'Si desea agregar productos al carrito, seleccionelos desde ';
							}
							?>
							<a href="todos_p" class="btn btn-outline-primary">CATALOGO</a>
							<br><br>
						</div>
						<table class="table table-bordered table-light table-responsive-md" cellspacing="0">

							<?php // Todos los items de carrito en "$cart". 
							// if ($cart = $this->cart->contents()): //Esta función devuelve un array de los elementos agregados en el carro
							if ($cart == TRUE): //devuelve un array de los elementos agregados al carrito
								?>
								<tr class="text-center">
									<td>ID</td>
									<td>NOMBRE PRODUCTO</td>
									<td>PRECIO</td>
									<td>CANTIDAD</td>
									<td>SUBTOTAL</td>
									<td>OPERACION</td>
								</tr>

								<?php // Crea un formulario y manda los valores a carrito_controller/actualiza carrito
									echo form_open('actualizar');
									$gran_total = 0;
									$i = 1;

									foreach ($cart as $item):
										echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
										echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
										echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
										echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
										echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
										?>
									<tr>
										<td class="text-center"><?php echo $i++; ?></td>
										<td class="text-center"><?php echo $item['name']; ?></td>
										<td class="text-center">$<?php echo number_format($item['price'], 2); ?></td>
										<td class="text-center">
											<a style="font-size: 20px;" class="btn btn-secondary pt-0" href="<?= base_url("prodRestar?id=" . $item["rowid"]) ?>">-</a>
											<?= $item["qty"] ?>
											<a style="font-size: 20px;" class="btn btn-secondary pt-0" href="<?= base_url("prodAumentar ?id=" . $item["rowid"]) ?>">+</a>
										</td>
										<?php $gran_total = $gran_total + $item['subtotal']; ?>
										<td class="text-center">$<?php echo number_format($item['subtotal'], 2) ?></td>
										<td class="text-center"><a href="<?php echo base_url('eliminar?rowid=' . $item['rowid']); ?>"
												class="btn btn-danger">Eliminar</a></td>
									</tr>
								<?php
									endforeach;
									?>
									<tr class="table-light">
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td class="text-center">
										<h5>Total de compra: $<?php echo number_format($gran_total, 2);?></h5>
									</td>
									<td class="text-center">
										<!-- " Confirmar orden envia a carrito_controller/muestra_compra  -->
										<input type="button" class='btn btn-success'
											value="Confirmar Compra" onclick="window.location = 'comprar'">

									</td>

								

								</tr>

								<?php echo form_close();
							endif; ?>
						</table>
						</div>
						<div class="text-center">
                                <a class="btn btn-dark btn1 col-ml-2" href="<?php echo base_url('borrar') ?>"></i>Vaciar carrito</a>
                                <br><br>
                            </div>
						<div class="text-center">


						</div>
					</div>

					<br>

				</div>
			</div>

		</div>

		<div class="col-md-1"></div>

	</div>
</div>