<?php

namespace App\Http\Livewire;

use App\Models\Driver_payments;
use App\Models\Vehicles;
use Livewire\Component;
use Livewire\WithFileUploads;

class ViewDriver extends Component
{
    use WithFileUploads;
    public $id_bu;
    public $Driver;
    public $driver_name,$nic,$driver_payments;
    public $driver_address,$contact,$file_input;
    public $date_payment,$payment_description,$payment_amount,$Driver_licence_expiration_date_bubabuba_bubabuba;
    public function mount(){
        $this->Driver=\App\Models\Drivers::find($this->id_bu);
        $this->driver_payments=Driver_payments::where('driver_id',$this->id_bu)->get();
        $this->Driver_licence_expiration_date_bubabuba_bubabuba=$this->Driver->license_expirationLicense_expiration;
        //dd($this->Driver);
    }
    public function add_payment(){
        //dd('sdskdsds;dks;d');
        //dd($this->date_payment);
        $validatedData = $this->validate([
            'date_payment'=>'required',
            'payment_description'=>'required',
            //'Vehicle_buba'=>'required',
            'payment_amount'=>'required',
            //'total'=>'required',
            //'paid'=>'required',
            //'unpaid'=>'required',
        ]);
        //dd($this->payment_amount);
        $Driver_payment=new Driver_payments();
        $Driver_payment->date=$this->date_payment;
        $Driver_payment->description=$this->payment_description;
        $Driver_payment->amount=$this->payment_amount;
        $Driver_payment->driver_id=$this->id_bu;
        $Driver_payment->save();
        $this->mount();
        session()->flash('message_addPayments', 'New Payment has been Added For This Transport Driver');
        //$this->driver_payments=Driver_payments::where('driver_id',$this->id_bu);
    }
    public function open_updateDriver(){
        $Driver_=$this->Driver;
        $this->driver_name=$Driver_->name;
        $this->driver_address=$Driver_->address;
        $this->nic=$Driver_->nic;
        $this->contact=$Driver_->contact;
        //dd($this->driver_address);

    }
    public function addUpdate_driverbu(){
        $validatedData = $this->validate([
            'driver_name'=> 'required|string',
            'driver_address'=>'required|string',
            'nic'=>'required|integer',
            //'password_confirmation'=>$this->passwordRules(),
            'contact'=>'sometimes|string',

        ]);
        $Driver=\App\Models\Drivers::find($this->id_bu);
        $Driver->name=$this->driver_name;
        $Driver->address=$this->driver_address;
        $Driver->nic=$this->nic;
        $Driver->contact=$this->contact;
        $Driver->save();
        $this->Driver=\App\Models\Drivers::find($this->id_bu);
        session()->flash('message_vehicle_update', 'Driver has been update successfully');

    }
    public function add_additionalInfo(){
        $validatedData = $this->validate([
            'file_input' => 'sometimes',
        ]);
        $Driver=\App\Models\Drivers::find($this->id_bu);
        //dd($this->file);
        if (!is_null($this->file_input)){
            $filepath=$this->file_input->store('driver_files','public');
            //dd($filepath);
            $Driver->path=$filepath;
        }
        if (!is_null($this->Driver_licence_expiration_date_bubabuba_bubabuba)){
            //dd($this->Driver_licence_expiration_date_bubabuba_bubabuba);
            $Driver->license_expirationLicense_expiration=$this->Driver_licence_expiration_date_bubabuba_bubabuba;
        }
        $Driver->save();
        $this->Driver=\App\Models\Drivers::find($this->id_bu);
        session()->flash('upload_success_other_file_format','Uploaded Successfully');



    }
    public function download_docs(){
        //dd($this->Driver->path);
        return response()->download(storage_path('app/public/'.$this->Driver->path));
    }
    public function render()
    {
        return view('livewire.view-driver');
    }
}
