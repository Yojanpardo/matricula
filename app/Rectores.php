<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rectores extends Model
{
	protected $table = 'rectores';

	//protected $primaryKey = 'num_doc';

	protected $fillable = ['id', 'tipo_doc', 'nombre', 'apellido', 'telefono', 'direccion', 'correo', 'imagen', 'genero'];

}
