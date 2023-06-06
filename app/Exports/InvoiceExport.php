<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InvoiceExport implements FromArray,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $your_collection;
    public $your_collection2=[];
    public function __construct($pts)
    {
        $this->your_collection=$pts;
    }

    public function array(): array
    {

        foreach ($this->your_collection as $item){
            //dd($item);
            //$company=User::find($item['company_id']);
            $user=$item['user'];
            $item['company_id']=$user['name'];
            unset($item['user']);
            array_push($this->your_collection2,$item);
        }
        //dd($this->your_collection2);

        //dd($this->your_collection);
        return $this->your_collection2;
        //
    }
    public function headings() :array
    {
        return ["ID", "Company","Invice Number", "Total","Paid", "Due","Section","Date"];
    }
}
