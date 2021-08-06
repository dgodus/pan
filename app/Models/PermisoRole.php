<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermisoRole extends Model
{
    use HasFactory;


    public function permiso(){
        return $this->belongsTo('App\Models\permiso');
    }

    public function role(){
        return $this->belongsTo('App\Models\role');
    }
}
