<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class OdersController extends Controller
{
    public function index(){

    	$products = Product::all();

    	return view("adminView.order.index")->with("products", $products);
    }

    
}
