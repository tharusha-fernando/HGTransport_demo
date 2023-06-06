<?php
// app/Services/MyService.php

namespace App\Services;

use App\Models\Invoices;

class InvoicePagination
{


    public function index($search_by, $sections, $search_data_vehicle_bu_company, $search_data_vehicle_bu_to_to_company, $search_data_vehicle_bu_, $search_data_vehicle_bu_to_to_)
    {
        if ($search_by == "date") {
            return Invoices::whereBetween('date', [$search_data_vehicle_bu_, $search_data_vehicle_bu_to_to_])->orderBy('id', 'DESC')->select('id', 'company_id', 'invoice_number', 'total', 'paid', 'unpaid', 'section', 'date')->with('User')->paginate(50);
        } elseif ($search_by == "company") {
            if ($sections == "defaultbububabubububabubububabubububabu") {
                if (!is_null($search_data_vehicle_bu_company) && !is_null($search_data_vehicle_bu_to_to_company)) {
                    return Invoices::whereBetween('date', [$search_data_vehicle_bu_company, $search_data_vehicle_bu_to_to_company])->whereHas('User', function ($query) use ($search_data_vehicle_bu_) {
                        $query->where('name', 'LIKE', '%' . $search_data_vehicle_bu_ . '%');
                    })->orderBy('id', 'DESC')->select('invoice_number', 'section', 'company_id', 'date', 'total', 'paid', 'unpaid')->with('User')->paginate(50);
                } else {
                    return Invoices::whereHas('User', function ($query) use ($search_data_vehicle_bu_) {
                        $query->where('name', 'LIKE', '%' . $search_data_vehicle_bu_ . '%');
                    })->orderBy('id', 'DESC')->select('id', 'company_id', 'invoice_number', 'total', 'paid', 'unpaid', 'section', 'date')->with('User')->paginate(50);
                }
            } else {
                if (!is_null($search_data_vehicle_bu_company) && !is_null($search_data_vehicle_bu_to_to_company)) {
                    return Invoices::whereBetween('date', [$search_data_vehicle_bu_company, $search_data_vehicle_bu_to_to_company])->where('section', $sections)->whereHas('User', function ($query) use ($search_data_vehicle_bu_) {
                        $query->where('name', 'LIKE', '%' . $search_data_vehicle_bu_ . '%');
                    })->orderBy('id', 'DESC')->select('id', 'company_id', 'invoice_number', 'total', 'paid', 'unpaid', 'section', 'date')->with('User')->paginate(50);
                } else {
                    return Invoices::where('section', $sections)->whereHas('User', function ($query) use ($search_data_vehicle_bu_) {
                        $query->where('name', 'LIKE', '%' . $search_data_vehicle_bu_ . '%');
                    })->orderBy('id', 'DESC')->select('id', 'company_id', 'invoice_number', 'total', 'paid', 'unpaid', 'section', 'date')->with('User')->paginate(50);
                }
            }
        } elseif ($search_by == "total") {
            return Invoices::where('total', 'LIKE', '%' . $search_data_vehicle_bu_ . '%')->orderBy('id', 'DESC')->select('id', 'company_id', 'invoice_number', 'total', 'paid', 'unpaid', 'section', 'date')->with('User')->paginate(50);
        } elseif ($search_by == "invoice_numb") {
            return Invoices::where('invoice_number', 'LIKE', '%' . $search_data_vehicle_bu_ . '%')->orderBy('id', 'DESC')->select('id', 'company_id', 'invoice_number', 'total', 'paid', 'unpaid', 'section', 'date')->with('User')->paginate(50);
        } else {
            //dd(Invoices::orderBy('id','DESC')->select('id','company_id','invoice_number', 'total','paid','unpaid','section','date')->paginate(50));
            return Invoices::orderBy('id', 'DESC')->select('id', 'company_id', 'invoice_number', 'total', 'paid', 'unpaid', 'section', 'date')->with('User')->paginate(50);
        }
    }

    public function doSomething($param1, $param2)
    {
        // logic goes here
    }
}
