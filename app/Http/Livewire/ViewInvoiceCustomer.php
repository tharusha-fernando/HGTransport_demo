<?php

namespace App\Http\Livewire;

use App\Models\Invoices;
use App\Models\Transport;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewInvoiceCustomer extends Component
{
    //public $Invoices;
    public $search_by,$search_data_vehicle_bu_,$search_data_vehicle_bu_to_to_,$Sections,$Company,$search_data_vehicle_bu_company,$search_data_vehicle_bu_to_to_company;
    public $date_radioStatus="closed";
    public $sections="defaultbububabubububabubububabubububabu";
    public function mount(){
        //$this->Invoices=Invoices::where('company_id',Auth::id())->get();
    }
    public function render()
    {
        if ($this->search_by=="date"){
            return view('livewire.view-invoice-customer',['Invoices'=>Invoices::whereBetween('date',[$this->search_data_vehicle_bu_,$this->search_data_vehicle_bu_to_to_])->where('company_id',Auth::id())->orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->get()]);
        }elseif ($this->search_by=="invoice_numb"){
            return view('livewire.view-invoice-customer',['Invoices'=>Invoices::where('invoice_number','LIKE','%'.$this->search_data_vehicle_bu_.'%')->where('company_id',Auth::id())->orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->get()]);
        }else{
            //dd(Invoices::orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->get());
            return view('livewire.view-invoice-customer',['Invoices'=>Invoices::where('invoice_number','LIKE','%'.$this->search_data_vehicle_bu_.'%')->where('company_id',Auth::id())->orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->get()]);
        }
        //return view('livewire.view-invoice-customer');

    }
}
