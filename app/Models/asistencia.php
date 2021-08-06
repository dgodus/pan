<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asistencia extends Model
{
    use HasFactory;


    public function trabajador(){
        return $this->belongsTo('App\Models\trabajador');
    }
    
}
