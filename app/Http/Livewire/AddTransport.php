<?php

namespace App\Http\Livewire;

use App\Models\Transport;
use App\Models\Vehicles;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddTransport extends Component
{
    public $vehicle_number,$Vehicle_size,$Vehicle_buba,$start_meter,$end_meter,$total_km,$total_hrs,$free_hrs,$demurrage_hrs,$transport_type,$date,$from,$to,$in_date,$in_time,$out_date,
       $out_time,$destination_return_from,$destination_return_to,$refference_number,$transport_amount,
       $gatepass,$red_copyRefNumb,$Vehicle__,$vehicle_id,$driver,$driver_id,$demurrage_rate;
    public  $unloadings,$ticket,$loadings,$warehouse,$labour=0;


    public $search_data_numb,$search_data_vehicle_model_bu_,$search_driver_name_bu_;
    public $transport_amount_return,$demurrage_amount,$highway,$bor,$con_hiring=0;
    public function mount(){
        $this->transport_type='unspecified';
    }

    public function add_transport(){
        //dd($this->transport_type);
        //dd($this->out_time,$this->out_date,$this->in_date,$this->in_time);
        $validatedData = $this->validate([
            'vehicle_number'=>'required|string', 'Vehicle_size'=>'required',
            //'Vehicle_buba'=>'required',
            'start_meter'=>'sometimes', 'end_meter'=>'sometimes',
            'total_km'=>'sometimes','total_hrs'=>'required|integer',
            'free_hrs'=>'required|integer','demurrage_hrs'=>'required|integer',
            'transport_type'=>'required','date'=>'required',
            'from'=>'required','to'=>'required',
            'in_date'=>'required','in_time'=>'required',
            'out_date'=>'required','out_time'=>'required',
            'destination_return_from'=>'nullable|string','destination_return_to'=>'nullable|string',
            'refference_number'=>'required','transport_amount'=>'sometimes',
            'transport_amount_return'=>'sometimes','demurrage_amount'=>'sometimes',
            'highway'=>'sometimes','bor'=>'sometimes',
            'con_hiring'=>'nullable|integer','unloadings'=>'nullable|integer',
            'ticket'=>'nullable|integer','loadings'=>'nullable|integer',
            'warehouse'=>'nullable|integer','labour'=>'nullable|integer',
            'gatepass'=>'required','red_copyRefNumb'=>'required',
        ]);
        //dd('bubububu');

        $Transport=new Transport();
        $Transport->vehicle_id=$this->Vehicle_buba->id;
        $Transport->transport_type=$this->transport_type;
        $Transport->size=$this->Vehicle_size;
        $Transport->date=$this->date;
        $Transport->created_by=Auth::user()->name;
        $Transport->destination_from=$this->from;
        $Transport->destination_to=$this->to;
        $Transport->in_date=$this->in_date;
        $Transport->in_time=$this->in_time;
        $Transport->out_date=$this->out_date;
        $Transport->out_time=$this->out_time;
        if ($this->transport_amount==""||$this->transport_amount_return==""||$this->demurrage_amount==""||
            $this->highway==""||$this->bor==""||$this->ticket==""||$this->con_hiring==""||$this->unloadings==""||$this->warehouse==""||$this->labour==""||$this->loadings==""){
            $this->data_data();
            // dd($this->bor);
            $Transport->total=$this->transport_amount+$this->transport_amount_return+$this->demurrage_amount+$this->highway+
                $this->bor+$this->con_hiring+$this->unloadings+$this->warehouse+$this->labour+$this->ticket+$this->loadings;
        }else{
            $Transport->total=$this->transport_amount+$this->transport_amount_return+$this->demurrage_amount+$this->highway+
                $this->bor+$this->con_hiring+$this->unloadings+$this->warehouse+$this->labour+$this->ticket+$this->loadings;
        }
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
        $Transport->gate_pass=$this->gatepass;
        $Transport->red__copyReferrenceNumber=$this->red_copyRefNumb;
        $Transport->save();
        $Transport->Drivers()->attach($this->driver_id->id);
        return $this->redirect('/view_transportSeperately/'.strval($Transport->id));
        //$Transport->invoice_id

    }

    public function data_data(){
        //+++;
        //if ($this->transport_amount==""||$this->transport_amount_return==""||$this->demurrage_amount==""||
          //  $this->highway==""||$this->bor==""||$this->con_hiring==""||$this->unloadings==""||$this->warehouse==""||$this->labour==""){
        //}
        if ($this->transport_amount==""){$this->transport_amount=0;}
        if ($this->transport_amount_return==""){$this->transport_amount_return=0;}
        if ($this->demurrage_amount==""){$this->demurrage_amount=0;}
        if ($this->highway==""){$this->highway=0;}
        if ($this->bor==""){$this->bor=0;
        //dd("buduasniasas");
            }
        if ($this->ticket==""){$this->ticket=0;}
        if ($this->loadings==""){$this->loadings=0;}
        if ($this->con_hiring==""){$this->con_hiring=0;}
        if ($this->unloadings==""){$this->unloadings=0;}
        if ($this->warehouse==""){$this->warehouse=0;}
        if ($this->labour==""){$this->labour=0;}
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
            'total_hrs'=>'required|integer',
        ]);
        $this->demurrage_hrs=$this->total_hrs-$this->free_hrs;
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

    public function choose_driver($id_bu){
        $Driver=\App\Models\Drivers::find($id_bu);
        $this->driver=$Driver->name;
        $this->driver_id=$Driver;
        session()->flash('message_driver_choosen_bu_bu', 'Driver has been Choosen');
        //dd($this->driver_id);

    }

    public function calctime(){
        //dd($this->out_time,$this->out_date,$this->in_date,$this->in_time);
        //dd($this->in_time);
        $validatedData = $this->validate([
            'in_date'=>'required',
            'in_time'=>'required',
            'out_date'=>'required',
            'out_time'=>'required',
        ]);
        $in = Carbon::createFromFormat('Y-m-d H:i', "{$this->in_date} {$this->in_time}");
        $out = Carbon::createFromFormat('Y-m-d H:i', "{$this->out_date} {$this->out_time}");
        //$in=date('Y-m-d H:i:s', strtotime("$this->in_date $this->in_time"));
        //dd($in);
        //$out=date('Y-m-d H:i:s', strtotime("$this->out_date $this->out_time"));
        $hoursDifference = $out->diffInHours($in);
        $this->total_hrs=$hoursDifference;

    }








    public function render()
    {
        if ($this->search_data_numb==""&&$this->search_driver_name_bu_==""){
            //$this->calctime();
            return view('livewire.add-transport',['Vehicles'=>Vehicles::all()],['Drivers'=>\App\Models\Drivers::all()]);
        }elseif ($this->search_data_numb!=""&&$this->search_driver_name_bu_==""){
           //$this->calctime();
            return view('livewire.add-transport',['Vehicles'=>Vehicles::where('vehicle_number','LIKE','%'.$this->search_data_numb.'%')->get()],['Drivers'=>\App\Models\Drivers::all()]);
        }elseif ($this->search_data_numb==""&&$this->search_driver_name_bu_!=""){
           // $this->calctime();
            return view('livewire.add-transport',['Vehicles'=>Vehicles::all()],['Drivers'=>\App\Models\Drivers::where('name','LIKE','%'.$this->search_driver_name_bu_.'%')->get()]);
        }elseif ($this->search_data_numb!=""&&$this->search_driver_name_bu_!=""){
           // $this->calctime();
            return view('livewire.add-transport',['Vehicles'=>Vehicles::where('vehicle_number','LIKE','%'.$this->search_data_numb.'%')->get()],['Drivers'=>\App\Models\Drivers::where('name','LIKE','%'.$this->search_driver_name_bu_.'%')->get()]);
        }else{
          // $this->calctime();
            return view('livewire.add-transport',['Vehicles'=>Vehicles::all()],['Drivers'=>\App\Models\Drivers::all()]);
        }
        //if (!is_null($this->in_time)&&!is_null($this->in_date)&&!is_null($this->out_time)&&!is_null($this->out_date)){
//
       // }



        //return view('livewire.add-transport');
    }
}
