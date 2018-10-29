@extends('master')


@section('orders')

<h1><span class="blue">{</span>Pizza<span class="blue">}</span><span class="yellow">Orders</span></h1>
<h4 style="text-align:center"><span class="blue"><a href="/orders" class="btn btn-primary">Back to Orders</a></span></h4>


	@if(count($order)===0)
		<h4 style="text-align:center;" class="yellow">There are no Orders as of the moment <span class="blue">:(</span></h4>
	@else
	<table class="container">
		<thead>
			<tr>
				<th><h1>Order</h1></th>
				<th><h1>Action</h1></th>
			</tr>
		</thead>
		<tbody>
			@foreach($order as $orders)
			<tr>
				<td>{{$orders->order_id}}</td>
				<td>
					<a data-toggle="modal" href="" data-target="#detailsModal{{$orders->order_id}}" class="btn-get-started">View Details</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif

@foreach($order as $order_m)
<div class="modal fade" id="detailsModal{{$order_m->order_id}}" tabindex="-1" role="dialog" aria-labelledby="detailsModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Label2">Order Number {{$order_m->order_id}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>
          	@foreach($pizza as $pizzas)
          		@if($pizzas->order_id == $order_m->order_id)
          			<p>Pizza {{$pizzas->pizza_number}} - 
          			@foreach($pizza_detail as $pizza_details)
          				@if($pizza_details->order_id == $order_m->order_id && $pizza_details->pizza_id == $pizzas->pizza_id)
          					{{$pizza_details->size}}, {{$pizza_details-> crust}},{{$pizza_details->type}}<br><br>
          					
          					Toppings Whole:<br>
          					@foreach($pizza_topping as $toppings)
          						@if($toppings->pizza_area === 0)
          						
	          						@if($toppings->order_id == $orders->order_id)
	          							{{$toppings->pizza_item}}<br>
	          						@endif
	          					@endif
          					@endforeach
          					<br><br>
          					Toppings First-half:<br>
          					@foreach($pizza_topping as $toppings2)
          						@if($toppings2->pizza_area === 1)
          						
	          						@if($toppings2->order_id == $orders->order_id)
	          							{{$toppings2->pizza_item}}<br>
	          						@endif
	          					@endif
          					@endforeach

          					<br><br>
          					Toppings Second-half:<br>
          					@foreach($pizza_topping as $toppings3)
          						@if($toppings3->pizza_area === 2)
          						
	          						@if($toppings3->order_id == $orders->order_id)
	          							{{$toppings3->pizza_item}}<br>
	          						@endif
	          					@endif
          					@endforeach

          				@endif
          			@endforeach
          			</p>		
          		@endif
          	@endforeach
          </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
@endforeach
@endsection

