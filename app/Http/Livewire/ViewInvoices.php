<?php

namespace App\Http\Livewire;

use App\Exports\InvoiceExport;
use App\Models\Invoices;
use App\Models\Sections;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\InvoicePagination;

class ViewInvoices extends Component
{
    use WithPagination;
    //protected $paginationTheme = 'bootstrap';
    
    public $search_by,$search_data_vehicle_bu_,$search_data_vehicle_bu_to_to_,$Sections,$Company,$search_data_vehicle_bu_company,$search_data_vehicle_bu_to_to_company;
    public $date_radioStatus="closed";
    public $sections="defaultbububabubububabubububabubububabu";
    //$controller = app()->make(InvoicesController::class);
    protected $Service;
    //public function paginationView()
   // {
       // return 'custom-pagination';
   // }
    
    public function mount(){
        $this->Sections=Sections::all();
        $this->Company=User::all()->first();
        $this->Service=new InvoicePagination();
        //dd($this->search_data_vehicle_bu_);
    }

    public function print_excel($Invoices){
        //dd($Invoices);asasasas
        return Excel::download(new InvoiceExport($Invoices), 'invoices.xlsx');
    }

    //public function search_byVehicle(){}asassss
    public function render()
    {
        /*
        if ($this->search_by=="date"){
            return view('livewire.view-invoices',['Invoices'=>Invoices::whereBetween('date',[$this->search_data_vehicle_bu_,$this->search_data_vehicle_bu_to_to_])->orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->with('User')->paginate(50)]);
        }elseif ($this->search_by=="company"){
            if ($this->sections=="defaultbububabubububabubububabubububabu"){
                if (!is_null($this->search_data_vehicle_bu_company)&&!is_null($this->search_data_vehicle_bu_to_to_company)){
                    return view('livewire.view-invoices',['Invoices'=>Invoices::whereBetween('date',[$this->search_data_vehicle_bu_company,$this->search_data_vehicle_bu_to_to_company])->whereHas('User',function ($query){
                        $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                    })->orderBy('id','DESC')->select('invoice_number','section','company_id','date','total','paid','unpaid')->with('User')->paginate(50)]);
                }else{
                    return view('livewire.view-invoices',['Invoices'=>Invoices::whereHas('User',function ($query){
                        $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                    })->orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->with('User')->paginate(50)]);
                }
            }else{
                if (!is_null($this->search_data_vehicle_bu_company)&&!is_null($this->search_data_vehicle_bu_to_to_company)){
                    return view('livewire.view-invoices',['Invoices'=>Invoices::whereBetween('date',[$this->search_data_vehicle_bu_company,$this->search_data_vehicle_bu_to_to_company])->where('section',$this->sections)->whereHas('User',function ($query){
                        $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                    })->orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->with('User')->paginate(50)]);
                }else{
                    return view('livewire.view-invoices',['Invoices'=>Invoices::where('section',$this->sections)->whereHas('User',function ($query){
                        $query->where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%');
                    })->orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->with('User')->paginate(50)]);
                }
            }
        }elseif ($this->search_by=="total"){
            return view('livewire.view-invoices',['Invoices'=>Invoices::where('total','LIKE','%'.$this->search_data_vehicle_bu_.'%')->orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->with('User')->paginate(50)]);
        }elseif ($this->search_by=="invoice_numb"){
            return view('livewire.view-invoices',['Invoices'=>Invoices::where('invoice_number','LIKE','%'.$this->search_data_vehicle_bu_.'%')->orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->with('User')->paginate(50)]);
        }else{
            //dd(Invoices::orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->paginate(50));
            return view('livewire.view-invoices',['Invoices'=>Invoices::orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->with('User')->paginate(50)]);
        }
        */
        //dd($this->Service->index($this->search_by, $this->sections, $this->search_data_vehicle_bu_company, $this->search_data_vehicle_bu_to_to_company, $this->search_data_vehicle_bu_, $this->search_data_vehicle_bu_to_to_));
        return view('livewire.view-invoices',['Invoices'=>$this->Service->index($this->search_by, $this->sections, $this->search_data_vehicle_bu_company, $this->search_data_vehicle_bu_to_to_company, $this->search_data_vehicle_bu_, $this->search_data_vehicle_bu_to_to_)]);

    }
}
