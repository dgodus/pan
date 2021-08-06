<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ventaDetalle extends Model
{
    use HasFactory;

    public function producto(){
        return $this->belongsTo('App\Models\producto');
    }

    public function venta(){
        return $this->belongsTo('App\Models\venta');
    }
}
