
<!-- NAVBAR-->

<!-- barra de navegacion -->
<?php $session= session();
$nombre= $session->get('nombre');
$perfil=$session->get('perfil_id');?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand"><img src="<?php echo base_url("assets/img/logo_empresa.png")?>"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <!-- navbar para administrador -->
        <?php if(session ('perfil_id') =='1'){ ?>
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ">
                <a class="nav-link " href="#" tabindex="-1" aria-disabled="true" ><?php echo "Bienvenido Admin ".$nombre?></a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" aria-current="page" href="<?php echo base_url ('userlist');?>">CRUD Usuarios</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" aria-current="page" href="<?php echo base_url ('crear');?>">CRUD Productos</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="<?php echo base_url ('consulta');?>">Consultas</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link " aria-current="page" href="<?php echo base_url ('muestraventa');?>">Gestión de ventas</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="<?php echo base_url('logout');?>" tabindex="-1" aria-disabled="true">Cerrar Sesión</a>
            </li>
        </ul>
    <!-- navbar para clientes -->
    <?php } else if(session ('perfil_id') == '2') {?>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class ="nav-link" href="#" tabindex = "-1" aria-disabled ="true"> <?php echo "Bienvenido  ".$nombre?> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('todos_p');?>">Catalogo</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('muestro');?>">Carrito</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('compras_cliente');?>">Mis compras</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('quienes_somos');?>">Quiénes somos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('comercializacion');?>">Comercialización</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('informacion_de_contacto');?>">Contacto</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('terminos_y_usos');?>">Términos y uso</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url ('logout');?>" tabindex="-1" aria-disabled="true"> Cerrar Sesion </a>
        </li>
    </ul>
    </div>

<?php } else {?>
    <!--Navbar para no clientes-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('/');?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('quienes_somos');?>">Quiénes Somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=<?php echo base_url('comercializacion');?>>Comercialización</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('informacion_de_contacto');?>">Contacto</a>
                </li>    
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('terminos_y_usos');?>">Términos y usos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('registrarse');?>">Registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('login');?>">Ingresar</a>
                </li>
            </ul>
        </div>
        </div>
    </nav>
<?php } ?>
</div>
</div>
</nav>