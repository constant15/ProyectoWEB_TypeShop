<div class="container " style="background-color: ">
  <div class="row">
    <div class="col-md-1"></div> <!-- COLUMNA IZDA. GRID -->
      <div class="col"> <!-- COLUMNA CENTRAL GRID -->
        <div class="row">
          <div class="col-md-12"> 
            
          <?php if (!$producto) { ?>
          <div class="container-Fluid">
            <div class="well">
              <h1 class="text-center tit">No hay Productos</h1>
            </div>  
          </div>

          <?php } else { ?>
          <div class="container-Fluid mt-2 mb-3">
            <h1>PRODUCTOS</h1>
          </div>
            <div class="container-Fluid">
              <div class="row text-center d-flex justify-content-center">
                <?php foreach($producto as $row){ ?>
                  <?php if ($row['eliminado']=='NO') {
                    $img = $row['imagen'];?>              
                <div class="col-md-4" style="font-size: 20px;">
                
          <div class="profile-card-4 text-center" style="background-color: white">
            <img src="<?=base_url()?>/assets/uploads/<?=$img?>" style="width: 18rem;" /> 
          <div class="profile-content" style="background-color: white ">
            <p class="subtitulo"> 
              <?php 
              if($row['stock'] == 0){
                  echo '<span class="badge badge-danger" style="font-size: 15px;">Sin Stock</span>';
                  }  else {
                              echo '<span class="badge badge-success" style="font-size: 15px;">Productos disponibles</span>';
                }
              ?>
          </p>
          <p class="subtitulo"><?php echo $row['nombre_prod'] ?> </p>
          <p class="subtitulo">$<?php echo $row['precio_vta'] ?> </p>
          <p class="subtitulo">
            <?php 
            if ($row['stock'] == 0) {
                echo '<span style="color: red;">Sin stock</span>';
              }else {
                echo '<span style="color: green;">En stock</span>';
              }
            ?>
          </p>
          <p>
            <?php 
            helper('form');
              if (($row['stock'] > 0)) {

                // Envia los datos en forma de formulario para agregar al carrito
                        echo form_open('carrito_agrega');
                        echo form_hidden('carrito_agrega');
                        echo form_hidden('id', $row['id']);
                        echo form_hidden('precio_vta', $row['precio_vta']);
                        echo form_hidden('nombre_prod', $row['nombre_prod']);
                        ?>
                        <div>
            <?php
                        
                    $btn = array(
                        'class' => 'btn btn-success fuenteBotones',
                        'value' => 'Comprar',
                        'name' => 'action',
                      );
                      echo form_submit($btn);
                      echo form_close();
                      ?>
                      </div>
                      <br>
                      <br>
                <?php 
              }
            ?>  
          </p>
        </div>
    </div>
</div>

              <?php } ?>
              <?php } ?> 
            </div>
            <br><br>
          </div>
          <?php } ?>
          </div>
      </div>
    </div>   
  </div>  
</div>