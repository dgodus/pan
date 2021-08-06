<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleUser extends Model
{
    use HasFactory;


    public function role(){
        return $this->belongsTo('App\Models\role');
    }


    public function user(){
        return $this->belongsTo('App\Models\user');
    }
}
