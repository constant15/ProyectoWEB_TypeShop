<section>
<div>  
<?php $validation = \Config\Services::validation(); ?>
    <br>  
    <br>
    <br>
    <div class="container_Cont">
        <div class="card_contacto shadow col-xs-12 col-sm-6 col-md-6 col-lg-4 p-4">
        <div class="d-flex justify-content-center">
            <img src="assets/img/logo_empresa.png">
        </div>
        <h2>Contacto</h2>
            <div class="mb-1">
            <form method="post" action="<?php echo base_url('/enviarcons') ?>">
                    <div class="mb-4 d-flex justify-content-between"> 
                        <div>
                            <label for="nombre"> <i class="bi bi-person-fill"></i> Nombre</label>
                            <input id="nombre_consulta" name="nombre_consulta" type="text" class="form-control"  placeholder= "ej: Juan" required>
                        </div>
                        <div >
                            <label for="apellido"> <i class="bi bi-person-bounding-box"></i> Apellido</label>
                            <input type="text" class="form-control" name="apellido_consulta" id="apellido_consulta" placeholder= "ej: Ramirez" required>
                            <div class="apellido text-danger"></div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="correo"><i class="bi bi-envelope-fill"></i> Correo</label>
                        <input type="text" class="form-control" name="email_consulta" id="email_consulta" placeholder= "ej: jRam@gmail.com" required>
                        <div class="correo text-danger"></div>
                    </div>
                    <div class="mb-4">
                        <label for="Celular"><i class="bi bi-envelope-fill"></i> Celular</label>
                        <input type="cel" class="form-control" name="celular_consulta" id="celular_consulta" placeholder= "ej: 3794.." required>
                        <div class="correo text-danger"></div>
                    </div>   
                    <div class="mb-4">
                        <label for="mensaje"> <i class="bi bi-chat-right-dots-fill" required></i> Consulta</label>
                        <textarea name="mensaje_consulta" id="mensaje_consulta" class="form-control" placeholder="Escribe tu consulta..."></textarea>
                        <div class="mensaje text-danger"></div>
                    </div> 
                    
                    <div class="mb-2">
                        <button id ="botton" class="col-12 btn btn-success d-flex justify-content-between ">
                            <span>Enviar </span><i id="icono" class="bi bi-cursor-fill "></i>
                        </button>
                    </div> 
                    <div class="mb-2">
                        <button id ="botton" type="reset" class="col-12 btn btn-dark d-flex justify-content-between" value="Limpiar Formulario">
                            <span>Limpiar </span><i id="icono" class="bi bi-cursor-fill "></i>
                        </button>
                </form>
            </div>
        </div>
    </div>
</div>
    <br>
    <br>
<h2>Información de la Empresa</h2>
<br>
<br>
<br>
<div>
    <h3>Titular de la Empresa</h3><br>
    <p>Santiago Nicolas Olivos Battestin</p>
    <h3>Razón Social</h3><br>
    <p>TYPE SHOP</p>
    <h3>Domicilio Legal</h3><br>
    <p>Ubicacion: Calle San Martin 2427, Corrientes Capital, Argentina.</p>
    <div class="mapa">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3539.9171482500838!2d-58.81985658217014!3d-27.47183862175974!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456b67a8ef245b%3A0x931e13157eaab95c!2sSan%20Mart%C3%ADn%202427%2C%20W3400%20Corrientes!5e0!3m2!1ses-419!2sar!4v1682215129430!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <h3>Otros medios de Contacto</h3><br>
    <p>Numero de Telefono: +54 3795-607080</p>
    <p>Correo Electronico: typeShopcorrientes@gmail.com</p>
    <p>Instagram: type_Shop</p>
    <br>
    <br>
    <br>
    <br>

</div>
</section>
