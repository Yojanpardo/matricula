<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class estudiante_familia extends Model
{
	protected $table = 'estudiante_familia';

	protected $primaryKey = 'num_doc_estu';

	protected $fillable = ['num_doc_estu', 'num_doc_fami', 'acudiente'];
}
