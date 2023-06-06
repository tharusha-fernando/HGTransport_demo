<?php

namespace App\Http\Livewire;

use App\Models\Sections;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class AddSection extends Component
{
    public $section_name;

    public function add_customer(){
        $validatedData = $this->validate([
            //'Company_Name'=> ['required', 'string', 'max:255'],
            //'Email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
           // 'Password'=>['required', Password::min(8)],
            //'password_confirmation'=>$this->passwordRules(),
            'section_name'=>'sometimes|string',
            //'Contact1'=>'sometimes|numeric',
            //'Contact2'=>'sometimes|numeric',
        ]);
        $Section=new Sections();
        $Section->section_name=$this->section_name;
        $Section->save();
        session()->flash('message_customer', 'Section has been added successfully');
        //if ($this->Password_Confirmation==$this->Password){
            //dd($this->Password_Confirmation,$this->Password);//12345678
          //  $user=User::create([
            //    'name' => $this->Company_Name,
              //  'email' => $this->Email,
                //'password' => Hash::make($this->Password),
            //]);
            //$user->address=$this->Adress;
         //   $user->contact1=$this->Contact1;
           // $user->contact2=$this->Contact2;
           // $user->save();
           // $user->attachRole('customer');
           // session()->flash('message_customer', 'Customer has been added successfully');


       // }else{
         //   session()->flash('message_pwValidation', 'Password Does Not Match');
        //}

    }

    public function render()
    {
        return view('livewire.add-section');
    }
}
