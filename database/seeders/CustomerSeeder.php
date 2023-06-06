<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=new Collection();
        $data->push(['name' => 'BODYLINE PRIVATE LIMITED-HORANA', 'address' => 'Gurugoda,Horana',
        'email'=>'lasithapre@masholdings.com','contact1'=>'0764056170']);//RA
        $data->push(['name' => 'BODYLINE PRIVATE LIMITED-PIMBURA', 'address' => 'Pimbura',
            'email'=>'kalubovilat@masholdings.com','contact1'=>'0761669762']);
        $data->push(['name' => 'BODYLINE PRIVATE LIMITED-AGALAWATTA', 'address' => 'Agalawatta',
            'email'=>'kalindum@masholdings.com','contact1'=>'0773768231']);
        $data->push(['name' => 'BODYLINE PRIVATE LIMITED-BALANGODA', 'address' => 'Balangoda',
            'email'=>'navini@masholdings.com','contact1'=>'0117514800','contact2'=>'+94775539466']);
        $data->push(['name' => 'BODYLINE PRIVATE LIMITED-WAULUGALA-HORANA', 'address' => 'Waulugala,Horana',
            'email'=>'samanAl@masholdings.com','contact1'=>'0763868040']);//Ww//dd

        foreach ($data as $data_) {
            $user = User::create([
                'name' => $data_['name'],
                'email' => $data_['email'],
                'password' => Hash::make('password'),
            ]);
            $user->address = $data_['address'];
            $user->contact1 = $data_['contact1'];
            $user->save();
            $user->attachRole('customer');
        }


        //admin
        $user = User::create([
            'name' => 'Admin GayanH',
            'email' => 'hgtransport.horana@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        //$user->address = $data_['address']; sd
        //$user->contact1 = $data_['contact1'];
        $user->save();
        $user->attachRole('administrator');

        $user = User::create([
            'name' => 'Developer',
            'email' => 'tharushafdo2000@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        //$user->address = $data_['address'];
        //$user->contact1 = $data_['contact1'];
        $user->save();
        $user->attachRole('administrator');

        //users_hg
        $data_=new Collection();
        $data_->push(['name' => 'Sandunika Dilhani', 'address' => 'Not Given ',
            'email'=>'sandunikadil.2002@gmail.com','contact1'=>'Not Given']);//RA
        $data_->push(['name' => 'Kaveesha Gehani', 'address' => 'Not Given',
            'email'=>'liyanagekaveesha45@gmail.com','contact1'=>'Not Given']);
        $data_->push(['name' => 'Pubudi Fernando', 'address' => 'Ingiriya',///////////////////
            'email'=>'pbjfernando71@gmail.com','contact1'=>'0761540523']);////
        $data_->push(['name' => 'Developer2', 'address' => 'Balangoda',//
            'email'=>'tharushafdo200022222222@gmail.com','contact1'=>'+94454502400','contact2'=>'+94775539466']);
        //$data_->push(['name' => 'BODYLINE PRIVATE LIMITED-WAULUGALA-HORANA', 'address' => 'Waulugala,Horana',
          //  'email'=>'samanAl@masholdings.com','contact1'=>'0763868040']);//Ww

        foreach ($data_ as $data_____) {
            $user = User::create([
                'name' => $data_____['name'],
                'email' => $data_____['email'],
                'password' => Hash::make('12345678'),
            ]);
            //$user->address = $data_['address'];
            //$user->contact1 = $data_['contact1'];
            $user->save();
            $user->attachRole('user_hg');
        }




        //
    }
}
