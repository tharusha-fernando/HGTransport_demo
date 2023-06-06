<?php

namespace App\Http\Livewire;

use App\Models\Transport;
use App\Models\Vehicles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;

class ViewTransportSeperately extends Component
{
    public $vehicle_number,$id_buba,$Transport__,$Vehicle_size,$Vehicle_buba,$start_meter,$end_meter,$total_km,$total_hrs,$free_hrs,$demurrage_hrs;
    public $search_data_numb,$search_data_vehicle_model_bu_,$search_driver_name_bu_,$total,$demurrage_rate,$Drivers;
    public $transport_type,$date,$from,$to,$in_date,$in_time,$out_date,
        $out_time,$destination_return_from,$destination_return_to,$refference_number,$transport_amount,$transport_amount_return,$demurrage_amount,$travelled_distance,$total_distancetot,$highway,$bor,$con_hiring,
        $unloadings,$ticket,$loadings,$warehouse,$labour,$gatepass,$red_copyRefNumb,$Vehicle__,$vehicle_id,$Vehicle,$driver,$driver_id;

    public function mount(){
        $this->Transport__=Transport::find($this->id_buba);
        //dd($this->Transport__->Drivers);
        //dd($this->Transport__);
        //$Transport=new Transport();
        $this->Vehicle_buba=Vehicles::find($this->Transport__->vehicle_id);
        //dd($this->Transport__->Vehicles);
        $this->vehicle_number=$this->Vehicle_buba->vehicle_number;
        $this->transport_type=$this->Transport__->transport_type;
        $this->Vehicle_size=$this->Transport__->size;
        $this->date=$this->Transport__->date;
        $this->from=$this->Transport__->destination_from;
        $this->to=$this->Transport__->destination_to;
        $this->in_date=$this->Transport__->in_date;
        $this->in_time=$this->Transport__->in_time;
        $this->out_date=$this->Transport__->out_date;
        $this->out_time=$this->Transport__->out_time;
        $this->destination_return_from=$this->Transport__->destination_return_from;
        $this->destination_return_to=$this->Transport__->destination_return_to;
        $this->refference_number=$this->Transport__->referrence_number;
        $this->transport_amount=$this->Transport__->transport_amount;
        $this->start_meter=$this->Transport__->start_meter;
        $this->end_meter=$this->Transport__->end_meter;
        $this->total_km=$this->Transport__->total_km;
        $this->transport_amount_return=$this->Transport__->transport_amount_return;
        $this->total_hrs=$this->Transport__->total_hrs;
        $this->free_hrs=$this->Transport__->free_hrs;
        $this->demurrage_hrs=$this->Transport__->demurrage_hrs;
        $this->demurrage_amount=$this->Transport__->demurrage_amount;
        $this->highway=$this->Transport__->highway;
        $this->bor=$this->Transport__->bor;
        $this->con_hiring=$this->Transport__->con_hiring;
        $this->unloadings=$this->Transport__->unloadings;
        $this->ticket=$this->Transport__->ticket;
        $this->loadings=$this->Transport__->loadings;
        $this->warehouse=$this->Transport__->warehouse;
        $this->labour=$this->Transport__->labour;
        $this->gatepass=$this->Transport__->gate_pass;
        $this->red_copyRefNumb=$this->Transport__->red__copyReferrenceNumber;
        $this->travelled_distancetot=$this->Transport__->total_distance;
    }

