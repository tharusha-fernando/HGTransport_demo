<?php

namespace App\Http\Livewire;

use App\Models\Vehicle_Owner;
use App\Models\Vehicles;
use Livewire\Component;
use Livewire\WithFileUploads;

class ViewVehicle extends Component
{
    use WithFileUploads;
    public $Vehicle;
    public $id_bu;
    public $search_data,$search_data_Vehicle_Owner="";
    public $Vehicle_numb;
    public $Vehicle_model;
    public $size;
    public $driver;
    public $vehicle_owner,$vehicle_owner_name,$owner_name,$owner_address,$owner_nic,$owner_contact,$fitness_test,$liscense,$emmission,$insuarance,$file_input;

    public function mount(){
        $this->Vehicle=Vehicles::find($this->id_bu);
        $this->Vehicle_Owners=Vehicle_Owner::all();
        if (!is_null($this->Vehicle->fitness_testExp)){$this->fitness_test=$this->Vehicle->fitness_testExp;}
        if (!is_null($this->Vehicle->emisions_testExp)){$this->emmission=$this->Vehicle->emisions_testExp;}
        if (!is_null($this->Vehicle->insuarance_Exp)){ $this->insuarance=$this->Vehicle->insuarance_Exp;}
        if (!is_null($this->Vehicle->anual_revLicExp)){$this->liscense=$this->Vehicle->anual_revLicExp;}
        //dd($this->Vehicle->Vehicle_Owner->name);
    }
    public function choose_driver($id){
        //dd($id);
        //dd($type);
        $this->driver=$id;
    }
    public function open_updateVehicle(){
        //dd($id);
        $vehicle=$this->Vehicle;
        //$this->id_update=$id;
        $this->Vehicle_numb=$vehicle->vehicle_number;
        $this->Vehicle_model=$vehicle->vehicle_model;
        $this->size=$vehicle->size;
        $this->driver=$vehicle->driver_id;
        if (!is_null($this->Vehicle->Vehicle_Owner)){
            $this->vehicle_owner_name=$this->Vehicle->Vehicle_Owner->name;
            $this->vehicle_owner=$this->Vehicle->Vehicle_Owner;
        }
        //dd($this->vehicle_owner);
    }
    public function addUpdate_vehiclebu(){
        $validatedData = $this->validate([
            'Vehicle_numb'=> 'required|string',
            'Vehicle_model'=>'required|string',
            'size'=>'required|string',
            //'password_confirmation'=>$this->passwordRules(),
            'driver'=>'sometimes|integer',

        ]);
        $Vehicle=Vehicles::find($this->id_bu);
        $Vehicle->vehicle_number=$this->Vehicle_numb;
        $Vehicle->vehicle_model=$this->Vehicle_model;
        $Vehicle->size=$this->size;
        $Vehicle->driver_id=$this->driver;
        if (!is_null($this->vehicle_owner)){
            $Vehicle->owner_id=$this->vehicle_owner->id;
        }
        $Vehicle->save();
        $this->Vehicle=Vehicles::find($this->id_bu);
        session()->flash('message_vehicle_update', 'Vehicle has been update successfully');

    }
    public function serach_vehilOwner(){
        $this->Vehicle_Owners=Vehicle_Owner::where('name','LIKE','%'.$this->search_data_Vehicle_Owner.'%')->get();

    }
    public function choose_vehicle_owner($id_bu){
        $this->vehicle_owner=Vehicle_Owner::find($id_bu);
        $this->vehicle_owner_name=$this->vehicle_owner->name;
        session()->flash('message_vehicle_owner', 'Vehicle Owner has been added successfully');
    }
    public function add_additonalInfo(){
        $validatedData = $this->validate([
            'file_input' => 'sometimes',
        ]);
        $Vehicle=Vehicles::find($this->id_bu);
        if (!is_null($this->file_input)){
            $filepath=$this->file_input->store('vehicle_files','public');
            //dd($filepath);
            $Vehicle->path=$filepath;
        }
        if (!is_null($this->fitness_test)){
            $Vehicle->fitness_testExp=$this->fitness_test;
        }
        if (!is_null($this->insuarance)){
            $Vehicle->insuarance_Exp=$this->insuarance;
        }
        if (!is_null($this->liscense)){
            $Vehicle->anual_revLicExp=$this->liscense;
        }
        if (!is_null($this->emmission)){
            $Vehicle->emisions_testExp=$this->emmission;

        }
        //dd($Vehicle);
        $Vehicle->save();
        session()->flash('upload_success_other_file_format_addtionalInfo','Additional Information Has Been Added Successfully');
    }

    public function download_docs(){
        $Vehicle=Vehicles::find($this->id_bu);
        //dd($Vehicle);
        return response()->download(storage_path('app/public/'.$this->Vehicle->path));
    }

    public function render()
    {
        if ($this->search_data==""){
            return view('livewire.view-vehicle',['Drivers'=>\App\Models\Drivers::all()]);
        }else{
            return view('livewire.view-vehicle',['Drivers'=>\App\Models\Drivers::where('name','LIKE','%'.$this->search_data.'%')->get()]);
        }
    }
}
