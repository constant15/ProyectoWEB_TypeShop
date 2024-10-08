<!-- crud de productos -->
<body>
    <div class="container" style=""> 
        <div class="well">
            <h1>LISTA DE PRODUCTOS</h1>
        </div>  
        <br> 
    
        <table class="table table-bordered"  style="">

    <thead style="color: #171342;  background-color: whitesmoke; text-align: center">
        <tr>
        <th>ID</th>
        <th>Producto</th>
        <th>Precio</th>
        <th>Precio venta</th>
        <th>Stock</th>
        <th>Stock-min</th>
        <th>Imagen</th>
        <th>Baja</th>
        <th>Opciones</th>
        </tr>
    </thead>
    
    
        <tbody style="color: #330251;  background-color: whitesmoke ">
        <div class="container">
        <?php if($productos):?>
            <?php foreach($productos as $prod):?>
                <tr>
                    <td ><?= $prod['id'];?></td>
                    <td ><?= $prod['nombre_prod'];?></td>
                    <td ><?= $prod['precio'];?></td>
                    <td ><?= $prod['precio_vta'];?></td>
                    <td ><?= $prod['stock'];?></td>
                    <td ><?= $prod['stock_min'];?></td>
                    <?php $img = $prod['imagen'];?>
                    <?php $id=$prod['id'];?>
                    <td > <img height="50px" width="75px" src="<?=base_url()?>/assets/uploads/<?=$img?>"></td>
                    <td><?= $prod['eliminado'];?></td>
                    <td >
        <a style="color: white" href="<?=base_url('edit/'.$prod['id']) ; ?>" class="btn btn-secondary">Editar</a>
        <?php if($prod ['eliminado'] == 'NO' ) { ?>
        <a style="color: white" href=" <?=base_url('elimin/' .$prod['id']) ; ?>" class= "btn btn-danger">Eliminar</a>
        <?php } else {?>
            <a style="color: white" href="<?=base_url('reponer/' .$prod['id']) ; ?> " class="btn btn-success" >Restaurar</a>
            <?php } ?>
        </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </div>
        </tbody> 


    </table>     
    <div style="text-align: center">
        <br>
        <br>
        <a type="button"  class="btn btn-primary" href="<?php echo base_url('produ-form'); ?>">Agregar Producto</a>
    <br>
    <br>
    </div>
    </div>
</body>
