<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    public function deleteTransport($id){
        //dd(Auth::user()->hasRole('user_hg'));
        //dd("bnfsfniusfnsibfsafbaf");//p[;[[;[;//;//;[//[[;//[[////pp//;;//;;//;;//;;//;;//;/;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;l;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;;//;//;;//;;//;;//;;
        if (Auth::user()->hasRole('administrator')){
            $Transport=Transport::find($id);
            $Transport->deleted_by=Auth::user()->name;
            $Transport->save();
            $Transport->delete();
            return redirect('/view_transports');
        }else{
            return redirect()->back();
        }
    }

    public function deleteInvoice($id){
        //dd("sdfsajdnjdnajdnsad");
        if (Auth::user()->hasRole('administrator')){//kokokokopkpok
            $Invoice=Invoices::find($id);
            $Invoice->deleted_by=Auth::user()->name;
            $Invoice->save();
            $Invoice->delete();
            return redirect('/view_invoices');
        }else{
            return redirect()->back();
        }
    }
    //
}
