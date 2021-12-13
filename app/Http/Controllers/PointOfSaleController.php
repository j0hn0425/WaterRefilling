<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
Use App\Models\Order;
use App\Models\User;
use Session;
use Hash;

class PointOfSaleController extends Controller
{
    public function index(){

    	$status = "Delivered";
		if(Auth::check()){
			$pointofSale = DB::table('orders as o')
                    ->select(
                        'o.Order_id',
                        'u.User_Fname',
                        'u.User_Lname',
                        'o.Product_id',
                        'p.Product_name',
                        'o.Quantity',
                        'o.Rate',
                        'o.Amount',
                        'o.created_at',
                        'o.Status'
                    )
                    ->leftJoin('products as p', 'p.Product_id', '=', 'o.Product_id')
                    ->leftJoin('users as u' , 'u.id', '=', 'o.User_id')
                    ->paginate(10);

			//dd($manageOrder);
			return view('adminView.pointOfSale.index')->with('pointofSale', $pointofSale); 
        }
    	return redirect("login")->withSuccess('Access is not permitted');
    }

    public function destroy($id){

        $order = DB::table('orders')
                ->where('Order_id', $id)
                ->delete();

        echo "Successfully deleted!";
    }
}
