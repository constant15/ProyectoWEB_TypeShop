<center>
<body>
    <div class="container" style=""> 
        <div class="well">
            <h1>LISTA DE CONSULTAS</h1>
        </div>  
    <table class="table tabled-bordered" style="">

    <thead style="color: #171342;  background-color: whitesmoke; text-align: center">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Mensaje</th>
            <th>Contestado</th>
            <th>Estado</th>
        </tr>
    </thead>
    
    <tbody style="color: #330251;  background-color: whitesmoke; text-align: center ">
    <div class="container">
    <?php if($consultas):?>
        <?php foreach($consultas as $consulta): ?>
            <tr>
                <td><?= $consulta['id_persona']; ?></td>
                <td><?= $consulta['nombre_consulta']; ?></td>
                <td><?= $consulta['apellido_consulta']; ?></td>
                <td><?= $consulta['email_consulta']; ?></td>
                <td><?= $consulta['celular_consulta']; ?></td>
                <td><?= $consulta['mensaje_consulta']; ?></td>
                <td><?= $consulta['estado_consulta']; ?></td>
                <td>
                <?php if($consulta['estado_consulta'] == 'NO' ) { ?>
                <a class="btn btn-danger" href="<?php  echo base_url('contesta/'.$consulta['id_persona']);?>">Sin leer</a> 
                <?php } else{   ?>
                    <a class="btn btn-success" href="<?php  echo base_url('contesta/'.$consulta['id_persona']);?>">Leído</a> 
                    <?php } ?>
                
            
            </td>
                            
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
    </tbody>

</table>
</div>
</body>
</center>

