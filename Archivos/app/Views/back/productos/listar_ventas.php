<!-- ***** MAIN (LISTA DE VENTAS) ***** -->
<main id="main-pg">

    <!-- ***** BOX DEL CONTENEDOR GRIS ***** -->
    <div class="container" style=""> 
        <div class="well">
            <h1>LISTA DE VENTAS</h1>
        </div> 
            <table class="table table-light">
                    <thead>
                        <tr class="text-center">
                            <th>NOMBRE (CLIENTE)</th>
                            <th>EMAIL (CLIENTE)</th>
                            <th>TOTAL PAGADO</th>
                            <th>DETALLES</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($ventas_cabecera) { ?>
                            <?php foreach ($ventas_cabecera as $dato) { ?>

                                <tr class="text-center">
                                    <td> <?php echo $dato['nombre']; ?> <?php echo $dato['apellido']; ?></td>
                                    <td> <?php echo $dato['email']; ?></td>
                                    <td> $<?php echo $dato['total_venta']; ?></td>
                                    <td>
                                        <a href="<?php echo base_url('listar_detalles?id=' . $dato['id']); ?>" class="btn btn-default btn-sm">
                                            <h5 class="btn btn-info btn-sm">VER DETALLES</h5>
                                        </a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
    </div>
</main>

