<?php

namespace App\Http\Livewire;

use App\Models\Invoices;
use App\Models\Sections;
use App\Models\Transport;
use App\Models\User;
use App\Models\Vehicles;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddInvoice extends Component
{
    public $company_id,$company_name,$Company,$Section_name,$total,$paid,$unpaid,$Invoices,$date,$id_buba,$Transport,$id_buForselect;
    public $search_data_numbsection,$search_data_numbcompany,$search_data_numbinvoice="";

    public function mount(){
        $this->Invoices=Invoices::all();
        $this->Transport=Transport::find($this->id_buba);

    }



    public function choose_company($id_bu){
        $this->company_id=$id_bu;
        $this->Company=User::find($this->company_id);
        $this->company_name=$this->Company->name;
        session()->flash('message_company_choosen_bu_bu', 'Company has been Choosen');
    }


    public function choose_section($id_bu){
        $section=Sections::find($id_bu);
        $this->Section_name=$section->section_name;
        session()->flash('message_section_choosen_bu_bu', 'Section has been Choosen');
    }

    public function add_newinvoicebubabuba(){
        $validatedData = $this->validate([
            'company_name'=>'required',
            'Section_name'=>'required',
            //'Vehicle_buba'=>'required',
            'date'=>'required',
            'total'=>'required',
            'paid'=>'required',
            'unpaid'=>'sometimes',
        ]);
        //dd("buuubububububububububububububu");
        $Invoice=new Invoices();
        $Invoice->company_id=$this->Company->id;
        if (!is_null($this->total)){
            $Invoice->total=$this->total;
        }
        if (!is_null($this->paid)){
            $Invoice->paid=$this->paid;
        }
        $this->calculate_unpaidbubababu();
        $Invoice->unpaid=$this->unpaid;

        $Invoice->section=$this->Section_name;
        $Invoice->date=$this->date;
        $Invoice->created_by=Auth::user()->name;
        //dd($Invoice);
        $Invoice->save();
        $Invoice->invoice_number='0'.strval($this->Company->id).'-'.$Invoice->id;
        $Invoice->save();
        $Transport=Transport::find($this->id_buba);
        $Transport->invoice_id=$Invoice->id;
        $Transport->save();
        $this->Transport=Transport::find($this->id_buba);
        //dd($Invoice);
        session()->flash('message_newinvoice_bu_bu', 'New Invoice has been Created For This Transport');
    }


    public function choose_invoice($id_bu){

        $this->id_buForselect=$id_bu;
    }

    public function search_invoice(){
        if ($this->search_data_numbinvoice!=""){
            $this->Invoices=Invoices::where('invoice_number','LIKE','%'.$this->search_data_numbinvoice.'%')->get();
        }
    }

    public function choose_invoiceconfirm(){
        $Transport=Transport::find($this->id_buba);
        $Transport->invoice_id=$this->id_buForselect;
        $Transport->save();
        $this->Transport=$Transport;
        return $this->redirect('/view_transportSeperately/'.$this->id_buba);

    }






    public function calculate_unpaidbubababu(){
        $this->unpaid=$this->total-$this->paid;

    }




    public function render()
    {
        if ($this->search_data_numbcompany!="" &&$this->search_data_numbsection==""){
            $this->search_invoice();
            return view('livewire.add-invoice',['Companies'=>User::where('name','LIKE','%'.$this->search_data_numbcompany.'%')->get()],['Sections'=>Sections::all()]);
        }elseif ($this->search_data_numbsection!="" && $this->search_data_numbcompany==""){
            $this->search_invoice();
            return view('livewire.add-invoice',['Companies'=>User::all()],['Sections'=>Sections::where('section_name','LIKE','%'.$this->search_data_numbsection.'%')->get()]);
        }elseif ($this->search_data_numbcompany!="" && $this->search_data_numbsection!=""){
            $this->search_invoice();
            return view('livewire.add-invoice',['Companies'=>User::where('name','LIKE','%'.$this->search_data_numbcompany.'%')->get()],['Sections'=>Sections::where('section_name','LIKE','%'.$this->search_data_numbsection.'%')->get()]);
        }
        else{
            $this->search_invoice();
            return view('livewire.add-invoice',['Companies'=>User::all()],['Sections'=>Sections::all()]);
        }
    }
}
