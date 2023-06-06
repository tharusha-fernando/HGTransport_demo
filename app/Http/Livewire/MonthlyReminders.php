<?php

namespace App\Http\Livewire;

use App\Models\Transport;
use Carbon\Carbon;
use Livewire\Component;

class MonthlyReminders extends Component
{
    public $today;
    public $Transports=[];
    public function mount(){
        $this->today=Carbon::today()->format('d');
        //dd($this->today);
        $Transport__=Transport::where('transport_type','monthly')->get();
        //dd($Transport__);njjjjk
        foreach($Transport__ as $Transport){
            //dd()
            //dd($Transport->date);
            $date=Carbon::parse($Transport->date)->format('d');
            //dd($date);
            if ($date==$this->today){
                array_push($this->Transports,$Transport);
            }
        }
        //dd($this->Transport);
        //dd($this->today);
    }
    public function render()
    {
        return view('livewire.monthly-reminders');
    }
}
