<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompraDetalle extends Model
{
    //
    protected $table='compra_detalle';
    protected $primaryKey='idcompra_detalle';
    public $timestamps=false;
    protected $fillable=[];
}
