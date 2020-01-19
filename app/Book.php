<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //Campos obligatorios
    protected $fillable = [
      'titulo', 'edicion', 'tipo',
      'disponible', 'ejemplares', 'imagen',
      'publicacion', 'author_id'
    ];
    //Deshabilitamos los timestamps
    public $timestamps = false;
}
