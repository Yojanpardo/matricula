<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'estudiantes';

    protected $fillable = ['id', 'tipo_doc', 'depa_expedicion', 'muni_expedicion', 'nombre', 'apellido', 'telefono', 'direccion', 'correo', 'imagen', 'genero'];

    //protected $hidden = ['password', 'remember_token'];

    public function scopeBusqueda($query, $id)
    {
        return $query->where('id', '=', $id);
    }
}
