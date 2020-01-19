<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table='compras';
    protected $primaryKey="idcompra";
    public $timestamps=false;
    protected $fillable=[

    ];
}
