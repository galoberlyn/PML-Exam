<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\Order;
use App\PizzaDetail;
use App\PizzaTopping;
use DB;
class OrderController extends Controller

/*
 *
 * POST Request handler
 *
 *
 */
{
    public function order_validation(Request $request){

    	//Models
    	$orders_m           = new Order;


    	//variables that can possibly change values
    	$attributes    = "attributes";
    	$number        = "number";
    	$pizza         = "pizza";
    	$children      = "children";
    	$size          = "size";
    	$text          = "text";
    	$crust         =  "crust";
    	$type_str      =  "type";
    	$area          = "area";
    	$toppings      = "toppings";
    	$item          = "item";
    	
    	DB::beginTransaction();
    	try{

	    	$pml_string      = $request->input('pml_order');
	    	$processed       = str_replace(array("{", "}"), array("<",">"), $pml_string); //replace
			$array_pml       = simplexml_load_string($processed); //convert to object
	    	$pml_obj         = $this->xmlObjToArr($array_pml);
			$check = Order::where('order_id',$pml_obj['attributes']['number'])->get();
			if(count($check) > 0){
				return "order number already exist";
			}

	    	if(substr($processed, 0, 6) == "<order"){

	    		$pizza_count            = count($pml_obj[$children][$pizza]);
	    		$orders_m->order_id     = $pml_obj['attributes']['number'];

	    		for($i = 0; $i<$pizza_count; $i++){ //insert pizza
			    	$pizza_m            = new Pizza;
			    	$pizza_details_m    = new PizzaDetail;
			    	

	    			$last_pizza_id         = $pizza_m->pizza_id + 1;
	    			$pizza_m->pizza_id     = $last_pizza_id;

	    			if($pml_obj[$children][$pizza][$i][$attributes][$number]-1 !== $i){
	    				return "invalid format!";

	    			}else{

	    				$pizza_m->order_id             = $pml_obj[$attributes][$number];
	    				$pizza_m->pizza_number         = $pml_obj[$children][$pizza][$i][$attributes][$number];
	    				$pizza_details_m->pizza_id     = $last_pizza_id;
	    				$pizza_details_m->size         = $pml_obj[$children][$pizza][$i][$children][$size][0][$text];
	    				$pizza_details_m->crust        = $pml_obj[$children][$pizza][$i][$children][$crust][0][$text];
	    				$pizza_type_container          = $pml_obj[$children][$pizza][$i][$children][$type_str][0][$text];

	    				if($this->typeChecker($pizza_type_container)){

	    					$pizza_details_m->type         = $pizza_type_container;

	    					if($pizza_type_container=="custom"){

	    						$toppings_counter = count($pml_obj[$children][$pizza][$i][$children][$toppings]);

	    						for($j=0; $j<$toppings_counter; $j++){

	    							$pizza_topping_m           = new PizzaTopping;
	    							$pizza_topping_m->pizza_id = $last_pizza_id;

	    							if($pml_obj[$children][$pizza][$i][$children][$toppings][$j][$attributes][$area]==$j){

	    								$pizza_topping_m->pizza_area = $pml_obj[$children][$pizza][1][$children][$toppings][$j][$attributes][$area];

	    								for($k=0; $k<count($pml_obj[$children][$pizza][$i][$children][$toppings][$j][$children][$item]); $k++){
	    									
	    									$pizza_topping_m->pizza_item = $pml_obj[$children][$pizza][$i][$children][$toppings][$j][$children][$item][$k][$text];
	    									$pizza_topping_m->save();
	    								}

	    							}

	    						}

	    					}
	    					
	    				}else{
	    					return redirect('/orders')->with("error", "error");
	    					DB::rollback();
	    				}
	    					
	    			}

				$orders_m->save();
				$pizza_m->save();
				$pizza_details_m->save();	

	    		}

	    	}else{
	    		return redirect('/orders')->with("error", "error");
    			DB::rollback();
	    	}
	    	
	    	return view('layouts.order_system')->with('success', 'success');

    	}catch(\Exception $e){
    		return redirect('/orders')->with("error", "error");
    		DB::rollback();
    	}
    	
    }

    /*
     * @boolean
     * Checks if pizza type is valid
     *
     */
    public function typeChecker($pizza_type){
    	if($pizza_type == "Hawaiian" || $pizza_type == "Chicken Fujita" || $pizza_type == "custom"){
    		return true;
    	}else{
    		return false;
    	}
    }

    /*
     * @array
     * parse string to array
     *
     */
    public function xmlObjToArr($obj) { 
    	$namespace = $obj->getDocNamespaces(true);
        $namespace[NULL] = NULL; 
        
        $children = array(); 
        $attributes = array(); 
        $name = strtolower((string)$obj->getName()); 
        
        $text = trim((string)$obj); 
        if( strlen($text) <= 0 ) { 
            $text = NULL; 
        } 
        
        // get info for all namespaces 
        if(is_object($obj)) { 
            foreach( $namespace as $ns=>$nsUrl ) { 
                // atributes 
                $objAttributes = $obj->attributes($ns, true); 
                foreach( $objAttributes as $attributeName => $attributeValue ) { 
                    $attribName = strtolower(trim((string)$attributeName)); 
                    $attribVal = trim((string)$attributeValue); 
                    if (!empty($ns)) { 
                        $attribName = $ns . ':' . $attribName; 
                    } 
                    $attributes[$attribName] = $attribVal; 
                } 
                
                // children 
                $objChildren = $obj->children($ns, true); 
                foreach( $objChildren as $childName=>$child ) { 
                    $childName = strtolower((string)$childName); 
                    if( !empty($ns) ) { 
                        $childName = $ns.':'.$childName; 
                    } 
                    $children[$childName][] = $this->xmlObjToArr($child); 
                } 
            } 
        } 
        return array( 
            'name'=>$name, 
            'text'=>$text, 
            'attributes'=>$attributes, 
            'children'=>$children 
        ); 
    } 

}
