
<body>
<div> 
<br>

<div class="row justify-content-md-center"  >
	<div class="card-A-P" style="width: 50%;" >
		<div class= "card-header text-center" style="whitesmoke">
			<h2>Agregar Productos</h2>
		</div>
	
<?php $validation = \Config\Services::validation(); ?>
    <form method="post" enctype ="multipart/form-data" action="<?php echo base_url('/enviar-prod') ?>">

<div class ="card-Agr-Prod" style="whitesmoke" media="(max-width:768px)">
	<div class="mb-2">
    <label for="exampleFormControlInput1" class="form-label">Nombre producto</label>
    <input name="nombre_prod" type="text"  class="form-control"  >
    <!-- Error -->
        <?php if($validation->getError('nombre_prod')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('nombre_prod'); ?>
            </div>
        <?php }?>
	</div>
	<div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Categoria</label>
    <div>     
        <select style="cursor:pointer;" name="categoria_id">
            <option value="0" selected>Elegir categoria</option>
            <option value="1">1-SAMSUNG</option>
            <option value="2">2-APPLE</option>
            <option value="3">3-MOTOROLA</option>
            <option value="4">4-XIAOMI</option>
        </select>
    </div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Precio</label>
    <input name="precio"  type="text" class="form-control"   >
    <!-- Error -->
        <?php if($validation->getError('precio')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('precio'); ?>
            </div>
        <?php }?>
	</div>
        <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Precio venta</label>
    <input  type="text" name="precio_vta" class="form-control" >
    <!-- Error -->
        <?php if($validation->getError('precio_vta')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('precio_vta'); ?>
            </div>
        <?php }?>
	</div>
	
	<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Stock</label>
    <input name="stock" type="stock" class="form-control"  >
    <!-- Error -->
        <?php if($validation->getError('stock')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('stock'); ?>
            </div>
        <?php }?>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Stock Minimo</label>
    <input name="stock_min" type="text" class="form-control" >
    <!-- Error -->
        <?php if($validation->getError('stock_min')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('stock_min'); ?>
            </div>
        <?php }?>
    </div>
    <div class="col-12 col-sm-6">
                    <label> Imagen </label>
                    <input class="form-control" id="imagen" name="imagen" type="file"> 
                    <?php 
                        if(isset($errores["imagen"]) ){
                            echo "<div class='errores'>".$errores["imagen"]."</div>";
                        }
                    ?>
                </div>
                <br>
            <input type="submit" value="Guardar" class="btn btn-primary">
                <input type="reset" value="Cancelar" class="btn btn-dark">
                <br><br>
</div>
</form>

</div>
</div>
<br>
<br>
</body>