    public function update_transport(){
        $validatedData = $this->validate([
            'vehicle_number'=>'required', 'Vehicle_size'=>'required',
            //'Vehicle_buba'=>'required',
            'start_meter'=>'sometimes', 'end_meter'=>'sometimes',
            'total_km'=>'sometimes','total_hrs'=>'required|integer',
            'free_hrs'=>'required|integer','demurrage_hrs'=>'required|integer',
            'transport_type'=>'required','date'=>'required',
            'from'=>'required','to'=>'required',
            'in_date'=>'required','in_time'=>'required',
            'out_date'=>'required','out_time'=>'required',//okokokok
            'destination_return_from'=>'nullable','destination_return_to'=>'nullable',//jjiii
            'refference_number'=>'required','transport_amount'=>'required',//lklkl
            'transport_amount_return'=>'nullable|integer','demurrage_amount'=>'sometimes',//kjikjiji
            'highway'=>'sometimes|integer','bor'=>'sometimes|integer',
            'con_hiring'=>'sometimes|integer','unloadings'=>'sometimes|integer',
            'ticket'=>'sometimes|integer','loadings'=>'sometimes|integer',
            'warehouse'=>'sometimes|integer','labour'=>'sometimes|integer',
            'gatepass'=>'required','red_copyRefNumb'=>'required',

        ]);
        //dd('bubububu');
        $Transport=Transport::find($this->Transport__->id);
        $Transport->vehicle_id=$this->Vehicle_buba->id;
        $Updatetime=strval(Carbon::now());
        $Updatename=strval(Auth::user()->name);
        $final='    '.strval($Transport->updated_by).'_'.$Updatetime.'_'.$Updatename.'__//__//';
        $Transport->updated_by=$final;
        $Transport->transport_type=$this->transport_type;
        $Transport->size=$this->Vehicle_size;
        $Transport->date=$this->date;
        $Transport->destination_from=$this->from;
        $Transport->destination_to=$this->to;
        $Transport->in_date=$this->in_date;
        $Transport->in_time=$this->in_time;
        $Transport->out_date=$this->out_date;
        $Transport->out_time=$this->out_time;
        $Transport->destination_return_from=$this->destination_return_from;
        $Transport->destination_return_to=$this->destination_return_to;
        $Transport->referrence_number=$this->refference_number;
        $Transport->transport_amount=$this->transport_amount;
        $Transport->start_meter=$this->start_meter;
        $Transport->end_meter=$this->end_meter;
        $Transport->total_km=$this->total_km;
        $Transport->transport_amount_return=$this->transport_amount_return;
        $Transport->total_hrs=$this->total_hrs;
        $Transport->free_hrs=$this->free_hrs;
        $Transport->demurrage_hrs=$this->demurrage_hrs;
        $Transport->demurrage_amount=$this->demurrage_amount;
        $Transport->highway=$this->highway;
        $Transport->bor=$this->bor;
        $Transport->con_hiring=$this->con_hiring;
        $Transport->unloadings=$this->unloadings;
        $Transport->ticket=$this->ticket;
        $Transport->loadings=$this->loadings;
        $Transport->warehouse=$this->warehouse;
        $Transport->labour=$this->labour;
        $Transport->total=$this->transport_amount+$this->transport_amount_return+$this->demurrage_amount+$this->highway+
            $this->bor+$this->con_hiring+$this->unloadings+$this->warehouse+$this->labour+$this->ticket+$this->loadings;

        $Transport->gate_pass=$this->gatepass;
        $Transport->red__copyReferrenceNumber=$this->red_copyRefNumb;
        if ($this->travelled_distance!=0 && !is_null($this->travelled_distance)){
            $Transport->total_distance=$this->travelled_distancetot+$this->travelled_distance;
        }
        //dd($this->date);
        //
        $Transport->save();
        $this->Transport__=Transport::find($this->id_buba);
        if (!is_null($this->driver)){
            $Transport->Drivers()->attach($this->driver_id->id);
        }
        $this->mount();
        session()->flash('message_update_transport_bu_bu', 'Transport has been Updated');
        //$Transport->invoice_id
        //

    }

    public function choose_vehicle($id_bu){
        //dd($id_bu);
        //$this->Vehicle_buba=Vehicles::where
        $this->Vehicle_buba=Vehicles::find($id_bu);
        $this->vehicle_number=$this->Vehicle_buba->vehicle_number;
        $this->Vehicle_size=$this->Vehicle_buba->size;
        //$this->Vehicle_size=
        session()->flash('message_vehicle_choosen_bu_bu', 'Vehicle has been Choosen');
    }

    public function calculate_totalkm(){
        $validatedData = $this->validate([
            'end_meter'=>'required',
            'start_meter'=>'required',
            //'in_time'=>'requiredr',
            //'out_date'=>'required',
            //'out_time'=>'required',
        ]);
        $this->total_km=$this->end_meter-$this->start_meter;
    }

    public function calculate_demurragehrs(){
        $validatedData = $this->validate([
            'free_hrs'=>'required|integer',

        ]);
        $this->demurrage_hrs=$this->total_hrs-$this->free_hrs;
    }

