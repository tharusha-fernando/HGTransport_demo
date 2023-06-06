<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehiclesController extends Controller
{
    public function view_vehicle($id){
        $this->segment='manage_vehicle';
        return view('hg_user.view_vehicle')->with('id',$id)->with('segment',$this->segment);
        //dd($id);
    }
    public function view_driver($id){
        $this->segment='manage_vehicle';
        return view('hg_user.view_driver')->with('id',$id)->with('segment',$this->segment);
        //dd($id);
    }
    public function update_vehicle(){

    }
    public function update_driver(){

    }
    public function view_customers(){
        $this->segment='view_customers';
        return view('hg_user.user_hg_view_customer__')->with('segment',$this->segment);
        //dd($id)
    }
    //
}
