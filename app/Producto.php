<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table='Productos';
    protected $primaryKey='idproducto';
    public $timestamps=false;

    protected $fillable =[
      'nombre','stock'
    ];
}
