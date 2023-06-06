<?php

namespace App\Http\Livewire;

use App\Models\Prizings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class AddPrisings extends Component
{
    public $limitbubabuba,$rate,$Prizing_remaining,$limitbubabubademurrage,$ratedemurrage,$Demurrage_remaining;

    public function mount(){
        $this->Prizing_remaining=Prizings::where('name','monthly')->get()->first();
        $this->Demurrage_remaining=Prizings::where('name','demurrage')->get()->first();
        if(!is_null($this->Prizing_remaining)){
            $this->limitbubabuba=$this->Prizing_remaining->limit;
            $this->rate=$this->Prizing_remaining->prizingprizeprizingprize;
            //dd($this->Prizing_remaining);
        }
        if (!is_null($this->Demurrage_remaining)){
            $this->ratedemurrage=$this->Demurrage_remaining->limit;
            $this->limitbubabubademurrage=$this->Demurrage_remaining->prizingprizeprizingprize;
        }
    }

    public function add_monthlyLimitbubabuba(){
        $validatedData = $this->validate([
            //'Company_Name'=> ['required', 'string', 'max:255'],
            //'Email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            //'Password'=>['required', Password::min(8)],
            //'password_confirmation'=>$this->passwordRules(),
            //'Adress'=>'sometimes|string',
            'limitbubabuba'=>'required|numeric',
            'rate'=>'required|numeric',
        ]);
        $Prizing_remaining=Prizings::where('name','monthly')->get();
        if (!is_null($this->Prizing_remaining)){
            //dd("sdsdssdsds");
            $this->Prizing_remaining->name="monthly";
            $this->Prizing_remaining->limit=$this->limitbubabuba;
            $this->Prizing_remaining->prizingprizeprizingprize=$this->rate;
            $this->Prizing_remaining->description="fmnafmaklmasdmadmakabubububububabubabubububabuba";
            $this->Prizing_remaining->save();
            $this->mount();
            session()->flash('message_vehicle_choosen_bu_bu', 'New Rates has been Added');

        }else{
            //dd("bbubfududbusdsudbiusd");
            $Prizing=new Prizings();
            $Prizing->name="monthly";
            $Prizing->limit=$this->limitbubabuba;
            $Prizing->prizingprizeprizingprize=$this->rate;
            $Prizing->description="fmnafmaklmasdmadmakabubububububabubabubububabuba";
            $Prizing->save();
            $this->mount();
            session()->flash('message_vehicle_choosen_bu_bu', 'New Rates has been Added');
        }

    }

    public function add_demurrageLimitbubabuba(){
        //dd("bawuiduidhiudjiwoqdjqw");
        $validatedData = $this->validate([
            //'Company_Name'=> ['required', 'string', 'max:255'],
            //'Email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            //'Password'=>['required', Password::min(8)],
            //'password_confirmation'=>$this->passwordRules(),
            //'Adress'=>'sometimes|string',
            'limitbubabubademurrage'=>'required|numeric',
            'ratedemurrage'=>'required|numeric',
        ]);
        $Demurragefnakfnjnjkadfmkad=Prizings::where('name','demurrage')->get();
        if (!is_null($this->Demurrage_remaining)){
            //dd("sdsdssdsds");
            $this->Demurrage_remaining->name="demurrage";
            $this->Demurrage_remaining->limit=$this->limitbubabubademurrage;
            $this->Demurrage_remaining->prizingprizeprizingprize=$this->ratedemurrage;
            $this->Demurrage_remaining->description="fmnafmaklmasdmadmakabubububububabubabubububabuba";
            $this->Demurrage_remaining->save();
            $this->mount();
            session()->flash('message_vehicle_choosen_bu_budemurrage', 'New Rates has been Added');

        }else{
            //dd("bbubfududbusdsudbiusd");
            $Prizing=new Prizings();
            $Prizing->name="demurrage";
            $Prizing->limit=$this->limitbubabubademurrage;
            $Prizing->prizingprizeprizingprize=$this->ratedemurrage;
            $Prizing->description="fmnafmaklmasdmadmakabubububububabubabubububabuba";
            $Prizing->save();
            $this->mount();
            session()->flash('message_vehicle_choosen_bu_budemurrage', 'New Rates has been Added');
        }


    }
    public function render()
    {
        return view('livewire.add-prisings');
    }
}
