<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\User;
use Session;
use Hash;

class OrdersController extends Controller
{
    public function index(){

		$user_type = Auth::user()->user_type;
        //$user_type = Auth::check();
        if(Auth::check()){
            if($user_type == "user"){
                $products = Product::paginate(10);
                //dd($user);
                return view("userView.order.index")->with("products", $products);
            }
            else{
                $products = Product::paginate(10);
                return view("adminView.order.index")->with("products", $products);
            }
        }
    	return redirect("login")->withSuccess('Access is not permitted');
    }

    public function store(Request $request){
    	
    	//$product_name = DB::select('select Product_name from products where Product_id = ?', [$product_id]);

    	$quantity = $request->input('Quantity');
    	$rate = $request->input('Rate');
        $date = Carbon::now();

    	$insertOrder = DB::table('manage_orders')
    						->insert([
                                'User_id' => Auth::id(),
    							'Product_id' => $request->input('prod_id'),
    							'Quantity' => $request->input('Quantity'),
    							'Amount' => $request->input('Rate'),
    							'Total_amount' => $request->input('Amount'),
                                'Date' => $date->toDateString(),
                                'Status' => "Deliver"
    						]);
                            
    	//echo "Successfully Added!";
        return redirect("order")->withSuccess('Successfully Added!');
    }

    public function edit($id){

        $user_type = Auth::user()->user_type;
        //$product = Product::find($id);
        if($user_type == "user"){
            $product = DB::table('products')
                    ->where('Product_id', $id)
                    ->first();

            return view("userView.order.create")->with("product", $product);    
        }else{
            $product = DB::table('products')
                    ->where('Product_id', $id)
                    ->first();

        return view("adminView.order.create")->with("product", $product);

        }
    }
}