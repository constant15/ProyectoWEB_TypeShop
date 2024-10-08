<body>
    <br>
    <br>

<div class="container mt-1 mb-0">
<center>
    <br>
    <br>
    <div class="card-agr-usu" style="width: 50%;" >
    <div class= "card-header text-center" style="background-color: whitesmoke">
    <h2>Crear Usuario </h2>
    </div>

<?php $validation = \Config\Services::validation(); ?>
    <form method="post" action="<?php echo base_url('/enviar') ?>">

<div class ="card-body" style="background-color: whitesmoke" media="(max-width:768px)">
    <div class="mb-2">
    <label for="exampleFormControlInput1" class="form-label">Nombre</label>
    <input name="nombre" type="text"  class="form-control" placeholder="nombre" required="" >
    <!-- Error -->
        <?php if($validation->getError('nombre')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('nombre'); ?>
            </div>
        <?php }?>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Apellido</label>
    <input type="text" name="apellido"class="form-control" placeholder="apellido" required="">
    <!-- Error -->
        <?php if($validation->getError('apellido')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('apellido'); ?>
            </div>
        <?php }?>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Email</label>
    <input name="email"  type="femail" class="form-control"  placeholder="correo@algo.com" required="" >
    <!-- Error -->
        <?php if($validation->getError('email')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('email'); ?>
            </div>
        <?php }?>
    </div>
    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Usuario</label>
    <input  tyupe="text" name="usuario" class="form-control" placeholder="usuario" required="">
    <!-- Error -->
        <?php if($validation->getError('usuario')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('usuario'); ?>
            </div>
        <?php }?>
</div>


    <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">Contraseña</label>
    <input name="pass" type="pass" class="form-control"  placeholder="contraseña" required="">
    <!-- Error -->
        <?php if($validation->getError('pass')) {?>
            <div class='alert alert-danger mt-2'>
            <?= $error = $validation->getError('pass'); ?>
            </div>
        <?php }?>
    </div>
    <div>     
        <select style="cursor:pointer;" name="perfil_id">
            <option value="0" selected>Elegir perfil</option>
            <option value="1">1-Administrador</option>
        <option value="2">2-Cliente</option>
        </select>
    </div>
    <br>

    <input type="submit" value="Guardar" class="btn btn-success">


</div>
</center>  
</form>
<br>
<br>
</div>
</div>
</body>