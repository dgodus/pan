<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trabajador extends Model
{
    use HasFactory;


    public function trabajoDetalle(){
        return $this->hasMany('App\Models\trabajoDetalle');
    }

    public function asistencia(){
        return $this->hasMany('App\Models\asistencia');
    }
}
