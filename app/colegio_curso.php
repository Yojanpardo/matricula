<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class colegio_curso extends Model
{
	protected $table = 'colegio_curso';

	//protected $primaryKey = 'id_foro';

	protected $fillable = ['id', 'id_colegio', 'id_curso', 'cupos'];
}
