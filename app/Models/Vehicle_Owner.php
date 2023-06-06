<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle_Owner extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;


    public function Vehicles(){
        return $this->hasMany('App\Models\Vehicles');
    }
}
