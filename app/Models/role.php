<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;


    public function PermisoRole(){
        return $this->hasMany('App\Models\PermisoRole');
    }

    public function roleUser(){
        return $this->hasMany('App\Models\roleUser');
    }
}
