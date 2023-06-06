<?php

namespace App\Http\Livewire;

use App\Exports\TransportExport;
use App\Models\Invoices;
use App\Models\Sections;
use App\Models\Transport;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class ViewTransports extends Component
{
    public $search_by,$Sections,$search_data_vehicle_bu_,$search_data_vehicle_bu_to_to_,$Invoices,$search_data_vehicle_bu_company,$search_data_vehicle_bu_to_to_company,$search_data_vehicle_bu_timebyve,$search_data_vehicle_bu_to_to_timebyve,$search_data_vehicle_bu_driverbyyhefbehf,$search_data_vehicle_bu_to_to_driverbyyhefbehf,$search_data_vehicle_bu_vehicle_owner,$search_data_vehicle_bu_to_to_vehicle_owner;
    public $sections="defaultbububabubububabubububabubububabu";
    public $transport_type="all";
    public $bububussdas,$sfsfsdf,$madadasdasd,$baububuaundnaiosoa;

    public function mount(){
        $this->Sections=Sections::all();
        $this->Invoices=Invoices::all();
       // dd(Transport::whereHas('Invoices.User',function ($query){
         //   $query->where('name','LIKE','%'."jhjh".'%');
        //})->paginate(50));
    }

    public function print_excel($pts){
        return Excel::download(new TransportExport($pts),'Transports.xlsx');
    }

    public function render()
    {
        if ($this->search_by=="date"){
            return view('livewire.view-transports',['Transports'=>Transport::whereBetween('date',[$this->search_data_vehicle_bu_,$this->search_data_vehicle_bu_to_to_])->orderBy('id','DESC')->paginate(50)]);
        }elseif ($this->search_by=="company"){
            if ($this->sections=="defaultbububabubububabubububabubububabu"){
                if (!is_null($this->search_data_vehicle_bu_company)&&!is_null($this->search_data_vehicle_bu_to_to_company)){
                    return view('livewire.view-transports',['Transports'=>Transport::whereBetween('date',[$this->search_data_vehicle_bu_company,$this->search_data_vehicle_bu_to_to_company])->whereHas('Invoices.User',function ($query){
                        $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                    })->orderBy('id','DESC')->paginate(50)]);
                }else{
                    //dd(Transport::whereHas('Invoices.User',function ($query){
                       // $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                    //})->paginate(50));
                    return view('livewire.view-transports',['Transports'=>Transport::whereHas('Invoices.User',function ($query){
                        $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                    })->orderBy('id','DESC')->paginate(50)]);
                    //dd($Transports);
                }
            }else{
                if (!is_null($this->search_data_vehicle_bu_company)&&!is_null($this->search_data_vehicle_bu_to_to_company)){
                    return view('livewire.view-transports',['Transports'=>Transport::whereBetween('date',[$this->search_data_vehicle_bu_company,$this->search_data_vehicle_bu_to_to_company])->whereHas('Invoices',function ($query){
                        $query->where('section',$this->sections);
                    })->whereHas('Invoices.User',function ($query){
                        $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                    })->orderBy('id','DESC')->paginate(50)]);
                }else{
                    return view('livewire.view-transports',['Transports'=>Transport::whereHas('Invoices',function ($query){
                        $query->where('section',$this->sections);
                    })->whereHas('Invoices.User',function ($query){
                        $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                    })->orderBy('id','DESC')->paginate(50)]);
                }
            }
        }elseif ($this->search_by=="vehicle"){
            if (!is_null($this->search_data_vehicle_bu_timebyve)&&!is_null($this->search_data_vehicle_bu_to_to_timebyve)){
                if (is_null($this->search_data_vehicle_bu_)){
                    return view('livewire.view-transports',['Transports'=>Transport::all()->orderBy('id','DESC')->paginate(50)]);
                }else{
                    return view('livewire.view-transports',['Transports'=>Transport::whereBetween('date',[$this->search_data_vehicle_bu_timebyve,$this->search_data_vehicle_bu_to_to_timebyve])->whereHas('Vehicles',function ($query){
                        $query->where('vehicle_number','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                    })->orderBy('id','DESC')->paginate(50)]);
                }
            }else{
                //dd("idjiowdidiodw");
                return view('livewire.view-transports',['Transports'=>Transport::whereHas('Vehicles',function ($query){
                    $query->where('vehicle_number','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                })->orderBy('id','DESC')->paginate(50)]);
            }
        }elseif($this->search_by=="driver"){
            if (!is_null($this->search_data_vehicle_bu_to_to_driverbyyhefbehf)&&!is_null($this->search_data_vehicle_bu_driverbyyhefbehf)){
                return view('livewire.view-transports',['Transports'=>Transport::whereBetween('date',[$this->search_data_vehicle_bu_driverbyyhefbehf,$this->search_data_vehicle_bu_to_to_driverbyyhefbehf])->whereHas('Drivers',function ($query){
                    $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                })->orderBy('id','DESC')->paginate(50)]);
            }else{
                return view('livewire.view-transports',['Transports'=>Transport::whereHas('Drivers',function ($query){
                    $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                })->orderBy('id','DESC')->paginate(50)]);
            }
        }elseif($this->search_by=="vehicle_owner"){
            if (!is_null($this->search_data_vehicle_bu_to_to_vehicle_owner)&&!is_null($this->search_data_vehicle_bu_vehicle_owner)){
                return view('livewire.view-transports',['Transports'=>Transport::whereBetween('date',[$this->search_data_vehicle_bu_vehicle_owner,$this->search_data_vehicle_bu_to_to_vehicle_owner])->whereHas('Vehicles.Vehicle_Owner',function ($query){
                    $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                })->orderBy('id','DESC')->paginate(50)]);
            }else{
                //dd(Transport::whereHas('Vehicles.Vehicle_Owner',function ($query){
                  //  $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                //})->paginate(50));
                //asasasasasasasaa
                return view('livewire.view-transports',['Transports'=>Transport::whereHas('Vehicles.Vehicle_Owner',function ($query){
                    $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                })->orderBy('id','DESC')->paginate(50)]);
            }

        }elseif ($this->search_by=="id"){
            return view('livewire.view-transports',['Transports'=>Transport::where('id','LIKE','%'.$this->search_data_vehicle_bu_.'%')->paginate(50)]);
        }
        else{
            return view('livewire.view-transports',['Transports'=>Transport::orderBy('id','DESC')->paginate(50)]);
        }
    }
}
