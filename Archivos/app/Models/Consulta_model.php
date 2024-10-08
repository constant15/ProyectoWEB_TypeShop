<?php 
namespace App\Models;
use CodeIgniter\Model;

class Consulta_model extends Model{

	protected $table = 'consultas';
	protected $primaryKey='id_persona';
	protected $allowedFields = ['nombre_consulta', 'apellido_consulta', 'email_consulta', 'celular_consulta', 'mensaje_consulta', 'estado_consulta'];


}