<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoices extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;

    public function Transport(){
        return $this->hasMany('App\Models\Transport');
    }

    public function User(){
        return $this->belongsTo('App\Models\User','company_id');
    }
}
