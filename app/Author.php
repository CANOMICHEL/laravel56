<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    //campos obligatorios
    protected $fillable = [
      'nombres', 'email'
    ];
    //deshabilitamos los timestamps
    public $timestamps = false;
}
