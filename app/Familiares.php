<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familiares extends Model
{
	protected $table = 'familiares';

	protected $primaryKey = 'num_doc';

	protected $fillable = ['num_doc', 'tipo_doc', 'depa_expedicion', 'muni_expedicion', 'nombre', 'apellido', 'telefono', 'direccion', 'correo', 'imagen'];
}
