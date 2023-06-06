<?php

namespace App\Http\Livewire;

use App\Models\Vehicle_Owner;
use App\Models\Vehicles;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component;

class AddVehicle extends Component
{
    public $Vehcle_number,$Vehicle_model,$size,$driver,$vehicle_numb_update,$vehicle_model_update,$Vehicle_Owners,$size_update,$driver_update,$id_update,$vehicle_owner,$vehicle_owner_name,$owner_name,$owner_address,$owner_nic,$owner_contact;
    public $search_data,$search_data_vehicle_bu_,$search_data_Vehicle_Owner="";
    //,$Vehicle_Owners

    public function mount(){
        //$this->Vehicles=Vehicles::all();
        //dd($this->Vehicles);
        $this->Vehicle_Owners=Vehicle_Owner::all();
    }

    public function open_updateVehicle($id){
        //dd($id);
        $vehicle=Vehicles::find($id);
        $this->id_update=$id;
        $this->vehicle_numb_update=$vehicle->vehicle_number;
        $this->vehicle_model_update=$vehicle->vehicle_model;
        $this->size_update=$vehicle->size;
        $this->driver_update=$vehicle->driver_id;
    }

    public function update_vehicle(){
        $validatedData = $this->validate([
            'vehicle_numb_update'=> 'required|string',
            'vehicle_model_update'=>'required|string',
            'size_update'=>'required|string',
            //'password_confirmation'=>$this->passwordRules(),
            'driver_update'=>'sometimes|integer',

        ]);
        $Vehicle=Vehicles::find($this->id_update);
        $Vehicle->vehicle_number=$this->Vehcle_number;
        $Vehicle->vehicle_model=$this->Vehicle_model;
        $Vehicle->size=$this->size;
        $Vehicle->driver_id=$this->driver;
        $Vehicle->save();
        $this->Vehicles=Vehicles::all();
        session()->flash('message_vehicle_update', 'Vehicle has been update successfully');

    }

    public function add_vehicle(){
        //dd($this->vehicle_owner);
        $validatedData = $this->validate([
            'Vehcle_number'=> 'required|string',
            'Vehicle_model'=>'required|string',
            'size'=>'required|string',
            //'password_confirmation'=>$this->passwordRules(),
            'driver'=>'sometimes|integer',
            'vehicle_owner'=>'sometimes',

        ]);
        $Vehicle=new Vehicles();
        $Vehicle->vehicle_number=$this->Vehcle_number;
        $Vehicle->vehicle_model=$this->Vehicle_model;
        $Vehicle->size=$this->size;
        $Vehicle->driver_id=$this->driver;
        if (!is_null($this->vehicle_owner)){
            $Vehicle->owner_id=$this->vehicle_owner->id;
        }
        $Vehicle->save();
        $this->Vehicles=Vehicles::all();
        session()->flash('message_vehicle', 'Vehicle has been added successfully');

    }



    public function choose_driver($id){
        //dd($id);
        //dd($type);
        $this->driver=$id;
        $this->driver_update=$id;
        session()->flash('message_vehicle_add_driver', 'Driver has been added successfully');
    }


    public function serach_vehilOwner(){
        $this->Vehicle_Owners=Vehicle_Owner::where('name','LIKE','%'.$this->search_data_Vehicle_Owner.'%')->get();

    }

    public function choose_vehicle_owner($id_bu){
        $this->vehicle_owner=Vehicle_Owner::find($id_bu);
        $this->vehicle_owner_name=$this->vehicle_owner->name;
        session()->flash('message_vehicle_owner', 'Vehicle Owner has been added successfully');
}
    public function add_newOwnerbubabubabubabuba(){
        $validatedData = $this->validate([
            'owner_name'=> 'required|string',
            'owner_address'=>'required|string',
            'owner_nic'=>'required|integer',
            //'password_confirmation'=>$this->passwordRules(),
            'owner_contact'=>'sometimes|integer',
            //'vehicle_owner'=>'sometimes',

        ]);
        //dd('buubububabubabubabubabubububububububububububabubabubabubabu');dsdssdsaasas
        $VEhicle_owner=new Vehicle_Owner();
        $VEhicle_owner->name=$this->owner_name;
        $VEhicle_owner->address=$this->owner_address;
        $VEhicle_owner->nic=$this->owner_nic;
        $VEhicle_owner->contact=$this->owner_contact;
        $VEhicle_owner->save();
        $this->mount();
        session()->flash('message_new_bububabubaubububabubabu_vehicle_owner', 'New Vehicle Owner has been added successfully');
}

    public function render()
    {
        if ($this->search_data=="" && $this->search_data_vehicle_bu_==""){
            $this->serach_vehilOwner();
            return view('livewire.add-vehicle',['Drivers'=>\App\Models\Drivers::all()],['Vehicles'=>Vehicles::all()]);
        }elseif ($this->search_data!=""&& $this->search_data_vehicle_bu_==""){
            $this->serach_vehilOwner();
            return view('livewire.add-vehicle',['Vehicles'=>Vehicles::all()],['Drivers'=>\App\Models\Drivers::where('name','LIKE','%'.$this->search_data.'%')->get()]);
        }elseif ($this->search_data=="" && $this->search_data_vehicle_bu_!=""){
            $this->serach_vehilOwner();
            return view('livewire.add-vehicle',['Drivers'=>\App\Models\Drivers::all()],['Vehicles'=>Vehicles::where('vehicle_number','LIKE','%'.$this->search_data_vehicle_bu_.'%')->get()]);
        }elseif ($this->search_data!="" && $this->search_data_vehicle_bu_!=""){
            $this->serach_vehilOwner();
            return view('livewire.add-vehicle',['Drivers'=>\App\Models\Drivers::where('name','LIKE','%'.$this->search_data.'%')->get()],['Vehicles'=>Vehicles::where('vehicle_number','LIKE','%'.$this->search_data_vehicle_bu_.'%')->get()]);
        }
    }
}
