<?php

namespace App\Http\Livewire;

use App\Models\Transport;
use Livewire\Component;

class ViewTransportSeperatelyCustomer extends Component
{
    public $Transport__;
    public $id_buba;
    public function mount(){
        $this->Transport__=Transport::find($this->id_buba);
        //dd($this->Transport__);
    }
    public function render()
    {
        return view('livewire.view-transport-seperately-customer');
    }
}
