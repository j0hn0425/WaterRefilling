<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\User;
use Session;
use Hash;

class CustomersController extends Controller
{
    public function index(){

        // if(Auth::check()){
        //     return view('auth.dashboard');
        // }

    	//$customers = User::paginate(10);
        $user_type = Auth::user()->user_type;
        //$user_type = Auth::check();
        if(Auth::check()){
            if($user_type == "user"){
                $user = User::where('id', '=', Auth::id())->get();
                //dd($user);
                return view("userView.customer.index")->with("user", $user);
            }
            else{
                $user = User::paginate(10);
                return view("adminView.customer.index")->with("user", $user);
            }
        }
        return redirect("login")->withSuccess('Access is not permitted');
    }
 
    public function store(Request $request){

    	$customers = new User;
    	$customers->Cus_Fname = $request->input('cusFname');
    	$customers->Cus_Lname = $request->input('cusLname');
    	$customers->Cus_Address = $request->input('cusAddress');
    	$customers->Cus_ContactNo = $request->input('cusContactNo');
    	$customers->Email = $request->input('email');
    	$customers->Password = $request->input('password');
    	$customers->Username = $request->input('username');
    	$customers->save();

    	// dd($customers);

    	//echo "Successfully Added!";
        return redirect("index")->withSuccess('Successfully Added!');
    }

    public function create(){

    	return view("adminView.customer.create");
    }

    public function show($id){

    	//$customer = Customer::find($id);
        //$customer = DB::select('SELECT * FROM customers where Cus_id = ?', [$id]);
        //$customer = Customer::where('Cus_id', $id)->get(['Cus_Fname','Cus_Lname','Cus_Address','Cus_ContactNo', 'Email']);
        
        $user_type = Auth::user()->user_type;

        if($user_type == "user"){
            $user = DB::table('users')
            ->where('id', $id)
            ->get();

            //dd($user);
            return view("userView.customer.show")->with("user", $user);
        }
        else{
            $user = DB::table('users')
                    ->where('id', $id)
                    ->get();

    	//dd($customer);
    	return view("adminView.customer.show")->with("user", $user);
        }        
    }

    public function edit($id){

    	//$customer = Customer::find($id);

        $user = DB::table('users')
                    ->where('id', $id)
                    ->first();

        //dd($customer);
    	return view("adminView.customer.edit")->with("user", $user);
    }

    public function update(Request $request, $id){

        $customer = DB::table('users')
                    ->where('id', $id)
                    ->update([
                        'User_Fname' => $request->cusFname,
                        'User_Lname' => $request->cusLname,
                        'User_Address' => $request->cusAddress,
                        'ContactNo' => $request->cusContactNo,
                        'email' => $request->email,
                        'user_type' => $request->user_type,
                    ]);

    	// $customer = Customer::find($id);
    	// $customer->Cus_Fname = $request->cusFname;
    	// $customer->Cus_Lname = $request->cusLname;
    	// $customer->Cus_Address = $request->cusAddress;
    	// $customer->Cus_ContactNo = $request->cusContactNo;
    	// $customer->Email = $request->email;
    	// dd($customer);
    	//$customer->save();

    	//echo "Successfully updated!";
        return redirect("customer")->withSuccess('Successfully Added!');
    }

    public function destroy($id){

    	//$customer = Customer::find($id);
    	//$customer->delete();

        $customer = DB::table('users')
                    ->where('id', $id)
                    ->delete();

    	//echo "Succesdully deleted!";
        return redirect("customer")->withSuccess('Successfully Added!');
    }
}
