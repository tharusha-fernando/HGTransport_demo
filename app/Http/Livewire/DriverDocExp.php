<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class DriverDocExp extends Component
{
    public $Drivers;
    public function mount(){
        $this->Drivers=\App\Models\Drivers::where('license_expirationLicense_expiration','<=',Carbon::now())->get();
    }
    public function render()
    {
        return view('livewire.driver-doc-exp');
    }
}
