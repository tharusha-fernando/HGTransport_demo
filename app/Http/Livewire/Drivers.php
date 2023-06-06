<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Drivers extends Component
{
    public $driver_name,$Driver_address,$driver_contact,$driveR_nic;
    public $search_data_vehicle_bu_="";
    public function mount(){
        //$this->Drivers=\App\Models\Drivers::all();
    }

    public function add_driver(){
        $validatedData = $this->validate([
            'driver_name'=> 'required|string',
            'Driver_address'=>'required|string',
            'driver_contact'=>'required|string',
            //'password_confirmation'=>$this->passwordRules(),
            'driveR_nic'=>'required|string',

        ]);
        $Driver=new \App\Models\Drivers();
        $Driver->name=$this->driver_name;
        $Driver->address=$this->Driver_address;
        $Driver->nic=$this->driveR_nic;
        $Driver->contact=$this->driver_contact;
        $Driver->save();
        session()->flash('message_driver', 'Driver has been added successfully');
    }
    public function render()
    {
        if ($this->search_data_vehicle_bu_==""){
            return view('livewire.drivers',['Drivers'=>\App\Models\Drivers::all()]);
        }else{
            return view('livewire.drivers',['Drivers'=>\App\Models\Drivers::where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%')->get()]);
        }

        //return view('livewire.drivers');
    }
}
