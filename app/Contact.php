<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //campos obligatorios
    protected $fillable = [
      'nombre','telefono'
    ];
    //Deshabilitamos los timestamps
    public $timestamps = false;
}
