<?php

namespace App\Models;

use CodeIgniter\Model;

class vcabecera_model extends Model
{
    protected $table='ventas_cabecera';
    protected $primaryKey='id';
    protected $allowedFields = ['id_cliente', 'fecha_venta','total_venta'];
}