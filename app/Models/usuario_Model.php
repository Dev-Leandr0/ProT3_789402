<?php

namespace App\Models;

use CodeIgniter\Model;

// ==============================================================================================================
// Modelo usuario_Model: Se encarga de manejar la tabla 'usuarios' en la base de datos.
// ==============================================================================================================
class usuario_Model extends Model
{
  // Nombre de la tabla con la que trabajamos
  protected $table = 'usuarios';

  // La clave primaria de esa tabla
  protected $primaryKey = 'id_usuario';

  // Campos que se pueden modificar o insertar desde el código
  protected $allowedFields = [
    'nombre',
    'apellido',
    'usuario',
    'email',
    'pass',
    'perfil_id',
    'baja'
  ];
}
