<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ManageOrder;
Use App\Models\Order;
Use App\Models\Delivery;
use App\Models\User;
use Carbon\Carbon;
use Session;
use Hash;
 
class ManageOrderController extends Controller
{
    public function index(){

    	//$manageOrder = Order::paginate(10);

        $user_type = Auth::user()->user_type;
        //$user_type = Auth::check();
        if(Auth::check()){
            if($user_type == "admin"){
                $manageOrder = DB::table('orders as o')
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
            }            
        }
        
    	// $data = DB::table('orders as o')
    	// 			->join('products as p', function($join){
    	// 				$join->on('p.Product_id', '=', 'o.Product_id')
    	// 						->where('p.Product_id', '=', 'o.Product_id');
    	// 			})->get();

    	// $data = DB::table('orders as o')
    	// 			->leftJoin('products as p', 'o.Product_id', '=', 'p.Product_id')
    	// 			->select('o.Order_id', 'o.Product_id', 'p.Product_name', 'o.Product_id', 'o.Quantity', 
    	// 						'o.Rate', 'o.Amount', 'o.created_at', 'o.Status');

    	// $notices = DB::table('notices')
     //    ->join('users', 'notices.user_id', '=', 'users.id')
     //    ->join('departments', 'users.dpt_id', '=', 'departments.id')
     //    ->select('notices.id', 'notices.title', 'notices.body', 'notices.created_at', 'notices.updated_at', 'users.name', 'departments.department_name')
     //    ->paginate(20);
        
    	return view("adminView.manageOrder.index")->with("manageOrder", $manageOrder);
    }

    public function create(){

        //return view('manageOrder.create');
    }

    public function edit($id){
        // $data = $request->all();
        // $check = $this->createUser($data);
        
        $manageOrder = DB::table('orders as o')
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
                    ->where('o.Order_id', $id)
                    ->first();

        return view('adminView.manageOrder.edit')->with('manageOrder', $manageOrder);
    }

    public function update(Request $request, $id){
        
        $data = $request->all();
        $saveManageOrder = $this->manageOrderSave($data);
        //$saveDeliver = $this->deliverSave($data);
        
        // $order = DB::table('orders')
        //             ->where('Order_id', $id)
        //             ->update([
        //                 'Status' => $request->input('status')
        //             ]);        
        
        
        // echo "Successfully updated!";
        return redirect("manageOrder")->withSuccess('Successfully Added!');
    }

    public function manageOrderSave(array $data){

        $date = Carbon::now();

        return ManageOrder::create([
            'User_id' => Auth::id(),
            'Product_id' => $data['product_id'],
            'Quantity' => $data['quantity'],
            'Amount' => $data['rate'],
            'Total_amount' => $data['total_Amount'],
            'Datee' => $date->toDateString(),
            'Status' => 'Delivered',
        ]);
    }

    public function deliverSave(array $data){
        
        $date = Carbon::now();

        return Delivery::create([
            'Cus_id' => Auth::id(),
            'Product_id' => $data['product_id'],
            'Date_Delivered' => $date->toDateTimeString(),
            'status' => 'Delivered',
        ]);
    }

    public function destroy($id){

        $order = DB::table('orders')
                ->where('Order_id', $id)
                ->delete();

        // echo "Successfully deleted!";
        return redirect("customer")->withSuccess('Successfully Added!');
    }
}
