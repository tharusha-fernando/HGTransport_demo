<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\Transport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashBoardController extends Controller
{
    public function index(){

        if (Auth::user()->hasRole('user_hg')){
            $this->segment='dashboard';
            //dd($segment);
            //dd("bubububububu");
            return view('hg_user.user_hg_dashboard')->with('segment',$this->segment);
        }elseif (Auth::user()->hasRole('customer')){
            $this->segment='dashboard';
            return view('customer.customer_dashboard')->with('segment',$this->segment);
            //dd("bububububuubu");
        }elseif(Auth::user()->hasRole('administrator')){
            $this->segment='dashboard';
            //dd($segment);
            //dd("bubububububu");
            return view('hg_user.user_hg_dashboard')->with('segment',$this->segment);
        }
    }

    public function add_customer(){
        $this->segment='add_customer';
        return view('hg_user.user_hg_addCustomer')->with('segment',$this->segment);
    }

    public function manage_vehicle(){
        $this->segment='manage_vehicle';
        return view('hg_user.user_hg_vehicle_mangemen__')->with('segment',$this->segment);
    }

    public function view_customer($id){
        dd($id);
        $this->segment='view_customers';
        return view('hg_user.user_hg_view_custome_profile__')->with('segment',$this->segment)->with('id_buba',$id);
    }

    public function add_transport(){
        $this->segment='add_transport';
        //dd($this->segment);
        return view('hg_user.user_hg_add_transport__bu__')->with('segment',$this->segment);
    }

    public function view_transports(){
        $this->segment='view_transport';
        //dd($this->segment);
        return view('hg_user.user_hg_view_transports')->with('segment',$this->segment);
    }

    public function view_transportSeperately($id){
        //dd("bububububub");
        $this->segment='view_transport';
        return view('hg_user.user_hg_view_transport_seperately')->with('id_buba',$id)->with('segment',$this->segment);
    }

    public function view_invoices(){
        $this->segment='invoices';
        return view('hg_user.user_hg_view_invoices')->with('segment',$this->segment);
    }

    public function view_invoiceSeperately($id){
        $this->segment='invoices';
        return view('hg_user.user_hg_view_invoiceSeperately')->with('segment',$this->segment)->with('id_buba',$id);
    }

    public function add_prizings(){
        $this->segment='add_prizing';
        return view('admin.admin_add_prizings_bu_ba_bu_ba')->with('segment',$this->segment);
        //->with('id_buba',$id)
    }

    public function view_transportscustomer(){
        $this->segment='view_invoicescustomer';
        return view('customer.customer_view_transports_bubububa_bubububa')->with('segment',$this->segment);
    }

    public function view_invoicesSeperatelyCustomer($id){
        $this->segment='view_invoicescustomer';
        $id_buba=$id;
        return view('customer.customer_view_invoices_seperaely_bubububa_bubububa')->with('segment',$this->segment)->with('id_buba',$id_buba);
    }

    public function view_transportseperatelycustomer($id){
        $this->segment='view_invoicescustomer';
        $id_buba=$id;
        return view('customer.customer_viewtransportsseperately')->with('segment',$this->segment)->with('id_buba',$id_buba);

    }

    public function print_invoiceprintinvoice($id){
        $Invoice=Invoices::find($id);
        $Transports=Transport::where('invoice_id',$Invoice->id)->get();//dd($Transports);
        //dd("skdkdmsadmakdmakdmsakd");
        return view('invoice.invoice')->with('Invoice',$Invoice)->with('Transports',$Transports);
    }

    public function add_section(){
        //$Invoice=Invoices::find($id);
        //$Transports=Transport::where('invoice_id',$Invoice->id)->get();//dd($Transports);
        //dd("skdkdmsadmakdmakdmsakd");
        $this->segment='add_section';
        return view('hg_user.add_section')->with('segment',$this->segment);//->with('Invoice',$Invoice)->with('Transports',$Transports);
    }

    public function vehicle_owner($id){
        dd($id);
    }


    public function admin_reg(){
        return view('auth.admin_regester');
    }


    //
}
