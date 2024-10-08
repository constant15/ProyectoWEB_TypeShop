<?php

namespace App\Models;

use CodeIgniter\Model;

class vdetalle_model extends Model
{
    protected $table='ventas_detalle';
    protected $primaryKey='id';
    protected $allowedFields = ['id_venta', 'id_producto', 'detalle_cantidad', 'detalle_precio'];
}
