<?php

namespace App\Http\Livewire;

use App\Models\Invoices;
use App\Models\Sections;
use App\Models\Transport;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Carbon\Carbon;

class ViewInvoiceSeperately extends Component
{
    public $id_buba,$Company,$Invoice__,$company_name,$Transports,$Section_name,$date,$total,$paid,$unpaid,$drive_link;
    public $search_data_numbsection,$search_data_numbcompany="";
    public $calculated_total=0;
    public $calculated_total2=0;


    public function mount(){
        $Invoice=Invoices::find($this->id_buba);
        $this->Company=User::find($Invoice->company_id);
        $this->Transports=Transport::where('invoice_id',$Invoice->id)->get();
        foreach ($this->Transports as $Transporrtrtrtrrtrtrtr){
            $this->calculated_total+=$Transporrtrtrtrrtrtrtr->total;
        }
        $Invoice->total=$this->calculated_total;
        //$this->Invoice__
        $Invoice->save();
        $this->Invoice__=$Invoice;

        //dd($this->Invoice__);
    }




    public function update_invoicebubabuba(){
        $validatedData = $this->validate([
            'company_name'=>'required',
            'Section_name'=>'required',
            //'Vehicle_buba'=>'required',
            'date'=>'required',
            'total'=>'required',
            'paid'=>'required',
            'unpaid'=>'required',
            'drive_link'=>'required',

        ]);
        //dd("buuubububububububububububububu");
        $Invoice=Invoices::find($this->id_buba);
        $Invoice->company_id=$this->Company->id;
        if (!is_null($this->total)){
            $Invoice->total=$this->total;
        }
        if (!is_null($this->paid)){
            $Invoice->paid=$this->paid;
        }
        $this->calculate_unpaidbubababu();
        $Invoice->unpaid=$this->unpaid;
        //$Invoice->unpaid=$this->unpaid;
        $Invoice->section=$this->Section_name;
        $Invoice->date=$this->date;
        $Invoice->drive_link=$this->drive_link;
        $Updatetime=strval(Carbon::now());
        $Updatename=strval(Auth::user()->name);
        $final='    '.strval($Invoice->updated_by).'_'.$Updatetime.'_'.$Updatename.'__//__//';
        $Invoice->updated_by=$final;
        //dd($Invoice);
        $Invoice->save();
        $this->Invoice__=Invoices::find($this->id_buba);
        //dd($Invoice);
        session()->flash('message_newinvoice_bu_bu', 'Invoice has been Updated');
    }




    public function choose_deleteconfirm(){
        //dd("nsffsafesfef");
        //%
        return $this->redirect('/delete_invoice/'.strval($this->id_buba));

    }




    public function calculate_unpaidbubababu(){
        //dd($this->unpaid);
        $this->unpaid=$this->total-$this->paid;

    }





    public function open_updateInvoice(){
        $this->company_name=$this->Invoice__->User->name;
        $this->Section_name=$this->Invoice__->section;
        $this->date=$this->Invoice__->date;
        $this->total=$this->Invoice__->total;
        $this->paid=$this->Invoice__->paid;
        $this->unpaid=$this->Invoice__->unpaid;
        $this->drive_link=$this->Invoice__->drive_link;
        //dd($this->drive_link);
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

    public function set_calculated_total_as_final_total(){
        $this->total=$this->calculated_total;
    }

    public function print_invoiceprintinvoice(){
        //dd("skdkdmsadmakdmakdmsakd");
        return $this->redirect('/print_invoice/'.strval($this->id_buba));
    }

    public function download_invoiceprintinvoice(){
        $Invoice=Invoices::find($this->id_buba);
        $Transport=Transport::where('invoice_id',$Invoice->id)->get();
        $data=['Invoice'=>$Invoice,'Transports'=>$Transport];
        $pdf = Pdf::loadView('invoice.invoice', $data)->setOption(['defaultFont' => 'sans-serif']);
        return $pdf->download('invoice.pdf');
        //dd("skdkdmsadmakdmakdmsakd");
        //return $this->redirect('/print_invoice/'.strval($this->id_buba));
    }


    public function render()
    {
        if ($this->search_data_numbcompany!=""){
            return view('livewire.view-invoice-seperately',['Companies'=>User::where('name','LIKE','%'.$this->search_data_numbcompany.'%')->get()],['Sections'=>Sections::all()]);
        }elseif ($this->search_data_numbsection!=""){
            return view('livewire.view-invoice-seperately',['Companies'=>User::all()],['Sections'=>Sections::where('section_name','LIKE','%'.$this->search_data_numbsection.'%')->get()]);
        }else{
            return view('livewire.view-invoice-seperately',['Companies'=>User::all()],['Sections'=>Sections::all()]);
        }
        //return view('livewire.view-invoice-seperately');
    }
}
