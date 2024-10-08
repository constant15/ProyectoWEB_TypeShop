<!-- ***** BOX DEL CONTENEDOR GRIS ***** -->
<div class="container" style=""> 
        <div class="well">
            <h1>DETALLES DE VENTA</h1>
        </div> 
                <table class="table table-light">
                    <thead>
                        <tr class="text-center">
                            <th>ID VENTA</th>
                            <th>NOMBRE PRODUCTO</th>
                            <th>CANTIDAD</th>
                            <th>COSTO UNITARIO</th>
                            <th>COSTO SUB-TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($ventas_detalle) { ?>
                            <?php foreach ($ventas_detalle as $dato) { ?>
                                <tr class="text-center">
                                    <td>
                                        <?php echo $dato['id_venta']; ?>
                                    </td>
                                    <td>
                                        <?php echo $dato['nombre_prod']; ?>
                                    </td>
                                    <td>
                                        <?php echo $dato['detalle_cantidad']; ?>
                                    </td>
                                    <td>
                                        <?php echo $dato['detalle_precio']; ?>
                                    </td>
                                    <td>
                                        <?php echo $dato['detalle_cantidad'] * $dato['detalle_precio']; ?>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>

    </div>