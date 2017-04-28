<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estudiante_curso extends Model
{
	protected $table = 'estudiante_curso';

	protected $primaryKey = 'id_curso';

	protected $fillable = ['id_curso', 'id_estudiante', 'estado'];
}
