<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Drivers extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function Vehicles(){
        return $this->hasOne('App\Models\Vehicles');
    }
    public function Driver_payments(){
        return $this->hasMany('App\Models\Driver_payments');
    }
    public function Transport(){
        return $this->belongsToMany('App\Models\Transport','table_transport_drivers','drivers_id','transport_id')->withTimestamps();
    }
}
