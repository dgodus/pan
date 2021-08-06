<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;


    public function cliente(){
        return $this->belongsTo('App\Models\cliente');
    }

    public function ventaDetalle(){
        return $this->hasMany('App\Models\ventaDetalle');
    }

    public function trabajoDetalle(){
        return $this->hasMany('App\Models\trabajoDetalle');
    }
    
}
