<?php

namespace App\Http\Livewire;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class AddCustomer extends Component
{
    use PasswordValidationRules;
    public $Company_Name,$Email,$Password,$Password_Confirmation,$Adress,$password_confirmation,$Contact1,$Contact2;

    public function add_customer(){
        $validatedData = $this->validate([
            'Company_Name'=> ['required', 'string', 'max:255'],
            'Email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
            'Password'=>['required', Password::min(8)],
            //'password_confirmation'=>$this->passwordRules(),
            'Adress'=>'sometimes|string',
            'Contact1'=>'sometimes|numeric',
            'Contact2'=>'sometimes|numeric',
        ]);
        if ($this->Password_Confirmation==$this->Password){
            //dd($this->Password_Confirmation,$this->Password);//12345678
            $user=User::create([
                'name' => $this->Company_Name,
                'email' => $this->Email,
                'password' => Hash::make($this->Password),
            ]);
            $user->address=$this->Adress;
            $user->contact1=$this->Contact1;
            $user->contact2=$this->Contact2;
            $user->save();
            $user->attachRole('customer');
            session()->flash('message_customer', 'Customer has been added successfully');


        }else{
            session()->flash('message_pwValidation', 'Password Does Not Match');
        }

    }
    public function render()
    {
        return view('livewire.add-customer');
    }
}
