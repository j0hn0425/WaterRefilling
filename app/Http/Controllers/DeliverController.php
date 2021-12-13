<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DeliverController extends Controller
{
    public function index(){

		if(Auth::check()){
			$deliver = DB::table('deliveries as d')
                ->select(
                    'd.Delivery_Id',
                    'u.User_Fname',
                    'u.User_Lname',
                    'p.Product_name',
                    'd.Date_Delivered'
                )
                ->leftJoin('users as u', 'u.id', '=', 'd.Cus_id')
                ->leftJoin('products as p', 'p.Product_id', '=', 'd.Product_id')
                ->orderby('d.Date_Delivered', 'DESC')
                ->paginate(10);
        }
		//dd($deliver);
		return view('adminView.deliver.index')->with('deliver', $deliver); 
    }

    public function destroy($id){

    	//$customer = Customer::find($id);
    	//$customer->delete();

        $customer = DB::table('deliveries')
                    ->where('Delivery_Id', $id)
                    ->delete();

    	//echo "Succesdully deleted!";
        return redirect("customer")->withSuccess('Successfully Added!');
    }
}
