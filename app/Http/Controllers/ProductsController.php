<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use Session;
use Hash;

class ProductsController extends Controller
{
    public function index(){
        
        $user_type = Auth::user()->user_type;
        //$user_type = Auth::check();
        if(Auth::check()){
            if($user_type == "user"){
                $products = Product::paginate(10);
                return view("userView.product.index")->with("products", $products);
            }
            else{
                $products = Product::paginate(10);
                return view("adminView.product.index")->with("products", $products);
            }
        }
        return redirect("login")->withSuccess('Access is not permitted');
    }

    public function store(Request $request){


    	// $products = new Product;
    	// $products->Product_name = $request->input('Prodname');
    	// $products->Prize = $request->input('Prodprize');
    	// $products->Description = $request->input('ProdDesc');
    	// $products->save();

        $products = DB::table('products')
                    ->insert([
                        'Product_name' => $request->input('Prodname'),
                        'Prize' => $request->input('Prodprize'),
                        'Description' => $request->input('ProdDesc')
                    ]);

    	//dd($products);

    	//echo "Successfully Added!";
        return redirect("login")->withSuccess('Access is not permitted');
    }

    public function create(){

    	return view("adminView.product.create");
    }

    public function show($id){

    	//$product = Product::find($id);

        $product = DB::table('products')
                    ->where('Product_id', $id)
                    ->first();

    	return view("adminView.product.show")->with("product", $product);
    }

    public function edit($id){

    	//$product = Product::find($id);

        $product = DB::table('products')
                    ->where('Product_id', $id)
                    ->first();

    	return view("adminView.product.edit")->with("product", $product);
    }

    public function update(Request $request, $id){

    	// $product = Product::find($id);
    	// $product->Product_name = $request->input('Prodname');
    	// $product->Prize = $request->input('Prodprize');
    	// $product->Description = $request->input('ProdDesc');
    	// $product->save();

        $product = DB::table('products')
                    ->where('Product_id', $id)
                    ->update([
                        'Product_name' => $request->input('Prodname'),
                        'Prize' => $request->input('Prodprize'),
                        'Description' => $request->input('ProdDesc'),

                    ]);

        //dd($product);

    	echo "Successfully updated!";
    }

    public function destroy($id){

    	// $product = Product::find($id);
    	// $product->delete();

        $product = DB::table('products')
            ->where('Product_id', $id)
            ->delete();

    	echo "Succesfully deleted!";
    }
}
