<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicles extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;

    public function Drivers(){
        return $this->belongsTo('App\Models\Drivers','driver_id');
    }
    public function Transport(){
        return $this->hasMany('App\Models\Transport');//'App\Models\Transport','vehicle_id');
    }
    public function Vehicle_Owner(){
        return $this->belongsTo('App\Models\Vehicle_Owner','owner_id');
    }
    //public function Transport(){
      //  return $this->belongsToMany('App\Models\Transport');
      //nsdjisjdsidoada
    //}

}
