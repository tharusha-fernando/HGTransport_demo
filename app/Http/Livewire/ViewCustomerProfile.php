<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ViewCustomerProfile extends Component
{
    public $id_buba,$Customer;

    public function mount(){
        $this->Customer=User::find($this->id_buba);


        //dd($this->id_buba);
    }
    public function render()
    {
        return view('livewire.view-customer-profile');
    }
}