    public function choose_driver($id_bu){
        $Driver=\App\Models\Drivers::find($id_bu);
        $this->driver=$Driver->name;
        $this->driver_id=$Driver;
        session()->flash('message_driver_choosen_bu_bu', 'Driver has been Choosen');
        //dd($this->driver_id);

    }

    public function remove_driver($id_bu){
        $this->Transport__->Drivers()->detach($id_bu);
        $this->Transport__=Transport::find($this->id_buba);
    }

    public function choose_deleteconfirm(){
        //dd("nsffsafesfef");
        //%
        //dd(Auth::user()->hasRole('user_hg'));
        return $this->redirect('/delete_transport/'.strval($this->id_buba));

    }

    public function calctime(){
        $validatedData = $this->validate([
            'in_date'=>'required',
            'in_time'=>'required',
            'out_date'=>'required',
            'out_time'=>'required',
        ]);
        //dd($this->out_time,$this->out_date,$this->in_date,$this->in_time);
        $in = Carbon::createFromFormat('Y-m-d H:i', "{$this->in_date} {$this->in_time}");
        $out = Carbon::createFromFormat('Y-m-d H:i', "{$this->out_date} {$this->out_time}");
        //$in=date('Y-m-d H:i:s', strtotime("$this->in_date $this->in_time"));
        //dd($in);
        //$out=date('Y-m-d H:i:s', strtotime("$this->out_date $this->out_time"));
        $hoursDifference = $out->diffInHours($in);
        $this->total_hrs=$hoursDifference;

    }

    public function search_driver(){
        if ($this->search_driver_name_bu_!=""){
            $this->Drivers=\App\Models\Drivers::where('name','LIKE','%'.$this->search_driver_name_bu_.'%')->get();
        }else{
            $this->Drivers=\App\Models\Drivers::all();
        }
    }


    public function calc_demm(){
        //dd('asasasaa');
        $validatedData = $this->validate([
            'demurrage_hrs'=>'required|integer',
            'demurrage_rate'=>'required|integer',
        ]);
        $this->demurrage_amount=$this->demurrage_hrs*$this->demurrage_rate;
        //dd($this->demurrage_amount);
    }

    public function render()
    {
        if ($this->search_data_numb=="" && $this->search_data_vehicle_model_bu_==""){
            $this->search_driver();
            return view('livewire.view-transport-seperately',['Vehicles'=>Vehicles::all()],['Drivers'=>\App\Models\Drivers::all()]);
        }elseif ($this->search_data_numb!=""&& $this->search_data_vehicle_model_bu_==""){
            $this->search_driver();
            return view('livewire.view-transport-seperately',['Vehicles'=>Vehicles::where('vehicle_number','LIKE','%'.$this->search_data_numb.'%')->get()],['Drivers'=>\App\Models\Drivers::all()]);
        }elseif ($this->search_data_numb=="" && $this->search_data_vehicle_model_bu_!=""){
            $this->search_driver();
            return view('livewire.view-transport-seperately',['Vehicles'=>Vehicles::where('vehicle_model','LIKE','%'.$this->search_data_vehicle_model_bu_.'%')->get()],['Drivers'=>\App\Models\Drivers::all()]);
        }elseif ($this->search_data_numb!="" && $this->search_data_vehicle_model_bu_!=""){
            $this->search_driver();
            return view('livewire.view-transport-seperately',['Vehicles'=>Vehicles::where('vehicle_model','LIKE','%'.$this->search_data_vehicle_model_bu_.'%')->where('vehicle_number','LIKE','%'.$this->search_data_numb.'%')->get()],['Drivers'=>\App\Models\Drivers::all()]);
        }elseif($this->search_driver_name_bu_==""){
            $this->search_driver();
            return view('livewire.view-transport-seperately',['Vehicles'=>Vehicles::all()],['Drivers'=>\App\Models\Drivers::all()]);
        }elseif ($this->search_driver_name_bu_!=""){
            $this->search_driver();
            return view('livewire.view-transport-seperately',['Vehicles'=>Vehicles::all()],['Drivers'=>\App\Models\Drivers::where('name','LIKE','%'.$this->search_driver_name_bu_.'%')->get()]);
        }
        //return view('livewire.view-transport-seperately');
    }
}
