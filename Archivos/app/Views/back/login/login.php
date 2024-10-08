<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="container mt-6 mb-1 d-flex justify-content-center">
        <div class="card-registro" style="width: 50%;">
        <div class="d-flex justify-content-center">
            <img src="assets/img/logo_empresa.png">
        </div>
            <h2>Iniciar sesión</h2>
                <?php if(session()->getFlashdata('msg')): ?>
                <div class="alert alert-primary">
                <?= session()->getFlashdata('msg') ?>
            </div>
            <?php endif;?>
            <form method="post" action="<?php echo base_url('/enviarlogin') ?>">
                <div class ="card-body" media="(max-width:768px)">
                    <div class="mb-3">
                    <label for="InputForEmail" class="form-label">Correo Electrónico </label> 
                    <input type="email" name="email" class="form-control" id="InputForEmail" required="">
                    </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label" >Contraseña</label>
                    <input type="password" name="pass" class="form-control" id="InputForPassword" required="">
                </div>    
                <h6>¿No tiene una cuenta? <a href="<?php echo base_url('registrarse');?>"aqui.>Cree una.</a></h6>
                <br>
                    <?php echo form_submit('submit', 'Iniciar',"class='btn btn-success' mt-3"); ?> <br><br>
                    <?php echo form_reset ('reset', 'Cancelar', "class='btn btn-dark'"); ?><br>
                    <?php echo form_close(); ?>
                </form>
            </div> 
        </div>
    </div>
</body>
