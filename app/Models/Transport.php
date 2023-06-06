<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transport extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;

    public function Invoices(){
        return $this->belongsTo('App\Models\Invoices','invoice_id');
    }
    public function User(){
        return $this->belongsTo('App\Models\User');
    }
    public function Drivers(){
        return $this->belongsToMany('App\Models\Drivers','table_transport_drivers','transport_id','drivers_id')->withTimestamps();
    }
    public function Vehicles(){
        return $this->belongsTo('App\Models\Vehicles','vehicle_id');
    }

}
