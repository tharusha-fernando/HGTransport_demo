<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class ViewCustomer extends Component
{
    public $confirm_name,$search_data_vehicle_bu_,$user_name="";
    //public $search_data_vehicle_bu_="";
    public $to_delte,$user_;

    public function view_customer($id_cu){
        //dd($id_cu);
        return $this->redirect('/view_customes_profile/'.$id_cu);
    }

    public function choose_deleteconfirm(){
        //dd($this->user_);
        //$Customer=User::find($id);
        if ($this->user_->name=$this->user_name){
            //dd($id);
            $this->user_->delete();
            return $this->redirect('/view_customer');
        }else{
            session()->flash('message_vehicle_choosen_bu_budemurrage', 'Invalid Customer Name');
        }


    }

    public function select_user($id_bu){
        $this->user_=User::find($id_bu);
        $this->user_name=$this->user_->name;
        //dd($this->user_name);
        //dd($id);
    }

    public function render()
    {
        if ($this->search_data_vehicle_bu_==""){
            return view('livewire.view-customer', ['Customers'=>User::all()]);
        }else{
            return view('livewire.view-customer', ['Customers'=>User::where('name','LIKE','%'.$this->search_data_vehicle_bu_.'%')->get()]);
        }
        //return view('livewire.view-customer');
    }
}
