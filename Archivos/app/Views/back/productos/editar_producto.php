<body>

<div class="container mt-1 mb-0">
<br>
<center>
<div class="card-editar-prod" style="width: 50%;" >
    <div class= "card-header text-center" style="background-color: whitesmoke">
    <h2>EDITAR PRODUCTOS</h2>
    </div>

<?php $validation = \Config\Services::validation(); ?>
<form method="post" enctype='multipart/form-data' action="<?php echo base_url('modifica/'.$old['id']) ?>">
    <input type="hidden" name="id" id="id" value="<?php echo $old['id']; ?>">

<div class ="card-body" media="(max-width:768px)">
    <div class="mb-2">
    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
    <input name="nombre_prod" type="text"  class="form-control" placeholder="nombre" value="<?php echo $old['nombre_prod']; ?>" required="" >
    <!-- Error -->
        <?php if($validation->getError('nombre_prod')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('nombre_prod'); ?>
            </div>
        <?php }?>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Precio</label>
    <input type="text" name="precio"class="form-control" placeholder="precio" value="<?php echo $old['precio']; ?>" required="" >
    <!-- Error -->
        <?php if($validation->getError('precio')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('precio'); ?>
            </div>
        <?php }?>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Precio venta</label>
    <input name="precio_vta"  type="text" class="form-control"  placeholder="precio venta" value="<?php echo $old['precio_vta']; ?>" required="" >
    <!-- Error -->
        <?php if($validation->getError('precio_vta')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('precio_vta'); ?>
            </div>
        <?php }?>
</div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Stock</label>
    <input  tyupe="text" name="stock" class="form-control" placeholder="Stock" value="<?php echo $old['stock']; ?>" required="">
    <!-- Error -->
        <?php if($validation->getError('stock')) {?>
            <div class='alert alert-danger mt-2'>
                <?= $error = $validation->getError('stock'); ?>
            </div>
        <?php }?>
    </div>
    <div class="mb-3">
    <label>Stock minimo</label>

    <input type="text" name="stock_min" class="form-control" value="<?php echo $old['stock_min'];?>" required="">
    <?php if($validation->getError('stock_min')){?>
        <div class="alert alert-danger mt-2">
        <?=$error = $validation->getError('stock_min');?>


        </div>
    <?php }?>
    
</div>

<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">Categoria</label>
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
    <br>
    <br>

    <div class="form-group">
    <button type="submit"  class="btn btn-primary">Enviar</button>

    
</div>
            
</div>
</center>
</form>
<br>
<br>
</div>
</div>
</body>

