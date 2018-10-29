<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Order;
use App\PizzaDetail;
use App\PizzaTopping;
class ReceiveController extends Controller
{
    //
    public function index(){

    	$order         = Order::all();
    	$pizza         = Pizza::all();
    	$pizza_detail  = PizzaDetail::all();
    	$pizza_topping = PizzaTopping::all();

    	return view('layouts.received_orders', compact('order', 'pizza', 'pizza_detail', 'pizza_topping'));
    	
    }
}
