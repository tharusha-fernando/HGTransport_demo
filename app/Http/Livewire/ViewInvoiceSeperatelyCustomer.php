<?php

namespace App\Http\Livewire;

use App\Models\Invoices;
use App\Models\Transport;
use Livewire\Component;

class ViewInvoiceSeperatelyCustomer extends Component
{
    public $id_buba;
    public $Transports,$Invoice__;
    public function mount(){
        $this->Invoice__=Invoices::find($this->id_buba);
        $this->Transports=Transport::where('invoice_id',$this->id_buba)->get();
        //dd($this->id_buba);
    }
    public function render()
    {
        return view('livewire.view-invoice-seperately-customer');
    }
}
