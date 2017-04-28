<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
	protected $table = 'colegios';

	protected $fillable = ['id', 'nombre', 'rector', 'direccion', 'telefono', 'correo', 'sede', 'direccion', 'latitud', 'longitud'];

}
