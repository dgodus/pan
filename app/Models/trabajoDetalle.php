<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trabajoDetalle extends Model
{
    use HasFactory;


    public function trabajador(){
        return $this->belongsTo('App\Models\trabajador');
    }


    public function venta(){
        return $this->belongsTo('App\Models\venta');
    }
}
