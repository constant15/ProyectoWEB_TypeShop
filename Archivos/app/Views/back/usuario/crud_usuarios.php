
<?php if(!$users ){ ?>

<div class="container" >
    <div class="well">
        <h1>No hay Usuarios</h1>
    </div>
    
</div>

<?php } else { ?>

<div class="container"> 
    <div class="well">
        <br>
        <br>
    <h1>USUARIOS REGISTRADOS</h1>
</div>  


<br> <br>
    
<table class="table table-bordered"  style="background-color: whitesmoke; ">

    <thead>
        <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Email</th>
        <th>Usuario</th>
        <th>Baja</th>
        <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
    <div class="container">
        
    <?php if($users):?>
            <?php foreach($users as $lib):?>
                <tr>
                    <td><?= $lib['id_usuario'];?></td>
                    <td><?= $lib['nombre'];?></td>
                    <td><?= $lib['apellido'];?></td>
                    <td><?= $lib['email'];?></td>
                    <td><?= $lib['usuario'];?></td>
                    <td><?=$lib['baja'];?></td>
                    <td>
                    <a type="button" class="btn btn-secondary" href="<?php echo base_url('editar/'.$lib['id_usuario']); ?>">Modificar</a>
        <?php if($lib ['baja'] == 'NO' ) { ?>
            
            <a style="color: white" href="<?=base_url('deletelogico/' .$lib['id_usuario']) ; ?> " class="btn btn-danger" >Eliminar</a>
        <?php } else {?>
            
            <a style="color: white" href="<?=base_url('restaurar/' .$lib['id_usuario']) ; ?> " class="btn btn-success" >Restaurar</a>
        <?php } ?>
        </td>
                </tr>
            <?php endforeach; ?>
    <?php endif; ?>
    </div>
        </tbody> 
    </table>   
    <div  style="text-align: center">
    <br>
    <br>

    <a type="button" class="btn btn-primary" href="<?php echo base_url('users-form'); ?>">Agregar Usuario</a>
    <br>
    <br>
    </div>

    </div>
</div>
<?php } ?>


