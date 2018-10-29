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

    	$order = Order::all();
    	return view('layouts.received_orders', compact('order'));
    	
    }
}
