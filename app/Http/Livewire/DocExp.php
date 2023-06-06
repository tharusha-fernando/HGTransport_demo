<?php

namespace App\Http\Livewire;

use App\Models\Vehicles;
use Carbon\Carbon;
use Livewire\Component;

class DocExp extends Component
{
    public $Vehicles,$array2;
    public $exp_array=['fitness_testExp'=>[],'emisions_testExp'=>[],'insuarance_Exp'=>[],'anual_revLicExp'=>[]];//wwqwq

    public function mount(){
        $this->Vehicles=Vehicles::where('fitness_testExp','<=',Carbon::now())->orWhere('emisions_testExp','<=',Carbon::now())
            ->orWhere('insuarance_Exp','<=',Carbon::now())->orWhere('anual_revLicExp','<=',Carbon::now())->get();
        //dd($this->Vehicles);
        foreach ($this->Vehicles as $vehicle){
            //if ($vehicle->id==12){dd($vehicle);}
            //dd($this->exp_array);
            if (!is_null($vehicle->fitness_testExp)&&$vehicle->fitness_testExp<=Carbon::now()){
                $temp=$this->exp_array['fitness_testExp'];
                array_push($this->exp_array['fitness_testExp'],$vehicle->id);
                //$this->exp_array['fitness_testExp']=$temp;
                //dd($this->exp_array);
                //$array=array($vehicle->id=>$exp_);
            }
            if (!is_null($vehicle->emisions_testExp)&&$vehicle->emisions_testExp<=Carbon::now()){
                $exp_=0;
                $temp=$this->exp_array['emisions_testExp'];
                array_push($this->exp_array['emisions_testExp'],$vehicle->id);
                //$this->exp_array['fitness_testExp']=$temp;
                //dd($this->exp_array);
                //$array=array($vehicle->id=>$exp_);
            }
            if (!is_null($vehicle->insuarance_Exp)&&$vehicle->insuarance_Exp<=Carbon::now()){
                array_push($this->exp_array['insuarance_Exp'],$vehicle->id);
            }
            if (!is_null($vehicle->anual_revLicExp)&&$vehicle->anual_revLicExp<=Carbon::now()){
                array_push($this->exp_array['anual_revLicExp'],$vehicle->id);
            }
        }
        //$this->array2=collect($this->exp_array);
        //dd($this->array2);
        //$exp_array('fitness_testExp')
        //dd($this->exp_array);
        //dd($this->exp_array);
        //dd($this->Vehicle);
    }
    public function render()
    {
        return view('livewire.doc-exp');
    }
}
