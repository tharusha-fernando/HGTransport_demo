<?php

namespace App\Exports;

use App\Models\Drivers;
use App\Models\Transport;
use App\Models\Vehicles;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransportExport implements FromArray,WithHeadings
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
        //dd($this->your_collection);
        foreach ($this->your_collection as $item){
            //dd($item);
            $vehicle=Vehicles::find($item['vehicle_id']);
            //dd($vehicle->Drivers);
            $item['vehicle_id']=$vehicle->vehicle_number;
            //$driver=Drivers::where('transport_id')
            $transport=Transport::find($item['id']);
            //dd($transport->Drivers);
            $Driver_names="";
            foreach ($transport->Drivers as $Drivers){
                $Driver_names=$Driver_names.",".$Drivers->name;
            }
            $item['drivers']=$Driver_names;
            //$company=User::find($item['company_id']);
            //$user=$item['user'];
           // $item['company_id']=$user['name'];
          //  unset($item['user']);
            //dd($item);
            array_push($this->your_collection2,$item);
        }
        //dd($this->your_collection2);

        //dd($this->your_collection);
        //return $this->your_collection;
        //gf
        //dfd
        return $this->your_collection2;
    }

    public function headings() :array
    {
        return["id","vehicle_id","transport_type","size","date","destination_from","destination_to","in_date","in_time","out_date","out_time",
            "destination_return_from","destination_return_to","referrence_number","transport_amount","start_meter","end_meter","total_km","transport_amount_return","total_hrs",
            "free_hrs","demurrage_hrs","demurrage_amount","highway","bor","con_hiring","unloadings","ticket","loadings","warehouse","labour",
            "gate_pass","red__copyReferrenceNumber","invoice_id","deleted_at","created_at","updated_at","created_by","updated_by","deleted_by","total_distance","total","Drivers"];
        //return ["ID","Invice Number", "Company", "Total","Paid", "Not Paidun","Section","Date"];
    }
}



